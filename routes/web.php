<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\HomePageController;

Route::get('/homePage', [HomePageController::class, 'index'])
    ->name('homePage');

Route::get('/jabatan', function () {
    return view('jabatan');
});

Route::get('/landingPage', [LandingPageController::class, 'index'])
    ->name('landingPage');

Route::get('/templateSurat', function () {
    return view('templateSurat');
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


Route::get('/loginAdmin', [AuthController::class, 'showLogin'])->name('loginAdmin');
Route::post('/loginAdmin', [AuthController::class, 'login'])->name('loginAdmin.post');
Route::get('/logoutAdmin', [AuthController::class, 'logout'])->name('logoutAdmin');

Route::middleware('admin.auth')->group(function () {
    Route::get('/dashboardAdmin', function () {
        return view('Admin.dashboardAdmin');
    })->name('dashboardAdmin');

    Route::get('/managementData', function () {
        return view('Admin.managementData');
    });

    Route::get('/tambahData', function () {
        return view('Admin.tambahData');
    });
});
