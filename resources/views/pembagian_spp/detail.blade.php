@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Detail Siswa dalam Kelas</h1>

    @if($pembagian->isEmpty())
        <p class="text-gray-600">Belum ada siswa yang ditambahkan.</p>
    @else
        <table class="w-full table-auto border text-sm mb-4">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-2 py-1">NIS</th>
                    <th class="border px-2 py-1">NISN</th>
                    <th class="border px-2 py-1">Nama</th>
                    <th class="border px-2 py-1">Kelas</th>
                    <th class="border px-2 py-1">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pembagian as $item)
                <tr>
                    <td class="border px-2 py-1 text-center">{{ $item->siswa->nis }}</td>
                    <td class="border px-2 py-1 text-center">{{ $item->siswa->nisn }}</td>
                    <td class="border px-2 py-1">{{ $item->siswa->nama }}</td>
                    <td class="border px-2 py-1 text-center">{{ $item->kelas->nama_kelas }}</td>
                    <td class="border px-2 py-1 text-center">
                        <form action="{{ route('pembagian_spp.hapus_siswa', $item->id_pembagian) }}" method="POST" onsubmit="return confirm('Yakin hapus siswa ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800">X</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <div class="flex justify-end">
        <a href="{{ route('pembagian_spp.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
            Kembali
        </a>
    </div>
</div>
@endsection