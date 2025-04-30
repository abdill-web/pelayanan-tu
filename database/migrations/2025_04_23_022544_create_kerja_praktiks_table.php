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
        Schema::create('kerja_praktiks', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('nama');
            $table->string('nim');
            $table->string('tujuan_surat');
            $table->string('nama_perusahaan');
            $table->text('alamat_perusahaan');
            $table->string('program_studi');
            $table->string('lama_magang');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kerja_praktiks');
    }
};
