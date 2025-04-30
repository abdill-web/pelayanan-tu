<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('kerja_praktiks', function (Blueprint $table) {
            $table->string('nama')->after('email');
            $table->string('nim');
            $table->string('tujuan_surat');
            $table->string('nama_perusahaan');
            $table->text('alamat_perusahaan');
            $table->string('program_studi');
            $table->string('lama_magang');
        });
    }

    public function down(): void
    {
        Schema::table('kerja_praktiks', function (Blueprint $table) {
            $table->dropColumn([
                'nama',
                'nim',
                'tujuan_surat',
                'nama_perusahaan',
                'alamat_perusahaan',
                'program_studi',
                'lama_magang'
            ]);
        });
    }
};
