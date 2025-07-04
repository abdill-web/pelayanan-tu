@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-10 px-4">
    <h1 class="text-3xl font-bold text-blue-800 mb-6">Data Koreksi KHS</h1>

    <div class="overflow-x-auto bg-white shadow-lg rounded-xl">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-blue-50">
                <tr>
                    <th class="px-4 py-3 text-left text-gray-700 font-semibold">Nama</th>
                    <th class="px-4 py-3 text-left text-gray-700 font-semibold">NIM</th>
                    <th class="px-4 py-3 text-left text-gray-700 font-semibold">Program Studi</th>
                    <th class="px-4 py-3 text-left text-gray-700 font-semibold">Semester</th>
                    <th class="px-4 py-3 text-left text-gray-700 font-semibold">Keterangan</th>
                    <th class="px-4 py-3 text-left text-gray-700 font-semibold">Tanggal</th>
                    <th class="px-4 py-3 text-left text-gray-700 font-semibold">Status</th>
                    <th class="px-4 py-3 text-left text-gray-700 font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($data as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $item->nama }}</td>
                        <td class="px-4 py-3">{{ $item->nim }}</td>
                        <td class="px-4 py-3">{{ $item->program_studi }}</td>
                        <td class="px-4 py-3">{{ $item->semester }}</td>
                        <td class="px-4 py-3">{{ $item->keterangan }}</td>
                        <td class="px-4 py-3">{{ $item->created_at->format('d-m-Y') }}</td>

                        <!-- Status -->
                        <td class="px-4 py-3">
                            <form action="{{ route('admin.koreksi-khs.status', $item->id) }}" method="POST" class="flex items-center gap-2">
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
                        <td colspan="8" class="px-4 py-5 text-center text-gray-400">Belum ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6 flex justify-between flex-wrap gap-4">
        <a href="{{ route('admin.export.koreksi-khs') }}"
            class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold px-5 py-2 rounded shadow">
            Export Koreksi KHS ke Excel
        </a>

        <a href="{{ route('admin.dashboard') }}"
            class="inline-block bg-gray-500 hover:bg-gray-600 text-white font-semibold px-5 py-2 rounded shadow">
            Kembali ke Dashboard
        </a>
    </div>
</div>
@endsection
