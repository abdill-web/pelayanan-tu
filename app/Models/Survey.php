<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'nama',
        'nim',
        'program_studi',
        'asal_kampus',
        'no_telp',
        'nama_perusahaan',
        'alamat_perusahaan',
        'ditujukan_kepada',
        'gender',
        'jabatan',
        'data_diminta',
        'pernyataan',
    ];
}
