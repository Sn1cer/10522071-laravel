<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pelanggan;

class PelangganSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat 500 data dummy pelanggan
        Pelanggan::factory(500)->create();
    }
}
