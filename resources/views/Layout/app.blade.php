<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'DOKUMENTASI PMD')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --gray-light: #f5f6f7;
            --gray-medium: #e9ecef;
            --gray-dark: #d3d7dd;
        }

        body {
            background: linear-gradient(135deg, var(--gray-light) 0%, var(--gray-medium) 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #000 !important;
            font-weight: 500;
        }

        .navbar {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%) !important;
        }

        /* 🔥 DOKUMENTASI PMD JADI HITAM */
        .navbar-brand {
            font-size: 20px;
            font-weight: 700;
            color: #000 !important;
            text-shadow: 0 1px 2px rgba(255,255,255,0.4);
        }

        .container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            margin-top: 30px;
            margin-bottom: 30px;
            padding: 30px;
            backdrop-filter: blur(10px);
            color: #000 !important;
        }

        .alert {
            border-radius: 15px;
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            color: #000 !important;
            font-weight: 500;
        }

        .btn {
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .form-control,
        .form-select {
            border-radius: 12px;
            border: 1px solid var(--gray-dark);
            padding: 12px 16px;
            background-color: #fff;
            color: #000 !important;
            font-weight: 500;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
            color: #000 !important;
        }

        .table {
            border-radius: 12px;
            overflow: hidden;
            color: #000 !important;
        }

        .table thead {
            background: linear-gradient(135deg, #ecf0f1 0%, #d5dbdb 100%);
            color: #000 !important;
            font-weight: 700;
        }

        .table tbody td {
            color: #000 !important;
            font-weight: 500;
        }

        .table tbody tr:hover {
            background-color: #f9fafb;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        /* FORCE SEMUA TEKS HITAM */
        p, span, label, small, li, a {
            color: #000 !important;
            font-weight: 500;
        }

        h1, h2, h3, h4, h5, h6 {
            color: #000 !important;
            font-weight: 700;
        }

        ::placeholder {
            color: #555 !important;
        }
    </style>
</head>
<body>

    @auth
        @include('layout.navbar')
    @endauth

    <div class="container py-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
