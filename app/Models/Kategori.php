<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori'; 

    // Tambahkan baris ini agar fungsi create() diizinkan
    protected $fillable = [
        'nama_kategori',
    ];
}