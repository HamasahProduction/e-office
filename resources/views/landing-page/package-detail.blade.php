@extends('landing-page.layout.main')
@section('title')
    {{ $package->title }}
@endsection

@section('content')
    <nav class="px-md-5 px-3 py-3">
        <div>
            <a href="/#paket" class="fs-6 text-secondary text-decoration-none" style="display: block;">
                <span>
                    <i class="bi bi-arrow-left"></i>
                </span>
                <span>
                    Kembali
                </span>
            </a>
        </div>
    </nav>
    <section class="container pt-4 pb-5">
        <div class="row relative">
            <div class="col-md-4 _d-md-block _d-none sticky-top mb-4" style="top: 5rem">
                <div class="image-detail-package rounded overflow-hidden">
                    <img src="{{ asset('storage/' . $package->image) }}" alt="Detail Masjidil Harom" style="width: 100%; object-fit: contain;">
                </div>
            </div>
            <div class="col-md-8 ps-md-5">
                @if(session('success'))
                    <div class="alert alert-info alert-dismissible fade show mb-2" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="text-md-start text-center">
                    <h2 class="fs-3 fw-bolder">
                        {{ $package->title }}
                    </h2>
                </div>
                <div class="mt-4 d-flex flex-column align-items-md-start align-items-center">
                    @foreach ($package->items as $item)
                        <div class="d-flex gap-3 align-items-center">
                            <img src="{{ asset('assets/img/landing-page/check-icon.png') }}" alt="Check Icon" class="mb-3" style="object-fit: contain; width: 18.5px">
                            <p>
                                {{ $item }}
                            </p>
                        </div>
                    @endforeach
                </div>
                <div class="mt-4">
                    <p style="text-align: justify;">
                        {{ $package->description }}
                    </p>
                </div>
                <div class="mt-4">
                    <p style="text-align: justify;">
                        <span>Harga: </span>
                        <span>
                            <small>Rp</small>
                            <span class="fs-5 fw-semibold">
                                {{ number_format($package->amount, 0, ',', '.') }}
                            </span>
                        </span>
                    </p>
                </div>
                <div class="mt-4">
                    <p>
                        <span>
                            Untuk info / pendaftaran
                        </span>
                        <br />
                        <span>
                            Hubungi:
                            <span style="color: #FF9800;">{{ $no_wa ?? $contact->phone_number ?? $contact->phone }}</span>
                             (Whatsapp)
                        </span>
                        <br />
                        <span>
                            Atau tinggalkan Nomor Whatsapp Anda
                        </span>
                    </p>
                    <form action="{{ route('lp.guest-books.store') }}" method="POST">
                        @csrf
                        <div class="d-flex gap-2 align-items-end mb-2">
                            <div class="form-group">
                                <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="No WA" value="{{ old("phone") }}">
                                <div class="invalid-feedback">@error('phone') {{ $message }} @enderror</div>
                            </div>
                            <div>
                                <button class="btn-block btn bg-custom-primary px-4">Kirim</button>
                            </div>
                        </div>
                        <div id="reCaptchaHelp" class="form-text mb-2">Centang ReCaptcha dibawah ini sebelum mengirim nomor whatsapp.</div>
                        <div class="g-recaptcha" data-callback="imNotARobot" data-sitekey={{ env("RECAPTCHA_SITE_KEY") }}></div>
                        @if ($errors->has('g-recaptcha-response'))
                            <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                        @endif
                    </form>
                    {{-- <form action="?" method="POST">
                        <div class="g-recaptcha" data-callback="imNotARobot" data-sitekey={{ env("RECAPTCHA_SITE_KEY") }}></div>
                        <br/>
                        <input type="submit" value="Submit">
                    </form> --}}
                </div>
            </div>
        </div>
    </section>
@endsection
