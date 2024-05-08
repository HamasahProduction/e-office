<div class="offcanvas-body pt-0 align-items-left">
    <ul class="navbar-nav mx-auto align-items-lg-left">
        <li class="nav-item dropdown">
            <a class="nav-link text-black" href="{{ route('lp.root') }}">Home</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" href="{{ route('lp.about') }}">About</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" href="{{ route('lp.dokumentasi') }}">Dokumentasi</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" href="{{ route('lp.landing-page.artikel.index') }}">Lembaga</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" href="{{ route('lp.landing-page.artikel.index') }}">Artikel</a>
        </li>
        @auth
        <li class="nav-item dropdown">
            <a class="nav-link" href="{{ route('lp.layanan-umum.layanan') }}">Administrasi</a>
        </li>
        
            <li class="nav-item dropdown">
                <a class="nav-link" href="{{ route('lp.warga.warga.dashboard') }}">Dashboard</a>
            </li>
        @endauth


    </ul>
    <div class="mt-3 mt-lg-0 d-flex align-items-center">
        @auth
            <a href="{{ route('lp.logout') }}" class="btn btn-outline-primary">Logout</a>
        @else
            <a href="{{ route('login-client') }}" class="btn btn-primary mx-2">Login</a>
        @endauth
    </div>
</div>
