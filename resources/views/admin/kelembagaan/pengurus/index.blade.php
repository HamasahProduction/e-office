@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Pengurus Lembaga
        @endslot
        @slot('li_1')
            Pengurus Lembaga
        @endslot
        @slot('li_2')
            Daftar
        @endslot
        @slot('action_button')
            <a href="{{ route('app.admin.kelembagaan.pengurus.create') }}" class="btn btn-primary btn-md">
                <i class="fa fa-plus"></i> Tambah Pengurus
            </a>
        @endslot
    @endcomponent

    <x-alert />

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-bottom mb-3">
                        <li class="nav-item">
                            <a href="{{ route('app.admin.kelembagaan.pengurus.index') }}"
                                class="nav-link {{ Request::get('view') != 'inactive' ? 'active' : '' }}">
                                Aktif&nbsp;
                                <span class="badge badge-primary">{{ $activeCount }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?view=inactive"
                                class="nav-link {{ Request::get('view') == 'inactive' ? 'active' : '' }}">
                                Berhenti&nbsp;
                                <span class="badge badge-danger">{{ $inactiveCount }}</span>
                            </a>
                        </li>
                    </ul>
                    <form action="" method="get">
                        <div class="row filter-row">

                            <div class="col-md-2">
                                <div class="form-group ">
                                    <select class="select " name="status" id="status">
                                        <option selected disabled>Pilih Status</option>
                                        <option value="">--Pilih Status--</option>
                                        <option value="">Aktif</option>
                                        <option value="">Tidak Aktif</option>
                                        <option value="">Demisioner</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <select class="select " name="lembaga" id="lembaga">
                                        <option selected disabled>Pilih Lembaga</option>
                                        <option value="">--Pilih Lembaga--</option>
                                        <option value="">Karang Taruna</option>
                                        <option value="">Badan Usaha Milik Desa</option>
                                        <option value="">PKK</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="col-md-8 float-start">
                                    <button type="submit"
                                        onclick="javascript: form.action='{{ route('app.admin.kelembagaan.pengurus.index') }}';"
                                        class="btn btn-primary w-20 btn-sm ">Filter Data
                                    </button>
                                    <button type="submit" target="_blank"
                                        onclick="javascript: form.action='{{ route('app.admin.kelembagaan.pengurus.index') }}';"
                                        class="btn btn-success w-20 btn-sm">Download Data</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="tab-content">
                        <div class="tab-pane show active">
                            <div class="table-responsive">
                                <table class="table table-striped custom-table no-footer mb-0" style="width: 100%;"
                                    id="datatable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Lembaga</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Jabatan</th>
                                            <th>Status</th>
                                            <th>Tanggal Pengangkatan</th>
                                            <th>Tanggal Pemberhentian</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pengurus as $pengurusLembaga)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $pengurusLembaga->lembaga->nama_lembaga }}</td>
                                                <td>{{ $pengurusLembaga->penduduk->nama_lengkap }}</td>
                                                <td>{{ $pengurusLembaga->penduduk->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}
                                                </td>
                                                <td>{{ $pengurusLembaga->jabatan->nama_jabatan }}</td>
                                                <td>{{ $pengurusLembaga->is_active == true ? 'Aktif' : 'Tidak Aktif' }}</td>
                                                <td>{{ $pengurusLembaga->tgl_pengangkatan }}</td>
                                                <td>{{ $pengurusLembaga->tgl_pemberhentian == null ? '-' : $pengurusLembaga->tgl_pemberhentian }}
                                                </td>
                                                <td>
                                                    @if (empty($pengurusLembaga->tgl_pemberhentian))
                                                        <button type="button"
                                                            data-action="{{ route('app.admin.kelembagaan.pengurus.pemberhentian', $pengurusLembaga->id) }}"
                                                            data-id="{{ $pengurusLembaga->id }}"
                                                            class="btn btn-danger btn-sm btn-pemberhentian">
                                                            Pemberhentian
                                                        </button>
                                                    @endif
                                                    <a href="" class="btn btn-sm btn-warning">
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
@endsection
@push('styles')
<style>
   .swal2-date-picker {
        width: 100%;
    }
</style>
@endpush
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
            $('.btn-pemberhentian').on('click', function() {
                var action = $(this).data('action');
                var id = $(this).data('id');
                Swal.fire({
                    title: "Apakah Anda Yakin Memberhentikan Pengurus ini?",
                    text: "silahkan masukan tanggal pemberhentian",
                    input: "date",
                    // inputAttributes: {
                    //     autocapitalize: "on"
                    // },
                    showCancelButton: true,
                    confirmButtonText: "Ya, saya yakin",
                    cancelButtonText: "Batalkan",
                    showLoaderOnConfirm: true,
                    // customClass: {
                    //     // Atur lebar kolom menjadi 12 dari 12
                    //     popup: 'col-sm-2'
                    // }
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
                                    tgl_pemberhentian: result.value,
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
