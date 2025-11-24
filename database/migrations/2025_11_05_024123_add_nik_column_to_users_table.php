<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Tambahkan kolom NIK (digunakan sebagai field login)
            $table->string('nik', 16)->nullable()->unique()->after('penduduk_id'); 
            
            // Opsional: Jika Anda ingin menghapus unique index pada email
            // $table->dropUnique('users_email_unique');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nik');
            // Opsional: Jika Anda menghapus unique index email, 
            // Anda harus menambahkannya kembali di sini.
        });
    }
};