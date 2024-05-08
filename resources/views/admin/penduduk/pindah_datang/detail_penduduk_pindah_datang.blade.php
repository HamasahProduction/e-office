@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Detail Penduduk Pindah Datang
        @endslot
        @slot('li_1')
            Pindah Datang
        @endslot
        @slot('li_2')
            Detail Penduduk
        @endslot
        @slot('action_button')
            <a href="{{ route('app.admin.penduduk-pindah-datang.index') }}" class="btn btn-secondary me-2">
                <i class="fa fa-reply"></i> Kembali
            </a>
            <button onclick="printDiv('printable')" class="btn btn-primary me-2 "><i class="fa fa-print"></i> Print</button>
        @endslot
    @endcomponent

    <x-alert />

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
                                <div class="profile-img-wrap">
                                    <div class="profile-img">
                                        <a href="#"><img alt=""
                                                src="{{ asset('assets/img/user.jpg') }}" loading="lazy"
                                                style="object-fit: cover"></a>
                                    </div>
                                </div>
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <div class="col-lg-12">
                                                    <small class="text-muted">DATA DAERAH ASAL :</small>
                                                </div>
                                            </div>
                                            <ul class="personal-info">
                                                <li>
                                                    <div class="title">No KK</div>
                                                    <div class="text">:
                                                        <strong>{{ $pendudukPindah->no_kk }}</strong>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Nama Kepala Keluarga</div>
                                                    <div class="text">:
                                                        <strong>{{ $pendudukPindah->nama_kepala_keluarga }}</strong>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Nama Pemohon</div>
                                                    <div class="text">
                                                        <b>: {{ $pendudukPindah->nama_pemohon }}</b>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">NIK</div>
                                                    <div class="text">
                                                        <a href="#">:
                                                            {{ $pendudukPindah->nik_pemohon }}</a>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="title">Rencana Tanggal Pindah</div>
                                                    <div class="text">:
                                                        {{ $pendudukPindah->rencana_tgl_pindah }}
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Kode Pos</div>
                                                    <div class="text">:
                                                        {{ $pendudukPindah->kode_pos_asal }}
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Alamat Asal</div>
                                                    <div class="text">
                                                        <ol>
                                                            <li>Dusun : {{ $pendudukPindah->dusun_asal }} <br>
                                                                RT: {{ $pendudukPindah->rt_asal }} / RW:
                                                                {{ $pendudukPindah->rw_asal }}</li>
                                                            <li>
                                                                <strong>
                                                                    <small>
                                                                        <i>Kecamatan :
                                                                            {{ $pendudukPindah->districtAsal->name }}
                                                                            <br>
                                                                            Kabupaten :
                                                                            {{ $pendudukPindah->regencyAsal->name }}
                                                                            <br>
                                                                            Provinsi :
                                                                            {{ $pendudukPindah->provinceAsal->name }}
                                                                            <br>
                                                                        </i>
                                                                    </small>
                                                                </strong>
                                                            </li>
                                                        </ol>

                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <ul class="personal-info mt-2">
                                                <div class="form-group row">
                                                    <div class="col-lg-12">
                                                        <small class="text-muted">DATA KEPINDAHAN :</small>
                                                    </div>
                                                </div>
                                                <li>
                                                    <div class="title">Alasan Pindah</div>
                                                    <div class="text">:
                                                        ({{ $pendudukPindah->alasan_pindah_id }})
                                                        {{ $pendudukPindah->alasanPindah->keterangan }}
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Klasifikasi Pindah</div>
                                                    <div class="text">:
                                                        ({{ $pendudukPindah->klasifikasi_pindah_id }})
                                                        {{ $pendudukPindah->klasifikasiPindah->keterangan }}
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Status No KK Tidak Pindah</div>
                                                    <div class="text">:
                                                        ({{ $pendudukPindah->status_kk_tdk_pindah_id }})
                                                        {{ $pendudukPindah->statusKKTidakPindah->keterangan }}
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Status No KK Yang Pindah</div>
                                                    <div class="text">:
                                                        ({{ $pendudukPindah->status_kk_pindah_id }})
                                                        {{ $pendudukPindah->statusKKPindah->keterangan }}
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Jenis Kepindahan</div>
                                                    <div class="text">:
                                                        ({{ $pendudukPindah->jenis_kepindahan_id }})
                                                        {{ $pendudukPindah->jenisKepindahan->keterangan }}
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Alamat Tujuan</div>
                                                    <div class="text">
                                                        <ol>
                                                            <li>Dusun : {{ $pendudukPindah->dusun_tujuan }}
                                                                <br>
                                                                RT: {{ $pendudukPindah->rt_tujuan }} / RW:
                                                                {{ $pendudukPindah->rw_tujuan }}
                                                            </li>
                                                            <li>
                                                                <strong>
                                                                    <small>
                                                                        <i>Kecamatan :
                                                                            {{ $pendudukPindah->districtTujuan->name }}
                                                                            <br>
                                                                            Kabupaten :
                                                                            {{ $pendudukPindah->regencyTujuan->name }}
                                                                            <br>
                                                                            Provinsi :
                                                                            {{ $pendudukPindah->provinceTujuan->name }}
                                                                            <br>
                                                                        </i>
                                                                    </small>
                                                                </strong>
                                                            </li>
                                                        </ol>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card-header">
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <h4>Daftar Anggota Keluarga</h4>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane show active">
                                <div class="table-responsive">
                                    <table class="table table-striped custom-table no-footer mb-0 datatable"
                                        id="datatable">
                                        <thead>
                                            <tr>
                                                <th>NIK</th>
                                                <th>Nama</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Hubungan Keluarga</th>
                                                <th>Orangtua</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.penduduk.pindah_datang.template_surat.print_surat_pindah_datang')
    </div>
@endsection
@push('style')
    <style>
        @media print {

            /* Mengatur ukuran kertas cetak menjadi F4 */
            @page {
                size: 216mm 330mm;
                /* F4 */
            }

            /* Optional: Anda juga dapat menetapkan orientasi kertas jika diperlukan */
            /* @page {
                                                size: 330mm 216mm; // F4 landscape
                                            } */

            /* Contoh styling tambahan untuk konten cetak */
            body {
                font-family: Arial, sans-serif;
                margin: 20mm;
                /* Margin halaman cetak */
            }
        }
    </style>
@endpush
@push('scripts')
    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
@endpush
