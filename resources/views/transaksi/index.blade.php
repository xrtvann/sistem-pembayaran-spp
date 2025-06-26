@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Data Transaksi Siswa</h1>

        <div class="bg-gray-100 p-4 rounded shadow mb-6">
            <p><strong>Nama:</strong> {{ $siswa->nama }}</p>
            <p><strong>Kelas:</strong> {{ $pembagian->kelas->nama_kelas ?? '-' }}</p>
            <p><strong>Jumlah Tagihan (SPP):</strong> Rp{{ number_format($totalSpp, 0, ',', '.') }}</p>
            <p><strong>Jumlah Sudah Dibayar:</strong> Rp{{ number_format($totalBayar, 0, ',', '.') }}</p>
            <p><strong>Sisa:</strong> Rp{{ number_format($sisa, 0, ',', '.') }}</p>
        </div>

    
    <a href="{{ route('transaksi.create', $siswa->nis) }}"
        class="mb-4 inline-block bg-green-600 text-white px-4 py-2 rounded">+ Tambah Pembayaran</a>

    <div class="bg-white shadow rounded p-4">
        <h2 class="text-lg font-semibold mb-2">Riwayat Transaksi</h2>

        @if ($transaksi->isEmpty())
            <p class="text-gray-600">Belum ada transaksi.</p>
        @else
            <table class="min-w-full text-sm border">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border px-2 py-1">Tanggal</th>
                        <th class="border px-2 py-1">Jumlah Bayar</th>
                        <th class="border px-2 py-1">Sisa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi as $item)
                        <tr>
                            <td class="border px-2 py-1">{{ $item->tanggal_bayar }}</td>
                            <td class="border px-2 py-1">Rp{{ number_format($item->total_bayar, 0, ',', '.') }}</td>
                            <td class="border px-2 py-1">
                                Rp{{ number_format($totalSpp - $transaksi->where('id', '<=', $item->id)->sum('total_bayar'), 0, ',', '.') }}
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    </div>
@endsection
