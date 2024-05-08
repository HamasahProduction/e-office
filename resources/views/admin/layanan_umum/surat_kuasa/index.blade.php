@extends('layout.mainSurat')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Surat Kuasa
        @endslot
        @slot('li_1')
            Suat Kuasa
        @endslot
        @slot('li_2')
            Daftar
        @endslot
        @slot('action_button')
            <a href="{{ route('app.admin.surat-kuasa.create') }}" class="btn btn-primary btn-md">
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
                                        onclick="javascript: form.action='{{ route('app.admin.surat-kuasa.index') }}';"
                                        class="btn btn-primary w-20 btn-sm ">Filter Data
                                    </button>
                                    {{-- <button type="submit" target="_blank"
                                        onclick="javascript: form.action='{{ route('app.admin.penduduk.export') }}';"
                                        class="btn btn-success w-20 btn-sm">Download Data</button> --}}

                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="tab-content">
                        <div class="tab-pane show active">
                            <div class="table-responsive">
                                <table class="table table-striped custom-table no-footer mb-0 datatable" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>Tanggal Surat</th>
                                            <th>Nama Ahli Waris</th>
                                            <th>Ahli Waris</th>
                                            <th>Penerima Kuasa</th>
                                            <th>Keterangan</th>
                                            <th>Status Surat</th>
                                            <th>Response</th>
                                            <th>Print</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($surat_kuasa as $pemohon)
                                            <tr>
                                                <td>{{ Carbon\Carbon::parse($pemohon->tgl_surat)->isoFormat('D MMMM Y') }}
                                                </td>
                                                <td>{{ $pemohon->nama_ahli_waris }}</td>
                                                <td>
                                                    Nama : {{ $pemohon->ahliWaris->nama_lengkap }} <br> NIK : {{ $pemohon->nik_anggota_ahli_waris }} <br>
                                                    <small>Pekerjaan : {{ strtolower($pemohon->ahliWaris->pekerjaan->keterangan) }}</small> <br>
                                                    <small>{{ $pemohon->ahliWaris->Rt->dusun }} <br>
                                                        {{ $pemohon->ahliWaris->Rt->nomor }} /
                                                        {{ $pemohon->ahliWaris->Rt->rw }}
                                                    </small>
                                                </td>
                                                <td>
                                                    Nama : {{ $pemohon->penerimaKuasa->nama_lengkap }} <br> NIK : {{ $pemohon->nik_penerima_kuasa }} <br>
                                                    <small>Pekerjaan : {{ strtolower($pemohon->penerimaKuasa->pekerjaan->keterangan) }}</small> <br>
                                                    <small>{{ $pemohon->penerimaKuasa->Rt->dusun }} <br>
                                                        {{ $pemohon->penerimaKuasa->Rt->nomor }} /
                                                        {{ $pemohon->penerimaKuasa->Rt->rw }}
                                                    </small>
                                                </td>
                                                <td>{!! wordwrap($pemohon->keterangan, 40, "<br>\n") !!}</td>

                                                <td>
                                                    @if ($pemohon->is_cetak == true)
                                                        <button type="button"
                                                            data-action="{{ route('app.admin.surat-kuasa.update.batalcetak', $pemohon->id) }}"
                                                            data-id="{{ $pemohon->id }}"
                                                            class="btn btn-success btn-sm btn-cetak">
                                                            Sudah Cetak
                                                        </button>
                                                    @else
                                                        <button type="button"
                                                            data-action="{{ route('app.admin.surat-kuasa.update.cetak', $pemohon->id) }}"
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
                                                            data-action="{{ route('app.admin.surat-kuasa.response', $pemohon->id) }}"
                                                            data-id="{{ $pemohon->id }}"
                                                            class="btn btn-success btn-sm btn-response btn-sm">
                                                            Response
                                                        </button>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button data-id="{{ $pemohon->id }}"
                                                        data-url="{{ route('app.admin.surat-kuasa.cetak') }}"
                                                        class="btn btn-warning btn-sm me-2 btn-cetak-surat "><i
                                                            class="fa fa-print"></i> Print Surat</button>
                                                </td>
                                                <td>
                                                    <a href="{{ route('app.admin.surat-kuasa.edit', [$pemohon->id]) }}"
                                                        class="btn btn-sm btn-warning">
                                                        Edit
                                                    </a>
                                                    <button type="button"
                                                        data-action="{{ route('app.admin.surat-kuasa.remove', $pemohon->id) }}"
                                                        class="btn btn-danger btn-sm btn-delete btn-sm">
                                                        Hapus
                                                    </button>
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
            @include('admin.layanan_umum.surat_kuasa.template_surat.preview_surat')
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
            $(".btn-cetak-surat").click(function() {
                var id = $(this).data("id");
                var url = $(this).data("url");
                $.ajax({
                    url: url,
                    method: "GET",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        console.info(response.jk);
                        $('#nama_ahli_waris').text(response.data.nama_ahli_waris);
                        $('#nik').text(response.data.nik_anggota_ahli_waris);
                        $('#nama').text(response.ahli_waris);
                        $('#pekerjaan').text(response.pekerjaan_ahli);
                        $('#umur').text(response.umur_ahli);                        
                        $('#alamat').text(response.alamat_ahli);
                        
                        $('#nik_penerima').text(response.data.nik_penerima_kuasa);
                        $('#nama_penerima').text(response.penerima_kuasa);
                        $('#pekerjaan_penerima').text(response.pekerjaan_penerima);
                        $('#umur_penerima').text(response.umur_penerima);                        
                        $('#alamat_penerima').text(response.alamat_penerima);

                        $('#ttd_pemberi_kuasa').text(response.ahli_waris);
                        $('#ttd_penerima_kuasa').text(response.penerima_kuasa);
                        $('#tgl_surat').text(response.tgl_surat);
                        $('#keterangan').text(response.data.keterangan);
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

            $('.btn-delete').on('click', function() {
                var action = $(this).data('action');
                var id = $(this).data('id');
                swal.fire({
                    title: "Apakah Anda Yakin?",
                    text: "Anda yakin menghapus data ini?",
                    icon: "info",
                    showCancelButton: true,
                    confirmButtonText: "Hapus!",
                    cancelButtonText: "Batal!",
                    // reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: action,
                            type: 'DELETE',
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
