<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KoreksiKHS extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nim',
        'program_studi',
        'semester',
        'keterangan',
    ];
}
