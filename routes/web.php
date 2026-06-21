<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/route-belajar-kirim-data', [ProdukController::class, 'index']);

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
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/produk/create', [ProdukController::class, 'create']);
Route::post('/produk/create/{produk?}', [ProdukController::class, 'store']);
Route::get('/produk/{produk}/edit', [ProdukController::class, 'edit'])->name('produk.edit');

Route::get('/produk/{produk}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
Route::delete('/produk/{produk}', [ProdukController::class, 'destroy'])->name('produk.destroy');