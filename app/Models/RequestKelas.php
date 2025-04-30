<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestKelas extends Model
{
    use HasFactory;

    protected $table = 'request_kelas'; // Nama tabel

    protected $fillable = [
        'nama',
        'nim',
        'program_studi',
        'mata_kuliah',
        'alasan',
    ];
}