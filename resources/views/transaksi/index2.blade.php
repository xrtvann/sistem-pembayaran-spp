@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto p-6">

        <div class="wrapper flex justify-between">
            <h1 class="text-2xl font-bold mb-10">Transaksi</h1>
            <div class="create">
                <a href="{{ route('transaksi.cari') }}"
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                    <i class="fas fa-plus mr-2"></i>Tambah Transaksi
                </a>
            </div>
        </div>



        <div class="button flex justify-end mb-8">

            <div class="confirmation">
                <a href="{{ route('transaksi.konfirmasi') }}"
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                    <i class="fas fa-check mr-2"></i>Konfirmasi
                </a>
            </div>

        </div>



        <div class="overflow-x-auto bg-white shadow rounded p-4">
            <table class="min-w-full text-sm border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-4 py-2 text-left">NIS</th>
                        <th class="border px-4 py-2 text-left">Nama Siswa</th>
                        <th class="border px-4 py-2 text-left">Kelas</th>
                        <th class="border px-4 py-2 text-left">Jumlah Tagihan</th>
                        <th class="border px-4 py-2 text-left">Jumlah Bayar</th>
                        <th class="border px-4 py-2 text-left">Sisa</th>
                        <th class="border px-4 py-2 text-left">Tanggal Bayar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="border px-4 py-2">
                                {{ $item->nis }}
                            </td>
                            <td class="border px-4 py-2">
                                {{ $item->nama_siswa }}
                            </td>
                            <td class="border px-4 py-2">
                                {{ $item->nama_kelas }}
                            </td>
                            <td class="border px-4 py-2">
                                {{ $item->jumlah_tagihan }}
                            </td>
                            <td class="border px-4 py-2">
                                {{ $item->total_bayar }}
                            </td>
                            <td class="border px-4 py-2">
                                {{ $item->sisa }}
                            </td>
                            <td class="border px-4 py-2">
                                {{ $item->tanggal_bayar }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
