@extends('landing-page.layout.main')
@section('title')
    dokumentasi
@endsection

@section('content')
    <section class="py-5 py-lg-8">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12">
                    <h1 class="mb-3">Dokumentasi Kegiatan</h1>
                    <p class="mb-0 lead">
                        berikut adalah dokumentasi kegiatan yang dilakukan oleh pemerintahan desa dan berbagai stackholder
                        yang bekerjasama.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!--Pageheader end-->

    <!--Portfolio grid start-->
    <section class="gallery mb-xl-9 my-4">
        <div class="container">
            <div class="table-responsive-lg">
                <div class="row g-5 flex-nowrap pb-4 pb-lg-0 me-5 me-lg-0">
                    <div class="row">
                        @foreach ($dokumentasi as $publisher)
                        <article class="col-lg-4 col-md-6 col-12 mb-5">
                            <figure class="mb-4 zoom-img">
                                <a href="#">
                                    <img src="{{ asset('storage/' . $publisher->file) }}" alt="dokumentasi"
                                        class="img-fluid rounded-3" />
                                </a>
                            </figure>
                            <h3 class="my-3 lh-base h4">
                                <a href="#" class="text-reset">{{ $publisher->judul }}</a>
                            </h3>
                            <div class="d-flex align-items-center justify-content-between mb-3 mb-md-0">
                                <div class="d-flex align-items-center">
                                    <div class="ms-2">
                                        <a href="#" class="text-reset fs-6">{{ $publisher->user->name }}</a>
                                    </div>
                                </div>
                                <div class="ms-3"><span
                                        class="fs-6">{{ Carbon\Carbon::parse($publisher->tgl_publish)->isoFormat('dddd, D MMMM Y') }}</span>
                                </div>
                            </div>
                        </article>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
