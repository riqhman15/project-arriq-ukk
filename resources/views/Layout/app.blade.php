<!DOCTYPE html>
<html>
<head>
    <title>Dokumentasi Tempat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <style>
    .icon-circle {
        width: 70px;
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
    }
    .dashboard-card {
        transition: 0.2s ease;
    }
    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }
</style>


@include('layout.navbar') {{-- pastikan file navbar ada --}}

<div class="container mt-3">
    @yield('content')
</div>

</body>
</html>
