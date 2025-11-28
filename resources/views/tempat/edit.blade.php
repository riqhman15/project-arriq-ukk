@extends('layout.app')

@section('content')
<div class="py-4">
    <h2 class="mb-4 fw-bold text-secondary">Edit Tempat</h2>

    <form action="{{ route('tempat.update', $tempat->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Tempat</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $tempat->nama) }}" required>
            @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" value="{{ old('alamat', $tempat->alamat) }}" required>
            @error('alamat') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="kategori_id" class="form-label">Kategori</label>
            <select name="kategori_id" id="kategori_id" class="form-select" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ old('kategori_id', $tempat->kategori_id) == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama }}
                    </option>
                @endforeach
            </select>
            @error('kategori_id') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto (Biarkan kosong jika tidak diganti)</label>
            <input type="file" name="foto" id="foto" class="form-control">
            @error('foto') <small class="text-danger">{{ $message }}</small> @enderror
            @if($tempat->foto)
                <img src="{{ asset('storage/'.$tempat->foto) }}" class="img-thumbnail mt-2" style="height:100px;">
            @endif
        </div>

        <div class="mb-3">
            <label for="judul" class="form-label">Judul Foto (Caption)</label>
            <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul', $tempat->judul) }}">
            @error('judul') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control" rows="3">{{ old('keterangan', $tempat->keterangan) }}</textarea>
            @error('keterangan') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Tempat</button>
        <a href="{{ route('tempat.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
