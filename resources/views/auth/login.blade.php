@extends('layout.app')

@section('title', 'Login Admin - DOKUMENTASI PMD')

@section('content')

<style>
    body {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
    }
    .login-card {
        max-width: 420px;
        margin: 80px auto;
        padding: 40px;
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.2);
    }
    .login-title {
        font-weight: 700;
        color: #333;
        font-size: 28px;
    }
    .form-control, .form-control:focus {
        border-radius: 12px;
        padding: 12px 16px;
        border: 1px solid #ddd;
    }
    .form-control:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
    }
    .btn-login {
        border-radius: 12px;
        padding: 12px 24px;
        font-weight: 600;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
    }
    .btn-login:hover {
        background: linear-gradient(135deg, #5568d3 0%, #6a3f91 100%);
    }
</style>

<div class="login-card">
    <h2 class="text-center login-title mb-4">🔐 Login Admin</h2>

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Login Gagal!</strong>
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form action="{{ route('login.post') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label fw-semibold">Email Admin</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                   placeholder="admin@example.com" value="{{ old('email') }}" required autofocus>
            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="form-label fw-semibold">Password</label>
            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror"
                   placeholder="••••••••" required>
            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-login w-100 text-white">
            Login
        </button>
    </form>

    <div class="mt-4 p-3 bg-light rounded-2 text-center">
        <small class="text-muted">
            <strong>Demo Credentials:</strong><br>
            Email: admin@example.com<br>
            Password: admin123
        </small>
    </div>
</div>

@endsection
