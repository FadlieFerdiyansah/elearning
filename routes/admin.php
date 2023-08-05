<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\{DosenController, MahasiswaController, AdminController};
use App\Http\Controllers\Admin\{DashboardController, KelasController, JadwalController, MatkulController, FakultasController};

Route::middleware('auth:admin')->group(function () {

    Route::prefix('admin')->get('dashboard', DashboardController::class)->name('dashboard.admin');
    Route::prefix('admin')->post('dashboard/update-profile', [DashboardController::class, 'updateProfile'])->name('dashboard.admin_updateProfile');
    Route::prefix('management-user')->group(function () {
        // ** Dosen **
        Route::delete('dosens', [DosenController::class, 'delete_checkbox']);
        Route::resource('dosens', DosenController::class);

        // ** MAHASISWA **
        Route::delete('mahasiswa', [MahasiswaController::class, 'delete_checkbox']);
        Route::resource('mahasiswa', MahasiswaController::class);

        Route::delete('admins', [AdminController::class, 'delete_checkbox']);
        Route::resource('admins', AdminController::class);

    });

    
    // ** KELAS **
    Route::resource('kelas', KelasController::class)->except('show');

    // ** MATAKULIAH **
    // Route::get('matkuls/search', [MatkulController::class, 'search'])->name('matkuls.search');
    Route::resource('matkuls', MatkulController::class)->except('show');

    // ** FAKULTAS **
    Route::resource('fakultas', FakultasController::class)->except('show');

    // ** JADWAL **
    Route::prefix('jadwals')->group(function () {
        Route::get('jadwal-pengganti', [JadwalController::class, 'index'])->name('jadwals.pengganti');
        Route::get('get-dosen-by-{kelas}', [JadwalController::class, 'getDosenByKelasId']);
        Route::get('get-matkul-by-{dosen}', [JadwalController::class, 'getMatkulByDosenId']);
    });
    Route::resource('jadwals', JadwalController::class)->except('show');
});
