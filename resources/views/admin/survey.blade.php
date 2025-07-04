@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-10 px-4">
    <h1 class="text-3xl font-bold text-blue-800 mb-6">Data Survey / Penelitian Tugas Akhir</h1>

    <div class="overflow-x-auto bg-white shadow-lg rounded-xl">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-blue-50">
                <tr>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">Nama</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">NIM</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">Email</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">Program Studi</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">Asal Kampus</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">No. Telepon</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">Nama Perusahaan</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">Alamat Perusahaan</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">Ditujukan Kepada</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">Gender</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">Jabatan</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">Data Diminta</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">Pernyataan</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">Tanggal</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">Status</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($data as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $item->nama }}</td>
                        <td class="px-4 py-3">{{ $item->nim }}</td>
                        <td class="px-4 py-3">{{ $item->email }}</td>
                        <td class="px-4 py-3">{{ $item->program_studi }}</td>
                        <td class="px-4 py-3">{{ $item->asal_kampus }}</td>
                        <td class="px-4 py-3">{{ $item->no_telp }}</td>
                        <td class="px-4 py-3">{{ $item->nama_perusahaan }}</td>
                        <td class="px-4 py-3">{{ $item->alamat_perusahaan }}</td>
                        <td class="px-4 py-3">{{ $item->ditujukan_kepada }}</td>
                        <td class="px-4 py-3">{{ $item->gender }}</td>
                        <td class="px-4 py-3">{{ $item->jabatan }}</td>
                        <td class="px-4 py-3 whitespace-pre-line">{{ $item->data_diminta }}</td>
                        <td class="px-4 py-3 whitespace-pre-line">{{ $item->pernyataan }}</td>
                        <td class="px-4 py-3">{{ $item->created_at->format('d-m-Y') }}</td>

                        <!-- Status -->
                        <td class="px-4 py-3">
                            <form action="{{ route('admin.survey.status', $item->id) }}" method="POST" class="flex items-center gap-2">
                                @csrf
                                @method('PUT')
                                <select name="status"
                                    class="px-3 py-1.5 rounded-md border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm
                                        @if($item->status == 'menunggu') bg-yellow-100 text-yellow-700
                                        @elseif($item->status == 'diproses') bg-blue-100 text-blue-700
                                        @elseif($item->status == 'ditolak') bg-red-100 text-red-700
                                        @elseif($item->status == 'selesai') bg-green-100 text-green-700
                                        @endif">
                                    <option value="menunggu" {{ $item->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                                    <option value="diproses" {{ $item->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                    <option value="ditolak" {{ $item->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                    <option value="selesai" {{ $item->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                </select>
                                <button type="submit"
                                    class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 text-sm rounded-md shadow-sm transition">
                                    Simpan
                                </button>
                            </form>
                        </td>

                        <!-- Aksi -->
                        <td class="px-4 py-3 text-sm text-gray-500">
                            Terakhir: <br><span class="text-xs">{{ $item->updated_at->format('d-m-Y H:i') }}</span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="16" class="px-4 py-5 text-center text-gray-400">Belum ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6 flex justify-between flex-wrap gap-4">
        <a href="{{ route('admin.export.survey') }}"
            class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold px-5 py-2 rounded shadow">
            Export Survey ke Excel
        </a>

        <a href="{{ route('admin.dashboard') }}"
            class="inline-block bg-gray-500 hover:bg-gray-600 text-white font-semibold px-5 py-2 rounded shadow">
            Kembali ke Dashboard
        </a>
    </div>
</div>
@endsection
