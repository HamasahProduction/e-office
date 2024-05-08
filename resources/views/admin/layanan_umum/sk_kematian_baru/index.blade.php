@extends('layout.mainSurat')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Surat Kematian Baru
        @endslot
        @slot('li_1')
            Kematian Baru
        @endslot
        @slot('li_2')
            Daftar
        @endslot
        @slot('action_button')
            <a href="{{ route('app.admin.surat-keterangan-kematian-baru.create') }}" class="btn btn-primary btn-md">
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
                                        onclick="javascript: form.action='{{ route('app.admin.surat-keterangan-kematian-baru.index') }}';"
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
                                            <th>Penduduk</th>
                                            <th>Waktu</th>
                                            <th>Tempat</th>
                                            <th>Print</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($sk_kematian_lama as $pemohon)
                                            <tr>
                                                <td>{{ Carbon\Carbon::parse($pemohon->tgl_surat)->isoFormat('D MMMM Y') }}
                                                </td>
                                                <td>{{ $pemohon->nomor_surat }}</td>
                                                <td>
                                                    <strong>
                                                        {{ $pemohon->penduduk->nama_lengkap }} <br> NIK :
                                                        {{ $pemohon->nik }}
                                                    </strong>
                                                </td>
                                                <td>
                                                    Hari : {{ $pemohon->hari_meninggal }} <br>
                                                    Tanggal :
                                                    {{ Carbon\Carbon::parse($pemohon->tgl_meninggal)->isoFormat('D MMMM Y') }}
                                                    <br>
                                                </td>
                                                <td>
                                                    Lokasi : {{ $pemohon->lokasi_meninggal }} <br>
                                                    Penyebab : {{ $pemohon->penyebab_meninggal }} <br>
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button"
                                                            class="btn btn-warning dropdown-toggle btn-sm"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">Pilih Print </button>
                                                        <div class="dropdown-menu" style="">
                                                            <a class="dropdown-item btn-cetak-kades" href="#"
                                                                data-id="{{ $pemohon->no_urut_surat }}"
                                                                data-url="{{ route('app.admin.surat-keterangan-kematian-baru.cetak') }}">Kepala
                                                                Desa</a>
                                                            <a class="dropdown-item btn-cetak-an" href="#"
                                                                data-id="{{ $pemohon->no_urut_surat }}"
                                                                data-url="{{ route('app.admin.surat-keterangan-kematian-baru.cetak') }}">Sekertaris
                                                                Desa</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="{{ route('app.admin.surat-keterangan-kematian-baru.edit', $pemohon->id) }}"
                                                        class="btn btn-sm btn-warning">
                                                        Edit
                                                    </a>
                                                    @if ($pemohon->penduduk->is_live == true)
                                                        <button type="button"
                                                            data-action="{{ route('app.admin.surat-keterangan-kematian-baru.update.kependudukan', $pemohon->id) }}"
                                                            data-id="{{ $pemohon->id }}"
                                                            class="btn btn-success btn-sm btn-update-penduduk">
                                                            Update Penduduk
                                                        </button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach --}}
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
            @include('admin.layanan_umum.sk_kematian_lama.template_surat.preview_surat')
        </div>
        <div class="col-lg-12" id="sekdes" style="display: none;">
            @include('admin.layanan_umum.sk_kematian_lama.template_surat.preview_surat_an')
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
                        $('#umur').text(response.umur);
                        $('#nama').text(response.data.penduduk.nama_lengkap);
                        $('#pekerjaan').text(response.pekerjaan);
                        $('#rt').text(response.rt);
                        $('#alamat').text(response.alamat);
                        $('#ttl').text(response.ttl);

                        $('#gender').text(response.jk);
                        $('#tgl_surat').text(response.tgl_surat);
                        $('#tgl_meninggal').text(response.tgl_meninggal);
                        $('#hari').text(response.data.hari_meninggal);
                        $('#lokasi').text(response.data.lokasi_meninggal);
                        $('#penyebab').text(response.data.penyebab_meninggal);
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
                        $('#umur_an').text(response.umur);
                        $('#nama_an').text(response.data.penduduk.nama_lengkap);
                        $('#pekerjaan_an').text(response.pekerjaan);
                        $('#rt_an').text(response.rt);
                        $('#alamat_an').text(response.alamat);
                        $('#ttl_an').text(response.ttl);

                        $('#gender_an').text(response.jk);
                        $('#tgl_surat_an').text(response.tgl_surat);
                        $('#tgl_meninggal_an').text(response.tgl_meninggal);
                        $('#hari_an').text(response.data.hari_meninggal);
                        $('#lokasi_an').text(response.data.lokasi_meninggal);
                        $('#penyebab_an').text(response.data.penyebab_meninggal);
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
            $('.btn-update-penduduk').on('click', function() {
                var action = $(this).data('action');
                var id = $(this).data('id');
                swal.fire({
                    title: "Apakah Anda Yakin?",
                    text: "Anda yakin update status kependudukan?",
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
