<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ManagementDataController extends Controller
{
    /* ===============================
     *  TAMPIL DATA MANAGEMENT
     *  + SEARCH + PAGINATION
     * =============================== */
    public function index(Request $request)
    {
        $search = $request->search;

        $data = DB::table('identitas_mitra')
            ->join('kerjasama', 'kerjasama.id', '=', 'identitas_mitra.id')
            ->select(
                'identitas_mitra.id',
                'identitas_mitra.nama_mitra',
                'identitas_mitra.program_studi',
                'identitas_mitra.status',
                'kerjasama.tgl_selesai'
            )
            ->when($search, function ($query, $search) {
                $query->where('identitas_mitra.id', 'like', "%$search%")
                      ->orWhere('identitas_mitra.nama_mitra', 'like', "%$search%")
                      ->orWhere('identitas_mitra.program_studi', 'like', "%$search%")
                      ->orWhere('identitas_mitra.status', 'like', "%$search%")
                      ->orWhereRaw("
                          CEIL(
                              DATEDIFF(kerjasama.tgl_selesai, CURDATE())
                          ) LIKE ?
                      ", ["%$search%"]);
            })
            ->orderBy('identitas_mitra.id', 'asc')
            ->paginate(5)
            ->withQueryString(); // search tetap terbawa saat pagination

        /* ===============================
         *  HITUNG SISA HARI & STATUS
         * =============================== */
        $data->getCollection()->transform(function ($item) {

            $diff = Carbon::now()->diffInSeconds(
                Carbon::parse($item->tgl_selesai),
                false
            ) / 86400;

            $item->sisa_hari = (int) ceil($diff);

            if ($item->sisa_hari <= 0) {
                $item->status = 'Kadaluarsa';
            } elseif ($item->sisa_hari <= 7) {
                $item->status = 'Mendekati Kadaluarsa';
            } else {
                $item->status = 'Aktif';
            }

            return $item;
        });

        return view('admin.ManagementData', compact('data'));
    }

    /* ===============================
     *  HAPUS DATA (POPUP AKSI)
     * =============================== */
    public function destroy($id)
    {
        DB::table('identitas_mitra')->where('id', $id)->delete();
        DB::table('kerjasama')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }

    /* ===============================
     *  EXPORT CSV
     * =============================== */
    public function export()
    {
        $data = DB::table('identitas_mitra')
            ->join('kerjasama', 'kerjasama.id', '=', 'identitas_mitra.id')
            ->select(
                'identitas_mitra.nama_mitra',
                'identitas_mitra.program_studi',
                'identitas_mitra.status',
                'kerjasama.tgl_selesai'
            )
            ->get();

        $filename = 'management_data_' . date('Y-m-d') . '.csv';

        $headers = [
            "Content-Type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename"
        ];

        return response()->stream(function () use ($data) {
            $file = fopen('php://output', 'w');

            fputcsv($file, [
                'Nama Mitra',
                'Program Studi',
                'Status',
                'Tanggal Selesai'
            ]);

            foreach ($data as $row) {
                fputcsv($file, [
                    $row->nama_mitra,
                    $row->program_studi,
                    $row->status,
                    Carbon::parse($row->tgl_selesai)->format('d-m-Y')
                ]);
            }

            fclose($file);
        }, 200, $headers);
    }
}
