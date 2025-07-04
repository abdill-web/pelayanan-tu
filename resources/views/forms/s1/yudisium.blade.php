@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto bg-white p-10 rounded-2xl shadow-2xl border border-gray-200">
        <h2 class="text-3xl font-extrabold text-blue-700 text-center mb-10">
            Form Pengajuan Yudisium
        </h2>

        {{-- Pesan Sukses --}}
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-800 px-6 py-4 rounded-lg mb-8 shadow">
                <strong>✅ Sukses!</strong>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <form method="POST" action="{{ route('s1.submitYudisium') }}" class="space-y-6">
            @csrf

            {{-- Nama --}}
            <div>
                <label for="nama" class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required placeholder="Masukkan nama lengkap Anda">
                @error('nama') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- NIM --}}
            <div>
                <label for="nim" class="block text-sm font-semibold text-gray-700 mb-2">NIM</label>
                <input type="text" name="nim" id="nim" value="{{ old('nim') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required placeholder="Masukkan NIM Anda">
                @error('nim') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Email --}}
            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required placeholder="contoh@email.com">
                @error('email') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Program Studi --}}
            <div>
                <label for="program_studi" class="block text-sm font-semibold text-gray-700 mb-2">Program Studi</label>
                <select name="program_studi" id="program_studi"
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
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

            {{-- Angkatan --}}
            <div>
                <label for="angkatan" class="block text-sm font-semibold text-gray-700 mb-2">Angkatan</label>
                <select name="angkatan" id="angkatan"
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required>
                    <option value="">-- Pilih Angkatan --</option>
                    @for ($year = date('Y'); $year >= 2015; $year--)
                        <option value="{{ $year }}" {{ old('angkatan') == $year ? 'selected' : '' }}>{{ $year }}</option>
                    @endfor
                </select>
                @error('angkatan') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- IPK --}}
            <div>
                <label for="ipk" class="block text-sm font-semibold text-gray-700 mb-2">IPK</label>
                <input type="number" step="0.01" name="ipk" id="ipk" value="{{ old('ipk') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required placeholder="Contoh: 3.45">
                @error('ipk') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Judul Tugas Akhir --}}
            <div>
                <label for="judul_ta" class="block text-sm font-semibold text-gray-700 mb-2">Judul Tugas Akhir</label>
                <textarea name="judul_ta" id="judul_ta" rows="3"
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required placeholder="Masukkan judul tugas akhir Anda">{{ old('judul_ta') }}</textarea>
                @error('judul_ta') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Tombol Submit --}}
            <div class="pt-6">
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-xl shadow-md transition duration-200">
                    Kirim Pengajuan Yudisium
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
