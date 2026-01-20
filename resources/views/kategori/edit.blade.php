@extends('layout.app')

@section('title', 'Edit Kategori - DOKUMENTASI PMD')

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
</style>

<div class="form-header">
    <h2><i class="bi bi-pencil-square"></i> Edit Kategori</h2>
    <p class="text-muted mt-2 mb-0">Perbarui data kategori yang sudah ada</p>
</div>

<div class="form-card">
    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nama" class="form-label">Nama Kategori <span class="text-danger">*</span></label>
            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" 
                   value="{{ old('nama', $kategori->nama) }}" required autofocus style="border-radius: 12px; padding: 12px 16px;">
            @error('nama') <small class="text-danger d-block mt-2"><i class="bi bi-exclamation-circle"></i> {{ $message }}</small> @enderror
        </div>

        <div class="mb-4">
            <label for="judul" class="form-label">Judul / Caption</label>
            <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" 
                   value="{{ old('judul', $kategori->judul) }}" style="border-radius: 12px; padding: 12px 16px;">
            @error('judul') <small class="text-danger d-block mt-2"><i class="bi bi-exclamation-circle"></i> {{ $message }}</small> @enderror
        </div>

        <div class="mb-4">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" rows="4" style="border-radius: 12px; padding: 12px 16px;">{{ old('keterangan', $kategori->keterangan) }}</textarea>
            @error('keterangan') <small class="text-danger d-block mt-2"><i class="bi bi-exclamation-circle"></i> {{ $message }}</small> @enderror
        </div>

        <div class="d-grid gap-3 d-sm-flex">
            <button type="submit" class="btn btn-submit flex-grow-1">
                <i class="bi bi-check-circle"></i> Update Kategori
            </button>
            <a href="{{ route('kategori.index') }}" class="btn btn-cancel flex-grow-1">
                <i class="bi bi-x-circle"></i> Batal
            </a>
        </div>
    </form>
</div>

@endsection
