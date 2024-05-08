@extends('landing-page.layout.main')
@section('title')
    Pemerintahan Desa
@endsection

@section('content')

    <!--Hero start-->
    <section class="bg-success pt-9 right-slant-shape" data-cue="fadeIn">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-12">
                    <div class="text-center text-lg-start mb-7 mb-lg-0" data-cues="slideInDown">
                        <div class="mb-4">
                            <h1 class="mb-5 display-5 text-white-stable">
                                Pemerintahan Desa mempersembahkan
                                <span class="text-pattern-line text-warning">Pelayanan Administrasi Online</span>
                            </h1>
                            <p class="mb-0 text-white-stable lead">proses administrasi dan informasi lebih mudah untuk
                                kebutuhan
                                masyarakat.</p>
                        </div>
                        <div data-cues="slideInDown">
                            <a href="{{ route('lp.layanan-umum.layanan') }}" class="btn btn-outline-warning">Buat Permohonan Administrasi</a>
                        </div>
                    </div>
                </div>
                <div class="offset-lg-1 col-lg-6 col-12">
                    <div class="position-relative z-1 pt-lg-9" data-cue="slideInRight">
                        <div class="position-relative">
                            <img src="{{ asset('landings/assets/images/hero-image/bg-hero-image.jpg') }}" alt="video"
                                class="img-fluid rounded-3" width="837" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Hero start-->

    @include('landing-page.statistik_penduduk')

    <!--Our solutions start-->
    <section class="py-xl-9 py-5 bg-light mt-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-md-7" data-cue="fadeIn">
                    <div class="mb-xl-7 mb-5">
                        <small class="text-uppercase ls-md fw-semibold">pelayanan digital</small>
                        <h2 class="h1 mb-3 mt-4">Akses Administrasi Desa Jadi Lebih Mudah</h2>
                        <p class="mb-0 text-body">pemerintahan desa cimara kecamatan cibingbin kabupaten kuningan memberikan
                            kemudahan masyarakat melalui pelayanan administrasi digital.</p>
                    </div>
                </div>
            </div>
            <div class="row g-4" data-cue="fadeIn">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="card card-lift h-100" data-cue="zoomIn" data-duration="500">
                        <div class="card-body p-5">
                            <div class="d-lg-flex">
                                <div
                                    class="p-3 icon-xl icon-shape rounded bg-success bg-opacity-10 border border-success-subtle">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" class="bi bi-braces-asterisk text-success" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M1.114 8.063V7.9c1.005-.102 1.497-.615 1.497-1.6V4.503c0-1.094.39-1.538 1.354-1.538h.273V2h-.376C2.25 2 1.49 2.759 1.49 4.352v1.524c0 1.094-.376 1.456-1.49 1.456v1.299c1.114 0 1.49.362 1.49 1.456v1.524c0 1.593.759 2.352 2.372 2.352h.376v-.964h-.273c-.964 0-1.354-.444-1.354-1.538V9.663c0-.984-.492-1.497-1.497-1.6ZM14.886 7.9v.164c-1.005.103-1.497.616-1.497 1.6v1.798c0 1.094-.39 1.538-1.354 1.538h-.273v.964h.376c1.613 0 2.372-.759 2.372-2.352v-1.524c0-1.094.376-1.456 1.49-1.456v-1.3c-1.114 0-1.49-.362-1.49-1.456V4.352C14.51 2.759 13.75 2 12.138 2h-.376v.964h.273c.964 0 1.354.444 1.354 1.538V6.3c0 .984.492 1.497 1.497 1.6ZM7.5 11.5V9.207l-1.621 1.621-.707-.707L6.792 8.5H4.5v-1h2.293L5.172 5.879l.707-.707L7.5 6.792V4.5h1v2.293l1.621-1.621.707.707L9.208 7.5H11.5v1H9.207l1.621 1.621-.707.707L8.5 9.208V11.5h-1Z" />
                                    </svg>
                                </div>

                                <div class="ms-lg-5 mt-4 mt-lg-0">
                                    <div class="mb-4">
                                        <h3>Kependudukan</h3>
                                        <p class="mb-0">fitur ini berisi informasi kependudukan desa cimara kecamatan
                                            cibingin kabupaten kuningan.</p>
                                    </div>

                                    <a href="#!" class="icon-link icon-link-hover">
                                        Lihat
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="card card-lift h-100" data-cue="zoomIn" data-duration="800">
                        <div class="card-body p-5">
                            <div class="d-lg-flex">
                                <div
                                    class="p-3 icon-xl icon-shape rounded bg-primary bg-opacity-10 border border-primary-subtle">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120"
                                        fill="currentColor" class="bi bi-vector-pen text-primary" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M10.646.646a.5.5 0 0 1 .708 0l4 4a.5.5 0 0 1 0 .708l-1.902 1.902-.829 3.313a1.5 1.5 0 0 1-1.024 1.073L1.254 14.746 4.358 4.4A1.5 1.5 0 0 1 5.43 3.377l3.313-.828L10.646.646zm-1.8 2.908-3.173.793a.5.5 0 0 0-.358.342l-2.57 8.565 8.567-2.57a.5.5 0 0 0 .34-.357l.794-3.174-3.6-3.6z" />
                                        <path fill-rule="evenodd"
                                            d="M2.832 13.228 8 9a1 1 0 1 0-1-1l-4.228 5.168-.026.086.086-.026z" />
                                    </svg>
                                </div>
                                <div class="ms-lg-5 mt-4 mt-lg-0">
                                    <div class="mb-4">
                                        <h3>Permohonan Administrasi</h3>
                                        <p class="mb-0">masyarakat dapat mengajukan permohonan administrasi lebih cepat
                                            dengan menggunakan fitur permohonan administrasi.</p>
                                    </div>

                                    <a href="{{ route('lp.layanan-umum.layanan') }}" class="icon-link icon-link-hover">
                                        Lihat
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="card card-lift h-100" data-cue="zoomIn" data-duration="800">
                        <div class="card-body p-5">
                            <div class="d-lg-flex">
                                <div
                                    class="p-3 icon-xl icon-shape rounded bg-warning bg-opacity-10 border border-warning-subtle">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" class="bi bi-palette2 text-warning" viewBox="0 0 16 16">
                                        <path
                                            d="M0 .5A.5.5 0 0 1 .5 0h5a.5.5 0 0 1 .5.5v5.277l4.147-4.131a.5.5 0 0 1 .707 0l3.535 3.536a.5.5 0 0 1 0 .708L10.261 10H15.5a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-.5.5H3a2.99 2.99 0 0 1-2.121-.879A2.99 2.99 0 0 1 0 13.044m6-.21 7.328-7.3-2.829-2.828L6 7.188v5.647zM4.5 13a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0zM15 15v-4H9.258l-4.015 4H15zM0 .5v12.495V.5z" />
                                        <path d="M0 12.995V13a3.07 3.07 0 0 0 0-.005z" />
                                    </svg>
                                </div>
                                <div class="ms-lg-5 mt-4 mt-lg-0">
                                    <div class="mb-4">
                                        <h3>Informasi Terkini</h3>
                                        <p class="mb-0">informasi terkini menyuguhkan berbagai macam kejadian yang
                                            terbaru untuk diketahui oleh masyarakat luas.</p>
                                    </div>

                                    <a href="{{ route('lp.landing-page.artikel.index') }}" class="icon-link icon-link-hover">
                                        Lihat
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="card card-lift h-100" data-cue="zoomIn" data-duration="1000">
                        <div class="card-body p-5">
                            <div class="d-lg-flex">
                                <div
                                    class="p-3 icon-xl icon-shape rounded bg-info bg-opacity-10 border border-info-subtle">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" class="bi bi-window-dock text-info" viewBox="0 0 16 16">
                                        <path
                                            d="M3.5 11a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm3.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm4.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Z" />
                                        <path
                                            d="M14 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h12ZM2 14h12a1 1 0 0 0 1-1V5H1v8a1 1 0 0 0 1 1ZM2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1H2Z" />
                                    </svg>
                                </div>
                                <div class="ms-lg-5 mt-4 mt-lg-0">
                                    <div class="mb-4">
                                        <h3>Pengumuman</h3>
                                        <p class="mb-0">Informasi terbaru yang selalu update untuk masyarakat desa cimara
                                            kecamatan cibingbin kabupaten kuningan.</p>
                                    </div>

                                    <a href="#!" class="icon-link icon-link-hover">
                                        Lihat
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Our solutions end-->
    



   @include('landing-page.informasi_terkini')
   {{-- @include('landing-page.lay_form_kelahiran') --}}
@endsection
