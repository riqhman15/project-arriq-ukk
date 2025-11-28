@extends('layout.app')

@section('content')
<div class="py-4">
    <h2 class="mb-4 fw-bold text-secondary">Daftar Tempat</h2>

    {{-- Form Filter & Search --}}
    <form action="{{ route('tempat.index') }}" method="GET" class="row mb-4 g-3">
        <div class="col-md-4">
            <input type="text" name="search" class="form-control" placeholder="Cari Nama Tempat" value="{{ request('search') }}">
        </div>

        <div class="col-md-4">
            <select name="kategori" class="form-select">
                <option value="">Semua Kategori</option>
                @foreach($kategori as $k)
                    <option value="{{ $k->id }}" {{ request('kategori') == $k->id ? 'selected' : '' }}>
                        {{ $k->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <button class="btn btn-primary">Filter</button>
            <a href="{{ route('tempat.index') }}" class="btn btn-secondary">Reset</a>
        </div>
    </form>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Tabel Daftar Tempat --}}
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Judul Foto</th>
                    <th>Keterangan</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tempats as $index => $tempat)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            @if($tempat->foto)
                                <img src="{{ asset('storage/'.$tempat->foto) }}" alt="Foto" style="height:60px; width:60px; object-fit:cover;">
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $tempat->nama }}</td>
                        <td>{{ $tempat->alamat }}</td>
                        <td>{{ $tempat->judul ?? '-' }}</td>
                        <td>{{ $tempat->keterangan ?? '-' }}</td>
                        <td>{{ $tempat->kategori->nama ?? '-' }}</td>
                        <td>
                            <a href="{{ route('tempat.edit', $tempat->id) }}" class="btn btn-sm btn-warning mb-1">Edit</a>
                            <form action="{{ route('tempat.destroy', $tempat->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Tidak ada data tempat</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Tambah Tempat --}}
    <a href="{{ route('tempat.create') }}" class="btn btn-success mt-3">Tambah Tempat</a>
</div>
@endsection
