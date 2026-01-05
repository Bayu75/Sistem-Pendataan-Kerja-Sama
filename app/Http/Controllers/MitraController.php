<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IdentitasMitra;
use App\Models\Kerjasama;
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
            'dokumen' => 'required|mimes:pdf|max:5120'
        ]);

        // Upload dokumen
        $path = null;
        if($request->hasFile('dokumen')) {
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
            'status_notif_sent' => 'none'
        ]);

		$today = Carbon::today();
		$tglSelesai = Carbon::parse($request->masa_berlaku);
        $h7 = $tglSelesai->copy()->subDays(7);

        // H-7 / Mendekati kadaluarsa
        if($today->gte($h7) && $today->lt($tglSelesai)) {
            Mail::to($request->email_user)
                ->send(new NotifikasiKadaluarsa($kerjasama, 'mendekati'));
            $kerjasama->status_notif_sent = 'sent';
            $kerjasama->save();
        }

        // Kadaluarsa
        if($today->gte($tglSelesai)) {
            Mail::to($request->email_user)
                ->send(new NotifikasiKadaluarsa($kerjasama, 'kadaluarsa'));
            $kerjasama->status_notif_sent = 'expired';
            $kerjasama->save();
        }

        return redirect()->back()->with('success', 'Data berhasil disimpan dan notifikasi email terkirim 7 hari sebelum kadaluarsa.');
    }
}
