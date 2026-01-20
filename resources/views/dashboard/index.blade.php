@extends('layout.app')

@section('title', 'Dashboard - DOKUMENTASI PMD')

@section('content')

<style>
    .dashboard-container {
        background: linear-gradient(135deg, #001059 0%, #f90000 100%);
        border-radius: 20px;
        padding: 40px;
        color: white;
        margin-bottom: 40px;
        box-shadow: 0 15px 40px rgba(102, 126, 234, 0.3);
    }

    .stat-card {
        background: white;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        border: none;
        position: relative;
        overflow: hidden;
    }

    .stat-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
    }

    .stat-card:nth-child(1) {
        border-left: 5px solid #3498db;
    }

    .stat-card:nth-child(2) {
        border-left: 5px solid #2ecc71;
    }

    .stat-number {
        font-size: 48px;
        font-weight: 700;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .stat-label {
        font-size: 16px;
        color: #7f8c8d;
        margin-top: 10px;
        font-weight: 500;
    }

    .foto-gallery {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    .foto-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .foto-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
    }

    .foto-card img {
        width: 100%;
        height: 180px;
        object-fit: cover;
        display: block;
    }

    .foto-info {
        padding: 15px;
    }

    .foto-title {
        font-weight: 600;
        font-size: 14px;
        color: #2c3e50;
        margin-bottom: 8px;
        line-height: 1.4;
    }

    .foto-desc {
        font-size: 12px;
        color: #95a5a6;
        line-height: 1.4;
    }

    .welcome-section {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        border-radius: 20px;
        padding: 50px;
        color: white;
        text-align: center;
        box-shadow: 0 15px 40px rgba(245, 87, 108, 0.3);
        margin-top: 40px;
    }

    .welcome-section h3 {
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .welcome-section p {
        font-size: 16px;
        opacity: 0.95;
        margin-bottom: 25px;
    }

    .btn-welcome {
        background: white;
        color: #f5576c;
        font-weight: 600;
        padding: 12px 30px;
        border-radius: 12px;
        margin: 0 10px;
        transition: all 0.3s ease;
    }

    .btn-welcome:hover {
        background: #f5576c;
        color: white;
        transform: translateY(-2px);
    }

    .section-title {
        font-size: 24px;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .section-title i {
        font-size: 28px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
</style>

<div class="dashboard-container">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h1 style="font-size: 36px; font-weight: 700; margin-bottom: 10px; color: #fff;">
                📊 Dashboard Dokumentasi
            </h1>
            <p style="font-size: 16px; opacity: 0.95; margin: 0; color: #fff;">
                Selamat datang di sistem manajemen dokumentasi Kasi PMD
            </p>
        </div>
        <div class="col-md-4 text-end" style="opacity: 0.3; font-size: 80px; color: #fff;">
            <i class="bi bi-speedometer2"></i>
        </div>
    </div>
</div>

{{-- Statistik Kartu --}}
<div class="row g-4 mb-5">
    <div class="col-md-6">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="stat-label">Total Tempat Dokumentasi</div>
                    <div class="stat-number">{{ $totalTempat }}</div>
                </div>
                <div style="font-size: 50px; opacity: 0.2;">
                    <i class="bi bi-geo-alt"></i>
                </div>
            </div>
            <p style="margin-top: 15px; color: #95a5a6; font-size: 13px;">
                Tempat yang telah terdokumentasi dalam sistem
            </p>
        </div>
    </div>

    <div class="col-md-6">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="stat-label">Total Kategori Acara</div>
                    <div class="stat-number">{{ $totalKategori }}</div>
                </div>
                <div style="font-size: 50px; opacity: 0.2;">
                    <i class="bi bi-tags"></i>
                </div>
            </div>
            <p style="margin-top: 15px; color: #95a5a6; font-size: 13px;">
                Jenis acara/kategori yang tersedia
            </p>
        </div>
    </div>
</div>

{{-- Dokumentasi Terbaru --}}
@if(isset($recentFoto) && count($recentFoto) > 0)
    <div class="mb-5">
        <h2 class="section-title">
            <i class="bi bi-images"></i> Dokumentasi Terbaru
        </h2>
        <div class="foto-gallery">
            @foreach($recentFoto as $foto)
            <div class="foto-card">
                <img src="{{ asset('storage/'.$foto->foto) }}" 
                     alt="{{ $foto->judul ?? 'Dokumentasi' }}"
                     onerror="this.src='https://via.placeholder.com/200x180?text=No+Image'">
                <div class="foto-info">
                    <div class="foto-title">
                        {{ $foto->judul ?? 'Tanpa Judul' }}
                    </div>
                    <div class="foto-desc">
                        {{ Str::limit($foto->keterangan ?? 'Tidak ada keterangan', 60) }}
                    </div>
                    <div style="margin-top: 10px;">
                        <span class="badge bg-info">{{ $foto->kategori->nama ?? 'Uncategorized' }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@else
    <div class="alert alert-info" role="alert">
        <i class="bi bi-info-circle"></i> Belum ada dokumentasi terbaru. 
        <a href="{{ route('tempat.create') }}" class="alert-link">Buat dokumentasi baru sekarang</a>
    </div>
@endif

{{-- Welcome Box --}}
<div class="welcome-section">
    <h3><i class="bi bi-rocket-takeoff"></i> Mulai Mengelola Dokumentasi</h3>
    <p>Gunakan fitur di bawah untuk menambah dan mengelola data dokumentasi tempat serta kategori acara Anda</p>
    <div>
        <a href="{{ route('tempat.index') }}" class="btn btn-welcome">
            <i class="bi bi-file-earmark"></i> Kelola Tempat
        </a>
        <a href="{{ route('kategori.index') }}" class="btn btn-welcome">
            <i class="bi bi-tag"></i> Kelola Kategori
        </a>
    </div>
</div>

@endsection
