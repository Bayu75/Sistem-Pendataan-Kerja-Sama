<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardAdminController extends Controller
{
    public function index()
    {
        // Data untuk grafik jumlah dokumen per jenis
        $grafikJenisDokumen = DB::table('identitas_mitra')
            ->select('jenis_dokumen', DB::raw('count(*) as total'))
            ->groupBy('jenis_dokumen')
            ->pluck('total', 'jenis_dokumen');

        // Data untuk grafik jumlah dokumen per status
        // Misal ada view 'view_status_dokumen' dengan kolom: status_dokumen, jumlah
        $grafikStatusDokumen = DB::table('view_status_dokumen')
            ->pluck('jumlah', 'status_dokumen');

        return view('admin.DashboardAdmin', compact(
            'grafikJenisDokumen',
            'grafikStatusDokumen'
        ));
    }
}
