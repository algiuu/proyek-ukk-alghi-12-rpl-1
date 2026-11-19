
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id('id_log');

            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete()
                ->cascadeOnUpdate();

            $table->string('tabel');
            $table->string('aksi');
            $table->text('deskripsi');
            $table->timestamp('created_at')->useCurrent();
        });

        // TRIGGER PORTOFOLIOS - INSERT
        DB::unprepared("
            CREATE TRIGGER tr_portofolios_after_insert
            AFTER INSERT ON portofolios
            FOR EACH ROW
            BEGIN
                INSERT INTO activity_logs
                (user_id, tabel, aksi, deskripsi, created_at)
                VALUES (
                    @user_id,
                    'portofolios',
                    'INSERT',
                    CONCAT('Menambahkan UMKM baru: ', NEW.nama_umkm),
                    NOW()
                );
            END
        ");

        // TRIGGER PORTOFOLIOS - UPDATE
        DB::unprepared("
            CREATE TRIGGER tr_portofolios_after_update
            AFTER UPDATE ON portofolios
            FOR EACH ROW
            BEGIN
                INSERT INTO activity_logs
                (user_id, tabel, aksi, deskripsi, created_at)
                VALUES (
                    @user_id,
                    'portofolios',
                    'UPDATE',
                    CONCAT(
                        'Mengubah data UMKM: ',
                        OLD.nama_umkm,
                        ' menjadi ',
                        NEW.nama_umkm
                    ),
                    NOW()
                );
            END
        ");

        // TRIGGER PORTOFOLIOS - DELETE
        DB::unprepared("
            CREATE TRIGGER tr_portofolios_after_delete
            AFTER DELETE ON portofolios
            FOR EACH ROW
            BEGIN
                INSERT INTO activity_logs
                (user_id, tabel, aksi, deskripsi, created_at)
                VALUES (
                    @user_id,
                    'portofolios',
                    'DELETE',
                    CONCAT('Menghapus UMKM: ', OLD.nama_umkm),
                    NOW()
                );
            END
        ");

        // TRIGGER PRODUKS - INSERT
        DB::unprepared("
            CREATE TRIGGER tr_produks_after_insert
            AFTER INSERT ON produks
            FOR EACH ROW
            BEGIN
                INSERT INTO activity_logs
                (user_id, tabel, aksi, deskripsi, created_at)
                VALUES (
                    @user_id,
                    'produks',
                    'INSERT',
                    CONCAT('Menambahkan produk baru: ', NEW.nama_produk),
                    NOW()
                );
            END
        ");

        // TRIGGER PRODUKS - UPDATE
        DB::unprepared("
            CREATE TRIGGER tr_produks_after_update
            AFTER UPDATE ON produks
            FOR EACH ROW
            BEGIN
                INSERT INTO activity_logs
                (user_id, tabel, aksi, deskripsi, created_at)
                VALUES (
                    @user_id,
                    'produks',
                    'UPDATE',
                    CONCAT(
                        'Mengubah produk: ',
                        OLD.nama_produk,
                        ' menjadi ',
                        NEW.nama_produk
                    ),
                    NOW()
                );
            END
        ");

        // TRIGGER PRODUKS - DELETE
        DB::unprepared("
            CREATE TRIGGER tr_produks_after_delete
            AFTER DELETE ON produks
            FOR EACH ROW
            BEGIN
                INSERT INTO activity_logs
                (user_id, tabel, aksi, deskripsi, created_at)
                VALUES (
                    @user_id,
                    'produks',
                    'DELETE',
                    CONCAT('Menghapus produk: ', OLD.nama_produk),
                    NOW()
                );
            END
        ");
    }

    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS tr_portofolios_after_insert');
        DB::unprepared('DROP TRIGGER IF EXISTS tr_portofolios_after_update');
        DB::unprepared('DROP TRIGGER IF EXISTS tr_portofolios_after_delete');

        DB::unprepared('DROP TRIGGER IF EXISTS tr_produks_after_insert');
        DB::unprepared('DROP TRIGGER IF EXISTS tr_produks_after_update');
        DB::unprepared('DROP TRIGGER IF EXISTS tr_produks_after_delete');

        Schema::dropIfExists('activity_logs');
    }
};
