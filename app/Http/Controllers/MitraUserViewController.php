<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MitraUserViewController extends Controller
{
    public function index(Request $request)
    {
        // 1. Ambil input search dan perPage dari URL
        $search = $request->query('search');
        $perPage = $request->query('perPage', 10);

        // 2. Query Data Mitra dengan filter pencarian
        $mitra = DB::table('view_detail_status_mitra as v')
            ->join('identitas_mitra as im', 'v.id', '=', 'im.id')
            ->join('kerjasama as k', 'v.id', '=', 'k.id')
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->whereRaw("v.nama_kerjasama COLLATE utf8mb4_unicode_ci LIKE ?", ["%{$search}%"])
                      ->orWhereRaw("im.nama_mitra COLLATE utf8mb4_unicode_ci LIKE ?", ["%{$search}%"])
                      ->orWhereRaw("im.jenis_dokumen COLLATE utf8mb4_unicode_ci LIKE ?", ["%{$search}%"]);
                });
            })
            ->select(
                'v.id',
                'im.nama_mitra',
                'im.program_studi',
                'im.jenis_dokumen',
                'im.pic',
                'k.email_user',
                'im.path',
                'k.jenis_kerjasama',
                'im.metode_pengiriman_notifikasi',
                'v.nama_kerjasama',
                'k.waktu_masuk',
                'k.tgl_selesai'
            )
            ->paginate($perPage)
            ->withQueryString(); // Menjaga parameter search tetap ada saat pindah halaman

        // 3. Kirim ke view
        return view('mitra', compact('mitra', 'search'));
    }
}