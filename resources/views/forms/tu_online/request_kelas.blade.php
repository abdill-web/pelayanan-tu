@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-10">
    <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Form Request Kelas</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 mb-6 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('request-kelas.submit') }}" method="POST" class="bg-white p-8 rounded-2xl shadow-md space-y-6">
        @csrf

        <div>
            <label class="block text-gray-700">Nama</label>
            <input type="text" name="nama" class="w-full mt-1 p-2 border rounded-lg" required>
        </div>

        <div>
            <label class="block text-gray-700">NIM</label>
            <input type="text" name="nim" class="w-full mt-1 p-2 border rounded-lg" required>
        </div>

        <div>
            <label class="block text-gray-700">Program Studi</label>
            <input type="text" name="program_studi" class="w-full mt-1 p-2 border rounded-lg" required>
        </div>

        <div>
            <label class="block text-gray-700">Mata Kuliah yang Diminta</label>
            <input type="text" name="mata_kuliah" class="w-full mt-1 p-2 border rounded-lg" required>
        </div>

        <div>
            <label class="block text-gray-700">Alasan Permintaan Kelas</label>
            <textarea name="alasan" rows="4" class="w-full mt-1 p-2 border rounded-lg" required></textarea>
        </div>

        <div class="text-center">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">Kirim Permintaan</button>
        </div>
    </form>
</div>
@endsection
