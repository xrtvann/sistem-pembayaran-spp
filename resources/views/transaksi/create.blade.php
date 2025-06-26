@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Tambah Transaksi Pembayaran</h1>

        <form action="{{ route('transaksi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="siswa_id" value="{{ $siswa->id }}">
            <input type="hidden" name="id_pembagian" value="{{ $pembagian->id_pembagian }}">

            <div class="mb-4">
                <label class="block text-sm font-medium">Nama Siswa</label>
                <input type="text" value="{{ $siswa->nama }}" disabled class="w-full border-gray-300 rounded mt-1">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Jumlah Tagihan</label>
                <input type="text" value="Rp{{ number_format($pembagian->spp->nominal, 0, ',', '.') }}" disabled
                    class="w-full border-gray-300 rounded mt-1">
            </div>

            <div class="mb-4">
                <label for="total_bayar" class="block text-sm font-medium">Jumlah Bayar</label>
                <input type="number" name="total_bayar" id="total_bayar" class="w-full border-gray-300 rounded mt-1"
                    required>
            </div>

            <div class="mb-4">
                <label for="tanggal_bayar" class="block text-sm font-medium">Tanggal Bayar</label>
                <input type="date" name="tanggal_bayar" id="tanggal_bayar" class="w-full border-gray-300 rounded mt-1"
                    required>
            </div>

            <div class="mb-4">
                <label for="bukti_pembayaran" class="block text-sm font-medium">Upload Bukti Pembayaran</label>
                <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" accept="image/*"
                    class="w-full border border-gray-300 rounded mt-1">
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan Transaksi</button>
        </form>
    </div>
@endsection
