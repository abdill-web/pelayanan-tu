@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto bg-white px-6 sm:px-10 lg:px-12 py-10 shadow-2xl rounded-3xl border border-gray-200">
        <h2 class="text-3xl font-bold text-center text-blue-700 mb-8">
            Form Pengajuan Legalisir
        </h2>

        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 px-6 py-4 rounded-lg mb-8 text-sm shadow">
                ✅ {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('legalisir.submit') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-y-6 md:gap-x-8">
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

            {{-- Email --}}
            <div class="md:col-span-2">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required placeholder="Email aktif">
                @error('email') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Program Studi --}}
            <div class="md:col-span-2">
                <label for="program_studi" class="block text-sm font-medium text-gray-700 mb-1">Program Studi</label>
                <input type="text" name="program_studi" id="program_studi" value="{{ old('program_studi') }}"
                    class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required placeholder="Contoh: Teknik Sipil">
                @error('program_studi') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Upload File Ijazah --}}
            <div class="md:col-span-2">
                <label for="file_ijazah" class="block text-sm font-medium text-gray-700 mb-1">Upload Ijazah (PDF)</label>
                <input type="file" name="file_ijazah" id="file_ijazah" accept="application/pdf"
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required>
                @error('file_ijazah') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Tombol Submit --}}
            <div class="md:col-span-2 pt-4">
                <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-lg shadow-md transition duration-200">
                    Kirim Pengajuan Legalisir
                </button>
            </div>
        </form>
    </div>
@endsection
