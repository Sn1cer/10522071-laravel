<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    
    protected $table = 'produk';
    
    protected $fillable = [
        'nama_produk',
        'id_kategori_produk', 
        'stok',            
        'harga_produk',
        'foto_produk'
    ];

    /**
     * Accessor / Getter untuk atribut foto_produk
     */
    public function getFotoProdukAttribute($value)
    {
        if (empty($value)) {
            return 'https://via.placeholder.com/100?text=No+Image'; 
        }
        return asset('storage/produk/' . $value);
    }

    /**
     * Relasi ke model Kategori
     */
    public function kategori()
    {
        return $this->hasOne(Kategori::class, 'id', 'id_kategori_produk');
    }
}