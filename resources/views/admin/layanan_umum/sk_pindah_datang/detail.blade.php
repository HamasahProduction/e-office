@extends('layout.mainSurat')
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
            <a href="{{ route('app.admin.surat-keterangan-pindah-datang.index') }}" class="btn btn-sm btn-secondary me-2">
                <i class="fa fa-reply"></i> Kembali
            </a>
            {{-- @if ($pendudukPindah->jenis_kepindahan_id == 1)
                <button onclick="printDiv('printable')" class="btn btn-primary me-2 "><i class="fa fa-print"></i> Print</button>
            @elseif ($pendudukPindah->jenis_kepindahan_id == 2)
                <button onclick="printDiv('printable')" class="btn btn-warning me-2 "><i class="fa fa-print"></i> Print</button>
            @else
                <button onclick="printDiv('printable')" class="btn btn-success me-2 "><i class="fa fa-print"></i> Print</button>
            @endif --}}
            <div class="btn-group">
                <button type="button" class="btn btn-warning dropdown-toggle btn-sm"
                    data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false"><i class="fa fa-print"></i> Pilih Print </button>
                <div class="dropdown-menu" style="">
                    <a class="dropdown-item btn-cetak-kades" href="#" data-id="{{ $pendudukPindah->id }}"
                        data-url="{{ route('app.admin.surat-keterangan-pindah-datang.cetak') }}">Kepala Desa</a>
                    <a class="dropdown-item btn-cetak-an" href="#" data-id="{{ $pendudukPindah->id }}"
                        data-url="{{ route('app.admin.surat-keterangan-pindah-datang.cetak') }}">Sekertaris Desa</a>
                </div>
            </div>
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
                                        <a href="#"><img alt="" src="{{ asset('assets/img/user.jpg') }}"
                                                loading="lazy" style="object-fit: cover"></a>
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
                                    <h4>Daftar Penduduk Pindah</h4>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane show active">
                                <div class="table-responsive">
                                    <table class="table table-striped custom-table no-footer mb-0 datatable" id="datatable">
                                        <thead>
                                            <tr>
                                                <th>NIK</th>
                                                <th>Nama</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Hubungan Keluarga</th>
                                                <th>Orangtua</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pendudukPindah->anggotaPindah as $anggota)
                                                <tr>
                                                    <td>{{ $anggota->nik }}</td>
                                                    <td>{{ $anggota->penduduk->nama_lengkap }}</td>
                                                    <td>{{ Carbon\Carbon::parse($anggota->penduduk->tgl_lahir)->isoFormat('D MMMM Y') }}
                                                    </td>
                                                    <td>{{ $anggota->penduduk->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}
                                                    </td>
                                                    <td>{{ $anggota->penduduk->SDHK->keterangan }}</td>
                                                    <td>
                                                        Ayah : {{ $anggota->penduduk->nama_ayah }} <br>
                                                        Ibu : {{ $anggota->penduduk->nama_ibu }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($pendudukPindah->jenis_kepindahan_id == 1)
            @include('admin.layanan_umum.sk_pindah_datang.template_surat.print_jp_kepala_keluarga')
        @else
            @include('admin.layanan_umum.sk_pindah_datang.template_surat.print_jp_anggota_keluarga')
        @endif

        <div class="row">
            <div class="col-lg-12" id="kepdes" style="display: none;">
                @include('admin.layanan_umum.sk_pindah_datang.template_surat.print_jp_anggota_keluarga')
            </div>
            <div class="col-lg-12" id="sekdes" style="display: none;">
                @include('admin.layanan_umum.sk_pindah_datang.template_surat.print_jp_anggota_keluarga')
            </div>
        </div>
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
        // function printDiv(divName) {
        //     var printContents = document.getElementById(divName).innerHTML;
        //     var originalContents = document.body.innerHTML;
        //     document.body.innerHTML = printContents;
        //     window.print();
        //     document.body.innerHTML = originalContents;
        // }
        $(".btn-cetak-kades").click(function() {
                var id = $(this).data("id");
                var url = $(this).data("url");
                $.ajax({
                    url: url,
                    method: "GET",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        // Set specific data from the response to a particular element
                        $('#no_surat').text(response.no_surat);
                        $('#nik').text(response.data.nik_pemohon);
                        $('#nama').text(response.data.nama_pemohon);
                        $('#pekerjaan').text(response.data.nama_pemohon);
                        $('#warganegara').text(response.data.nama_pemohon);
                        $('#alamat').text(response.data.nama_pemohon);

                        $('#gender').text(response.data.nama_pemohon);
                        $('#tgl_surat').text(response.tgl_surat);
                        $('#ttl').text(response.ttl);
                        console.info(response);
                        var printContents = document.getElementById('kepdes').innerHTML;
                        var originalContents = document.body.innerHTML;
                        document.body.innerHTML = printContents;
                        var printResult = window.print();
                        // If the print dialog returns false (cancelled), reload the page
                        if (!printResult) {
                            location.reload();
                        }

                        document.body.innerHTML = originalContents;
                    }
                });
            });
            $(".btn-cetak-an").click(function() {
                var id = $(this).data("id");
                var url = $(this).data("url");
                $.ajax({
                    url: url,
                    method: "GET",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        // Set specific data from the response to a particular element
                        $('#no_surat_an').text(response.no_surat);
                        $('#nik_an').text(response.data.nik);
                        $('#nama_an').text(response.data.penduduk.nama_lengkap);
                        $('#pekerjaan_an').text(response.pekerjaan);
                        $('#warganegara_an').text(response.warganegara);
                        $('#alamat_an').text(response.data.penduduk.alamat);

                        $('#gender_an').text(response.jk);
                        $('#tgl_surat_an').text(response.tgl_surat);
                        $('#ttl_an').text(response.ttl);
                        console.info(response);
                        var printContents = document.getElementById('sekdes').innerHTML;
                        var originalContents = document.body.innerHTML;
                        document.body.innerHTML = printContents;
                        var printResult = window.print();
                        // If the print dialog returns false (cancelled), reload the page
                        if (!printResult) {
                            location.reload();
                        }

                        document.body.innerHTML = originalContents;
                    }
                });
            });
    </script>
@endpush
