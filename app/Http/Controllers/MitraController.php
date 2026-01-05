<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IdentitasMitra;
use App\Models\Kerjasama;
use App\Models\Dokumentasi;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifikasiKadaluarsa;
use Carbon\Carbon;

class MitraController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama_mitra' => 'required|string|max:100',
            'program_studi' => 'required|string|max:100',
            'nama_kerjasama' => 'required|string|max:255',
            'jenis_dokumen' => 'required|string|max:100',
            'pic' => 'required|string|max:100',
            'masa_berlaku' => 'required|date|after_or_equal:today',
            'jenis_kerjasama' => 'required|string',
            'metode_pengiriman_notifikasi' => 'required|string',
            'email_user' => 'required|email',
            'dokumen' => 'required|mimes:pdf|max:5120',
            'deskripsi' => 'nullable|string'
        ]);

        // Upload dokumen
        $path = null;
        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $path = $file->store('dokumen', 'public');
        }

        // Simpan identitas_mitra
        $mitra = IdentitasMitra::create([
            'nama_mitra' => $request->nama_mitra,
            'program_studi' => $request->program_studi,
            'jenis_dokumen' => $request->jenis_dokumen,
            'pic' => $request->pic,
            'masa_berlaku' => $request->masa_berlaku,
            'metode_pengiriman_notifikasi' => $request->metode_pengiriman_notifikasi,
            'status' => 'Aktif',
            'path' => $path
        ]);

        // Simpan kerjasama
        $kerjasama = Kerjasama::create([
            'nama_kerjasama' => $request->nama_kerjasama,
            'jenis_kerjasama' => $request->jenis_kerjasama,
            'email_user' => $request->email_user,
            'tgl_selesai' => $request->masa_berlaku,
            'status_notif_sent' => 'none',
            'deskripsi' => $request->deskripsi
        ]);

// Ambil status dokumentasi terakhir jika ada
$existingDokumentasi = Dokumentasi::where('nama_kerjasama', $request->nama_kerjasama)
                        ->latest('id')
                        ->first();

$status = $existingDokumentasi ? $existingDokumentasi->status : 'pending';

// Simpan ke tabel dokumentasi
$dokumentasi = Dokumentasi::create([
    'nama_kerjasama' => $kerjasama->nama_kerjasama, 
    'tanggal' => $request->masa_berlaku,
    'status' => $status, // acc/pending/ditolak
    'deskripsi' => $request->deskripsi,
]);

// ⚡ Hanya kirim email jika status dokumentasi ACC
if ($status === 'acc') {

    $today = Carbon::today();
    $tglSelesai = Carbon::parse($request->masa_berlaku);
    $h600 = $tglSelesai->copy()->subDays(600);

    // Notifikasi H-600 (mendekati kadaluarsa)
    if ($today->gte($h600) && $today->lt($tglSelesai)) {
        Mail::to($request->email_user)
            ->send(new NotifikasiKadaluarsa($kerjasama, 'mendekati'));
        $kerjasama->status_notif_sent = 'sent';
        $kerjasama->save();
    }

    // Notifikasi kadaluarsa
    if ($today->gte($tglSelesai)) {
        Mail::to($request->email_user)
            ->send(new NotifikasiKadaluarsa($kerjasama, 'kadaluarsa'));
        $kerjasama->status_notif_sent = 'expired';
        $kerjasama->save();
    }
}

        return redirect()->back()->with('success', 'Data berhasil disimpan. Status dokumentasi otomatis diambil dari dokumen terakhir atau pending.');
    }
}
