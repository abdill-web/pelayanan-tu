@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-10 px-4">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-8">Formulir Koreksi Nilai</h2>

    @if (session('success'))
        <div class="mb-6 p-4 rounded-lg bg-green-100 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('koreksi-nilai.submit') }}" method="POST" class="space-y-6 bg-white p-8 rounded-2xl shadow-md">
        @csrf

        <div>
            <label class="block text-gray-700 mb-2">Nama</label>
            <input type="text" name="nama" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>

        <div>
            <label class="block text-gray-700 mb-2">NIM</label>
            <input type="text" name="nim" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>

        <div>
            <label class="block text-gray-700 mb-2">Program Studi</label>
            <input type="text" name="program_studi" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>

        <div>
            <label class="block text-gray-700 mb-2">Mata Kuliah</label>
            <input type="text" name="mata_kuliah" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>

        <div>
            <label class="block text-gray-700 mb-2">Dosen Pengampu</label>
            <input type="text" name="dosen_pengampu" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>

        <div>
            <label class="block text-gray-700 mb-2">Semester</label>
            <input type="text" name="semester" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>

        <div>
            <label class="block text-gray-700 mb-2">Alasan Koreksi</label>
            <textarea name="alasan_koreksi" rows="4" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required></textarea>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">
                Kirim
            </button>
        </div>
    </form>
</div>
@endsection
