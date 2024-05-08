@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Data Dusun
        @endslot
        @slot('li_1')
            Data Dusun
        @endslot
        @slot('li_2')
            Daftar
        @endslot
        @slot('action_button')
            <a href="{{ route('app.admin.pengaturan.dusun.create') }}" class="btn btn-primary btn-md">
                <i class="fa fa-plus"></i> Tambah Dusun
            </a>
        @endslot
    @endcomponent

    <x-alert />

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="tab-content">
                        <div class="tab-pane show active">
                            <div class="table-responsive">
                                <table class="table table-striped custom-table no-footer mb-0" style="width: 100%;" id="datatable">
                                    <thead>
                                        <tr>
                                            <th width="10%">No</th>
                                            <th>Nama</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dusuns as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama_dusun }}</td>
                                                <td>
                                                    <a href="{{ route('app.admin.pengaturan.dusun.edit', [$item->id]) }}"
                                                        class="btn btn-sm btn-warning">
                                                        Edit
                                                    </a>
                                                    <button type="button"
                                                        data-action="{{ route('app.admin.pengaturan.dusun.remove', $item->id) }}"
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
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                scrollX: true,
            });
            $('.select2').select2();
        });
        // $(function() {

        //     $('.btn-delete').on('click', function() {
        //         var action = $(this).data('action');
        //         var id = $(this).data('id');
        //         swal.fire({
        //             title: "Apakah Anda Yakin?",
        //             text: "Anda yakin menghapus data ini?",
        //             icon: "info",
        //             showCancelButton: true,
        //             confirmButtonText: "Hapus!",
        //             cancelButtonText: "Batal!",
        //             // reverseButtons: true
        //         }).then((result) => {
        //             if (result.isConfirmed) {
        //                 $.ajax({
        //                     url: action,
        //                     type: 'DELETE',
        //                     cache: false,
        //                     dataType: 'json',
        //                     data: {
        //                         id: id,
        //                         _token: "{{ csrf_token() }}",
        //                     },
        //                     success: function(response) {
        //                         Swal.fire({
        //                             type: 'success',
        //                             icon: 'success',
        //                             title: `${response.message}`,
        //                             showConfirmButton: true,
        //                             timer: 6000
        //                         }).then((result) => {
        //                             if (result.isConfirmed) {
        //                                 location.reload();
        //                             }
        //                         });
        //                     }
        //                 });
        //             }
        //         });
        //     });

        // });

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
