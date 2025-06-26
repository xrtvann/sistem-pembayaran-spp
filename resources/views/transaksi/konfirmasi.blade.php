@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto p-6">

        <div class="wrapper flex justify-between mb-10">
            <h1 class="text-2xl font-bold">Konfrimasi Pembayaran</h1>

            <a href="{{ route('transaksi') }}"
                class="bg-gray-500 hover:bg-dark text-white px-4 py-2 rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                <i class="fas fa-backward mr-2"></i>Kembali
            </a>
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
                        <th class="border px-4 py-2 text-left">Status</th>
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
                            <td>
                                <form action="{{ route('transaksi.updateStatus', $item->id_transaksi) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" onchange="this.form.submit()"
                                        class="border border-gray-300 rounded px-2 py-1 bg-white text-sm">
                                        <option value="pending" {{ $item->status === 'pending' ? 'selected' : '' }}>Pending
                                        </option>
                                        <option value="sukses" {{ $item->status === 'sukses' ? 'selected' : '' }}>Sukses
                                        </option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
