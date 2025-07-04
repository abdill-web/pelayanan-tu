<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LegalisirRequest extends Model
{
    protected $fillable = [
        'nama',
        'nim',
        'email',
        'program_studi',
        'file_ijazah'
    ];
}
