@extends('layout.app')

@section('content')

<h3>Tambah Kategori</h3>

<form action="{{ route('kategori.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Nama Kategori</label>
        <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Judul / Caption</label>
        <input type="text" name="judul" class="form-control">
    </div>

    <div class="mb-3">
        <label>Keterangan</label>
        <textarea name="keterangan" class="form-control" rows="3"></textarea>
    </div>

    <button class="btn btn-primary">Simpan</button>
</form>

@endsection
