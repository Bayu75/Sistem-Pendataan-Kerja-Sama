<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InformasiController extends Controller
{
public function index(Request $request)
{
    $perPage = $request->query('perPage', 6); // 6 item per halaman (sesuai grid 3 kolom)

    $dokumen = DB::table('view_detail_status_mitra as v')
        ->join('identitas_mitra as im', 'v.id', '=', 'im.id')
        ->join('kerjasama as k', 'v.id', '=', 'k.id')
        ->leftJoin('dokumentasi as d', 'v.id', '=', 'd.id')
        ->select(
            'd.*',
            'v.id',
            'im.nama_mitra',
            'im.jenis_dokumen',
            'v.nama_kerjasama',
            'd.updated_at',
            'k.tgl_selesai',
            'k.jenis_kerjasama',
            'k.email_user',
            'im.path',
            'd.deskripsi',
            'd.status'
        )
        ->where('d.status', 'acc')
        ->whereRaw("d.deskripsi REGEXP '^[0-9]{2}'")
        ->orderBy('k.waktu_masuk', 'desc') // informasi terbaru di atas
        ->paginate($perPage)
        ->withQueryString();

    return view('informasi', compact('dokumen'));
}

}
