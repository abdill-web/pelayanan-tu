@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto bg-white px-6 sm:px-10 lg:px-12 py-10 shadow-2xl rounded-3xl border border-gray-200">
        <h2 class="text-3xl font-bold text-center text-blue-700 mb-8">
            Form Request Kelas
        </h2>

        {{-- Pesan Sukses --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 px-6 py-4 rounded-lg mb-8 text-sm shadow">
                ✅ {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('request-kelas.submit') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-y-6 md:gap-x-8">
            @csrf

            {{-- Nama --}}
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
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

            {{-- Program Studi --}}
            <div class="md:col-span-2">
                <label for="program_studi" class="block text-sm font-medium text-gray-700 mb-1">Program Studi</label>
                <select name="program_studi" id="program_studi"
                    class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required>
                    <option value="">-- Pilih Program Studi --</option>
                    <option value="Arsitektur" {{ old('program_studi') == 'Arsitektur' ? 'selected' : '' }}>Arsitektur</option>
                    <option value="Teknik Sipil" {{ old('program_studi') == 'Teknik Sipil' ? 'selected' : '' }}>Teknik Sipil</option>
                    <option value="Teknik Elektro" {{ old('program_studi') == 'Teknik Elektro' ? 'selected' : '' }}>Teknik Elektro</option>
                    <option value="Teknik Mesin" {{ old('program_studi') == 'Teknik Mesin' ? 'selected' : '' }}>Teknik Mesin</option>
                    <option value="Teknik Industri" {{ old('program_studi') == 'Teknik Industri' ? 'selected' : '' }}>Teknik Industri</option>
                </select>
                @error('program_studi') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Mata Kuliah --}}
            <div class="md:col-span-2">
                <label for="mata_kuliah" class="block text-sm font-medium text-gray-700 mb-1">Mata Kuliah yang Diminta</label>
                <input type="text" name="mata_kuliah" id="mata_kuliah" value="{{ old('mata_kuliah') }}"
                    class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required placeholder="Contoh: Statistika Teknik">
                @error('mata_kuliah') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Alasan --}}
            <div class="md:col-span-2">
                <label for="alasan" class="block text-sm font-medium text-gray-700 mb-1">Alasan Permintaan Kelas</label>
                <textarea name="alasan" id="alasan" rows="4"
                    class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required placeholder="Jelaskan alasan Anda">{{ old('alasan') }}</textarea>
                @error('alasan') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
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
