@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Cari Transaksi SPP</h1>

    <form action="{{ route('transaksi.index') }}" method="GET">
        <div class="mb-4">
            <label for="nis" class="block text-sm font-medium text-gray-700">Masukkan NIS</label>
            <input type="text" name="nis" id="nis" class="w-full border-gray-300 rounded mt-1" required>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Cari</button>
    </form>


</div>
@endsection
