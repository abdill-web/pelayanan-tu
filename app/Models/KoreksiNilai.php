<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KoreksiNilai extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nim',
        'program_studi',
        'mata_kuliah',
        'dosen_pengampu',
        'semester',
        'alasan_koreksi',
    ];
}
