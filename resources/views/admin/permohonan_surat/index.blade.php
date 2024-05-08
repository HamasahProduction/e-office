@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Permohonan Surat
        @endslot
        @slot('li_1')
            Permohonan Surat
        @endslot
        @slot('li_2')
            Daftar
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
                                    <input type="date" class="form-control" name="start"
                                        value="{{ old('start', request('start', $start)) }}">
                                    <label class="focus-label">Tanggal Mulai </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group form-focus select-focus focused">
                                    <input type="date" class="form-control" name="finish"
                                        value="{{ old('finish', request('finish', $finish)) }}">
                                    <label class="focus-label">Tanggal Selesai </label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group ">
                                    <select class="select " name="status" id="status">
                                        <option selected disabled>Status Permohonan</option>
                                        <option value="">--Semua Status--</option>
                                        <option value="menunggu_proses">Menunggu Proses</option>
                                        <option value="siap_diambil">Siap Diambil</option>
                                        <option value="sudah_diambil">Sudah Diambil</option>
                                        <option value="dibatalkan">Dibatalkan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="col-md-8 float-start">
                                    <button type="submit"
                                        onclick="javascript: form.action='{{ route('app.admin.penduduk.index') }}';"
                                        class="btn btn-primary w-20 btn-sm ">Filter Data
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="tab-content">
                        <div class="tab-pane show active">
                            <div class="table-responsive">
                                <table class="table table-striped custom-table no-footer mb-0 " id="datatable">
                                    <thead>
                                        <tr>
                                            <th>Tanggal Permohonan</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>No Hp</th>
                                            <th>Jenis Surat</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permohonan as $data_permohonan)
                                            <tr>
                                                <td>{{ Carbon\Carbon::parse($data_permohonan->tgl_permohonan)->isoFormat('D MMMM Y') }}
                                                </td>

                                                <td>{{ $data_permohonan->nik }}</td>
                                                <td>{{ $data_permohonan->nama_pemohon }}</td>
                                                <td>{{ $data_permohonan->kontak }}</td>
                                                <td>{{ $data_permohonan->jenis_surat }}</td>
                                                <td>
                                                    <span
                                                        class="badge {{ $data_permohonan->status == 'menunggu_proses' ? 'badge-warning' : ($data_permohonan->status == 'sudah_diambil' ? 'badge-success' : ($data_permohonan->status == 'dibatalkan' ? 'badge-danger' : 'badge-primary')) }}">{{ $data_permohonan->status }}</span>
                                                </td>
                                                <td>
                                                    <a href="" class="btn btn-sm btn-warning">
                                                        Edit
                                                    </a>
                                                    <button type="button"
                                                        data-action="{{ route('app.admin.permohonan_surat.update.status', $data_permohonan->id) }}"
                                                        data-id="{{ $data_permohonan->id }}"
                                                        class="btn btn-primary btn-sm btn-update-status">
                                                        Update Status
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
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function() {
            $('#datatable').dataTable({
                destroy: true,
                order: [
                    [0, 'desc']
                ],
            });
            $('.btn-update-status').on('click', function() {
                var action = $(this).data('action');
                var id = $(this).data('id');
                Swal.fire({
                    title: "Apakah Anda Yakin Merubah Status?",
                    text: "silahkan pilih Status",
                    input: "select",
                    inputOptions: {
                        menunggu_proses: "Menunggu Proses",
                        siap_diambil: "Siap Diambil",
                        sudah_diambil: "Sudah Diambil",
                        dibatalkan: "Di Batalkan",
                    },
                    showCancelButton: true,
                    confirmButtonText: "Ya, saya yakin",
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
                                    status: result.value,
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
