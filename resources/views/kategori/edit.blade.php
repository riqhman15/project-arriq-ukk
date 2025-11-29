@extends('layout.app')

@section('content')
<div class="container">

    <h3 class="mb-3">Edit Kategori</h3>

    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Kategori</label>
            <input type="text" name="nama" class="form-control" value="{{ $kategori->nama }}" required>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
    </form>

</div>
@endsection
