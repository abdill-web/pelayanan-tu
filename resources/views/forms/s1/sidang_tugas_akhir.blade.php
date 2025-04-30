@extends('layouts.app') {{-- Pastikan ini layout base Anda --}}

@section('content')
{{-- Container Card untuk Form --}}
<div class="max-w-xl mx-auto bg-white p-6 md:p-8 shadow-lg rounded-xl"> {{-- Shadow, rounding, padding konsisten --}}
    <h1 class="text-2xl md:text-3xl font-semibold text-gray-800 mb-6 border-b pb-4"> {{-- Styling judul konsisten --}}
        Form Pendaftaran Sidang Tugas Akhir
    </h1>

    {{-- Pesan Sukses --}}
    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md shadow-sm" role="alert"> {{-- Styling alert konsisten --}}
            <p class="font-bold">Sukses!</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    {{-- Form --}}
    <form action="{{ route('sidang-ta.submit') }}" method="POST" class="space-y-6"> {{-- Ganti mb-4 dengan space-y-6 --}}
        @csrf

        {{-- Field Nama --}}
        <div>
            <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label> {{-- Styling label konsisten --}}
            <input type="text" name="nama" id="nama"
                   class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out sm:text-sm" {{-- Styling input konsisten --}}
                   value="{{ old('nama') }}" {{-- Tetap pertahankan old() --}}
                   required placeholder="Masukkan nama lengkap Anda"> {{-- Placeholder --}}
        </div>

        {{-- Field NIM --}}
        <div>
            <label for="nim" class="block text-sm font-medium text-gray-700 mb-1">NIM</label>
            <input type="text" name="nim" id="nim"
                   class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out sm:text-sm"
                   value="{{ old('nim') }}" {{-- Tetap pertahankan old() --}}
                   required placeholder="Masukkan NIM Anda">
        </div>

        {{-- Field Judul Tugas Akhir --}}
        <div>
            <label for="judul" class="block text-sm font-medium text-gray-700 mb-1">Judul Tugas Akhir</label>
            <input type="text" name="judul" id="judul"
                   class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out sm:text-sm"
                   value="{{ old('judul') }}" {{-- Tetap pertahankan old() --}}
                   required placeholder="Masukkan judul tugas akhir Anda">
        </div>

        {{-- Field Email --}}
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" name="email" id="email"
                   class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out sm:text-sm"
                   value="{{ old('email') }}" {{-- Tetap pertahankan old() --}}
                   required placeholder="contoh@email.com">
        </div>

        {{-- Tombol Submit --}}
        <div class="pt-5"> {{-- Jarak di atas tombol --}}
            <button type="submit"
                    class="w-full inline-flex justify-center py-3 px-6 border border-transparent shadow-sm text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                Daftar Sidang Tugas Akhir {{-- Teks tombol lebih deskriptif --}}
            </button>
        </div>
    </form>
</div>
@endsection