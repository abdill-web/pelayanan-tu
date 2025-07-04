@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto bg-white px-6 sm:px-10 lg:px-12 py-10 shadow-2xl rounded-3xl border border-gray-200">
        <h2 class="text-3xl font-bold text-center text-blue-700 mb-8">
            Form Pindah Program Kuliah
        </h2>

        @if (session('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 px-6 py-4 rounded-lg mb-8 text-sm shadow">
                ✅ {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('pindah-program-kuliah.submit') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-y-6 md:gap-x-8">
            @csrf

            {{-- Nama --}}
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                <input type="text" name="nama" id="nama"
                    class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required placeholder="Masukkan nama lengkap Anda">
            </div>

            {{-- NIM --}}
            <div>
                <label for="nim" class="block text-sm font-medium text-gray-700 mb-1">NIM</label>
                <input type="text" name="nim" id="nim"
                    class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required placeholder="Masukkan NIM Anda">
            </div>

            {{-- Email --}}
            <div class="md:col-span-2">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" id="email"
                    class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required placeholder="contoh@email.com">
            </div>

            {{-- Program Studi --}}
            <div class="md:col-span-2">
                <label for="program_studi" class="block text-sm font-medium text-gray-700 mb-1">Program Studi</label>
                <input type="text" name="program_studi" id="program_studi"
                    class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required placeholder="Masukkan program studi Anda">
            </div>

            {{-- Program Asal --}}
            <div>
                <label for="program_asal" class="block text-sm font-medium text-gray-700 mb-1">Program Asal</label>
                <select name="program_asal" id="program_asal"
                    class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required>
                    <option value="" disabled selected>Pilih program asal</option>
                    <option value="Reguler 1">Reguler 1</option>
                    <option value="Reguler 2">Reguler 2</option>
                </select>
            </div>

            {{-- Program Tujuan --}}
            <div>
                <label for="program_tujuan" class="block text-sm font-medium text-gray-700 mb-1">Program Tujuan</label>
                <select name="program_tujuan" id="program_tujuan"
                    class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required>
                    <option value="" disabled selected>Pilih program tujuan</option>
                    <option value="Reguler 1">Reguler 1</option>
                    <option value="Reguler 2">Reguler 2</option>
                </select>
            </div>

            {{-- Alasan --}}
            <div class="md:col-span-2">
                <label for="alasan" class="block text-sm font-medium text-gray-700 mb-1">Alasan</label>
                <textarea name="alasan" id="alasan" rows="4"
                    class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required placeholder="Tulis alasan Anda ingin pindah program kuliah..."></textarea>
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
