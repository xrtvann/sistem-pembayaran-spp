@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Tambah Data Siswa</h1>
    <form action="{{ route('siswa.store') }}" method="POST">
        @csrf
        @include('siswa._form', ['submit' => 'Simpan'])
    </form>
</div>
@endsection
