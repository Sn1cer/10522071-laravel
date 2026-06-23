<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    
    protected $table = 'pelanggan';
    
    protected $fillable = [
        'nama_lengkap', 
        'jenis_kelamin',
        'nomor_hp',
        'alamat_email',
        'foto_pelanggan' 
    ];

    public function getFotoPelangganAttribute($value)
    {
        if (empty($value)) {
            return 'https://via.placeholder.com/100?text=No+Image'; 
        }
        return asset('storage/pelanggan/' . $value);
    }
}