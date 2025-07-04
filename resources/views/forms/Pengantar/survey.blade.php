@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow-2xl border border-gray-200">
        <h2 class="text-3xl font-bold text-center text-blue-700 mb-8">
            Surat Pengantar - Survey / Penelitian Data Tugas Akhir
        </h2>

        {{-- Pesan Sukses --}}
        @if(session('success'))
            <div class="bg-green-50 border-l-4 border-green-600 text-green-700 p-4 mb-6 rounded-lg shadow">
                <div class="font-semibold">✅ Sukses!</div>
                <div>{{ session('success') }}</div>
            </div>
        @endif

        <form action="{{ route('survey.submit') }}" method="POST" class="space-y-6">
            @csrf

            @php
                $fields = [
                    ['name' => 'email', 'label' => 'Email', 'type' => 'email', 'placeholder' => 'contoh@email.com'],
                    ['name' => 'nama', 'label' => 'Nama Lengkap', 'type' => 'text', 'placeholder' => 'Masukkan nama lengkap Anda'],
                    ['name' => 'nim', 'label' => 'NIM', 'type' => 'text', 'placeholder' => 'Masukkan NIM Anda'],
                    ['name' => 'program_studi', 'label' => 'Program Studi', 'type' => 'text', 'placeholder' => 'Cth: Teknik Sipil'],
                    ['name' => 'asal_kampus', 'label' => 'Asal Kampus', 'type' => 'text', 'placeholder' => 'Cth: Universitas Contoh Negeri'],
                    ['name' => 'no_telp', 'label' => 'Nomor Telepon Aktif', 'type' => 'text', 'placeholder' => 'Cth: 081234567890'],
                    ['name' => 'nama_perusahaan', 'label' => 'Nama Instansi/Perusahaan Tujuan', 'type' => 'text', 'placeholder' => 'Masukkan nama instansi/perusahaan'],
                    ['name' => 'ditujukan_kepada', 'label' => 'Surat Ditujukan Kepada (Nama)', 'type' => 'text', 'placeholder' => 'Cth: Kepala Bagian HRD, Manajer Riset'],
                    ['name' => 'jabatan', 'label' => 'Jabatan (HRD/Manajer)', 'type' => 'text', 'placeholder' => 'Cth: Manajer HRD'],
                ];
            @endphp

            @foreach ($fields as $field)
                <div>
                    <label for="{{ $field['name'] }}" class="block text-sm font-medium text-gray-700 mb-1">{{ $field['label'] }}</label>
                    <input type="{{ $field['type'] }}" name="{{ $field['name'] }}" id="{{ $field['name'] }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        required placeholder="{{ $field['placeholder'] }}">
                </div>
            @endforeach

            {{-- Alamat Perusahaan --}}
            <div>
                <label for="alamat_perusahaan" class="block text-sm font-medium text-gray-700 mb-1">Alamat Lengkap Instansi/Perusahaan</label>
                <textarea name="alamat_perusahaan" id="alamat_perusahaan" rows="3"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required placeholder="Masukkan alamat lengkap instansi/perusahaan">{{ old('alamat_perusahaan') }}</textarea>
            </div>

            {{-- Gender --}}
            <div>
                <label for="gender" class="block text-sm font-medium text-gray-700 mb-1">Gender</label>
                <select name="gender" id="gender"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required>
                    <option value="">-- Pilih Gender --</option>
                    <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            {{-- Data Diminta --}}
            <div>
                <label for="data_diminta" class="block text-sm font-medium text-gray-700 mb-1">Data yang Diminta (Singkat)</label>
                <textarea name="data_diminta" id="data_diminta" rows="3"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required placeholder="Sebutkan data utama yang diperlukan untuk penelitian Anda">{{ old('data_diminta') }}</textarea>
            </div>

            {{-- Pernyataan --}}
            <div>
                <label for="pernyataan" class="block text-sm font-medium text-gray-700 mb-1">Pernyataan Tanggung Jawab</label>
                <textarea name="pernyataan" id="pernyataan" rows="4" readonly
                    class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required>Jika terjadi sesuatu dalam pelaksanaan penelitian di instansi yang dituju, pihak Universitas tidak bertanggung jawab.</textarea>
                <p class="mt-1 text-xs text-gray-500">Teks pernyataan ini tidak dapat diubah.</p>
            </div>

            {{-- Submit --}}
            <div class="pt-4">
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition duration-200">
                    Kirim Pengajuan Surat
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
