<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginAdmin extends Model
{
    protected $table = 'login';
    public $timestamps = false; 

    protected $fillable = [
        'uname',
        'pass'
    ];
}
