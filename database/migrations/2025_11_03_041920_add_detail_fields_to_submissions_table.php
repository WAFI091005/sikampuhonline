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
        Schema::table('submissions', function (Blueprint $table) {
            // Kolom Penghubung Layanan
            $table->foreignId('service_id')->constrained('services')->after('id');
            // user_id bersifat nullable karena user mungkin tidak login secara 'permanen', 
            // namun NIK di bawah ini wajib ada
            $table->foreignId('user_id')->nullable()->constrained('users'); 

            // Data Pemohon (dari formData)
            $table->string('nik', 16)->index()->comment('NIK Pemohon');
            $table->string('applicant_name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('gender')->nullable();
            $table->text('address');

            // Detail Khusus (dari unique_details)
            $table->json('unique_details')->comment('Detail spesifik per layanan, disimpan dalam format JSON');

            // Data Pelacakan & Status
            $table->string('submission_code')->unique(); // Kode unik untuk pelacakan
            $table->enum('status', ['Pending', 'Processing', 'Approved', 'Rejected'])->default('Pending');
            $table->text('rejected_reason')->nullable(); // Alasan jika Ditolak
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('submissions', function (Blueprint $table) {
            $table->dropForeign(['service_id']);
            $table->dropForeign(['user_id']);
            $table->dropColumn([
                'service_id',
                'user_id',
                'nik',
                'applicant_name',
                'phone',
                'email',
                'gender',
                'address',
                'unique_details',
                'submission_code',
                'status',
                'rejected_reason',
            ]);
        });
    }
};