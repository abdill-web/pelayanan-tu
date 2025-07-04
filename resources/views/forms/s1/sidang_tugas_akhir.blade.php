@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto bg-white px-6 sm:px-10 lg:px-12 py-10 shadow-2xl rounded-3xl border border-gray-200">
        <h1 class="text-3xl font-bold text-center text-blue-700 mb-8">
            Form Pendaftaran Sidang Tugas Akhir
        </h1>

        {{-- Pesan Sukses --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-800 px-6 py-4 rounded-lg mb-8 shadow">
                <div class="font-semibold mb-1">✅ Sukses!</div>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        {{-- Form --}}
        <form action="{{ route('sidang-ta.submit') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-y-6 md:gap-x-8">
            @csrf

            {{-- Nama --}}
            <div>
                <label for="nama" class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                <input type="text" name="nama" id="nama"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 shadow-inner"
                    value="{{ old('nama') }}" required placeholder="Masukkan nama lengkap Anda">
            </div>

            {{-- NIM --}}
            <div>
                <label for="nim" class="block text-sm font-semibold text-gray-700 mb-2">NIM</label>
                <input type="text" name="nim" id="nim"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 shadow-inner"
                    value="{{ old('nim') }}" required placeholder="Masukkan NIM Anda">
            </div>

            {{-- Judul Tugas Akhir --}}
            <div class="md:col-span-2">
                <label for="judul" class="block text-sm font-semibold text-gray-700 mb-2">Judul Tugas Akhir</label>
                <input type="text" name="judul" id="judul"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 shadow-inner"
                    value="{{ old('judul') }}" required placeholder="Masukkan judul tugas akhir Anda">
            </div>

            {{-- Email --}}
            <div class="md:col-span-2">
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                <input type="email" name="email" id="email"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 shadow-inner"
                    value="{{ old('email') }}" required placeholder="contoh@email.com">
            </div>

            {{-- Submit --}}
            <div class="md:col-span-2 pt-6">
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-xl shadow-lg transition duration-200">
                    Daftar Sidang Tugas Akhir
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
