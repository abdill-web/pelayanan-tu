<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class TurnitinController extends Controller
{
    public function download($filename)
    {
        $path = 'turnitin/' . $filename;

        if (Storage::disk('public')->exists($path)) {
            return response()->download(storage_path('app/public/' . $path));
        }

        return abort(404, 'File tidak ditemukan');
    }
}
