<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">

        <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
            📁 Dokumentasi PMD
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}"
                       href="{{ route('dashboard') }}">Dashboard</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('tempat*') ? 'active' : '' }}"
                       href="{{ route('tempat.index') }}">Dokumentasi</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('kategori*') ? 'active' : '' }}"
                       href="{{ route('kategori.index') }}">Acara</a>
                </li>
            </ul>

            @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-outline-light btn-sm px-3">Logout</button>
            </form>
            @endauth

        </div>
    </div>
</nav>
