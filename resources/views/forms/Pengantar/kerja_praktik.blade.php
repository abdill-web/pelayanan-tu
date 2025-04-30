@extends('layouts.app') {{-- Pastikan ini mengarah ke layout base Anda --}}

@section('content')
{{-- Wrapper untuk memberikan padding dan menempatkan card di tengah (opsional, tergantung layout utama) --}}
{{-- <div class="max-w-3xl mx-auto"> --}}

    {{-- Card container untuk form --}}
    <div class="bg-white shadow-lg rounded-xl p-6 md:p-8">
        <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 mb-6 border-b pb-4">
            Form Surat Pengantar - Kerja Praktik
        </h2>

        {{-- Pesan Sukses --}}
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md shadow-sm" role="alert">
                <p class="font-bold">Sukses!</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        {{-- Form dengan styling Tailwind --}}
        <form action="{{ route('kerja-praktik.submit') }}" method="POST" class="space-y-6"> {{-- space-y-6 menambah jarak antar elemen form --}}
            @csrf

            {{-- Field Email --}}
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" id="email"
                       class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out sm:text-sm"
                       required placeholder="contoh@email.com">
            </div>

            {{-- Field Nama --}}
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                <input type="text" name="nama" id="nama"
                       class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out sm:text-sm"
                       required placeholder="Masukkan nama lengkap Anda">
            </div>

            {{-- Field NIM --}}
            <div>
                <label for="nim" class="block text-sm font-medium text-gray-700 mb-1">NIM</label>
                <input type="text" name="nim" id="nim"
                       class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out sm:text-sm"
                       required placeholder="Masukkan NIM Anda">
            </div>

            {{-- Field Tujuan Surat --}}
            <div>
                <label for="tujuan_surat" class="block text-sm font-medium text-gray-700 mb-1">Tujuan Surat</label>
                <input type="text" name="tujuan_surat" id="tujuan_surat"
                       class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out sm:text-sm"
                       required placeholder="Cth: Magang Mandiri, Kerja Praktik">
            </div>

            {{-- Field Nama Perusahaan --}}
            <div>
                <label for="nama_perusahaan" class="block text-sm font-medium text-gray-700 mb-1">Nama Perusahaan Tujuan</label>
                <input type="text" name="nama_perusahaan" id="nama_perusahaan"
                       class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out sm:text-sm"
                       required placeholder="Masukkan nama perusahaan">
            </div>

            {{-- Field Alamat Perusahaan --}}
            <div>
                <label for="alamat_perusahaan" class="block text-sm font-medium text-gray-700 mb-1">Alamat Lengkap Perusahaan</label>
                <textarea name="alamat_perusahaan" id="alamat_perusahaan" rows="3"
                          class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out sm:text-sm"
                          required placeholder="Masukkan alamat lengkap perusahaan"></textarea>
            </div>

            {{-- Field Program Studi --}}
            <div>
                <label for="program_studi" class="block text-sm font-medium text-gray-700 mb-1">Program Studi</label>
                <input type="text" name="program_studi" id="program_studi"
                       class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out sm:text-sm"
                       required placeholder="Cth: Teknik Informatika S1">
            </div>

             {{-- Field Lama Magang --}}
            <div>
                <label for="lama_magang" class="block text-sm font-medium text-gray-700 mb-1">Periode/Lama Magang</label>
                <input type="text" name="lama_magang" id="lama_magang"
                       class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out sm:text-sm"
                       required placeholder="Cth: 3 Bulan (Januari - Maret 2025)">
            </div>

            {{-- Tombol Submit --}}
            <div class="pt-5"> {{-- Beri sedikit jarak di atas tombol --}}
                <button type="submit"
                        class="w-full inline-flex justify-center py-3 px-6 border border-transparent shadow-sm text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                    Kirim Pengajuan Surat
                </button>
            </div>
        </form>
    </div>

{{-- </div> --}} {{-- Akhir dari max-w-3xl wrapper jika digunakan --}}
@endsection