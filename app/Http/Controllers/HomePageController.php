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
        $mouInternal = DB::table('identitas_mitra')
            ->join('kerjasama', 'identitas_mitra.id', '=', 'kerjasama.id')
            ->where('identitas_mitra.jenis_dokumen', 'MoU')
            ->where('kerjasama.jenis_kerjasama', 'Internal')   
            ->count();

        $moaEksternal = DB::table('identitas_mitra')
            ->join('kerjasama', 'identitas_mitra.id', '=', 'kerjasama.id')
            ->where('identitas_mitra.jenis_dokumen', 'MoA')
            ->where('kerjasama.jenis_kerjasama', 'Eksternal')
            ->count();

        $iaEksternal = DB::table('identitas_mitra')
            ->join('kerjasama', 'identitas_mitra.id', '=', 'kerjasama.id')
            ->where('identitas_mitra.jenis_dokumen', 'IA')
            ->where('kerjasama.jenis_kerjasama', 'Eksternal')
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

        return view('homePage', compact(
            'mouInternal',
            'moaEksternal',
            'iaEksternal',
            'kerjasamaInternal',
            'kerjasamaEksternal',
            'aktif',
            'mendekatiKadaluarsa',
            'kadaluarsa'
        ));
    }
}
