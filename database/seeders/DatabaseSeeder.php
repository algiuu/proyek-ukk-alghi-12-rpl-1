<?php

namespace Database\Seeders;

use App\Models\produk;
use App\Models\templates;
use App\Models\User;
use App\Models\Portofolio; // Tambahkan import model Portofolio
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // Opsional jika password ingin di-hash

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Buat User Admin
        User::create([
            'name' => 'Super Admin',
            'role' => 'superadmin',
            'password' => Hash::make('superAdmin123'), // Disarankan di-hash menggunakan Hash::make
        ]);

        templates::create([
            'id_template' => 1,
            'nama_template' => "Kopi"
        ]);

        templates::create([
            'id_template' => 2,
            'nama_template' => "Baso"
        ]);
        templates::create([
            'id_template' => 3,
            'nama_template' => "otak-otak"
        ]);

    }
}