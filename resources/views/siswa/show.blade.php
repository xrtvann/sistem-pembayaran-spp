@extends('layouts.app')
@section('content')
    <div class="container mx-auto px-4 py-6 max-w-4xl">
        <div
            class="bg-white rounded-xl shadow-sm p-6 md:p-8 border border-gray-100 hover:shadow-md transition-shadow duration-300">
            <h1 class="text-2xl font-bold text-gray-800 mb-6 pb-4 border-b border-gray-200">Detail Siswa</h1>

            <div class="grid gap-4">
                <div class="flex flex-col md:flex-row">
                    <span class="w-full md:w-48 text-gray-500 font-medium mb-1 md:mb-0">NIS</span>
                    <span class="flex-1 text-gray-700">{{ $siswa->nis }}</span>
                </div>
                <div class="flex flex-col md:flex-row">
                    <span class="w-full md:w-48 text-gray-500 font-medium mb-1 md:mb-0">NISN</span>
                    <span class="flex-1 text-gray-700">{{ $siswa->nisn }}</span>
                </div>
                <div class="flex flex-col md:flex-row">
                    <span class="w-full md:w-48 text-gray-500 font-medium mb-1 md:mb-0">Nama</span>
                    <span class="flex-1 text-gray-700">{{ $siswa->nama }}</span>
                </div>
                <div class="flex flex-col md:flex-row">
                    <span class="w-full md:w-48 text-gray-500 font-medium mb-1 md:mb-0">Jenis Kelamin</span>
                    <span class="flex-1 text-gray-700">{{ $siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</span>
                </div>
                <div class="flex flex-col md:flex-row">
                    <span class="w-full md:w-48 text-gray-500 font-medium mb-1 md:mb-0">Tempat/Tanggal Lahir</span>
                    <span class="flex-1 text-gray-700">{{ $siswa->tempat_lahir }}, {{ $siswa->tanggal_lahir }}</span>
                </div>
                <div class="flex flex-col md:flex-row">
                    <span class="w-full md:w-48 text-gray-500 font-medium mb-1 md:mb-0">Alamat</span>
                    <span class="flex-1 text-gray-700">{{ $siswa->alamat }}</span>
                </div>
                <div class="flex flex-col md:flex-row">
                    <span class="w-full md:w-48 text-gray-500 font-medium mb-1 md:mb-0">Nama Orang Tua</span>
                    <span class="flex-1 text-gray-700">{{ $siswa->nama_orang_tua }}</span>
                </div>
                <div class="flex flex-col md:flex-row">
                    <span class="w-full md:w-48 text-gray-500 font-medium mb-1 md:mb-0">No HP</span>
                    <span class="flex-1 text-gray-700">{{ $siswa->no_hp }}</span>
                </div>
                <div class="flex justify-end items-center">
                    {!! QrCode::size(160)->generate("NIS: {$nis}\nNISN: {$nisn}") !!}
                </div>
            </div>

            <div class="mt-8 text-center">
                <a href="{{ route('siswa.index') }}"
                    class="inline-block px-5 py-2 bg-gray-50 text-gray-700 rounded-lg border border-gray-200 hover:bg-gray-100 hover:border-gray-300 transition-colors duration-200">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
            </div>
        </div>
    </div>
@endsection
