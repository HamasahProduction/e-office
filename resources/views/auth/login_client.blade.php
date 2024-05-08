<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    @include('landing-page.layout.partials.head')

    <title>LOGIN</title>
</head>

<body>
    <main>
        <div class="pattern-square"></div>
        <section class="py-lg-8 mt-10">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-8 col-12">
                        <div class="card shadow-sm mb-6">
                            <div class="card-body">
                                <div class="text-center justify-content-center mb-5">
                                    <img src="{{ asset('logo/logo_pemerintahan_cimara.png') }}"
                                        width="280px" alt="brand" class="mb-3" />
                                </div>
                                <div class="d-grid">
                                    @if (session('error'))
                                        <!-- Color schemes -->
                                        <div class="toast align-items-center text-white bg-danger border-0 fade show mb-5"
                                            role="alert" aria-live="assertive" aria-atomic="true">
                                            <div class="d-flex">
                                                <div class="toast-body">
                                                    {{ session('error') }}
                                                </div>
                                                <button type="button" class="btn-close btn-close-white me-2 m-auto"
                                                    data-bs-dismiss="toast" aria-label="Close"></button>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <form method="POST" action="{{ route('lp.login-client.process') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Username
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="username" required />
                                        <div class="invalid-feedback">Masukan Nik Penduduk.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="formSignUpPassword" class="form-label">Password</label>
                                        <div class="password-field position-relative">
                                            <input type="password" class="form-control" name="password" required />
                                            <span><i class="bi bi-eye-slash passwordToggler"></i></span>
                                            <div class="invalid-feedback">Please enter password.</div>
                                        </div>
                                    </div>

                                    {{-- <div class="mb-4 d-flex align-items-center justify-content-between">
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="rememberMeCheckbox" />
                                    <label class="form-check-label" for="rememberMeCheckbox">Remember me</label>
                                 </div>

                                 <div><a href="../forget-password.html" class="text-primary">Forgot Password</a></div>
                              </div> --}}

                                    <div class="d-grid">
                                        <button class="btn btn-primary" type="submit">Masuk</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <div class="small mb-3 mb-lg-0 text-body-tertiary">
                                Copyright ©
                                <span class="text-primary"><a href="#">PT. Halda Digitals Apps</a></span>
                                | Designed by
                                <span class="text-primary"><a href="#">Hadid Prayuda</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
    @include('landing-page.layout.partials.footer-script')
    @stack('scripts')
</body>

</html>
