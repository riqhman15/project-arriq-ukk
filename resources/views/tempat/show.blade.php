@extends('layout.app')

@section('content')

<h3>Detail Tempat</h3>

<div class="card p-4">

    @if($tempat->foto)
    <img src="{{ asset('storage/'.$tempat->foto) }}" width="200" class="mb-3">
    @endif

    <h4>{{ $tempat->nama }}</h4>
    <p><strong>Alamat:</strong> {{ $tempat->alamat }}</p>
    <p><strong>Kategori:</strong> {{ $tempat->kategori->nama }}</p>

    <a href="{{ route('tempat.index') }}" class="btn btn-secondary">Kembali</a>

</div>

@endsection
