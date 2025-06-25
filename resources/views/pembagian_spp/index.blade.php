@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Pembagian SPP</h1>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">{{ session('success') }}</div>
        @elseif (session('error'))
            <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">{{ session('error') }}</div>
        @endif

        <!-- Modal Form -->
        <button onclick="document.getElementById('modalForm').classList.remove('hidden')"
            class="bg-blue-600 text-white px-4 py-2 rounded mb-4 hover:bg-blue-700">
            Tambah Pembagian SPP
        </button>

        <!-- Tabel Pembagian -->
        <div class="overflow-x-auto rounded-lg shadow-sm border border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tahun
                            Akademik</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kelas
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SPP</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah
                            Siswa</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($pembagian as $item)
                        @php
                            $jumlahSiswa = \App\Models\PembagianSpp::where('id_akademik', $item->id_akademik)
                                ->where('id_kelas', $item->id_kelas)
                                ->where('id_spp', $item->id_spp)
                                ->whereNotNull('siswa_id')
                                ->count();
                        @endphp
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->akademik->mulai }} -
                                {{ $item->akademik->akhir }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->kelas->nama_kelas }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                Rp{{ number_format($item->spp->nominal, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $jumlahSiswa }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 space-x-2">
                                <a href="{{ route('pembagian_spp.detail', $item->id_akademik) }}"
                                    class="inline-flex items-center px-3 py-1 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Detail</a>
                                <a href="{{ route('pembagian_spp.form_tambah_siswa', $item->id_pembagian) }}"
                                    class="inline-flex items-center px-3 py-1 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Tambah</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div id="modalForm" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white p-6 rounded w-full max-w-md">
            <h2 class="text-xl font-bold mb-4">Tambah Pembagian SPP</h2>
            <form action="{{ route('pembagian_spp.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="id_akademik" class="block mb-1">Tahun Akademik</label>
                    <select name="id_akademik" required class="w-full border px-3 py-2 rounded">
                        @if ($akademikAktif)
                            <option value="{{ $akademikAktif->id_akademik }}">
                                {{ $akademikAktif->mulai }} - {{ $akademikAktif->akhir }}
                            </option>
                        @else
                            <option disabled>Belum ada tahun akademik aktif</option>
                        @endif
                    </select>
                </div>
                <div class="mb-4">
                    <label for="id_kelas" class="block mb-1">Kelas</label>
                    <select name="id_kelas" required class="w-full border px-3 py-2 rounded">
                        @foreach ($kelas as $item)
                            <option value="{{ $item->id_kelas }}">{{ $item->nama_kelas }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="id_spp" class="block mb-1">SPP</label>
                    <select name="id_spp" required class="w-full border px-3 py-2 rounded">
                        @foreach ($sppList as $item)
                            <option value="{{ $item->id_spp }}">Rp{{ number_format($item->nominal, 0, ',', '.') }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="document.getElementById('modalForm').classList.add('hidden')"
                        class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">Batal</button>
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
