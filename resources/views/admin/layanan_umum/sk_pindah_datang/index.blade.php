@extends('layout.mainSurat')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Penduduk Pindah
        @endslot
        @slot('li_1')
            Penduduk Pindah
        @endslot
        @slot('li_2')
            Daftar
        @endslot
        @slot('action_button')
            <a href="{{ route('app.admin.surat-keterangan-pindah-datang.create') }}" class="btn btn-primary btn-md">
                <i class="fa fa-plus"></i> Penduduk Pindah
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
                                    <input type="date" class="form-control" name="startdate" value="{{ $startdate }}"
                                        id="start-date">
                                    <label class="focus-label">Tanggal Awal </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group form-focus select-focus focused">
                                    <input type="date" class="form-control" name="enddate" value="{{ $enddate }}"
                                        id="end-date">
                                    <label class="focus-label">Tanggal Akhir </label>
                                </div>
                            </div>


                            <div class="col-md-8 col-12">
                                <div class="col-md-8 float-start">
                                    <button type="submit"
                                        onclick="javascript: form.action='{{ route('app.admin.surat-keterangan-pindah-datang.index') }}';"
                                        class="btn btn-primary w-20 btn-sm ">Filter Data
                                    </button>
                                    <button type="submit" target="_blank"
                                        onclick="javascript: form.action='{{ route('app.admin.surat-keterangan-pindah-datang.export') }}';"
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
                                            <th>Tgl Pindah</th>
                                            <th>Kepala Keluarga</th>
                                            <th>NIK Pemohon</th>
                                            <th>Kepindahan</th>
                                            <th>Daerah Tujuan</th>
                                            <th>Status Kependudukan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pendudukPindahs as $pendudukPindah)
                                            <tr>
                                                <td>{{ $pendudukPindah->rencana_tgl_pindah }}</td>
                                                <td>
                                                    NO KK : {{ $pendudukPindah->no_kk }} <br>
                                                    Nama : {{ $pendudukPindah->nama_kepala_keluarga }}
                                                </td>
                                                <td>
                                                    NIK : {{ $pendudukPindah->nik_pemohon }} <br>
                                                    Nama : {{ $pendudukPindah->pemohon->nama_lengkap }}
                                                </td>
                                                <td>
                                                    <strong>Jenis :</strong>
                                                    {{ $pendudukPindah->jenisKepindahan->keterangan }} <br>
                                                    <strong>Klasifikasi :
                                                    </strong>{{ $pendudukPindah->klasifikasiPindah->keterangan }}
                                                </td>
                                                <td>
                                                    Dusun : {{ $pendudukPindah->dusun_asal }} <br>
                                                    Desa : {{ $pendudukPindah->villageTujuan->name }} <br>
                                                    Kecamatan : {{ $pendudukPindah->districtTujuan->name }} <br>
                                                    Kabupaten : {{ $pendudukPindah->regencyTujuan->name }} <br>
                                                    Provinsi : {{ $pendudukPindah->provinceTujuan->name }} <br>
                                                </td>
                                                <td>
                                                    @if ($pendudukPindah->is_sync_status_penduduk == true)
                                                        <button type="button"
                                                            data-action="{{ route('app.admin.surat-keterangan-pindah-datang.restore-status', $pendudukPindah->id) }}"
                                                            data-id="{{ $pendudukPindah->id }}"
                                                            class="btn btn-success btn-sm btn-restore-status">
                                                            Aktifkan Status
                                                        </button>
                                                    @else
                                                        <button type="button"
                                                            data-action="{{ route('app.admin.surat-keterangan-pindah-datang.update-status-penduduk', $pendudukPindah->id) }}"
                                                            data-id="{{ $pendudukPindah->id }}"
                                                            class="btn btn-primary btn-sm btn-update-status-penduduk">
                                                            Update Kepindahan
                                                        </button>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('app.admin.surat-keterangan-pindah-datang.detail', [$pendudukPindah->nik_pemohon]) }}"
                                                        class="btn btn-sm btn-warning">
                                                        Detail
                                                    </a>
                                                    @if ($pendudukPindah->is_sync_status_penduduk == false)
                                                        <button type="button"
                                                            data-action="{{ route('app.admin.surat-keterangan-pindah-datang.remove', $pendudukPindah->id) }}"
                                                            data-id="{{ $pendudukPindah->id }}"
                                                            class="btn btn-danger btn-sm btn-delete btn-sm">
                                                            Hapus
                                                        </button>
                                                    @endif
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
@endsection
@push('scripts')
    <script>
        function printLetter(url) {
            // Load the content from the URL using AJAX
            fetch(url)
                .then(response => response.text())
                .then(data => {
                    // Open a new window and write the fetched HTML content
                    let printWindow = window.open('', '_blank');
                    printWindow.document.write(data);
                    printWindow.document.close();

                    // Once the content is loaded, trigger the print dialog
                    printWindow.onload = function() {
                        printWindow.print();
                    };
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('.datatable').dataTable({
                destroy: true,
                order: [
                    [0, 'desc']
                ],
            });
            $('.btn-update-status-penduduk').on('click', function() {
                var action = $(this).data('action');
                var id = $(this).data('id');
                swal.fire({
                    title: "Apakah Anda Yakin?",
                    text: "Anda yakin update status kependudukan ini?",
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
            $('.btn-restore-status').on('click', function() {
                var action = $(this).data('action');
                var id = $(this).data('id');
                Swal.fire({
                    title: "Apakah Anda Yakin ini?",
                    text: "Anda yakin update status kependudukan ini?",
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
        });

        $(document).ready(function() {
            $('body').on('click', '.btn-delete', function() {
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
