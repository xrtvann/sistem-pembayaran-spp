@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">History Transaksi SPP</h1>

    @if($history->isEmpty())
        <div class="bg-yellow-100 text-yellow-800 p-4 rounded">
            Belum ada transaksi yang dilakukan oleh siswa mana pun.
        </div>
    @else
        <div class="overflow-x-auto bg-white shadow rounded p-4">
            <table class="min-w-full text-sm border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-4 py-2 text-left">Nama Siswa</th>
                        <th class="border px-4 py-2 text-left">NIS</th>
                        <th class="border px-4 py-2 text-left">Jumlah Tagihan</th>
                        <th class="border px-4 py-2 text-left">Jumlah Bayar</th>
                        <th class="border px-4 py-2 text-left">Sisa</th>
                        <th class="border px-4 py-2 text-left">Tanggal Bayar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($history as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="border px-4 py-2">
                                {{ $item->pembagian->siswa->nama ?? '-' }}
                            </td>
                            <td class="border px-4 py-2">
                                {{ $item->pembagian->siswa->nis ?? '-' }}
                            </td>
                            <td class="border px-4 py-2">
                                Rp{{ number_format($item->pembagian->spp->nominal ?? 0, 0, ',', '.') }}
                            </td>
                            <td class="border px-4 py-2">
                                Rp{{ number_format($item->total_bayar, 0, ',', '.') }}
                            </td>
                            <td class="border px-4 py-2">
                                Rp{{ number_format(($item->pembagian->spp->nominal ?? 0) - $item->total_bayar, 0, ',', '.') }}
                            </td>
                            <td class="border px-4 py-2">
                                {{ \Carbon\Carbon::parse($item->tanggal_bayar)->format('d-m-Y') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
