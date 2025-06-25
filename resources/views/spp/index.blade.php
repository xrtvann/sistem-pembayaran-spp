@extends('layouts.app')
@section('content')
<div class="max-w-4xl mx-auto p-6">
    <h1 class="text-2xl font-bold text-center mb-6">Data SPP</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
        <div class="flex justify-between items-center p-4 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-800">Daftar SPP</h2>
            <button onclick="document.getElementById('createSppModal').showModal()" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                <i class="fas fa-plus text-xs"></i><span> Tambah</span>
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nominal</th>
                        <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider w-32">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($spp as $s)
                    <tr class="hover:bg-gray-50 transition-colors duration-150">
                        <td class="px-4 py-3 text-sm text-gray-900">Rp {{ number_format($s->nominal, 0, ',', '.') }}</td>
                        <td class="px-4 py-3 text-right text-sm font-medium">
                            <div class="flex justify-end space-x-1">
                                <button onclick="document.getElementById('editSpp{{ $s->id_spp }}').showModal()" class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">Edit</button>
                                <form action="{{ route('spp.destroy', $s->id_spp) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    <!-- Modal Edit -->
                    <dialog id="editSpp{{ $s->id_spp }}" class="rounded-md shadow-xl p-6 w-96">
                        <form action="{{ route('spp.update', $s->id_spp) }}" method="POST">
                            @csrf @method('PUT')
                            <h3 class="text-lg font-semibold mb-4">Edit SPP</h3>
                            <label class="block mb-2">Nominal (Rp)</label>
                            <input type="number" name="nominal" value="{{ $s->nominal }}" required class="w-full px-3 py-2 border rounded mb-4">
                            <div class="flex justify-end space-x-2">
                                <button type="button" onclick="document.getElementById('editSpp{{ $s->id_spp }}').close()" class="bg-gray-300 hover:bg-gray-400 px-3 py-1 rounded">Batal</button>
                                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">Simpan</button>
                            </div>
                        </form>
                    </dialog>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah -->
<dialog id="createSppModal" class="rounded-md shadow-xl p-6 w-96">
    <form action="{{ route('spp.store') }}" method="POST">
        @csrf
        <h3 class="text-lg font-semibold mb-4">Tambah SPP</h3>
        <label class="block mb-2">Nominal (Rp)</label>
        <input type="number" name="nominal" required class="w-full px-3 py-2 border rounded mb-4">
        <div class="flex justify-end space-x-2">
            <button type="button" onclick="document.getElementById('createSppModal').close()" class="bg-gray-300 hover:bg-gray-400 px-3 py-1 rounded">Batal</button>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">Simpan</button>
        </div>
    </form>
</dialog>
@endsection
