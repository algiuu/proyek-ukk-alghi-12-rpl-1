
<?php

use App\Http\Controllers\SuperAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PortofolioController;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Route login khusus tamu
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])
        ->name('login');

    Route::post('/login', [LoginController::class, 'login']);
});

// Route admin khusus pengguna yang sudah login
Route::middleware(['auth', 'role:admin,superadmin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])
        ->name('dashboard');

    Route::get('/tambahPortofolio', [PortofolioController::class, 'keTambah']);

    Route::post('/tambahPortofolio', [PortofolioController::class, 'tambah']);

    Route::delete('/hapusPortofolio/{id}', [PortofolioController::class, 'hapus']);

    Route::get('/updatePortofolio/{id}', [PortofolioController::class, 'keUpdate']);

    Route::post('/updatePortofolio/{id}', [PortofolioController::class, 'update']);

    Route::post('/logout', [LoginController::class, 'logout'])
        ->name('logout');
    Route::get('/editUserAdmin/{id}', [AdminController::class, 'keEdit']);
    Route::post('/editUserAdmin/{id}', [AdminController::class, 'editUser']);
    Route::get('/tambahProduk/{id}', [ProdukController::class,'keTambahProduk']);
    Route::post('/simpanProduk/{id}', [ProdukController::class, 'simpanProduk']);
    Route::get('/updateProduk/{id}', [ProdukController::class, 'keUpdateProduk']);
    Route::post('/updateProduk/{id}', [ProdukController::class, 'updateProduk']);
    Route::delete('/hapusProduk/{id}', [ProdukController::class, 'hapusProduk']);
    Route::get('/activity-logs', [ActivityLogController::class, 'index'])
    ->name('activity.logs');
});

Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::get('/daftarUser', [SuperAdminController::class, 'daftarUser']);
    Route::get('/tambahUser', [SuperAdminController::class, 'keTambah']);
    Route::post('/tambahUser', [SuperAdminController::class, 'tambahUser']);
    Route::delete('/hapusUser/{id}', [SuperAdminController::class, 'hapusUser']);
    Route::get('/editUser/{id}', [SuperAdminController::class, 'keEdit']);
    Route::post('/editUser/{id}', [SuperAdminController::class, 'editUser']);
    
});
// Route profil UMKM publik
// Letakkan di luar middleware guest dan auth
Route::get('/{slug}', [PortofolioController::class, 'index']);
