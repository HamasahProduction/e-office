@extends('landing-page.layout.main_blog')
@section('title')
    Artikel
@endsection

@section('content')
    <section class="py-2 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="text-center">
                        <h1 class="mb-3">Daftar Artkel</h1>
                        <p class="mb-0">berikut adalah daftar artikel terbaru yang bisa di baca</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mb-xl-9 py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @if ($article->count() > 0)
                        @if (isset($article))
                            <div class="row gy-lg-7 gy-5">
                                @foreach ($article as $item)
                                    <article class="col-lg-6 col-md-6 col-12">
                                        <figure class="mb-4 zoom-img">
                                            <a
                                                href="{{ route('lp.landing-page.artikel.artikel', ['category' => str_replace(' ', '-', $item->kategori->nama), 'slug' => $item->slug]) }}">
                                                <img src="{{ asset($item->thumbnail == null ? 'assets/img/placeholder.jpg' : 'storage/' . $item->thumbnail) }}"
                                                    alt="blog" class="img-fluid rounded-3" />
                                            </a>
                                        </figure>

                                        <a href="#!"
                                            class="badge bg-primary-subtle text-primary-emphasis text-uppercase">{{ $item->kategori->nama }}</a>
                                        <h3 class="my-3 lh-base h4">
                                            <a href="{{ route('lp.landing-page.artikel.artikel', ['category' => str_replace(' ', '-', $item->kategori->nama), 'slug' => $item->slug]) }}"
                                                class="text-reset">{{ $item->judul }}</a>
                                        </h3>
                                        <div class="d-flex align-items-center justify-content-between mb-3 mb-md-0">
                                            <div class="d-flex align-items-center">
                                                <div class="ms-2">
                                                    <a href="#" class="text-reset fs-6">{{ $item->user }}</a>
                                                </div>
                                            </div>
                                            <div class="ms-3"><span class="fs-6">
                                                    {{ Carbon\Carbon::parse($item->tgl_posting)->isoFormat('dddd, D MMMM Y') }}</span>
                                            </div>
                                        </div>
                                    </article>
                                @endforeach
                                <div class="col-lg-12">
                                    <div class="mt-xl-7 mt-3">
                                        <a class="btn btn-outline-primary" href="#!">
                                            <span class="ms-2">Lihat Lainnya</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                            <figure class="mb-lg-9 mb-md-7 mb-5">
                                <img src="{{ asset('assets/img/placeholder.jpg') }}" alt="portfolio"
                                    class="img-fluid rounded-3">
                            </figure>
                        </div>
                    @endif
                </div>
                <aside class="col-lg-4">
                    <div class="offcanvas-lg offcanvas-end" id="blog-sidebar" tabindex="-1" aria-labelledby="blog-sidebar"
                        style="max-width: 340px">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title h4" id="blog-sidebar">Sidebar</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                data-bs-target="#blog-sidebar"></button>
                        </div>
                        <div class="offcanvas-body flex-column">
                            <div class="mb-4">
                                <form>
                                    <label for="formGroupExampleInput" class="form-label visually-hidden">Example
                                        label</label>
                                    <input type="search" class="form-control" id="formGroupExampleInput"
                                        placeholder="Search Blog" />
                                </form>
                            </div>

                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="mb-4">Kategori</h5>
                                    <ul class="list-unstyled mb-0">
                                        @foreach ($kategori as $category)
                                            <li class="mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="7" height="7"
                                                    fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                                    <circle cx="8" cy="8" r="8" />
                                                </svg>
                                                <a href="{{ route('lp.landing-page.artikel.kategori',['slug'=>$category->slug]) }}" class="text-reset ms-2 fw-medium">
                                                    {{ $category->nama }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            {{-- <div class="bg-primary bg-opacity-10 px-5 pt-5 pb-7 mb-2 rounded-3 text-center mb-4">
                                <div class="icon-shape bg-primary bg-opacity-10 icon-xl rounded-circle mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" class="bi bi-envelope-check text-primary-emphasis"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z" />
                                        <path
                                            d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z" />
                                    </svg>
                                </div>
                                <div class="mb-4">
                                    <h4>Subscribe to our newsletter</h4>
                                    <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipiscing elit phasellus amet
                                        dui quam vitae quis leo velit aliquam.</p>
                                </div>
                                <form class="row g-3 needs-validation d-flex">
                                    <div class="col-md-7 col-lg-12 col-12">
                                        <label for="subscribeEmail" class="form-label visually-hidden">Email</label>

                                        <input type="email" class="form-control" id="subscribeEmail"
                                            placeholder="Enter your email address" aria-label="Enter your business email"
                                            required />
                                    </div>
                                    <div class="col-md-5 col-lg-12 col-12">
                                        <div class="d-grid">
                                            <button class="btn btn-primary" type="submit">Subscribe</button>
                                        </div>
                                    </div>
                                </form>
                            </div> --}}

                            <div class="card">
                                <div class="card-body">
                                    <h5 class="mb-4">Tags</h5>
                                    <a href="#!" class="btn btn-outline-primary btn-sm me-2 mb-2">block</a>
                                    <a href="#!" class="btn btn-outline-primary btn-sm me-2 mb-2">bootstrap5</a>
                                    <a href="#!" class="btn btn-outline-primary btn-sm me-2 mb-2">ui design</a>
                                    <a href="#!" class="btn btn-outline-primary btn-sm me-2 mb-2">bootstrap
                                        template</a>
                                    <a href="#!" class="btn btn-outline-primary btn-sm me-2 mb-2">web design</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection
