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
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::get('/daftarlomba', [LombaPesertaController::class, 'index'])->name('lomba.index');
    Route::get('/daftarlomba/{id}', [LombaPesertaController::class, 'form'])->name('lomba.form');
    Route::post('/daftarlomba/{id}', [LombaPesertaController::class, 'submit'])->name('lomba.submit');
});

Route::middleware(['auth'])->prefix('admin')->group(function() {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/lomba', [LombaController::class, 'index'])->name('admin.lomba.index');
    Route::get('/lomba/create', [LombaController::class, 'create'])->name('admin.lomba.create');
    Route::post('/lomba/create', [LombaController::class, 'store'])->name('admin.lomba.store');
    Route::get('/lomba/{id}/edit', [LombaController::class, 'edit'])->name('admin.lomba.edit');
    Route::put('/lomba/{id}', [LombaController::class, 'update'])->name('admin.lomba.update');
    
    Route::get('/lomba_pendaftar', [LombaPesertaController::class, 'indexx'])->name('admin.lomba_pendaftar.indexx');
    Route::get('/lomba_pendaftar/{id}', [LombaPesertaController::class, 'show'])->name('admin.lomba_pendaftar.show');
});
// Route::middleware(['auth'])->prefix('admin')->group(function () {
//     Route::get('/lomba-pendaftar', [AdminLombaPendaftarController::class, 'index'])->name('admin.lomba.pendaftar.index');
//     Route::get('/lomba-pendaftar/{id}', [AdminLombaPendaftarController::class, 'show'])->name('admin.lomba.pendaftar.show');
// });

// Landing Page Route
// Route::get('/', [LandingPageController::class, 'index'])->name('home');
// Route::get('/kategori', [LandingPageController::class, 'kategori'])->name('kategori');
// Route::get('/RegisterPP', [PPController::class, 'showRegisterForm'])->name('auth.user.registerPP');
// Route::post('/RegisterPP', [PPController::class, 'register']);
// Route::get('/RegisterPPAP', [PPAPController::class, 'showRegisterForm'])->name('auth.user.registerPPAP');
// Route::post('/RegisterPPAP', [PPAPController::class, 'register']);

// Route::prefix('admin')->middleware(['auth:admin', 'admin.role:admin'])->group(function () {
//     Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
//     // Tambahkan route admin lainnya di sini
// });

// Route::get('/', [AdminLombaController::class, 'index'])->name('admin.lomba.index');
// Route::get('/create', [AdminLombaController::class, 'create'])->name('admin.lomba.create');
// Route::post('/', [AdminLombaController::class, 'store'])->name('admin.lomba.store');
// Route::get('/{id}/edit', [AdminLombaController::class, 'edit'])->name('admin.lomba.edit');
// Route::put('/{id}', [AdminLombaController::class, 'update'])->name('admin.lomba.update');
// Route::delete('/{id}', [AdminLombaController::class, 'destroy'])->name('admin.lomba.destroy');

// // Verifikator-specific routes
// Route::prefix('verifikator')->middleware(['auth:admin', 'admin.role:verifikator'])->group(function () {
//     Route::get('/dashboard', [VerifikatorController::class, 'dashboard']);
//     // Tambahkan route verifikator lainnya di sini
// });

// // Juri-specific routes
// Route::prefix('juri')->middleware(['auth:admin', 'admin.role:juri'])->group(function () {
//     Route::get('/dashboard', [JuriController::class, 'dashboard']);
//     // Tambahkan route juri lainnya di sini
// });




// // User Routes
// Route::prefix('user')->group(function () {
//     Route::get('/login', [UserAuthController::class, 'showLoginForm'])->name('user.login');
//     Route::post('/login', [UserAuthController::class, 'login']);
//     Route::get('/pendaftaran', [UserAuthController::class, 'persetujuan'])->name('user.persetujuan');
//     Route::post('/pendaftaran', [UserAuthController::class, 'Postpersetujuan']);
//     Route::get('/register', [UserAuthController::class, 'showRegisterForm'])->name('user.register');
//     Route::post('/register', [UserAuthController::class, 'register']);
//     Route::post('/logout', [UserAuthController::class, 'logout'])->name('user.logout');
//     Route::get('/show/{user}', [UserController::class, 'show'])->name('user.show');

//     Route::get('/dashboard', function () {
//         return view('user.dashboard');
//     })->middleware('auth:web')->name('user.dashboard');

//     Route::get('/show', function () {
//         $user = Auth::user();
//         return view('user.show', compact('user'));
//     })->middleware('auth:web');

//     Route::get('/progress', function () {
//         $user = Auth::user();
//         return view('user.progress', compact('user'));
//     })->middleware('auth:web');

//     Route::get('/edit', function () {
//         $user = Auth::user();
//         return view('user.edit', compact('user'));
//     })->middleware('auth:web')->name('user.edit');

//     Route::put('/update/{id}', [UserController::class, 'update'])->name('user.update');
// });



// // Admin Routes
// Route::prefix('admin')->group(function () {
//     Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
//     Route::post('/login', [AdminAuthController::class, 'login']);
//     Route::get('/register', [AdminAuthController::class, 'showRegisterForm'])->name('admin.register');
//     Route::post('/register', [AdminAuthController::class, 'register']);
//     Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

//     Route::get('/dashboard', function () {
//         return view('admin.dashboard');
//     })->middleware('auth:admin')->name('admin.dashboard');

//     Route::get('/data_lomba', function () {
//         return view('admin.data_lomba');
//     })->middleware('auth:admin')->name('admin.data_lomba');

//     Route::get('/index', function () {
//         return view('admin.index');
//     })->middleware('auth:admin');

//     Route::middleware(['auth:admin', 'admin.role:admin'])->group(function () {
//         Route::get('/dashboard', [AdminController::class, 'dashboard']);
//         Route::get('/data_lomba', [AdminController::class, 'lomba'])->name('admin.data_lomba');
//         Route::get('/tambah_lomba', [AdminController::class, 'lombaTambah'])->name('admin.tambah_lomba');
//         Route::post('/tambah_lomba', [AdminController::class, 'lombaCreate'])->name('admin.create_lomba');
//         Route::get('/show_lomba/{id}', [AdminController::class, 'lombaShow'])->name('admin.show_lomba');
//         // Route khusus admin
//     });

//     Route::middleware(['auth:admin', 'admin.role:verifikator'])->group(function () {
//         Route::get('/verifikator/dashboard', [VerifikatorController::class, 'dashboard']);
//         // Route khusus verifikator
//     });

//     Route::middleware(['auth:admin', 'admin.role:juri'])->group(function () {
//         Route::get('/juri/dashboard', [JuriController::class, 'dashboard']);
//         // Route khusus juri
//     });
// });

Route::get('/provinsi', [LocationController::class, 'getProvinsi']);
Route::get('/kota/{kodeProvinsi}', [LocationController::class, 'getKota']);
Route::get('/kecamatan/{kodeKota}', [LocationController::class, 'getKecamatan']);
Route::get('/desa/{kodeKecamatan}', [LocationController::class, 'getDesa']);
