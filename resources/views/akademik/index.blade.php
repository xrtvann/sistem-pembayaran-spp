@extends('layouts.app')
@section('content')
<div class="max-w-4xl mx-auto p-6">
    <h1 class="text-2xl font-bold text-center mb-6">Tahun Akademik</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
        <div class="flex justify-between items-center p-4 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-800">Daftar Tahun Akademik</h2>
            <button onclick="document.getElementById('createAkademikModal').showModal()" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                <i class="fas fa-plus text-xs"></i><span> Tambah</span>
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Periode</th>
                        <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase w-32">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($akademik as $a)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3 text-sm text-gray-900">
                            {{ \Carbon\Carbon::parse($a->mulai)->format('Y') }} / {{ \Carbon\Carbon::parse($a->akhir)->format('Y') }}
                        </td>
                        <td class="px-4 py-3 text-center">
                            @if($a->is_active)
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs font-medium">Aktif</span>
                            @else
                                <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded text-xs font-medium">Tidak Aktif</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-right text-sm font-medium">
                            <div class="flex justify-end space-x-1">
                                <button onclick="document.getElementById('editAkademik{{ $a->id }}').showModal()" class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">Edit</button>
                                <form action="{{ route('akademik.destroy', $a->id_akademik) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">

                                    @csrf @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    <!-- Modal Edit -->
                    <dialog id="editAkademik{{ $a->id }}" class="rounded-md shadow-xl p-6 w-96">
                        <form action="{{ route('akademik.update', $a->id_akademik) }}" method="POST">
                            @csrf @method('PUT')
                            <h3 class="text-lg font-semibold mb-4">Edit Tahun Akademik</h3>

                            <label class="block mb-2">Mulai</label>
                            <input type="date" name="mulai" value="{{ $a->mulai }}" required class="w-full px-3 py-2 border rounded mb-4">

                            <label class="block mb-2">Akhir</label>
                            <input type="date" name="akhir" value="{{ $a->akhir }}" required class="w-full px-3 py-2 border rounded mb-4">

                            <label class="inline-flex items-center mb-4">
                                <input type="checkbox" name="is_active" class="form-checkbox" {{ $a->is_active ? 'checked' : '' }}>
                                <span class="ml-2">Jadikan Tahun Aktif</span>
                            </label>

                            <div class="flex justify-end space-x-2">
                                <button type="button" onclick="document.getElementById('editAkademik{{ $a->id }}').close()" class="bg-gray-300 hover:bg-gray-400 px-3 py-1 rounded">Batal</button>
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
<dialog id="createAkademikModal" class="rounded-md shadow-xl p-6 w-96">
    <form action="{{ route('akademik.store') }}" method="POST">
        @csrf
        <h3 class="text-lg font-semibold mb-4">Tambah Tahun Akademik</h3>

        <label class="block mb-2">Mulai</label>
        <input type="date" name="mulai" required class="w-full px-3 py-2 border rounded mb-4">

        <label class="block mb-2">Akhir</label>
        <input type="date" name="akhir" required class="w-full px-3 py-2 border rounded mb-4">

        <label class="inline-flex items-center mb-4">
            <input type="checkbox" name="is_active" class="form-checkbox">
            <span class="ml-2">Jadikan Tahun Aktif</span>
        </label>

        <div class="flex justify-end space-x-2">
            <button type="button" onclick="document.getElementById('createAkademikModal').close()" class="bg-gray-300 hover:bg-gray-400 px-3 py-1 rounded">Batal</button>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">Simpan</button>
        </div>
    </form>
</dialog>
@endsection
