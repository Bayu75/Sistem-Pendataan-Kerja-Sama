<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class LandingPageController extends Controller
{
    public function index()
    {
        // Jumlah kerjasama internal
        $internal = DB::table('kerjasama')
            ->where('jenis_kerjasama', 'Internal')
            ->count();

        // Jumlah kerjasama eksternal
        $eksternal = DB::table('kerjasama')
            ->where('jenis_kerjasama', 'Eksternal')
            ->count();

        // Kerjasama mendekati kadaluarsa
        $akanBerakhir = DB::table('identitas_mitra')
            ->where('status', 'Mendekati Kadaluarsa')
            ->count();

        return view('landingPage', compact(
            'internal',
            'eksternal',
            'akanBerakhir'
        ));
    }
}
