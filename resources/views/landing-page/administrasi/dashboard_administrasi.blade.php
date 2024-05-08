@extends('landing-page.layout.main')
@section('title')
    Administrasi
@endsection

@section('content')
    <section class="py-lg-7 py-5 bg-light-subtle">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="collapse d-flex align-items-left mb-4 justify-content-left justify-content-md-start">
                        <div class="ms-3">
                            <h5 class="mb-0">Silahkan Pilih</h5>
                            <small>Kebutuhan Administrasi</small>
                        </div>
                    </div>
                    <div class="d-md-none text-center d-grid">
                        <button class="btn btn-light mb-3 d-flex align-items-center justify-content-between" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseAccountMenu" aria-expanded="false"
                            aria-controls="collapseAccountMenu">
                            Pilih Administrasi
                            <i class="bi bi-chevron-down ms-2"></i>
                        </button>
                    </div>
                    <div class="collapsed d-md-block" id="collapseAccountMenu">
                        <div class="card border-0 shadow-sm mb-4">
                            <ul class="nav flex-column nav-account mt-5 mb-5">
                                <li class="nav-item">
                                    <a class="nav-link" href="">
                                        <span class="ms-2">Administrasi Umum</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="">
                                        <span class="ms-2">Administrasi Penduduk</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="">
                                        <span class="ms-2">Administrasi Kelembagaan</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="">
                                        <span class="ms-2">Layanan Umum</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="">
                                        <span class="ms-2">Layanan Nikah</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                @yield('content-administrasi')
            </div>
        </div>
    </section>
@endsection
