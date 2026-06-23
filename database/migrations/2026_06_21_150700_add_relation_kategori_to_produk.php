<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::table('produk', function (Blueprint $table) {
        $table->dropColumn('kategori_produk');
        $table->unsignedBigInteger('id_kategori_produk')->nullable()->after('nama_produk');
        $table->foreign('id_kategori_produk')->references('id')->on('kategori')->nullOnDelete();
    });
}

public function down(): void
{
    Schema::table('produk', function (Blueprint $table) {
        $table->dropForeign(['id_kategori_produk']);
        $table->dropColumn('id_kategori_produk');
        $table->string('kategori_produk')->after('nama_produk');
    });
}
};