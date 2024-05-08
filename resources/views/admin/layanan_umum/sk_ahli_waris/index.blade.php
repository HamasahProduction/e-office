@extends('layout.mainSurat')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Surat Ahli Waris
        @endslot
        @slot('li_1')
            Ahli Waris
        @endslot
        @slot('li_2')
            Daftar
        @endslot
        @slot('action_button')
            <a href="{{ route('app.admin.surat-keterangan-ahli-waris.create') }}" class="btn btn-primary btn-md">
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
                                        onclick="javascript: form.action='{{ route('app.admin.surat-keterangan-ahli-waris.index') }}';"
                                        class="btn btn-primary w-20 btn-sm ">Filter Data
                                    </button>
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
                                            <th>Pewaris</th>
                                            <th>Ahli Waris</th>
                                            <th>RT / RW</th>
                                            <th>Print</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sk_ahli_waris as $ahliWaris)
                                            <tr>
                                                <td>{{ Carbon\Carbon::parse($ahliWaris->tgl_surat)->isoFormat('D MMMM Y') }}
                                                </td>
                                                <td>{{ $ahliWaris->nomor_surat }}</td>
                                                <td>
                                                    <strong>
                                                        {{ $ahliWaris->nama_pewaris }} <br>
                                                        <small>{{ $ahliWaris->alamat_pewaris }}</small>
                                                    </strong>
                                                </td>
                                                <td>
                                                    @foreach ($ahliWaris->anggotaPindah as $anggota)
                                                        NIK : {{ $anggota->nik }} <br>
                                                        Nama : {{ $anggota->nama }}<br>
                                                        TTL : {{ $anggota->ttl }} <br><br>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    RT : {{ $ahliWaris->ketua_rt }} <br>
                                                    RW : {{ $ahliWaris->ketua_rw }} <br>
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button"
                                                            class="btn btn-warning dropdown-toggle btn-sm"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">Pilih Print </button>
                                                        <div class="dropdown-menu" style="">
                                                            <a class="dropdown-item btn-cetak-kades" href="#"
                                                                data-id="{{ $ahliWaris->id }}"
                                                                data-url="{{ route('app.admin.surat-keterangan-ahli-waris.cetak') }}">Kepala
                                                                Desa</a>
                                                            <a class="dropdown-item btn-cetak-an" href="#"
                                                                data-id="{{ $ahliWaris->id }}"
                                                                data-url="{{ route('app.admin.surat-keterangan-ahli-waris.cetak') }}">Sekertaris
                                                                Desa</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="{{ route('app.admin.surat-keterangan-ahli-waris.edit', $ahliWaris->id) }}"
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
            @include('admin.layanan_umum.sk_ahli_waris.template_surat.preview_surat')
        </div>
        <div class="col-lg-12" id="sekdes" style="display: none;">
            @include('admin.layanan_umum.sk_ahli_waris.template_surat.preview_surat_an')
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
                var id = $(this).data("id");
                var url = $(this).data("url");
                $.ajax({
                    url: url,
                    method: "GET",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        var anggotaTable = $('#anggotaTable');
                        anggotaTable.empty(); // Clear existing table content

                        $.each(response.anggota, function(index, member) {
                            var html =
                                '<table style="width: 100%; ">' +
                                '<tr style=" padding-bottom:0px; padding-top:0px;">' +
                                '<td>Nama</td>' +
                                '<td style="padding-right: 5px">:</td>' +
                                '<td> <strong id="nama">' + member.nama.toUpperCase() +'</strong></td>' +
                                '</tr>' +
                                '<tr style=" padding-bottom:0px; padding-top:0px;">' +
                                '<td style="width: 200px;">NIK</td>' +
                                '<td style="padding-right: 5px">:</td>' +
                                '<td id="nik">' + member.nik +'</td>' +
                                '</tr>' +
                                '<tr style=" padding-bottom:0px; padding-top:0px;">' +
                                '<td>Tempat Tanggal Lahir</td>' +
                                '<td style="padding-right: 5px">:</td>' +
                                '<td id="ttl">' + member.ttl.toUpperCase() + '</td>' +
                                '</tr>' +
                                '<tr style=" padding-bottom:0px; padding-top:0px;">' +
                                '<td>Alamat</td>' +
                                '<td style="padding-right: 5px">:</td>' +
                                '<td><p id="alamat">' + member.alamat.toUpperCase() + '</p></td>' +
                                '</tr>' +
                                '</table>';

                            anggotaTable.append(
                                html); // Append the generated HTML to the table
                        });
                        var signatureTable = $('#signatureMember');
                        signatureTable.empty();
                        var tableHtml =
                            '<table style="width: 100%; "><thead><tr style="padding-left:5px; margin-bottom:5px;"><th>Yang menyatakan</th><th >Tanda Tangan</th></tr></thead><tbody>';

                        $.each(response.anggota, function(index, member) {
                            var currentIndex = index + 1;
                            // Mengganti <table> dengan <tbody> untuk menambahkan baris data
                            tableHtml +=
                                '<tr>' +
                                '<td>' + currentIndex + '. ' + member.nama.toUpperCase() + '</td>' +
                                '<td >..........................</td>' +
                                '</tr>';
                        });

                        // Menutup <tbody> setelah loop selesai
                        tableHtml += '</tbody></table>';

                        // Menambahkan tabel ke elemen signatureTable
                        signatureTable.append(tableHtml);


                        // $('#signatureTableContainer').empty().append(signatureTable);
                        $('#no_surat').text(response.no_surat);
                        $('#alamat_pewaris').text(response.data.alamat_pewaris.toUpperCase());
                        $('#pewaris').text(response.data.nama_pewaris.toUpperCase());
                        $('#ketua_rt').text(response.data.ketua_rt.toUpperCase());
                        $('#ketua_rw').text(response.data.ketua_rw.toUpperCase());
                        $('#tgl_surat').text(response.tgl_surat);
                        var printContents = document.getElementById('kepdes').innerHTML;
                        var originalContents = document.body.innerHTML;
                        document.body.innerHTML = printContents;
                        var printResult = window.print();
                        // If the print dialog returns false (cancelled), reload the page
                        if (!printResult) {
                            location.reload();
                        }

                        document.body.innerHTML = originalContents;
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
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
                        var anggotaTable = $('#anggotaTable_an');
                        anggotaTable.empty(); // Clear existing table content

                        $.each(response.anggota, function(index, member) {
                            var html =
                                '<table style="width: 100%; ">' +
                                '<tr style=" padding-bottom:0px; padding-top:0px;">' +
                                '<td>Nama</td>' +
                                '<td style="padding-right: 5px">:</td>' +
                                '<td> <strong id="nama_an">' + member.nama.toUpperCase() +'</strong></td>' +
                                '</tr>' +
                                '<tr style=" padding-bottom:0px; padding-top:0px;">' +
                                '<td style="width: 200px;">NIK</td>' +
                                '<td style="padding-right: 5px">:</td>' +
                                '<td id="nik_an">' + member.nik +'</td>' +
                                '</tr>' +
                                '<tr style=" padding-bottom:0px; padding-top:0px;">' +
                                '<td>Tempat Tanggal Lahir</td>' +
                                '<td style="padding-right: 5px">:</td>' +
                                '<td id="ttl_an">' + member.ttl.toUpperCase() + '</td>' +
                                '</tr>' +
                                '<tr style=" padding-bottom:0px; padding-top:0px;">' +
                                '<td>Alamat</td>' +
                                '<td style="padding-right: 5px">:</td>' +
                                '<td><p id="alamat_an">' + member.alamat.toUpperCase() + '</p></td>' +
                                '</tr>' +
                                '</table>';

                            anggotaTable.append(
                                html); // Append the generated HTML to the table
                        });
                        var signatureTable = $('#signatureMember_an');
                        signatureTable.empty();
                        var tableHtml =
                            '<table style="width: 100%; "><thead><tr style="padding-left:5px; margin-bottom:5px;"><th>Yang menyatakan</th><th >Tanda Tangan</th></tr></thead><tbody>';

                        $.each(response.anggota, function(index, member) {
                            var currentIndex = index + 1;
                            // Mengganti <table> dengan <tbody> untuk menambahkan baris data
                            tableHtml +=
                                '<tr>' +
                                '<td>' + currentIndex + '. ' + member.nama.toUpperCase() + '</td>' +
                                '<td >..........................</td>' +
                                '</tr>';
                        });

                        // Menutup <tbody> setelah loop selesai
                        tableHtml += '</tbody></table>';

                        // Menambahkan tabel ke elemen signatureTable
                        signatureTable.append(tableHtml);


                        // $('#signatureTableContainer').empty().append(signatureTable);
                        $('#no_surat_an').text(response.no_surat);
                        $('#alamat_pewaris_an').text(response.data.alamat_pewaris.toUpperCase());
                        $('#pewaris_an').text(response.data.nama_pewaris.toUpperCase());
                        $('#ketua_rt_an').text(response.data.ketua_rt.toUpperCase());
                        $('#ketua_rw_an').text(response.data.ketua_rw.toUpperCase());
                        $('#tgl_surat_an').text(response.tgl_surat);
                        var printContents = document.getElementById('sekdes').innerHTML;
                        var originalContents = document.body.innerHTML;
                        document.body.innerHTML = printContents;
                        var printResult = window.print();
                        // If the print dialog returns false (cancelled), reload the page
                        if (!printResult) {
                            location.reload();
                        }

                        document.body.innerHTML = originalContents;
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endpush
