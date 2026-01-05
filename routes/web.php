<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\MitraController;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\MitraUserViewController;
use App\Http\Controllers\ManagementDataController;
use App\Http\Controllers\InformasiController;


Route::get('/homePage', [HomePageController::class, 'index'])
    ->name('homePage');

Route::get('/informasi', [InformasiController::class, 'index'])->name('informasi');

Route::get('/jabatan', function () {
    return view('jabatan');
});

Route::get('/landingPage', [LandingPageController::class, 'index'])
    ->name('landingPage');

Route::get('/templateSurat', function () {
    return view('templateSurat');
});

Route::get('/formPengajuan', function () {
    return view('formPengajuan');
})->name('pengajuan.form');;

Route::get('/mitra', function () {
    return view('mitra');
});

Route::get('/mitra', [MitraUserViewController::class, 'index'])->name('mitra.index');



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

    // routes/web.php
    Route::get('/dashboardAdmin', [App\Http\Controllers\DashboardAdminController::class, 'index'])
        ->name('dashboardAdmin');

    Route::get('/managementData', function () {
        return view('Admin.managementData');
    });

    Route::get('/managementData', [ManagementDataController::class, 'index']);

    Route::get('/management-data', [ManagementDataController::class, 'index'])
        ->name('management.data');

    Route::delete('/management-data/{id}', [ManagementDataController::class, 'destroy']);

    Route::get('/management-data/export/csv', [ManagementDataController::class, 'export'])
        ->name('management.export');

    Route::get('/tambahData', function () {
        return view('Admin.tambahData');
    })->name('tambahData');

    Route::post('/tambahData', [MitraController::class, 'store'])->name('mitra.store');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    }
);


