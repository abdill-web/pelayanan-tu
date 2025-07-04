@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto bg-white px-6 sm:px-10 lg:px-12 py-10 shadow-2xl rounded-3xl border border-gray-200">
        <h2 class="text-3xl font-bold text-center text-blue-700 mb-8">
            Formulir Koreksi KHS
        </h2>

        @if (session('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 px-6 py-4 rounded-lg mb-8 text-sm shadow">
                ✅ {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('koreksi-khs.submit') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-y-6 md:gap-x-8">
            @csrf

            {{-- Nama --}}
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama') }}"
                    class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required placeholder="Nama lengkap">
                @error('nama') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- NIM --}}
            <div>
                <label for="nim" class="block text-sm font-medium text-gray-700 mb-1">NIM</label>
                <input type="text" name="nim" id="nim" value="{{ old('nim') }}"
                    class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required placeholder="Nomor Induk Mahasiswa">
                @error('nim') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Program Studi --}}
            <div class="md:col-span-2">
                <label for="program_studi" class="block text-sm font-medium text-gray-700 mb-1">Program Studi</label>
                <input type="text" name="program_studi" id="program_studi" value="{{ old('program_studi') }}"
                    class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required placeholder="Contoh: Teknik Elektro">
                @error('program_studi') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Semester --}}
            <div class="md:col-span-2">
                <label for="semester" class="block text-sm font-medium text-gray-700 mb-1">Semester</label>
                <input type="text" name="semester" id="semester" value="{{ old('semester') }}"
                    class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required placeholder="Contoh: Ganjil 2024/2025">
                @error('semester') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Keterangan --}}
            <div class="md:col-span-2">
                <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-1">Keterangan</label>
                <textarea name="keterangan" id="keterangan" rows="4"
                    class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required placeholder="Tulis keterangan koreksi yang dibutuhkan">{{ old('keterangan') }}</textarea>
                @error('keterangan') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Tombol Submit --}}
            <div class="md:col-span-2 pt-4">
                <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-lg shadow-md transition duration-200">
                    Kirim Permintaan Koreksi KHS
                </button>
            </div>
        </form>
    </div>
@endsection
