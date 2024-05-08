@extends('landing-page.layout.main_blog')
@section('title')
    Artikel
@endsection

@section('content')
    <div class="py-xl-1 py-1">
        <div class="container">
            <div class="row">
                <article class="col-lg-8 offset-lg-2">
                    <h1>{{ $article->judul }}</h1>
                    <div class="d-flex align-items-center mt-lg-6">
                        <div class="me-5">
                            <span class="fs-6 ">Penulis</span>
                            <div class="d-flex align-items-left mt-2">
                                <div>
                                    <a href="#" class="text-reset">{{ $article->user }}</a>
                                </div>
                            </div>
                        </div>
                        <div>
                            <span class="fs-6">Dipublish Pada:</span>
                            <div class="mt-2 text-dark">
                                <span class="fs-6">{{ Carbon\Carbon::parse($article->tgl_posting)->isoFormat('dddd, D MMMM Y') }}</span>
                            </div>
                        </div>
                    </div>

                    <figure class="my-6">
                        <img src="{{ asset($article->thumbnail == null ? 'assets/img/placeholder.jpg' : 'storage/' . $article->thumbnail) }}" alt="blog"
                            class="rounded-3 img-fluid w-100" />
                    </figure>
                    <p style="text-align: justify">
                        {!! $article->konten !!}
                    </p>
                    {{-- <figure class="my-5">
                        <img src="{{ asset('landings/assets/images/iklan/iklan_1.png') }}" alt="blog"
                            class="img-fluid rounded-3 w-100" />
                    </figure> --}}
                </article>
            </div>
        </div>
    </div>
@endsection
