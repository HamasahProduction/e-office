{{-- <!doctype html> --}}
<html lang="en">
@include('landing-page.layout.partials.head')

<body>
    <!-- Navbar -->
    @include('landing-page.layout.partials.header')

    <main>
        <section class="mb-xl-9 ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="ms-3">
                                    <h5 class="mb-0">Silahkan Pilih Layanan Surat</h5>
                                    <small>apabila layanan tidak tersedia mohon <br>untuk konfirmasi ke perangkat setempat!</small>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="mb-4">Layanan Surat</h5>
                                <ul class="list-unstyled mb-0">
                                    @foreach ($surat as $data)
                                        <li class="mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="7" height="7"
                                                fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                                <circle cx="8" cy="8" r="8" />
                                            </svg>
                                            <a href="{{ url('layanan-umum', ['slug' => $data->url]) }}"
                                                {{-- class="text-reset ms-2 fw-medium">{{ $data->nama_surat }}</a> --}}
                                                class="form-label">{{ $data->nama_surat }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        @yield('content-form-administrasi')
                    </div>
                </div>
            </div>
        </section>
        {{-- @yield('content') --}}
    </main>
    <!-- Footer -->
    @include('landing-page.layout.partials.footer')
    <!-- Scroll top -->
    <div class="btn-scroll-top">
        <svg class="progress-square svg-content" width="100%" height="100%" viewBox="0 0 40 40">
            <path
                d="M8 1H32C35.866 1 39 4.13401 39 8V32C39 35.866 35.866 39 32 39H8C4.13401 39 1 35.866 1 32V8C1 4.13401 4.13401 1 8 1Z" />
        </svg>
    </div>
    <!-- Libs JS -->
    @include('landing-page.layout.partials.footer-script')
    @stack('scripts')
</body>

</html>
