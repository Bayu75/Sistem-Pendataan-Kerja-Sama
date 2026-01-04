<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdentitasMitra extends Model
{
    use HasFactory;

    // Nama tabel (opsional, Laravel akan otomatis menebak 'identitas_mitras')
    protected $table = 'identitas_mitra';

    // Kolom yang boleh diisi mass assignment
    protected $fillable = [
        'nama_mitra',
        'program_studi',
        'jenis_dokumen',
        'pic',
        'masa_berlaku',
        'status',
        'metode_pengiriman_notifikasi',
        'path',
    ];

    // Jika primary key bukan 'id', ubah disini
    protected $primaryKey = 'id';
}
