<?php

use App\Http\Controllers\AkademikController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PembagianKelasController;
use App\Http\Controllers\PembagianSppController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;

// Redirect root ke dashboard jika sudah login


// Routes Login/Register
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['universal.auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard');

    // Master Data
    Route::resource('siswa', SiswaController::class);

    Route::resource('kelas', KelasController::class);


    Route::resource('spp', SppController::class);

    Route::resource('akademik', AkademikController::class);



    Route::prefix('pembagian-spp')->group(function () {
        Route::get('/', [PembagianSppController::class, 'index'])->name('pembagian_spp.index');
        Route::post('/', [PembagianSppController::class, 'store'])->name('pembagian_spp.store');
        Route::get('/{id}/detail', [PembagianSppController::class, 'detail'])->name('pembagian_spp.detail');
        Route::get('/{id}/tambah', [PembagianSppController::class, 'formTambahSiswa'])->name('pembagian_spp.form_tambah_siswa');
        Route::post('/{id}/tambah', [PembagianSppController::class, 'tambahSiswa'])->name('pembagian_spp.store_siswa');
        Route::delete('/{id}/hapus', [PembagianSppController::class, 'hapusSiswa'])->name('pembagian_spp.hapus_siswa');
    });





    Route::resource('users', UserController::class)->except(['create', 'edit', 'show']);




    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
    Route::put('/transaksi/update-status/{id}', [TransaksiController::class, 'updateStatus'])->name('transaksi.updateStatus');
    Route::get('/transaksi/cari', [TransaksiController::class, 'formCari'])->name('transaksi.cari');
    Route::get('/transaksi/konfrimasi', [TransaksiController::class, 'konfirmasiPembayaran'])->name('transaksi.konfirmasi');
    Route::get('/transaksi/detail', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('/transaksi/create/{nis}', [TransaksiController::class, 'create'])->name('transaksi.create');
    Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('transaksi.store');
    Route::get('/history-transaksi', [TransaksiController::class, 'history'])->name('transaksi.history');


    // Laporan
    Route::get('/laporan', function () {
        return view('laporan.laporan');
    })->name('laporan.index');
});
