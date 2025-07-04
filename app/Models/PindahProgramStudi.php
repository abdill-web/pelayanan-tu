<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PindahProgramStudi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'nim', 'email',
        'program_studi_asal', 'program_studi_tujuan', 'alasan'
    ];
}
