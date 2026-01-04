<?php

use Illuminate\Support\Facades\Route;

Route::get('/homePage', function () {
    return view('homePage');
});

Route::get('/jabatan', function () {
    return view('jabatan');
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

Route::get('/loginAdmin', function () {
    return view('loginAdmin');
});

Route::get('/dashboardAdmin', function () {
    return view('Admin/dashboardAdmin');
});

Route::get('/managementData', function () {
    return view('Admin/managementData');
});

Route::get('/tambahData', function () {
    return view('Admin/tambahData');
});

