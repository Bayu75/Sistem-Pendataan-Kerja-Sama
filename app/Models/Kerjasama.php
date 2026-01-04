<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kerjasama extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'kerjasama';

    // Kolom yang boleh diisi mass assignment
    protected $fillable = [
        'nama_kerjasama',
        'jenis_kerjasama',
        'email_user',
        'waktu_masuk',
        'tgl_selesai',
        'status_notif_sent',
    ];

    // Primary key
    protected $primaryKey = 'id';

    // Jika tidak ingin Laravel otomatis mengisi timestamps
    public $timestamps = false; // karena kolomnya sudah ada default timestamp di DB
}
