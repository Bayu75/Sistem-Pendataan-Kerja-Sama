<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomePageController extends Controller
{
    public function index(Request $request)
    {
        $search  = $request->query('search');
        $perPage = $request->query('perPage', 10);

        // Kerjasama Internal / Eksternal
        $kerjasamaInternal = DB::table('kerjasama')
            ->where('jenis_kerjasama', 'Internal')
            ->count();

        $kerjasamaEksternal = DB::table('kerjasama')
            ->where('jenis_kerjasama', 'Eksternal')
            ->count();

        // MoU / MoA / IA
        $mou = DB::table('identitas_mitra')->where('jenis_dokumen', 'MoU')->count();
        $moa = DB::table('identitas_mitra')->where('jenis_dokumen', 'MoA')->count();
        $ia  = DB::table('identitas_mitra')->where('jenis_dokumen', 'IA')->count();

        // Status Dokumen
        $aktif = DB::table('view_status_dokumen')
            ->whereRaw("status_dokumen COLLATE utf8mb4_unicode_ci = ?", ['Aktif'])
            ->value('jumlah') ?? 0;

        $mendekatiKadaluarsa = DB::table('view_status_dokumen')
            ->whereRaw("status_dokumen COLLATE utf8mb4_unicode_ci = ?", ['Mendekati Kadaluarsa'])
            ->value('jumlah') ?? 0;

        $kadaluarsa = DB::table('view_status_dokumen')
            ->whereRaw("status_dokumen COLLATE utf8mb4_unicode_ci = ?", ['Kadaluarsa'])
            ->value('jumlah') ?? 0;

        // DATA TABEL (LOGIKA TETAP)
        $dokumen = DB::table('view_detail_status_mitra as v')
            ->join('identitas_mitra as im', 'v.id', '=', 'im.id')
            ->join('kerjasama as k', 'v.id', '=', 'k.id')
            ->leftJoin('dokumentasi as d', 'v.id', '=', 'd.id')
			->when($search, function ($query, $search) {
				$query->whereRaw(
					"v.nama_kerjasama COLLATE utf8mb4_unicode_ci LIKE ?",
					["%{$search}%"]
				)
				->orWhereRaw(
					"im.jenis_dokumen COLLATE utf8mb4_unicode_ci LIKE ?",
					["%{$search}%"]
				)
				->orWhereRaw(
					"v.status_dokumen COLLATE utf8mb4_unicode_ci LIKE ?",
					["%{$search}%"]
				)

                ->orWhereRaw("k.jenis_kerjasama COLLATE utf8mb4_unicode_ci LIKE ?", ["%{$search}%"]); 
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
                'k.waktu_masuk as created_at',
                'k.tgl_selesai',
                'im.status',
                'd.deskripsi'
            )
            ->orderBy('v.id', 'asc')
            ->paginate($perPage)
            ->withQueryString();
            
            $dokumenAcc = DB::table('dokumentasi as d')
    ->join('kerjasama as k', 'k.id', '=', 'd.id')
    ->join('identitas_mitra as im', 'im.id', '=', 'k.id')
    ->where('d.status', 'acc')
    ->select(
        'd.*',
        'k.nama_kerjasama',
        'im.nama_mitra',
        'im.program_studi',
        'im.jenis_dokumen'
    )
    ->paginate($perPage);


        // Grafik
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
            'grafikStatusDokumen',
            'dokumenAcc'
        ));
    }
}
