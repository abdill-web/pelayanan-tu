<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KerjaPraktik extends Model
{
    use HasFactory;

    protected $table = 'kerja_praktiks'; // Sesuaikan dengan nama tabel di database jika berbeda

    protected $fillable = [
        'email',
        'nama',
        'nim',
        'tujuan_surat',
        'nama_perusahaan',
        'alamat_perusahaan',
        'program_studi',
        'lama_magang',
    ];
}
