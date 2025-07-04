<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('turnitin_requests', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nim');
            $table->string('email');
            $table->string('program_studi');
            $table->string('judul');
            $table->string('file_pdf'); // path ke file PDF
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('turnitin_requests');
    }
};
