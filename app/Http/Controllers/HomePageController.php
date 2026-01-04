<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class HomePageController extends Controller
{
    public function index()
    {
        // Kerjasama Internal / Eksternal
        $kerjasamaInternal = DB::table('kerjasama')
            ->where('jenis_kerjasama', 'Internal')
            ->count();

        $kerjasamaEksternal = DB::table('kerjasama')
            ->where('jenis_kerjasama', 'Eksternal')
            ->count();

        // MoU / MoA / IA (identitas_mitra yang termasuk Kerjasama Internal / Eksternal)
        $mou = DB::table('identitas_mitra')
            ->where('jenis_dokumen', 'MoU') 
            ->count();

        $moa = DB::table('identitas_mitra')
            ->where('jenis_dokumen', 'MoA')
            ->count();

        $ia = DB::table('identitas_mitra')
            ->where('jenis_dokumen', 'IA')
            ->count();

        // Status Dokumen (VIEW)
        $aktif = DB::table('view_status_dokumen')
            ->where('status_dokumen', 'Aktif')
            ->value('jumlah') ?? 0;

        $mendekatiKadaluarsa = DB::table('view_status_dokumen')
            ->where('status_dokumen', 'Mendekati Kadaluarsa')
            ->value('jumlah') ?? 0;

        $kadaluarsa = DB::table('view_status_dokumen')
            ->where('status_dokumen', 'Kadaluarsa')
            ->value('jumlah') ?? 0;

        $dokumen = DB::table('view_detail_status_mitra as v')
            ->join('identitas_mitra as im', 'v.id', '=', 'im.id')
            ->join('kerjasama as k', 'v.id', '=', 'k.id')
            ->select(
                'v.id',
                'im.jenis_dokumen',
                'v.nama_kerjasama',
                'k.waktu_masuk',
                'v.tgl_selesai',
                'v.status_dokumen'
                )
            ->orderBy('v.id', 'asc')
            ->get();

        // DATA UNTUK GRAFIK 
        $grafikJenisDokumen = DB::table('identitas_mitra')
            ->select('jenis_dokumen', DB::raw('count(*) as total'))
            ->groupBy('jenis_dokumen')
            ->pluck('total', 'jenis_dokumen'); 

        $grafikStatusDokumen = DB::table('view_status_dokumen')
            ->pluck('jumlah', 'status_dokumen');

        return view('homePage', compact(
            'mou',
            'moa',
            'ia',
            'kerjasamaInternal',
            'kerjasamaEksternal',
            'aktif',
            'mendekatiKadaluarsa',
            'kadaluarsa',
            'dokumen',
            'grafikJenisDokumen',
            'grafikStatusDokumen'
        ));
    }
}