@extends('layout.app')

@section('title', 'Edit Tempat - DOKUMENTASI PMD')

@section('content')

<style>
    .form-card {
        background: white;
        border-radius: 20px;
        padding: 35px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border-left: 5px solid #f39c12;
    }

    .form-header {
        background: linear-gradient(135deg, #ecf0f1 0%, #d5dbdb 100%);
        border-radius: 15px;
        padding: 25px;
        margin-bottom: 30px;
    }

    .form-header h2 {
        color: #000;
        font-weight: 700;
        margin: 0;
    }

    .form-label {
        color: #000;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .btn-submit {
        background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);
        border: none;
        color: white;
        font-weight: 600;
        padding: 12px 30px;
        border-radius: 12px;
    }

    .btn-submit:hover {
        background: linear-gradient(135deg, #e8921b 0%, #d35400 100%);
        color: white;
    }

    .btn-cancel {
        background: linear-gradient(135deg, #bdc3c7 0%, #95a5a6 100%);
        border: none;
        color: white;
        font-weight: 600;
        padding: 12px 30px;
        border-radius: 12px;
    }

    .btn-cancel:hover {
        background: linear-gradient(135deg, #a9acb1 0%, #7f8c8d 100%);
        color: white;
    }

    .img-preview {
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
</style>

<div class="form-header">
    <h2><i class="bi bi-pencil-square"></i> Edit Tempat</h2>
    <p class="text-muted mt-2 mb-0">Perbarui data tempat dan dokumentasi yang sudah ada</p>
</div>

<div class="form-card">
    <form action="{{ route('tempat.update', $tempat->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nama" class="form-label">Nama Tempat <span class="text-danger">*</span></label>
            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" 
                   value="{{ old('nama', $tempat->nama) }}" required autofocus style="border-radius: 12px; padding: 12px 16px;">
            @error('nama') <small class="text-danger d-block mt-2"><i class="bi bi-exclamation-circle"></i> {{ $message }}</small> @enderror
        </div>

        <div class="mb-4">
            <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
            <input type="text" name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" 
                   value="{{ old('alamat', $tempat->alamat) }}" required style="border-radius: 12px; padding: 12px 16px;">
            @error('alamat') <small class="text-danger d-block mt-2"><i class="bi bi-exclamation-circle"></i> {{ $message }}</small> @enderror
        </div>

        <div class="mb-4">
            <label for="kategori_id" class="form-label">Kategori <span class="text-danger">*</span></label>
            <select name="kategori_id" id="kategori_id" class="form-select @error('kategori_id') is-invalid @enderror" required style="border-radius: 12px; padding: 12px 16px;">
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ old('kategori_id', $tempat->kategori_id) == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama }}
                    </option>
                @endforeach
            </select>
            @error('kategori_id') <small class="text-danger d-block mt-2"><i class="bi bi-exclamation-circle"></i> {{ $message }}</small> @enderror
        </div>

        <div class="mb-4">
            <label for="foto" class="form-label">Foto</label>
            @if($tempat->foto)
                <div class="mb-3">
                    <img src="{{ asset('storage/'.$tempat->foto) }}" alt="Foto Tempat" class="img-preview" style="height: 150px; width: 150px; object-fit: cover;">
                    <p class="small text-muted mt-2">Foto saat ini</p>
                </div>
            @endif
            <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*" style="border-radius: 12px; padding: 12px 16px;">
            <small class="text-muted">Biarkan kosong jika tidak ingin mengganti foto</small>
            @error('foto') <small class="text-danger d-block mt-2"><i class="bi bi-exclamation-circle"></i> {{ $message }}</small> @enderror
        </div>

        <div class="mb-4">
            <label for="judul" class="form-label">Judul Foto (Caption)</label>
            <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul', $tempat->judul) }}" style="border-radius: 12px; padding: 12px 16px;">
        </div>

        <div class="mb-4">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control" rows="4" style="border-radius: 12px; padding: 12px 16px;">{{ old('keterangan', $tempat->keterangan) }}</textarea>
        </div>

        <div class="d-grid gap-3 d-sm-flex">
            <button type="submit" class="btn btn-submit flex-grow-1">
                <i class="bi bi-check-circle"></i> Update Tempat
            </button>
            <a href="{{ route('tempat.index') }}" class="btn btn-cancel flex-grow-1">
                <i class="bi bi-x-circle"></i> Batal
            </a>
        </div>
    </form>
</div>

@endsection
