@extends('layout.mainSurat')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Surat Keterangan Beda Nama
        @endslot
        @slot('li_1')
            Keterangan Beda Nama
        @endslot
        @slot('li_2')
            Daftar
        @endslot
        @slot('action_button')
            <a href="{{ route('app.admin.surat.skbn.create') }}" class="btn btn-primary btn-md">
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
                                        onclick="javascript: form.action='{{ route('app.admin.surat.skbn.index') }}';"
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
                                <table class="table table-striped custom-table no-footer mb-0 datatable" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>Tanggal Surat</th>
                                            <th>Nomor Surat</th>
                                            <th>Nama Pemohon</th>
                                            <th>Dokumen Berbeda</th>
                                            <th>Dokumen Berbeda Lainya</th>
                                            <th>Jumlah Berkas</th>
                                            <th>Status Surat</th>
                                            <th>Print</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($skbn as $bedaNama)
                                            <tr>
                                                <td>{{ Carbon\Carbon::parse($bedaNama->tgl_surat)->isoFormat('D MMMM Y') }}
                                                <td>{{ $bedaNama->nomor_surat }}</td>
                                                </td>
                                                <td>
                                                    <small>NIK : {{ $bedaNama->nik }}</small><br>
                                                    <strong>
                                                        {{ $bedaNama->penduduk->nama_lengkap }} 
                                                    </strong>
                                                </td>
                                                <td>
                                                    {{ $bedaNama->dokumen_berbeda }} :
                                                    {{ $bedaNama->perbedaan_nama }}
                                                </td>
                                                <td>
                                                    @php
                                                        $keterangan = explode(',', $bedaNama->dokumen_berbeda_lainya);
                                                        $nama = explode(',', $bedaNama->perbedaan_nama_lainya);
                                                    @endphp
                                                    @foreach ($keterangan as $key => $item)
                                                        {{ $item }} : {{ $nama[$key] }} <br>
                                                    @endforeach
                                                </td>
                                                <td>{{ $bedaNama->jumlah_berkas }} berkas</td>
                                                <td>
                                                    @if ($bedaNama->is_cetak == true)
                                                        <button type="button"
                                                            data-action="{{ route('app.admin.surat.skbn.update.batalcetak', $bedaNama->id) }}"
                                                            data-id="{{ $bedaNama->id }}"
                                                            class="btn btn-success btn-sm btn-cetak">
                                                            Sudah Cetak
                                                        </button>
                                                    @else
                                                        <button type="button"
                                                            data-action="{{ route('app.admin.surat.skbn.update.cetak', $bedaNama->id) }}"
                                                            data-id="{{ $bedaNama->id }}"
                                                            class="btn btn-danger btn-sm btn-update-cetak">
                                                            Belum Cetak
                                                        </button>
                                                    @endif
                                                </td>

                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-warning dropdown-toggle btn-sm"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">Pilih Print </button>
                                                        <div class="dropdown-menu" style="">
                                                            <a class="dropdown-item btn-cetak-kades" href="#" data-id="{{ $bedaNama->no_urut_surat }}"
                                                                data-url="{{ route('app.admin.surat.skbn.cetak') }}">Kepala Desa</a>
                                                            <a class="dropdown-item btn-cetak-an" href="#" data-id="{{ $bedaNama->no_urut_surat }}"
                                                                data-url="{{ route('app.admin.surat.skbn.cetak') }}">Sekertaris Desa</a>
                                                        </div>
                                                    </div>

                                                    {{-- <button data-id="{{ $bedaNama->no_urut_surat }}"
                                                        data-url="{{ route('app.admin.surat.skbn.cetak') }}"
                                                        class="btn btn-warning btn-sm me-2 btn-cetak-kades "><i
                                                            class="fa fa-print"></i> Kepala Desa</button>
                                                    <button data-id="{{ $bedaNama->no_urut_surat }}"
                                                        data-url="{{ route('app.admin.surat.skbn.cetak') }}"
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
            @include('admin.layanan_umum.sk_beda_nama.template_surat.preview_surat')
        </div>
        <div class="col-lg-12" id="sekdes" style="display: none;">
            @include('admin.layanan_umum.sk_beda_nama.template_surat.preview_surat_an')
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
                        $('#nama').text(response.data.penduduk.nama_lengkap);
                        $('#agama').text(response.data.penduduk.agama);
                        $('#alamat').text(response.data.penduduk.alamat);
                        $('#pekerjaan').text(response.pekerjaan);
                        $('#desc_alamat').text(response.alamat);

                        $('#gender').text(response.jk);
                        $('#tgl_surat').text(response.tgl_surat);
                        $('#ttl').text(response.ttl);
                        $('#keterangan_beda').text(response.keterangan);
                        $('#jumlah_berkas').text(response.data.jumlah_berkas);
                        $('#dokumen_berbeda').text(response.data.dokumen_berbeda);
                        $('#perbedaan_nama').text(response.data.perbedaan_nama);
                        let html = ''; // Deklarasi variabel html

                        $.each(response.combined_data, function(key, value) {
                            html += '<tr>' +
                                '<td style="width: 200px;">' + value.keterangan +
                                '</td>' +
                                '<td style="padding-right: 5px;">:</td>' +
                                '<td><strong id="beda_nama">' + value.nama +
                                '</strong></td>' +
                                '</tr>';
                        });

                        $('#list_perbedaan').after(html);

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
                        $('#nama_an').text(response.data.penduduk.nama_lengkap);
                        $('#agama_an').text(response.data.penduduk.agama);
                        $('#alamat_an').text(response.data.penduduk.alamat);
                        $('#pekerjaan_an').text(response.pekerjaan);
                        $('#alamat_an').text(response.alamat);

                        $('#gender_an').text(response.jk);
                        $('#tgl_surat_an').text(response.tgl_surat);
                        $('#ttl_an').text(response.ttl);
                        $('#keterangan_beda_an').text(response.keterangan);
                        $('#jumlah_berkas_an').text(response.data.jumlah_berkas);
                        $('#dokumen_berbeda_an').text(response.data.dokumen_berbeda);
                        $('#perbedaan_nama_an').text(response.data.perbedaan_nama);
                        let html = ''; // Deklarasi variabel html

                        $.each(response.combined_data, function(key, value) {
                            html += '<tr>' +
                                '<td style="width: 200px;">' + value.keterangan +
                                '</td>' +
                                '<td style="padding-right: 5px;">:</td>' +
                                '<td><strong id="beda_nama_an">' + value.nama +
                                '</strong></td>' +
                                '</tr>';
                        });

                        $('#list_perbedaan_an').after(html);

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
