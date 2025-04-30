<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('nama');
            $table->string('nim');
            $table->string('program_studi');
            $table->string('asal_kampus');
            $table->string('no_telp');
            $table->string('nama_perusahaan');
            $table->text('alamat_perusahaan');
            $table->string('ditujukan_kepada');
            $table->string('gender');
            $table->string('jabatan');
            $table->text('data_diminta');
            $table->text('pernyataan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surveys');
    }
};

