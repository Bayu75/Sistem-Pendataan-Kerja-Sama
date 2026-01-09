<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokumentasi;
use App\Models\Kerjasama;
use App\Models\Fakultas;
use App\Models\IdentitasMitra;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifikasiKadaluarsa;
use App\Mail\NotifikasiFakultas;
use Carbon\Carbon;

class PengajuanController extends Controller
{
    /**
     * ===============================
     * TAMPILKAN DATA PENGAJUAN ADMIN
     * ===============================
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $data = DB::table('dokumentasi')
            ->join('kerjasama', 'kerjasama.id', '=', 'dokumentasi.id')
            ->join('identitas_mitra', 'identitas_mitra.id', '=', 'kerjasama.id')
            ->select(
                'dokumentasi.id',
                'dokumentasi.status',
                'dokumentasi.created_at',
                'kerjasama.nama_kerjasama',
                'kerjasama.jenis_kerjasama',
                'kerjasama.email_user',
                'kerjasama.tgl_selesai',
                'identitas_mitra.nama_mitra',
                'identitas_mitra.program_studi',
                'identitas_mitra.jenis_dokumen',
                'identitas_mitra.pic',
                'identitas_mitra.metode_pengiriman_notifikasi',
                'identitas_mitra.path'
            )
            ->when($search, function ($q) use ($search) {
                $q->where('identitas_mitra.nama_mitra', 'like', "%$search%")
                  ->orWhere('identitas_mitra.program_studi', 'like', "%$search%")
                  ->orWhere('kerjasama.nama_kerjasama', 'like', "%$search%")
                  ->orWhere('dokumentasi.status', 'like', "%$search%");
            })
            ->orderBy('dokumentasi.id', 'desc')
            ->get();

        return view('Admin.pengajuan', compact('data'));
    }

    /**
     * ===============================
     * UPDATE STATUS (ACC / DITOLAK) & KIRIM EMAIL
     * ===============================
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:acc,ditolak'
        ]);

        $dokumen = Dokumentasi::findOrFail($id);

        // Update status
        $dokumen->status = $request->status;
        $dokumen->save();

        // 🔔 KIRIM EMAIL JIKA STATUS ACC
        if ($request->status === 'acc') {
            // Ambil kerjasama terkait
            $kerjasama = Kerjasama::find($id);
            if ($kerjasama) {
                // Pastikan dokumentasi statusnya acc
                if ($dokumen->status === 'acc') {
                    $today = Carbon::today();
                    $tglSelesai = Carbon::parse($kerjasama->tgl_selesai);
                    $h6000 = $tglSelesai->copy()->subDays(6000);

                    if ($today->lt($tglSelesai) && $today->gte($h6000)) {
                        Mail::to($kerjasama->email_user)
                            ->send(new NotifikasiKadaluarsa($kerjasama, 'mendekati'));
                    }

                    // Jika kadaluarsa
                    if ($today->gte($tglSelesai)) {
                        Mail::to($kerjasama->email_user)
                            ->send(new NotifikasiKadaluarsa($kerjasama, 'kadaluarsa'));
                    }
                    

                    // ================= EMAIL KE FAKULTAS =================
$fakultas = Fakultas::first(); // ambil baris pertama
$mitra = IdentitasMitra::find($kerjasama->id);

if ($fakultas && $fakultas->email_fakultas && $mitra) {

    // Email mendekati kadaluarsa
    if ($today->lt($tglSelesai) && $today->gte($h6000)) {
        Mail::to($fakultas->email_fakultas)
            ->send(new NotifikasiFakultas($kerjasama, $mitra, 'mendekati'));
    }

    // Email kadaluarsa
    if ($today->gte($tglSelesai)) {
        Mail::to($fakultas->email_fakultas)
            ->send(new NotifikasiFakultas($kerjasama, $mitra, 'kadaluarsa'));
    }
}
                }
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Status berhasil diperbarui dan email notifikasi terkirim jika ACC',
            'status'  => $dokumen->status
        ]);
    }
}
