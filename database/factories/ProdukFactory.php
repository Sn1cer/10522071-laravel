<?php

namespace Database\Factories;

use App\Models\Produk;
use App\Models\Kategori; 
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_produk' => fake()->firstName(),
            'id_kategori_produk' => Kategori::all()->random()->id,
            'stok' => fake()->randomNumber(2),
            'harga_produk' => fake()->numberBetween(10000, 100000),
        ];
    }
}