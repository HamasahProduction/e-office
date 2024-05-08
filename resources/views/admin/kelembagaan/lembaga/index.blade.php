@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Data Lembaga
        @endslot
        @slot('li_1')
            Data Lembaga
        @endslot
        @slot('li_2')
            Daftar
        @endslot
        @slot('action_button')
            <a href="{{ route('app.admin.kelembagaan.lembaga.create') }}" class="btn btn-primary btn-md">
                <i class="fa fa-plus"></i> Tambah Lembaga
            </a>
        @endslot
    @endcomponent

    <x-alert />

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-bottom">
                        <li class="nav-item">
                            <a href="{{ route('app.admin.kelembagaan.lembaga.index') }}"
                                class="nav-link {{ Request::get('view') != 'inactive' ? 'active' : '' }}">
                                Aktif&nbsp;
                                <span class="badge badge-primary">{{ $activeCount }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?view=inactive"
                                class="nav-link {{ Request::get('view') == 'inactive' ? 'active' : '' }}">
                                Tidak Aktif&nbsp;
                                <span class="badge badge-danger">{{ $inactiveCount }}</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active">
                            <div class="table-responsive">
                                <table class="table table-striped custom-table no-footer mb-0" style="width: 100%;" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>Logo</th>
                                            <th>Nama Lembaga</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lembagas as $lembaga)
                                        <tr>
                                            <td>
                                                <img src="{{ asset($lembaga->image == null ? 'assets/img/placeholder.jpg' : 'storage/' . $lembaga->image) }}"
                                                        alt="LogoLembaga" style="width: 60px">
                                            </td>
                                            <td>{{ $lembaga->nama_lembaga }}</td>
                                            <td>{{ $lembaga->is_active==true?'Aktif':'Tidak Aktif' }}</td>
                                            <td>
                                                <a href="{{ route('app.admin.kelembagaan.lembaga.edit', ['id'=>$lembaga->id]) }}" class="btn btn-sm btn-warning">
                                                    Edit
                                                </a>
                                                @if ($lembaga->is_active)
                                                        <button type="button"
                                                            data-action="{{ route('app.admin.kelembagaan.lembaga.inactive', $lembaga->id) }}"
                                                            data-id="{{ $lembaga->id }}"
                                                            class="btn btn-danger btn-sm btn-nonaktif">
                                                            Non-Aktifkan
                                                        </button>
                                                    @else
                                                        <button type="button"
                                                            data-action="{{ route('app.admin.kelembagaan.lembaga.active', $lembaga->id) }}"
                                                            data-id="{{ $lembaga->id }}"
                                                            class="btn btn-success btn-sm btn-aktif">
                                                            Aktifkan
                                                        </button>
                                                        <button type="button"
                                                            data-action="{{ route('app.admin.kelembagaan.lembaga.remove', $lembaga->id) }}"
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                scrollX: true,
            });
        });
        $(function() {
            $('.btn-nonaktif').on('click', function() {
                var action = $(this).data('action');
                var id = $(this).data('id');
                swal.fire({
                    title: "Apakah Anda Yakin?",
                    text: "Anda yakin menon-aktifkan lembaga ini?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Non-Aktifkan!",
                    cancelButtonText: "Batal!",
                    // reverseButtons: true
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
            $('.btn-aktif').on('click', function() {
                var action = $(this).data('action');
                var id = $(this).data('id');
                swal.fire({
                    title: "Apakah Anda Yakin?",
                    text: "Anda yakin aktifkan lembaga ini?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Aktifkan!",
                    cancelButtonText: "Batal!",
                    // reverseButtons: true
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
