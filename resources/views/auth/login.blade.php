@extends('layout.app')

@section('content')

<style>
    body {
        background: #f0f2f5 !important;
    }

    .login-card {
        max-width: 420px;
        margin: 50px auto;
        padding: 35px;
        background: white;
        border-radius: 18px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .login-title {
        font-weight: 700;
        color: #333;
    }

    .form-control {
        border-radius: 12px;
        padding: 12px;
    }

    .btn-dark {
        border-radius: 12px;
        padding: 12px;
        font-weight: bold;
    }
</style>

<div class="container">
    <div class="login-card">

        <h3 class="text-center login-title mb-4">Login Admin</h3>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control"
                       placeholder="Masukkan email..." required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control"
                       placeholder="Masukkan password..." required>
            </div>

            <button type="submit" class="btn btn-dark w-100 mt-3">
                Login
            </button>
        </form>
    </div>
</div>

@endsection
