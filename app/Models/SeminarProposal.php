<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeminarProposal extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nim',
        'judul',
        'email',
    ];
}
