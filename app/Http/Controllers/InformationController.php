<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class InformationController extends Controller
{
public function index(Request $request)
{
    $search = $request->search; // Ambil kata kunci dari input search

    $data = DB::table('dokumentasi')
        ->join('kerjasama', 'dokumentasi.id', '=', 'kerjasama.id')
        ->join('identitas_mitra', 'kerjasama.id', '=', 'identitas_mitra.id')
        ->where('dokumentasi.status', 'acc')
        ->when($search, function ($q) use ($search) {
            $q->where('kerjasama.nama_kerjasama', 'like', "%$search%")
              ->orWhere('deskripsi', 'like', "%$search%")
              ->orWhere('identitas_mitra.id', 'like', "%$search%");
        })
        ->select(
            'identitas_mitra.id',
            'kerjasama.nama_kerjasama',
            'kerjasama.waktu_masuk',
            'dokumentasi.deskripsi',
            'dokumentasi.id as dokumentasi_id'
        )
        ->orderBy('kerjasama.waktu_masuk', 'desc')
        ->get();

    return view('admin.informationAdmin', compact('data', 'search'));
}


public function updateDeskripsi(Request $request)
{
    $request->validate([
        'dokumentasi_id' => 'required|exists:dokumentasi,id',
        'deskripsi'      => 'required|string'
    ]);

    DB::table('dokumentasi')
        ->where('id', $request->dokumentasi_id)
        ->update([
            'deskripsi'  => $request->deskripsi,
            'updated_at' => now()
        ]);

    return redirect()->back()->with('success', 'Deskripsi berhasil diperbarui');
}


    // DELETE
    public function destroy($id)
    {
        DB::table('dokumentasi')->where('id', $id)->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }
}
