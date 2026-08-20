<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\LoginController; 

// Mengubah route '/' untuk menampilkan dashboard
Route::get('/', function () {
    return view('dashboard');
});

Route::get('/route-belajar', function () {
    echo 'Belajar Laravel. Tulisan ini ditampilkan dari routes';
});

Route::get('/route-biodata', function() {
    $data['nim'] = '10522071';
    $data['nama'] = 'Muhammad Varrel Syaputra';
    $data['kelas'] = 'IS-2';
    $data['jurusan'] = 'Sistem Informasi';
    $data['universitas'] = 'Universitas Komputer Indonesia';
    $data['alamat'] = 'Jl. Sangkuriang Barat 2';
    
    return view('route-biodata', $data);
});

Route::get('/route-dosen', function() {
    $nip = '198001012010121001';
    $nidn = '0401018001';
    $nama = 'Ferry Stephanus Suwita';
    $tempat_lahir = 'Bandung';
    $tanggal_lahir = '1 Januari 1990';
    
    return view('route-dosen', compact('nip', 'nidn', 'nama', 'tempat_lahir', 'tanggal_lahir'));
});

Route::get('/route-produk', function() {
    $nama_produk = 'Sepatu Sneakers X';
    $warna = 'Hitam Putih';
    $ukuran = '42';
    $stok = 15;
    
    return view('route-produk', compact('nama_produk', 'warna', 'ukuran', 'stok'));
});

Route::get('/route-belajar-kirim-data', function() {
    $data['nama'] = 'Muhammad Varrel Syaputra';
    $data['jk']   = 'Laki-Laki';
    return view('view-data', $data);
});

// Route untuk Produk
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/produk/create', [ProdukController::class, 'create']);
Route::post('/produk/create/{produk?}', [ProdukController::class, 'store']);
Route::get('/produk/{produk}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
Route::delete('/produk/{produk}', [ProdukController::class, 'destroy'])->name('produk.destroy');

// Route untuk Pelanggan
Route::get('/pelanggan', [PelangganController::class, 'index']);
Route::get('/pelanggan/create', [PelangganController::class, 'create']);
Route::post('/pelanggan/create/{pelanggan?}', [PelangganController::class, 'store']);
Route::get('/pelanggan/{pelanggan}/edit', [PelangganController::class, 'edit'])->name('pelanggan.edit');
Route::delete('/pelanggan/{pelanggan}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');

// Route untuk Login & Autentikasi Google
Route::get('/login', [LoginController::class, 'index']);
Route::get('/redirect/google', [LoginController::class, 'redirectToGoogle']);
Route::get('/callback/google', [LoginController::class, 'googleCallback']);