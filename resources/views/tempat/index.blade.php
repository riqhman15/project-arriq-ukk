@extends('layout.app')

@section('title', 'Daftar Tempat - DOKUMENTASI PMD')

@section('content')

<style>
    .page-header {
        background: linear-gradient(135deg, #ecf0f1 0%, #d5dbdb 100%);
        border-radius: 20px;
        padding: 30px;
        margin-bottom: 30px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    }

    .filter-card {
        background: white;
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        margin-bottom: 25px;
    }

    .btn-gradient-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        color: white;
    }

    .btn-gradient-primary:hover {
        background: linear-gradient(135deg, #5568d3 0%, #6a3f91 100%);
        color: white;
    }

    .btn-success-gradient {
        background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%);
        border: none;
        color: white;
    }

    .btn-success-gradient:hover {
        background: linear-gradient(135deg, #27ba63 0%, #229954 100%);
        color: white;
    }

    .card-tempat {
        background: white;
        border-radius: 15px;
        border: none;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    }

    .table-hover tbody tr:hover {
        background-color: #f9fafb;
    }
</style>

<div class="page-header">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h1 class="mb-2 fw-bold" style="font-size: 32px; color: #000;">
                <i class="bi bi-file-earmark"></i> Daftar Tempat Dokumentasi
            </h1>
            <p class="text-dark mb-0">Kelola semua data tempat dan dokumentasi yang sudah diabadikan</p>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('tempat.create') }}" class="btn btn-success-gradient btn-lg">
                <i class="bi bi-plus-circle"></i> Tempat Baru
            </a>
        </div>
    </div>
</div>

{{-- Form Filter & Search --}}
<div class="filter-card">
    <form action="{{ route('tempat.index') }}" method="GET" class="row g-3">
        <div class="col-md-4">
            <label class="form-label fw-semibold text-muted">Cari Nama Tempat</label>
            <input type="text" name="search" class="form-control" placeholder="Ketik nama tempat..." value="{{ request('search') }}" style="border-radius: 12px;">
        </div>

        <div class="col-md-4">
            <label class="form-label fw-semibold text-muted">Filter Kategori</label>
            <select name="kategori" class="form-select" style="border-radius: 12px;">
                <option value="">Semua Kategori</option>
                @foreach($kategori as $k)
                    <option value="{{ $k->id }}" {{ request('kategori') == $k->id ? 'selected' : '' }}>
                        {{ $k->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4 d-flex align-items-end gap-2">
            <button type="submit" class="btn btn-gradient-primary w-100" style="border-radius: 12px;">
                <i class="bi bi-search"></i> Filter
            </button>
            <a href="{{ route('tempat.index') }}" class="btn btn-secondary w-100" style="border-radius: 12px;">Reset</a>
        </div>
    </form>
</div>

{{-- Notifikasi sukses --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 15px; border: none; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
        <i class="bi bi-check-circle"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

{{-- Tabel Daftar Tempat --}}
<div class="card-tempat">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead style="background: linear-gradient(135deg, #ecf0f1 0%, #d5dbdb 100%);">
                <tr>
                    <th style="border-top-left-radius: 15px; color: #2c3e50; font-weight: 600; width: 5%;">#</th>
                    <th style="color: #2c3e50; font-weight: 600; width: 10%;">Foto</th>
                    <th style="color: #2c3e50; font-weight: 600; width: 15%;">Nama</th>
                    <th style="color: #2c3e50; font-weight: 600; width: 15%;">Alamat</th>
                    <th style="color: #2c3e50; font-weight: 600; width: 10%;">Kategori</th>
                    <th style="color: #2c3e50; font-weight: 600; width: 15%;">Judul</th>
                    <th style="border-top-right-radius: 15px; color: #2c3e50; font-weight: 600; width: 15%; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tempats as $index => $tempat)
                    <tr>
                        <td style="color: #7f8c8d; font-weight: 600;">{{ $index + 1 }}</td>
                        <td>
                            @if($tempat->foto)
                                <img src="{{ asset('storage/'.$tempat->foto) }}" alt="{{ $tempat->nama }}" 
                                     class="img-thumbnail" style="height:50px; width:50px; object-fit:cover; border-radius: 8px;">
                            @else
                                <span class="text-muted" style="font-size: 12px;">Tidak ada</span>
                            @endif
                        </td>
                        <td style="color: #2c3e50; font-weight: 500;">
                            <i class="bi bi-geo-alt" style="color: #e74c3c;"></i> {{ $tempat->nama }}
                        </td>
                        <td style="color: #7f8c8d;">{{ Str::limit($tempat->alamat, 30) }}</td>
                        <td>
                            <span class="badge bg-info">{{ $tempat->kategori->nama ?? '-' }}</span>
                        </td>
                        <td style="color: #95a5a6; font-size: 13px;">
                            {{ $tempat->judul ?? '-' }}
                        </td>
                        <td style="text-align: center;">
                            <a href="{{ route('tempat.edit', $tempat->id) }}" class="btn btn-sm btn-warning" style="border-radius: 8px;">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('tempat.destroy', $tempat->id) }}" method="POST" class="d-inline" 
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" style="border-radius: 8px;">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align: center; padding: 40px; color: #95a5a6;">
                            <i class="bi bi-inbox" style="font-size: 48px; margin-bottom: 15px; display: block; opacity: 0.3;"></i>
                            <p style="margin: 0;">Belum ada data tempat yang ditambahkan</p>
                            <a href="{{ route('tempat.create') }}" class="btn btn-success-gradient btn-sm mt-3">
                                <i class="bi bi-plus"></i> Tambah Tempat
                            </a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
