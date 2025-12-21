<?php

use Illuminate\Support\Facades\Route;

Route::get('/homePage', function () {
    return view('homePage');
});

Route::get('/kerjaSama', function () {
    return view('kerjaSama');
});

Route::get('/mitra', function () {
    return view('mitra');
});

Route::get('/informasi', function () {
    return view('informasi');
});

Route::get('/kontak', function () {
    return view('kontak');
});


