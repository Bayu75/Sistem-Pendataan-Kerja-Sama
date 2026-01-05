<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DataAdminController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $data = DB::table('identitas_mitra')
            ->join('kerjasama', 'kerjasama.id', '=', 'identitas_mitra.id')
            ->leftJoin('dokumentasi', 'dokumentasi.id', '=', 'kerjasama.id')
            ->select(
                'identitas_mitra.id',
                'identitas_mitra.nama_mitra',
                'identitas_mitra.program_studi',
                'identitas_mitra.jenis_dokumen',
                'identitas_mitra.pic',
                'identitas_mitra.metode_pengiriman_notifikasi',
                'identitas_mitra.path',

                'kerjasama.nama_kerjasama',
                'kerjasama.jenis_kerjasama',
                'kerjasama.email_user',
                'kerjasama.tgl_selesai',
                'kerjasama.waktu_masuk as created_at'
            )
            ->when($search, function ($q) use ($search) {
                $q->where('identitas_mitra.nama_mitra', 'like', "%$search%")
                  ->orWhere('identitas_mitra.program_studi', 'like', "%$search%");
            })
            ->orderBy('identitas_mitra.id', 'asc')
            ->paginate(5)->withQueryString();


        /** ===============================
         * HITUNG SISA HARI & STATUS
         * =============================== */
        $data->transform(function ($item) {

$seconds = Carbon::now()->diffInSeconds(
    Carbon::parse($item->tgl_selesai),
    false
);

$diff = (int) ceil($seconds / 86400);

$item->sisa_hari = $diff;


            if ($diff <= 0) {
                $item->status = 'Kadaluarsa';
            } elseif ($diff <= 7) {
                $item->status = 'Mendekati Kadaluarsa';
            } else {
                $item->status = 'Aktif';
            }

            return $item;
        });

        return view('admin.Data', compact('data'));
    }

    public function destroy($id)
    {
        DB::table('kerjasama')->where('identitas_mitra_id', $id)->delete();
        DB::table('identitas_mitra')->where('id', $id)->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }
}
