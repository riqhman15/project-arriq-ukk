@extends('layout.app')

@section('title', 'Data Kategori - DOKUMENTASI PMD')

@section('content')

<style>
    .page-header {
        background: linear-gradient(135deg, #ecf0f1 0%, #d5dbdb 100%);
        border-radius: 20px;
        padding: 30px;
        margin-bottom: 30px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
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

    .card-kategori {
        background: white;
        border-radius: 15px;
        border: none;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
    }

    .card-kategori:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    }

    .table-hover tbody tr:hover {
        background-color: #f9fafb;
    }
</style>

<div class="page-header">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h1 class="mb-2 fw-bold" style="font-size: 32px; color: #000;">
                <i class="bi bi-tag"></i> Manajemen Kategori
            </h1>
            <p class="text-dark mb-0">Kelola semua kategori acara dalam sistem dokumentasi</p>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('kategori.create') }}" class="btn btn-gradient-primary btn-lg">
                <i class="bi bi-plus-circle"></i> Kategori Baru
            </a>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 15px; border: none; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
        <i class="bi bi-check-circle"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card-kategori">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead style="background: linear-gradient(135deg, #ecf0f1 0%, #d5dbdb 100%);">
                <tr>
                    <th style="border-top-left-radius: 15px; color: #2c3e50; font-weight: 600;">#</th>
                    <th style="color: #2c3e50; font-weight: 600;">Nama Kategori</th>
                    <th style="color: #2c3e50; font-weight: 600;">Judul</th>
                    <th style="color: #2c3e50; font-weight: 600;">Keterangan</th>
                    <th style="border-top-right-radius: 15px; color: #2c3e50; font-weight: 600; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kategoris as $index => $item)
                <tr>
                    <td style="color: #7f8c8d; font-weight: 600;">{{ $index + 1 }}</td>
                    <td>
                        <span style="color: #2c3e50; font-weight: 600; font-size: 15px;">
                            <i class="bi bi-folder" style="color: #f39c12;"></i> {{ $item->nama }}
                        </span>
                    </td>
                    <td style="color: #7f8c8d;">{{ $item->judul ?? '-' }}</td>
                    <td style="color: #95a5a6;">
                        {{ Str::limit($item->keterangan ?? '-', 50) }}
                    </td>
                    <td style="text-align: center;">
                        <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-sm btn-warning" style="border-radius: 8px;">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <form action="{{ route('kategori.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" style="border-radius: 8px;" onclick="return confirm('Yakin hapus kategori ini?')">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align: center; padding: 40px; color: #95a5a6;">
                        <i class="bi bi-inbox" style="font-size: 48px; margin-bottom: 15px; display: block; opacity: 0.3;"></i>
                        <p style="margin: 0;">Belum ada kategori yang dibuat</p>
                        <a href="{{ route('kategori.create') }}" class="btn btn-gradient-primary btn-sm mt-3">
                            <i class="bi bi-plus"></i> Buat Kategori Pertama
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
