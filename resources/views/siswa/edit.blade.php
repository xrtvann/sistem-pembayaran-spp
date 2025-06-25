@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Edit Data Siswa</h1>
    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('siswa._form', ['submit' => 'Update'])
    </form>
</div>
@endsection
