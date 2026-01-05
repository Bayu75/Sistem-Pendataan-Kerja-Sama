<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InformasiController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->query('perPage', 6); // Set 6 agar pas dengan grid 3 kolom

        // Mengambil data dokumen khusus untuk halaman informasi
        $dokumen = DB::table('view_detail_status_mitra as v')
            ->join('identitas_mitra as im', 'v.id', '=', 'im.id')
            ->join('kerjasama as k', 'v.id', '=', 'k.id')
            ->select(
                'v.id',
                'im.nama_mitra',
                'im.jenis_dokumen',
                'v.nama_kerjasama',
                'k.waktu_masuk',
                'im.path'
            )
            ->orderBy('k.waktu_masuk', 'desc') // Biasanya informasi terbaru di atas
            ->paginate($perPage)
            ->withQueryString();

        return view('informasi', compact('dokumen'));
    }
}