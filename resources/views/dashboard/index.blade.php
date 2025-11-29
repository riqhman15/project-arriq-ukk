@extends('layout.app')

@section('content')

<!-- BOOTSTRAP ICONS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

<style>
    body { background-color: #f2f2f2 !important; }

    .card-grey { 
        background: #e6e6e6; 
        border: none; 
        transition: 0.2s; 
        border-radius: 18px;
    }
    .card-grey:hover { 
        background: #dcdcdc; 
        transform: translateY(-5px);
    }

    .icon-circle-grey { 
        width: 70px; 
        height: 70px; 
        background: #cfcfcf; 
        border-radius: 50%; 
        display: flex; 
        justify-content: center; 
        align-items: center; 
    }

    .welcome-box {
        background: linear-gradient(145deg, #e4e4e4, #f5f5f5); 
        border-radius: 25px;
    }
</style>

<div class="py-4">
    <h2 class="mb-4 fw-bold text-secondary">Dashboard Dokumentasi Kasi PMD</h2>

    <div class="row g-4">
        <div class="col-md-6">
            <div class="card shadow-sm card-grey">
                <div class="card-body p-4 d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="fw-semibold text-secondary">Total Tempat</h5>
                        <h2 class="fw-bold text-dark">{{ $totalTempat }}</h2>
                    </div>
                    <div class="icon-circle-grey text-dark">
                        <i class="bi bi-geo-alt-fill fs-1"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm card-grey">
                <div class="card-body p-4 d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="fw-semibold text-secondary">Total Kategori</h5>
                        <h2 class="fw-bold text-dark">{{ $totalKategori }}</h2>
                    </div>
                    <div class="icon-circle-grey text-dark">
                        <i class="bi bi-tags-fill fs-1"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Dokumentasi Terbaru --}}
    @if(isset($recentFoto) && count($recentFoto) > 0)
        <h4 class="mt-5 mb-3 fw-bold text-secondary">Dokumentasi Terbaru</h4>
        <div class="row g-4">
            @foreach($recentFoto as $foto)
            <div class="col-6 col-md-4 col-lg-2">
                <div class="shadow-sm rounded-3 bg-white overflow-hidden">
                    <img src="{{ asset('storage/'.$foto->foto) }}" 
                         class="img-fluid" 
                         style="height: 130px; width: 100%; object-fit: cover;">
                    <div class="p-2 bg-light">
                        <h6 class="text-dark fw-semibold mb-1" style="font-size: 14px;">
                            {{ $foto->judul ?? 'Tidak ada judul' }}
                        </h6>
                        <p class="text-muted mb-0" style="font-size: 12px;">
                            {{ $foto->keterangan ?? 'Tidak ada keterangan' }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif

    <!-- WELCOME BOX -->
    <div class="mt-5 p-5 rounded-4 shadow-sm text-center welcome-box">
        <h3 class="fw-bold text-dark mb-3">Selamat Datang di Sistem Dokumentasi Kasi PMD</h3>
        <p class="text-muted fs-5 mb-3">
            Gunakan menu di atas untuk mengelola data tempat, kategori, dan dokumentasi.
        </p>
        <a href="{{ route('tempat.index') }}" class="btn btn-dark btn-lg px-4 rounded-pill shadow-sm">
            Mulai Kelola Data
        </a>
    </div>

</div>
@endsection
