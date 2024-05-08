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
                                {{ $account->rt->rw }}</small>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body p-lg-5">
                @if (!empty($checkStatusKlg))
                    <div class="mb-3">
                        <h4 class="mb-1">Informasi Keluarga</h4>
                        <p class="fs-6 mb-0">berikut adalah informasi anggota keluarga yang terdaftar pada sistem.</p>
                    </div>
                @else
                    <div class="mb-3">
                        <h4 class="mb-1">SISTEM MEMBACA BAHWA ANDA BELUM MEMILIKI KELUARGA!!!</h4>
                        <p class="fs-6 mb-0">silahkan konfirmasi kepada perangkat setempat untuk mendaftarkan data kedalam
                            kelompok keluarga.</p>
                    </div>
                @endif
                @if (!empty($checkStatusKlg))
                    <div class="accordion" id="accordionExampleTwo">
                        <div class="border mb-4 rounded-3 px-4 py-3">
                            <div class="d-flex align-items-start">
                                <div class="d-lg-flex align-items-center justify-content-between w-100">
                                    <div class="d-flex align-items-center">
                                        <div class="ms-1">
                                            <h5 class="mb-0">{{ $kk->nik }}
                                                <small>(Kepala Keluarga)</small>
                                            </h5>
                                            <small>{{ $kk->penduduk->nama_lengkap}}</small>
                                        </div>
                                    </div>
                                    <div class="mt-4 mt-lg-0">
                                        <a href="#" class="btn btn-light btn-sm collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#anggotaKeluarga" aria-expanded="false"
                                            aria-controls="anggotaKeluarga">
                                            Lihat Anggota
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div id="anggotaKeluarga" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExampleTwo" style="">
                                <div class="pt-4">
                                    @foreach ($kelompokKeluarga as $anggota)
                                        <div class="mb-2">
                                            <h6 class="mb-0">{{ $anggota->nama_lengkap }}
                                                (<small>{{ $anggota->hubungan_keluarga }}</small>)
                                            </h6>
                                            <small>{{ $anggota->nik_anggota }}</small>

                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        @if (!empty($checkStatusKlg))
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
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                    </div>
                    <form method="post" action="{{ route('lp.layanan-umum.surat-keterangan-penghasilan.pengajuan') }}">
                        @csrf
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h3 class="mb-0">Form Surat Keterangan Penghasilan</h3>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="col-md-6 col-md-12 mb-4">
                                        <label for="ScheduleFirstnameInput" class="form-label">
                                            NIK Orangtua
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="nik_ortu"
                                            value="{{ !empty($kk) ? $kk->nik : '' }}"
                                            required />
                                        <div class="invalid-feedback">masukan nik.</div>
                                    </div>
                                    <div class="col-md-6 col-md-12 mb-4">
                                        <label class="form-label">
                                            Penghasilan
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" required id="penghasilan"
                                            name="penghasilan" />
                                        <div class="invalid-feedback">masukan penghasilan.</div>
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <div class="col-md-6 col-md-12 mb-4">
                                        <label class="form-label">
                                            NIK Pemohon
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="nik_pemohon"
                                            value="{{ $account->nik }}" readonly required />
                                        <div class="invalid-feedback">masukan nik pemohon.</div>
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
                        <div class="col-md-6 col-md-12 mb-4">
                            <label for="scheduleTextarea" class="form-label">Keterangan</label>
                            <textarea class="form-control" name="keterangan" placeholder="contoh : persyaratan permohonan beasiswa"
                                rows="3" required></textarea>
                            <div class="invalid-feedback">Please write message.</div>
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-primary" type="submit">Ajukan Permohonan!</button>
                        </div>
                    </form>
                </div>
            </div>
        @endif
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.getElementById('penghasilan').addEventListener('keyup', function(e) {
            this.value = formatRupiah(this.value);
        });

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    </script>
@endpush
