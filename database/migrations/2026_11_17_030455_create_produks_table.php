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
        Schema::create('produks', function (Blueprint $table) {
            $table->id('id_produk');
             $table->foreignId('id_portofolio')
          ->constrained('portofolios', 'id_portofolio')
          ->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama_produk');
            $table->string('harga_produk');
            $table->string('deskripsi_produk');
            $table->string('foto_produk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
