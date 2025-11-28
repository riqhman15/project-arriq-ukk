@extends('layout.app')

@section('content')

<h3>Edit Kategori</h3>

<form action="{{ route('kategori.update', $data->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nama Kategori</label>
        <input type="text" name="nama" class="form-control" value="{{ $data->nama }}" required>
    </div>

    <button class="btn btn-primary">Update</button>
</form>

@endsection
