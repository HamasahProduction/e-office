<!-- Header -->
<div class="header">

    <!-- Logo -->
    {{-- <div class="header-left">
        <a href="{{ route('app.dashboard.redirect') }}" class="logo" > 
            <img src="{{ URL::asset('logo/logo2.png') }}" width="200" alt="Logo">
        </a>
    </div> --}}
    <!-- /Logo -->
    <a id="toggle_btn" href="javascript:void(0);">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>

    <!-- Header Title -->
    <div class="page-title-box">
        <h3>
            PEMERINTAH DESA CIMARA
        </h3>
    </div>
    <!-- /Header Title -->

    <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

    <!-- Header Menu -->
    <ul class="nav user-menu">
        <li class="nav-item dropdown has-arrow main-drop">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <span>{{ auth()->user()->name }}</span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('app.profile') }}">Profil</a>
                <a class="dropdown-item" href="{{ route('app.logout') }}">Logout</a>
            </div>
        </li>
    </ul>
    <!-- /Header Menu -->

    <!-- Mobile Menu -->
    <div class="dropdown mobile-user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i
                class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{ route('app.profile') }}">Profil</a>
            <a class="dropdown-item" href="{{ route('app.login') }}">Logout</a>
        </div>
    </div>
    <!-- /Mobile Menu -->
</div>
<!-- /Header -->
