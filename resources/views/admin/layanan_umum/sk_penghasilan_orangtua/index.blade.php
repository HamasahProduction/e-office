@extends('layout.mainSurat')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Surat Keterangan Penghasilan
        @endslot
        @slot('li_1')
            Surat Keterangan Penghasilan
        @endslot
        @slot('li_2')
            Daftar
        @endslot
        @slot('action_button')
            <a href="{{ route('app.admin.surat.skp.create') }}" class="btn btn-primary btn-md">
                <i class="fa fa-plus"></i> Buat Surat
            </a>
        @endslot
    @endcomponent

    <x-alert />

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="" method="get">
                        <div class="row filter-row">
                            <div class="col-md-2">
                                <div class="form-group form-focus select-focus focused">
                                    <input type="date" class="form-control" name="tgl_surat"
                                        value="{{ old('tgl_surat', request('tgl_surat', $tgl_surat)) }}">
                                    <label class="focus-label">Tanggal Surat </label>
                                </div>
                            </div>
                            <div class="col-md-8 col-12">
                                <div class="col-md-8 float-start">
                                    <button type="submit"
                                        onclick="javascript: form.action='{{ route('app.admin.surat.skp.index') }}';"
                                        class="btn btn-primary w-20 btn-sm ">Filter Data
                                    </button>
                                    <button type="submit" target="_blank"
                                        onclick="javascript: form.action='{{ route('app.admin.penduduk.export') }}';"
                                        class="btn btn-success w-20 btn-sm">Download Data</button>

                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="tab-content">
                        <div class="tab-pane show active">
                            <div class="table-responsive">
                                <table class="table table-striped custom-table no-footer mb-0 datatable">
                                    <thead>
                                        <tr>
                                            <th>Tanggal Surat</th>
                                            <th>Nomor Surat</th>
                                            <th>Orangtua</th>
                                            <th>Anak</th>
                                            <th>Penghasilan</th>
                                            <th>Keperluan</th>
                                            <th>Status Surat</th>
                                            <th>Response</th>
                                            <th>Print</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($skp as $data)
                                            <tr>
                                                <td>{{ Carbon\Carbon::parse($data->tgl_surat)->isoFormat('D MMMM Y') }}
                                                </td>
                                                <td>{{ $data->nomor_surat }}</td>
                                                <td>
                                                    <strong>
                                                        {{ $data->orangTua->nama_lengkap }} <br>
                                                        NIK : {{ $data->orangTua->nik }} <br>
                                                    </strong>
                                                    Pekerjaan : {{ $data->orangTua->Pekerjaan->keterangan }}
                                                </td>
                                                <td>
                                                    {{ $data->anak->nama_lengkap }}<br>
                                                    NIK : {{ $data->anak->nik }}
                                                </td>
                                                <td>{{ $data->penghasilan }}</td>
                                                <td>{{ $data->note }}</td>
                                                <td>
                                                    @if ($data->is_cetak == true)
                                                        <button type="button"
                                                            data-action="{{ route('app.admin.surat.skp.update.batalcetak', $data->id) }}"
                                                            data-id="{{ $data->id }}"
                                                            class="btn btn-success btn-sm btn-cetak">
                                                            Sudah Cetak
                                                        </button>
                                                    @else
                                                        <button type="button"
                                                            data-action="{{ route('app.admin.surat.skp.update.cetak', $data->id) }}"
                                                            data-id="{{ $data->id }}"
                                                            class="btn btn-danger btn-sm btn-update-cetak">
                                                            Belum Cetak
                                                        </button>
                                                    @endif
                                                </td>
                                              
                                                <td>
                                                    @if ($data->note_response)
                                                        {!! wordwrap($data->note_response, 30, "<br>\n") !!}
                                                    @else
                                                        <button type="button"
                                                            data-action="{{ route('app.admin.surat.skp.response', $data->id) }}"
                                                            data-id="{{ $data->id }}"
                                                            class="btn btn-success btn-sm btn-response btn-sm">
                                                            Response
                                                        </button>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-warning dropdown-toggle btn-sm"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">Pilih Print </button>
                                                        <div class="dropdown-menu" style="">
                                                            <a class="dropdown-item btn-cetak-kades" href="#" data-id="{{ $data->no_urut_surat }}"
                                                                data-url="{{ route('app.admin.surat.skp.cetak') }}">Kepala Desa</a>
                                                            <a class="dropdown-item btn-cetak-an" href="#" data-id="{{ $data->no_urut_surat }}"
                                                                data-url="{{ route('app.admin.surat.skp.cetak') }}">Sekertaris Desa</a>
                                                        </div>
                                                    </div>
                                                    {{-- <button data-id="{{ $data->no_urut_surat }}"
                                                        data-url="{{ route('app.admin.surat.skp.cetak') }}"
                                                        class="btn btn-warning btn-sm me-2 btn-cetak-kades "><i
                                                            class="fa fa-print"></i> Kepala Desa</button>
                                                    <button data-id="{{ $data->no_urut_surat }}"
                                                        data-url="{{ route('app.admin.surat.skp.cetak') }}"
                                                        class="btn btn-primary btn-sm me-2 btn-cetak-an "><i
                                                            class="fa fa-print"></i> Sekdes</button> --}}
                                                </td>
                                                <td>
                                                    -
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
    <div class="row">
        <div class="col-lg-12" id="kepdes" style="display: none;">
            @include('admin.layanan_umum.sk_penghasilan_orangtua.template_surat.preview_surat')
        </div>
        <div class="col-lg-12" id="sekdes" style="display: none;">
            @include('admin.layanan_umum.sk_penghasilan_orangtua.template_surat.preview_surat_an')
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('.datatable').dataTable({
                destroy: true,
                order: [
                    [0, 'desc']
                ],
            });
            $(".btn-cetak-kades").click(function() {
                var no = $(this).data("id");
                var url = $(this).data("url");
                $.ajax({
                    url: url,
                    method: "GET",
                    data: {
                        no: no
                    },
                    success: function(response) {
                        // orangtua
                        $('#no_surat').text(response.no_surat);
                        $('#nik_ortu').text(response.orangTua.nik_ortu);
                        $('#nama_ortu').text(response.orangTua.nama_lengkap);
                        $('#ttl_ortu').text(response.ttl_ortu);
                        $('#jk_ortu').text(response.jk_ortu);
                        $('#agama_ortu').text(response.orangTua.agama);
                        $('#hub_keluarga_ortu').text(response.orangTua.hubungan_keluarga);
                        $('#stts_perkawinan_ortu').text(response.orangTua.status_pernikahan);
                        $('#pekerjaan_ortu').text(response.orangTua.pekerjaan);
                        $('#alamat_ortu').text(response.orangTua.alamat);
                        // anak
                        $('#nik_anak').text(response.anak.nik_anak);
                        $('#nama_anak').text(response.anak.nama_lengkap);
                        $('#ttl_anak').text(response.ttl_anak);
                        $('#jk_anak').text(response.jk_anak);
                        $('#agama_anak').text(response.anak.agama);
                        $('#hub_keluarga_anak').text(response.anak.hubungan_keluarga);
                        $('#alamat_anak').text(response.anak.alamat);
                        // surat
                        $('#tgl_pada_surat').text(response.tgl_surat);
                        $('#penghasilan').text(response.data.penghasilan);
                        $('#note').text(response.data.note);
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
                var no = $(this).data("id");
                var url = $(this).data("url");
                $.ajax({
                    url: url,
                    method: "GET",
                    data: {
                        no: no
                    },
                    success: function(response) {
                        // orangtua
                        $('#no_surat_an').text(response.no_surat);
                        $('#nik_ortu_an').text(response.orangTua.nik_ortu);
                        $('#nama_ortu_an').text(response.orangTua.nama_lengkap);
                        $('#ttl_ortu_an').text(response.ttl_ortu);
                        $('#jk_ortu_an').text(response.jk_ortu);
                        $('#agama_ortu_an').text(response.orangTua.agama);
                        $('#hub_keluarga_ortu_an').text(response.orangTua.hubungan_keluarga);
                        $('#stts_perkawinan_ortu_an').text(response.orangTua.status_pernikahan);
                        $('#pekerjaan_ortu_an').text(response.orangTua.pekerjaan);
                        $('#alamat_ortu_an').text(response.orangTua.alamat);
                        // anak
                        $('#nik_anak_an').text(response.anak.nik_anak);
                        $('#nama_anak_an').text(response.anak.nama_lengkap);
                        $('#ttl_anak_an').text(response.ttl_anak);
                        $('#jk_anak_an').text(response.jk_anak);
                        $('#agama_anak_an').text(response.anak.agama);
                        $('#hub_keluarga_anak_an').text(response.anak.hubungan_keluarga);
                        $('#alamat_anak_an').text(response.anak.alamat);
                        // surat
                        $('#tgl_pada_surat_an').text(response.tgl_surat);
                        $('#penghasilan_an').text(response.data.penghasilan);
                        $('#note_an').text(response.data.note);
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
            $('.btn-cetak').on('click', function() {
                var action = $(this).data('action');
                var id = $(this).data('id');
                swal.fire({
                    title: "Apakah Anda Yakin?",
                    text: "Anda yakin sudah batalkan cetak surat ini?",
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
            $('.btn-update-cetak').on('click', function() {
                var action = $(this).data('action');
                var id = $(this).data('id');
                Swal.fire({
                    title: "Apakah Anda Yakin Update Cetak Surat ini?",
                    text: "Anda yakin sudah mencetak surat ini?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Ya, saya yakin",
                    cancelButtonText: "Batalkan",
                    showLoaderOnConfirm: true,
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
                                id: id,
                            },
                            success: function(response) {
                                console.info(response);
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
            $('.btn-response').on('click', function() {
                var action = $(this).data('action');
                var id = $(this).data('id');
                Swal.fire({
                    title: "Apakah Anda Yakin Memberi Response Keterangan?",
                    text: "silahkan masukan response keterangan untuk di ketahui",
                    input: "text",
                    inputAttributes: {
                        autocapitalize: "on"
                    },
                    showCancelButton: true,
                    confirmButtonText: "Kirim, Response",
                    cancelButtonText: "Batalkan",
                    showLoaderOnConfirm: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: action,
                                type: 'PUT',
                                cache: false,
                                dataType: 'json',
                                data: {
                                    id: id,
                                    _token: "{{ csrf_token() }}",
                                    reason: result.value,
                                },
                                success: function(response) {
                                    console.info(response);
                                    Swal.fire({
                                        type: `${response.type}`,
                                        icon: `${response.icon}`,
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
                    }
                });
            });
        });
    </script>
@endpush
