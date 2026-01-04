<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class MitraUserViewController extends Controller
{
    public function index()
    {
        // Ambil semua mitra beserta dokumen & kerja sama mereka
        $mitra = DB::table('identitas_mitra as im')
            ->join('view_detail_status_mitra as v', 'im.id', '=', 'v.id')
            ->join('kerjasama as k', 'im.id', '=', 'k.id')
            ->select(
                'im.nama_mitra',
                'im.program_studi',
                'v.nama_kerjasama',
                'im.jenis_dokumen',
                'im.pic',
                'k.email_user',
                'k.jenis_kerjasama',
                'im.metode_pengiriman_notifikasi',
                'k.waktu_masuk',
                'k.tgl_selesai',
                'im.path'
            )
            ->orderBy('im.nama_mitra', 'asc')
            ->get();

        return view('mitra', compact('mitra'));
    }
}
