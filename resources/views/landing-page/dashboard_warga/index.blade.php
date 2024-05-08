@extends('landing-page.layout.main')
@section('title')
    Dashboard Warga
@endsection

@section('content')
    <section class="py-lg-7 py-5 bg-light-subtle">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">
                            <div class="d-flex align-items-center  mt-4 justify-content-center justify-content-md-start">
                                <img src="{{ asset('landings/assets/images/user_icon.png') }}" alt="avatar"
                                    class="avatar avatar-lg rounded-circle">
                                <div class="ms-3">
                                    <h5 class="mb-0">{{ Auth::user()->name }}</h5>
                                    <small>{{ Auth::user()->username }}</small> <br>
                                    <small>RT: {{ $user->Rt->nomor }}/ RW: {{ $user->Rt->rw }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid">
                            <a href="{{ route('lp.logout') }}" class="btn btn-danger m-5">Logout</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="card border-0 mb-4 shadow-sm">
                        <div class="card-body p-lg-5">
                            <div class="mb-2 d-lg-flex align-items-center justify-content-between">
                                <div class="mt-3 mt-lg-0 d-md-flex">
                                    <a href="?view=menunggu_proses"
                                        {{ Request::get('view') == 'menunggu_proses' ? 'menunggu_proses' : '' }}
                                        class="btn btn-warning me-2 mt-2 align-items-center ">Menunggu Diproses</a>
                                    <a href="?view=siap_diambil"
                                        {{ Request::get('view') == 'siap_diambil' ? 'siap_diambil' : '' }}
                                        class="btn btn-primary me-2 mt-2 align-items-center ">Siap Diambil</a>
                                    <a href="?view=sudah_diambil"
                                        {{ Request::get('view') == 'sudah_diambil' ? 'sudah_diambil' : '' }}
                                        class="btn btn-success me-2 mt-2 align-items-center ">Sudah Diambil</a>
                                    <a href="?view=dibatalkan"
                                        {{ Request::get('view') == 'dibatalkan' ? 'dibatalkan' : '' }}
                                        class="btn btn-danger me-2 mt-2 align-items-center ">Permohonan Dibatalkan</a>
                                    <a href="{{ route('lp.warga.warga.dashboard') }}"
                                        class="btn btn-outline-primary mt-2 align-items-center ">
                                        Lihat Semua
                                        <span class="ms-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                fill="currentColor" class="bi bi-arrow-up-right-circle-fill"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M0 8a8 8 0 1 0 16 0A8 8 0 0 0 0 8zm5.904 2.803a.5.5 0 1 1-.707-.707L9.293 6H6.525a.5.5 0 1 1 0-1H10.5a.5.5 0 0 1 .5.5v3.975a.5.5 0 0 1-1 0V6.707l-4.096 4.096z">
                                                </path>
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-lg-5 ">
                            <div class="col-lg-12 mb-2">
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <h4>{{ session('success') }}</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                            </div>
                            <div class="mb-2">
                                <h4 class="mb-1">Daftar Pengajuan Administrasi :</h4>
                                <p class="fs-6 mb-0">berikut adalah daftar pengajuan administrasi yang sudah diajukan.</p>
                            </div>

                            <ul class="list-group list-group-flush mb-0">
                                @foreach ($permohonan as $adm)
                                    <div class="accordion" id="accordionExampleTwo">
                                        <div class="border mb-4 rounded-3 px-4 py-3">
                                            <div class="d-flex align-items-start">
                                                <div class="d-lg-flex align-items-center justify-content-between w-100">
                                                    <div class="d-flex align-items-center">
                                                        <div
                                                            class="icon-shape {{ $adm->status == 'menunggu_proses' ? 'bg-warning' : ($adm->status == 'sudah_diambil' ? 'bg-success' : ($adm->status == 'dibatalkan' ? 'bg-danger' : 'bg-primary')) }} rounded icon-lg flex-shrink-0 mt-1 ms-2">
                                                            <svg class="w-[31px] h-[31px] text-white" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="42"
                                                                height="42" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="1.5"
                                                                    d="M7.556 8.5h8m-8 3.5H12m7.111-7H4.89a.896.896 0 0 0-.629.256.868.868 0 0 0-.26.619v9.25c0 .232.094.455.26.619A.896.896 0 0 0 4.89 16H9l3 4 3-4h4.111a.896.896 0 0 0 .629-.256.868.868 0 0 0 .26-.619v-9.25a.868.868 0 0 0-.26-.619.896.896 0 0 0-.63-.256Z" />
                                                            </svg>
                                                        </div>
                                                        <div class="ms-3">
                                                            <h5 class="mb-0">{{ $adm->code_register }}</h5>
                                                            <h6 class="mb-0">{{ $adm->jenis_surat }}</h6>
                                                            <small>Status : {{ $adm->status }}</small>
                                                        </div>
                                                    </div>
                                                    <div class="mt-4 mt-lg-0">
                                                        <a href="#" class="btn btn-light btn-sm collapsed"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#anggotaKeluarga{{ $adm->id }}"
                                                            aria-expanded="false"
                                                            aria-controls="anggotaKeluarga{{ $adm->id }}">
                                                            Detail
                                                        </a>
                                                        @if ($adm->status !== 'dibatalkan')
                                                            <button type="button"
                                                                class="btn btn-danger btn-sm btn-batalkan-permohonan"
                                                                data-action="{{ route('lp.warga.warga.update', $adm->id) }}"
                                                                data-id="{{ $adm->id }}">
                                                                Batalkan
                                                            </button>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="anggotaKeluarga{{ $adm->id }}"
                                                class="accordion-collapse collapse" data-bs-parent="#accordionExampleTwo"
                                                style="">
                                                <div class="pt-4">
                                                    <div class="mb-2">
                                                        <small>Tanggal Permohonan</small>
                                                        <h6 class="mb-0">{{ $adm->tgl_permohonan }}</h6>
                                                    </div>
                                                    @if ($adm->status != 'menunggu_proses')
                                                        <div class="mb-2">
                                                            <small>Diperbaharui</small>
                                                            <h6 class="mb-0">{{ $adm->updated_at }}</h6>
                                                        </div>
                                                    @endif
                                                    @if ($adm->url_slug == 'surat-keterangan-usaha')
                                                        <div class="mb-2">
                                                            <small>Nama Usaha</small>
                                                            <h6 class="mb-0">{{ $adm->nama_usaha }}</h6>
                                                        </div>
                                                    @endif

                                                    @if ($adm->url_slug == 'surat-keterangan-keluarga-miskin')
                                                        <div class="mb-2">
                                                            <small>Pemohon</small>
                                                            <h6 class="mb-0">{{ $adm->pemohon->nama_lengkap }}
                                                                <br><small>( {{ $adm->nik }} )</small>
                                                            </h6>
                                                        </div>
                                                        <div class="mb-2">
                                                            <small>Di Peruntukan</small>
                                                            <h6 class="mb-0">{{ $adm->peruntukan->nama_lengkap }}
                                                                <br><small>( {{ $adm->nik_peruntukan }} )</small>
                                                            </h6>
                                                        </div>
                                                        <div class="mb-2">
                                                            <small>Keterangan</small>
                                                            <h6 class="mb-0">{{ $adm->keterangan }}</h6>
                                                        </div>
                                                    @endif

                                                    @if ($adm->url_slug == 'surat-keterangan-penghasilan')
                                                        <div class="mb-2">
                                                            <small>Orangtua</small>
                                                            <h6 class="mb-0">{{ $adm->orangtua->nama_lengkap }}
                                                                <br><small>( {{ $adm->nik_orangtua }} )
                                                            </h6>
                                                        </div>
                                                        <div class="mb-2">
                                                            <small>Pekerjaan</small>
                                                            <h6 class="mb-0">
                                                                {{ $adm->pekerjaan == null ? $adm->orangtua->pekerjaan->keterangan : $adm->pekerjaan }}
                                                            </h6>
                                                        </div>
                                                        <div class="mb-2">
                                                            <small>Penghasilan</small>
                                                            <h6 class="mb-0">Rp. {{ $adm->penghasilan }}</h6>
                                                        </div>
                                                    @endif

                                                    @if ($adm->url_slug == 'surat-keterangan-tidak-mampu')
                                                        <div class="mb-2">
                                                            <small>Sekolah</small>
                                                            <h6 class="mb-0">Siswa/i Kelas {{ $adm->kelas }}
                                                                {{ $adm->nama_sekolah }}</h6>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="{{ asset('landings/assets/js/vendors/swiper.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.btn-batalkan-permohonan').on('click', function() {
                var action = $(this).data('action');
                var id = $(this).data('id');
                swal.fire({
                    title: "Apakah Anda Yakin?",
                    text: "Anda yakin membatalkan permohonan ini?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Ya, Saya yakin",
                    cancelButtonText: "Batalkan",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: action,
                            type: 'PUT',
                            cache: false,
                            dataType: 'json',
                            data: {
                                id: id,
                                _token: "{{ csrf_token() }}",
                            },
                            success: function(response) {
                                Swal.fire({
                                    type: 'success',
                                    icon: 'success',
                                    title: `${response.message}`,
                                    showConfirmButton: true,
                                    timer: 6000
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
