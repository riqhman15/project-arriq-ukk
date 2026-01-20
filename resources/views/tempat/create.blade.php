@extends('layout.app')

@section('title', 'Tambah Tempat - DOKUMENTASI PMD')

@section('content')

<style>
    .form-card {
        background: white;
        border-radius: 20px;
        padding: 35px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border-left: 5px solid #667eea;
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
        background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%);
        border: none;
        color: white;
        font-weight: 600;
        padding: 12px 30px;
        border-radius: 12px;
    }

    .btn-submit:hover {
        background: linear-gradient(135deg, #27ba63 0%, #229954 100%);
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
</style>

<div class="form-header">
    <h2><i class="bi bi-file-earmark-plus"></i> Tambah Tempat Baru</h2>
    <p class="text-muted mt-2 mb-0">Tambahkan data tempat dan dokumentasi baru ke dalam sistem</p>
</div>

<div class="form-card">
    <form action="{{ route('tempat.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="nama" class="form-label">Nama Tempat <span class="text-danger">*</span></label>
            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" 
                   value="{{ old('nama') }}" required autofocus style="border-radius: 12px; padding: 12px 16px;">
            @error('nama') <small class="text-danger d-block mt-2"><i class="bi bi-exclamation-circle"></i> {{ $message }}</small> @enderror
        </div>

        <div class="mb-4">
            <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
            <input type="text" name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" 
                   value="{{ old('alamat') }}" required style="border-radius: 12px; padding: 12px 16px;">
            @error('alamat') <small class="text-danger d-block mt-2"><i class="bi bi-exclamation-circle"></i> {{ $message }}</small> @enderror
        </div>

        <div class="mb-4">
            <label for="kategori_id" class="form-label">Kategori <span class="text-danger">*</span></label>
            <select name="kategori_id" id="kategori_id" class="form-select @error('kategori_id') is-invalid @enderror" required style="border-radius: 12px; padding: 12px 16px;">
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama }}
                    </option>
                @endforeach
            </select>
            @error('kategori_id') <small class="text-danger d-block mt-2"><i class="bi bi-exclamation-circle"></i> {{ $message }}</small> @enderror
        </div>

        <div class="mb-4">
            <label for="foto" class="form-label">Foto <span class="text-danger">*</span></label>
            <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror" required accept="image/*" style="border-radius: 12px; padding: 12px 16px;">
            @error('foto') <small class="text-danger d-block mt-2"><i class="bi bi-exclamation-circle"></i> {{ $message }}</small> @enderror
        </div>

        <div class="mb-4">
            <label for="judul" class="form-label">Judul Foto (Caption)</label>
            <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul') }}" style="border-radius: 12px; padding: 12px 16px;">
        </div>

        <div class="mb-4">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control" rows="4" style="border-radius: 12px; padding: 12px 16px;">{{ old('keterangan') }}</textarea>
        </div>

        <div class="d-grid gap-3 d-sm-flex">
            <button type="submit" class="btn btn-submit flex-grow-1">
                <i class="bi bi-check-circle"></i> Simpan Tempat
            </button>
            <a href="{{ route('tempat.index') }}" class="btn btn-cancel flex-grow-1">
                <i class="bi bi-x-circle"></i> Batal
            </a>
        </div>
    </form>
</div>

@endsection
