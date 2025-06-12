<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\VerifikatorController;
use App\Http\Controllers\JuriController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PPController;
use App\Http\Controllers\PPAPController;
use App\Http\Controllers\Lomba;
use App\Http\Controllers\LombaController;
use App\Http\Controllers\PendafataranLombaController;
use App\Http\Controllers\AdminLombaController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\LombaDaftarController;
use App\Http\Controllers\LombaPesertaController;
use App\Http\Controllers\PesertaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', [AuthController::class, 'index'])->name('home');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/daftarlomba', [LombaPesertaController::class, 'index'])->name('lomba.index');
Route::get('/daftarlomba/{id}', [LombaPesertaController::class, 'form'])->name('lomba.form');
Route::post('/daftarlomba/{id}', [LombaPesertaController::class, 'submit'])->name('lomba.submit');
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::middleware(['auth','role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/lomba', [LombaController::class, 'index'])->name('admin.lomba.index');
    Route::get('/lomba/create', [LombaController::class, 'create'])->name('admin.lomba.create');
    Route::post('/lomba/create', [LombaController::class, 'store'])->name('admin.lomba.store');
    Route::get('/lomba/{id}/edit', [LombaController::class, 'edit'])->name('admin.lomba.edit');
    Route::put('/lomba/{id}', [LombaController::class, 'update'])->name('admin.lomba.update');
    Route::delete('/lomba/{id}', [LombaController::class, 'destroy'])->name('admin.lomba.destroy');

    Route::get('/lomba_pendaftar', [LombaPesertaController::class, 'indexx'])->name('admin.lomba_pendaftar.indexx');
    Route::get('/lomba_pendaftar/{id}', [LombaPesertaController::class, 'show'])->name('admin.lomba_pendaftar.show');
    
    Route::get('/user', [AdminController::class, 'dashboard'])->name('admin.user.dashboard');
    Route::get('/user/create', [AdminController::class, 'create'])->name('admin.user.create');
    Route::post('/user/create', [AdminController::class, 'store'])->name('admin.user.store');
    Route::get('/user/{id}', [AdminController::class, 'edit'])->name('admin.user.edit');
    Route::put('/user/{id}/edit', [AdminController::class, 'update'])->name('admin.user.update');
    Route::post('/user/{id}', [AdminController::class, 'destroy'])->name('admin.user.destroy');

});

Route::middleware(['auth','role:juri'])->prefix('juri')->group(function () {
    Route::get('/index', [JuriController::class, 'index'])->name('juri.index');
    Route::get('/create/{lomba}/{peserta}', [JuriController::class, 'create'])->name('juri.create');
    Route::post('/create/{lomba}/{peserta}', [JuriController::class, 'store'])->name('juri.store');
});

Route::middleware(['auth','role:peserta'])->prefix('peserta')->group(function () {
    Route::get('/dashboard', [PesertaController::class, 'show'])->name('peserta.dashboard');
    Route::get('/index', [PesertaController::class, 'index'])->name('peserta.index');
    Route::get('/edit', [PesertaController::class, 'edit'])->name('peserta.edit');
    Route::put('/edit', [PesertaController::class, 'update'])->name('peserta.update');
    Route::get('/progress', [PesertaController::class, 'progress'])->name('peserta.progress');
    // Route::get('/lomba/create', [LombaController::class, 'create'])->name('peserta.lomba.create');
});

Route::get('/provinsi', [LocationController::class, 'getProvinsi']);
Route::get('/kota/{kodeProvinsi}', [LocationController::class, 'getKota']);
Route::get('/kecamatan/{kodeKota}', [LocationController::class, 'getKecamatan']);
Route::get('/desa/{kodeKecamatan}', [LocationController::class, 'getDesa']);

Route::get('admin/create', function () {
    return view('admin.lomba.create');
})->name('admin/create');
