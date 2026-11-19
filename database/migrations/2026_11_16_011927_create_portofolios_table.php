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
        Schema::create('portofolios', function (Blueprint $table) {
            $table->id('id_portofolio');
            $table->foreignId('id_template')
          ->constrained('templates', 'id_template')
          ->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama_umkm');
            $table->string('foto_umkm');
            $table->string('status')->default('publish');
            $table->string('alamat');
            $table->string('bio');
            $table->string('slug')->unique();
           $table->string('nomer_telepon', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portofolios');
    }
};
