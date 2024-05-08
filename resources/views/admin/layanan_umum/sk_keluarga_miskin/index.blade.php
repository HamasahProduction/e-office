@extends('layout.mainSurat')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Surat Keterangan
        @endslot
        @slot('li_1')
            Keluarga Miskin
        @endslot
        @slot('li_2')
            Daftar
        @endslot
        @slot('action_button')
            <a href="{{ route('app.admin.surat.skkm.create') }}" class="btn btn-primary btn-md">
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
                                        onclick="javascript: form.action='{{ route('app.admin.surat.skkm.index') }}';"
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
                                            <th>Tangal Surat</th>
                                            <th>Nomor Surat</th>
                                            <th>Data Pemohon</th>
                                            <th>Data Peruntukan</th>
                                            <th>Keperluan</th>
                                            <th>Status Cetak</th>
                                            <th>Response</th>
                                            <th>Print</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($skkm as $pemohon)
                                            <tr>
                                                <td>{{ Carbon\Carbon::parse($pemohon->tgl_surat)->isoFormat('D MMMM Y') }}
                                                </td>
                                                <td>{{ $pemohon->nomor_surat }}</td>
                                                <td>
                                                    <strong>Nama : {{ $pemohon->nama_pemohon }} <br> NIK :
                                                        {{ $pemohon->nik }}</strong> <br>
                                                    <small>{{ $pemohon->penduduk->Rt->dusun }} <br>RT:
                                                        {{ $pemohon->penduduk->Rt->nomor }} /RW:
                                                        {{ $pemohon->penduduk->Rt->rw }}</small>
                                                </td>
                                                <td>
                                                    <strong>{{ $pemohon->nama_orang_keperluan }} <br> NIK :
                                                        {{ $pemohon->nik_keperluan }}</strong> <br>
                                                </td>
                                                <td>
                                                    {{ $pemohon->nama_keperluan }}
                                                </td>
                                                <td>
                                                    @if ($pemohon->is_cetak == true)
                                                        <button type="button"
                                                            data-action="{{ route('app.admin.surat.skkm.update.batalcetak', $pemohon->id) }}"
                                                            data-id="{{ $pemohon->id }}"
                                                            class="btn btn-success btn-sm btn-cetak">
                                                            Sudah Cetak
                                                        </button>
                                                    @else
                                                        <button type="button"
                                                            data-action="{{ route('app.admin.surat.skkm.update.cetak', $pemohon->id) }}"
                                                            data-id="{{ $pemohon->id }}"
                                                            class="btn btn-danger btn-sm btn-update-cetak">
                                                            Belum Cetak
                                                        </button>
                                                    @endif
                                                </td>
                                                
                                                <td>
                                                    @if ($pemohon->note_response)
                                                        {!! wordwrap($pemohon->note_response, 30, "<br>\n") !!}
                                                    @else
                                                        <button type="button"
                                                            data-action="{{ route('app.admin.surat.skkm.response', $pemohon->id) }}"
                                                            data-id="{{ $pemohon->id }}"
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
                                                            <a class="dropdown-item btn-cetak-kades" href="#" data-id="{{ $pemohon->no_urut_surat }}"
                                                                data-url="{{ route('app.admin.surat.skkm.cetak') }}">Kepala Desa</a>
                                                            <a class="dropdown-item btn-cetak-an" href="#" data-id="{{ $pemohon->no_urut_surat }}"
                                                                data-url="{{ route('app.admin.surat.skkm.cetak') }}">Sekertaris Desa</a>
                                                        </div>
                                                    </div>

                                                    {{-- <button data-id="{{ $pemohon->no_urut_surat }}"
                                                        data-url="{{ route('app.admin.surat.skkm.cetak') }}"
                                                        class="btn btn-warning btn-sm me-2 btn-cetak-kades "><i
                                                            class="fa fa-print"></i> Kepala Desa</button>
                                                    <button data-id="{{ $pemohon->no_urut_surat }}"
                                                        data-url="{{ route('app.admin.surat.skkm.cetak') }}"
                                                        class="btn btn-primary btn-sm me-2 btn-cetak-an "><i
                                                            class="fa fa-print"></i> Sekdes</button> --}}
                                                </td>
                                                <td>
                                                    <a href="{{ route('app.admin.surat.skkm.edit', $pemohon->id) }}"
                                                        class="btn btn-sm btn-warning">
                                                        Edit
                                                    </a>
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
            @include('admin.layanan_umum.sk_keluarga_miskin.template_surat.preview_surat')
        </div>
        <div class="col-lg-12" id="sekdes" style="display: none;">
            @include('admin.layanan_umum.sk_keluarga_miskin.template_surat.preview_surat_an')
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
                        // Set specific data from the response to a particular element
                        $('#no_surat').text(response.no_surat);
                        $('#nik').text(response.data.nik);
                        $('#nama').text(response.data.nama_pemohon);
                        $('#warganegara').text(response.data.warganegara);
                        $('#alamat').text(response.data.alamat);
                        $('#gender').text(response.jk);
                        $('#ttl').text(response.ttl);

                        $('#nik_keperluan').text(response.data.nik_keperluan);
                        $('#nama_keperluan').text(response.data.nama_keperluan);
                        $('#nama_orang_keperluan').text(response.data.nama_orang_keperluan);
                        $('#jenis_kelamin_keperluan').text(response.jk_keperluan);
                        $('#ttl_keperluan').text(response.ttl_keperluan);
                        $('#tgl_surat').text(response.tgl_surat);
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
                        // Set specific data from the response to a particular element
                        $('#no_surat_an').text(response.no_surat);
                        $('#nik_an').text(response.data.nik);
                        $('#nama_an').text(response.data.nama_pemohon);
                        $('#alamat_an').text(response.data.alamat);
                        $('#gender_an').text(response.jk);
                        $('#ttl_an').text(response.ttl);

                        $('#nik_keperluan_an').text(response.data.nik_keperluan);
                        $('#nama_keperluan_an').text(response.data.nama_keperluan);
                        $('#nama_orang_keperluan_an').text(response.data.nama_orang_keperluan);
                        $('#jenis_kelamin_keperluan_an').text(response.jk_keperluan);
                        $('#ttl_keperluan_an').text(response.ttl_keperluan);
                        $('#tgl_surat_an').text(response.tgl_surat);
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
