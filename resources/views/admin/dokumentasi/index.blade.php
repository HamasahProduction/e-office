@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Dokumentasi
        @endslot
        @slot('li_1')
            Dokumentasi
        @endslot
        @slot('li_2')
            Daftar
        @endslot
        @slot('action_button')
            <a href="{{ route('app.admin.dokumentasi.create') }}" class="btn btn-primary btn-md">
                <i class="fa fa-plus"></i> Buat Dokumentasi
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
                                    <input type="date" class="form-control" name="tgl_publish"
                                        value="{{ old('tgl_publish', request('tgl_publish', $tgl_publish)) }}">
                                    <label class="focus-label">Tanggal Publish </label>
                                </div>
                            </div>

                            <div class="col-md-8 col-12">
                                <div class="col-md-8 float-start">
                                    <button type="submit"
                                        onclick="javascript: form.action='{{ route('app.admin.dokumentasi.index') }}';"
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
                                            <th>Publish</th>
                                            <th>Judul</th>
                                            <th>Status</th>
                                            <th>Publisher</th>
                                            <th>File</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dokumentasi as $doc_publish)
                                            <tr>
                                                <td>{{ Carbon\Carbon::parse($doc_publish->tgl_publish)->isoFormat('D MMMM Y') }}
                                                <td>{{ $doc_publish->judul }}</td>
                                                <td>{{ $doc_publish->is_publish == true?'Publish':'Takedown' }}</td>
                                                <td>{{ $doc_publish->user->name }}</td>
                                                <td>
                                                    @if (!empty($doc_publish->file))
                                                        <img src="{{ asset($doc_publish->file == null ? 'assets/img/placeholder.jpg' : 'storage/' . $doc_publish->file) }}"
                                                            alt="dokumentasi" class="img-fluid rounded-3" width="100" />
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('app.admin.dokumentasi.edit', [$doc_publish->id]) }}"
                                                        class="btn btn-sm btn-warning">
                                                        Edit
                                                    </a>
                                                    @if ($doc_publish->is_publish == true)
                                                        <button type="button"
                                                            data-action="{{ route('app.admin.dokumentasi.takedown', $doc_publish->id) }}"
                                                            data-id="{{ $doc_publish->id }}"
                                                            class="btn btn-success btn-sm btn-takedown">
                                                            Takedown
                                                        </button>
                                                    @else
                                                        <button type="button"
                                                            data-action="{{ route('app.admin.dokumentasi.publish', $doc_publish->id) }}"
                                                            data-id="{{ $doc_publish->id }}"
                                                            class="btn btn-danger btn-sm btn-publish">
                                                            Publish
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
            $('.datatable').dataTable({
                destroy: true,
                order: [
                    [0, 'desc']
                ],
            });
        });
        $('.btn-takedown').on('click', function() {
            var action = $(this).data('action');
            var id = $(this).data('id');
            swal.fire({
                title: "Apakah Anda Yakin?",
                text: "Anda yakin sudah TakeDown ini?",
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
        $('.btn-publish').on('click', function() {
            var action = $(this).data('action');
            var id = $(this).data('id');
            Swal.fire({
                title: "Apakah Anda Yakin Publish Dokumentasi ini?",
                text: "Anda yakin sudah Publish Dokumentasi ini?",
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
    </script>
@endpush
