@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto bg-white px-6 sm:px-10 lg:px-12 py-10 shadow-2xl rounded-3xl border border-gray-200">
        <h2 class="text-3xl font-bold text-center text-blue-700 mb-8">
            Form Permintaan Hasil Cek Plagiarisme (Turnitin)
        </h2>

        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 px-6 py-4 rounded-lg mb-8 text-sm shadow">
                ✅ {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('hasil-plagiarism.submit') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-y-6 md:gap-x-8">
            @csrf

            {{-- Nama Lengkap --}}
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama') }}"
                    class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required placeholder="Masukkan nama lengkap Anda">
                @error('nama') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- NIM --}}
            <div>
                <label for="nim" class="block text-sm font-medium text-gray-700 mb-1">NIM</label>
                <input type="text" name="nim" id="nim" value="{{ old('nim') }}"
                    class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required placeholder="Masukkan NIM Anda">
                @error('nim') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Email --}}
            <div class="md:col-span-2">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required placeholder="contoh@email.com">
                @error('email') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Judul --}}
            <div class="md:col-span-2">
                <label for="judul" class="block text-sm font-medium text-gray-700 mb-1">Judul TA/Skripsi</label>
                <input type="text" name="judul" id="judul" value="{{ old('judul') }}"
                    class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required placeholder="Masukkan judul tugas akhir Anda">
                @error('judul') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Catatan Tambahan --}}
            <div class="md:col-span-2">
                <label for="catatan" class="block text-sm font-medium text-gray-700 mb-1">Catatan Tambahan (Opsional)</label>
                <textarea name="catatan" id="catatan" rows="3"
                    class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    placeholder="Contoh: Mohon kirim hasil ke email saya secepatnya...">{{ old('catatan') }}</textarea>
                @error('catatan') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Tombol Submit --}}
            <div class="md:col-span-2 pt-4">
                <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-lg shadow-md transition duration-200">
                    Kirim Permintaan
                </button>
            </div>
        </form>
    </div>
@endsection
