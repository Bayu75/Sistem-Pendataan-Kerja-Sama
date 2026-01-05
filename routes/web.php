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
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\DataAdminController;




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

// **Form Pengajuan dengan MitraController**
Route::get('/form-pengajuan', [MitraController::class, 'create'])->name('pengajuan.create');
Route::post('/form-pengajuan', [MitraController::class, 'store'])->name('pengajuan.store');


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

    Route::get('/informationAdmin', [InformationController::class, 'index']);
    Route::post(
        '/informationAdmin/update-deskripsi',
        [InformationController::class, 'updateDeskripsi']
    )->name('admin.information.updateDeskripsi');    
    Route::delete('/admin/information/{id}', [InformationController::class, 'destroy']);
    
    Route::get('/pengajuan', [PengajuanController::class, 'index'])->name('pengajuan.admin');
    Route::post('/pengajuan/{id}/status', [PengajuanController::class, 'updateStatus'])->name('pengajuan.updateStatus');

    Route::get('/data', [DataAdminController::class, 'index']);
    Route::delete('/data/{id}', [DataAdminController::class, 'destroy'])
    ->name('management.destroy');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    }
);


