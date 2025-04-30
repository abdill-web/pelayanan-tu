@extends('layouts.app') {{-- Pastikan ini layout base Anda --}}

@section('content')
{{-- Container Card untuk Form - Gunakan max-w-2xl karena form ini lebih panjang --}}
<div class="max-w-2xl mx-auto bg-white p-6 md:p-8 shadow-lg rounded-xl">
    <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 mb-6 border-b pb-4">
        Form Surat Pengantar - Survey / Penelitian Data Tugas Akhir
    </h2>

    {{-- Pesan Sukses --}}
    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md shadow-sm" role="alert">
            <p class="font-bold">Sukses!</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    {{-- Form --}}
    <form action="{{ route('survey.submit') }}" method="POST" class="space-y-6"> {{-- Ganti mb-3 dengan space-y-6 --}}
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

        {{-- Field Program Studi --}}
        <div>
            <label for="program_studi" class="block text-sm font-medium text-gray-700 mb-1">Program Studi</label>
            <input type="text" name="program_studi" id="program_studi"
                   class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out sm:text-sm"
                   required placeholder="Cth: Teknik Informatika S1">
        </div>

         {{-- Field Asal Kampus --}}
         <div>
            <label for="asal_kampus" class="block text-sm font-medium text-gray-700 mb-1">Asal Kampus</label>
            <input type="text" name="asal_kampus" id="asal_kampus"
                   class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out sm:text-sm"
                   required placeholder="Cth: Universitas Contoh Negeri">
        </div>

        {{-- Field Nomor Telepon --}}
        <div>
            <label for="no_telp" class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon Aktif</label>
            <input type="text" name="no_telp" id="no_telp"
                   class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out sm:text-sm"
                   required placeholder="Cth: 081234567890">
        </div>

        {{-- Field Nama Perusahaan --}}
        <div>
            <label for="nama_perusahaan" class="block text-sm font-medium text-gray-700 mb-1">Nama Instansi/Perusahaan Tujuan</label>
            <input type="text" name="nama_perusahaan" id="nama_perusahaan"
                   class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out sm:text-sm"
                   required placeholder="Masukkan nama instansi/perusahaan">
        </div>

        {{-- Field Alamat Perusahaan --}}
        <div>
            <label for="alamat_perusahaan" class="block text-sm font-medium text-gray-700 mb-1">Alamat Lengkap Instansi/Perusahaan</label>
            <textarea name="alamat_perusahaan" id="alamat_perusahaan" rows="3"
                      class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out sm:text-sm"
                      required placeholder="Masukkan alamat lengkap instansi/perusahaan"></textarea>
        </div>

        {{-- Field Ditujukan Kepada --}}
        <div>
            <label for="ditujukan_kepada" class="block text-sm font-medium text-gray-700 mb-1">Surat Ditujukan Kepada (Nama)</label>
            <input type="text" name="ditujukan_kepada" id="ditujukan_kepada"
                   class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out sm:text-sm"
                   required placeholder="Cth: Kepala Bagian HRD, Manajer Riset">
        </div>

        {{-- Field Gender --}}
        <div>
            <label for="gender" class="block text-sm font-medium text-gray-700 mb-1">Gender</label>
            <select name="gender" id="gender"
                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md shadow-sm"
                    required>
                {{-- Tambahkan opsi default jika perlu --}}
                {{-- <option value="" disabled selected>Pilih Gender</option> --}}
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            {{-- Catatan: Styling panah dropdown <select> mungkin berbeda antar browser tanpa plugin @tailwindcss/forms --}}
        </div>

        {{-- Field Jabatan --}}
        <div>
            <label for="jabatan" class="block text-sm font-medium text-gray-700 mb-1">Jabatan (HRD/Manajer)</label>
            <input type="text" name="jabatan" id="jabatan"
                   class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out sm:text-sm"
                   required placeholder="Cth: Mahasiswa">
        </div>

        {{-- Field Data yang Diminta --}}
        <div>
            <label for="data_diminta" class="block text-sm font-medium text-gray-700 mb-1">Data yang Diminta (Singkat)</label>
            <textarea name="data_diminta" id="data_diminta" rows="3"
                      class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out sm:text-sm"
                      required placeholder="Sebutkan data utama yang diperlukan untuk penelitian Anda"></textarea>
        </div>

        {{-- Field Pernyataan Tanggung Jawab --}}
        <div>
            <label for="pernyataan" class="block text-sm font-medium text-gray-700 mb-1">Pernyataan Tanggung Jawab</label>
            <textarea name="pernyataan" id="pernyataan" rows="4"
                      class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out sm:text-sm"
                      required readonly>{{-- Default text tetap di dalam tag --}}
Jika terjadi sesuatu dalam pelaksanaan penelitian di instansi yang dituju, pihak Universitas tidak bertanggung jawab.
            </textarea>
            <p class="mt-1 text-xs text-gray-500">Teks pernyataan ini tidak dapat diubah.</p> {{-- Tambah keterangan --}}
        </div>


        {{-- Tombol Submit --}}
        <div class="pt-5">
            <button type="submit"
                    class="w-full inline-flex justify-center py-3 px-6 border border-transparent shadow-sm text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                Ajukan Surat Pengantar Survey/Penelitian
            </button>
        </div>
    </form>
</div>
@endsection