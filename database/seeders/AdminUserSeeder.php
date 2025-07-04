<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Gunakan model User bawaan Laravel

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin TU',
            'email' => 'admin@ft-umb.test', // Ganti sesuai keinginan
            'password' => Hash::make('admin123'), // Ganti dengan password aman
        ]);
    }
}