@extends('landing-page.layanan_umum.dashboard_layanan_umum')
@section('title')
    Layanan Umum
@endsection

@section('content-form-administrasi')
    <div class="col-lg-12 col-md-8">
        <div class="card border-0 mb-4 shadow-sm">
            <div class="card-body p-lg-5">
                <div class="mb-2 d-lg-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center ">
                        <img src="{{ asset('landings/assets/images/user_icon.png') }}" alt="avatar"
                            class="avatar avatar-lg rounded-circle">
                        <div class="ms-4">
                            <h5 class="mb-0">{{ auth()->user()->username }}</h5>
                            <small>{{ $account->nama_lengkap }} </small><br>
                            <small>{{ $account->rt->dusun }}, RT: {{ $account->rt->nomor }}/ RW:
                                {{ $account->rt->rw }}</small><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body p-lg-12">
                <div class="col-lg-12 mb-2">
                    @if (session('errorpengajuan'))
                        <?php $errorpengajuan = session('errorpengajuan'); ?>
                        @if (count($errorpengajuan) > 0)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <h4>Opss.... Data yang dikirim salah!</h4>
                                @foreach ($errorpengajuan as $error)
                                    {!! $error !!}<br>
                                @endforeach
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <h4>{{ session('success') }}</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
                <form method="post" action="{{ route('lp.layanan-umum.surat-keterangan-usaha.pengajuan') }}">
                    @csrf
                    <div class="col-lg-12 mb-5">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <h3 class="mb-0">Form Surat Keterangan Usaha</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="col-md-6 col-md-12 mb-4">
                                    <label class="form-label">
                                        NIK
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="nik_pemohon"  value="{{ $account->nik }}" readonly required  />
                                    <div class="invalid-feedback">masukan nik.</div>
                                </div>
                                <div class="col-md-6 col-md-12 mb-4">
                                    <label class="form-label">
                                        Usaha
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="nama_usaha" required />
                                    <div class="invalid-feedback">masukan usaha.</div>
                                </div>
                                <div class="col-md-6 col-md-12 mb-4">
                                    <label class="form-label">
                                        Kontak
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="number" class="form-control" name="kontak" required />
                                    <div class="invalid-feedback">masukan usaha.</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-grid">
                        <button class="btn btn-primary" type="submit">Ajukan Permohonan!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.querySelector('.btn-check-nik').addEventListener('click', function() {
            // Mendapatkan nilai NIK dari input
            var nik = document.getElementById('nik_cek').value;
            var action = $(this).data('url');
            swal.fire({
                title: "Apakah NIK Sudah Benar?",
                text: "Anda yakin nik sudah benar untuk di cek?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Cek Status",
                cancelButtonText: "Batalkan",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: action,
                        type: 'POST',
                        cache: false,
                        dataType: 'json',
                        data: {
                            check_nik: nik,
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
    </script>
@endpush
