@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Data Penduduk
        @endslot
        @slot('li_1')
            Data Penduduk
        @endslot
        @slot('li_2')
            Daftar
        @endslot
        @slot('action_button')
            {{-- <a href="{{ route('app.admin.penduduk.lahir') }}" class="btn btn-outline-primary btn-md">
                <i class="fa fa-plus"></i> Penduduk Lahir
            </a>
            <a href="{{ route('app.admin.penduduk-pindah-datang.create') }}" class="btn btn-outline-success btn-md">
                <i class="fa fa-plus"></i> Penduduk Pindah Datang
            </a> --}}
            <a href="{{ route('app.admin.penduduk.create') }}" class="btn btn-warning btn-md">
                <i class="fa fa-plus"></i> Tambah Penduduk
            </a>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#import-penduduk"><i
                    class="fa fa-download"></i> Import Penduduk</button>
            @include('admin.penduduk.modal.import_penduduk');
        @endslot
    @endcomponent

    <x-alert />
    @if (session('errorimport'))
        <?php $errorimport = session('errorimport'); ?>
        @if (count($errorimport) > 0)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h4>Ops, ada beberapa penduduk yang tidak berhasil diimport!</h4>
                @foreach ($errorimport as $error)
                    {!! $error !!}<br>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="" method="get">
                        <div class="row filter-row">

                            <div class="col-md-2">
                                <div class="form-group form-focus select-focus focused">
                                    <input type="date" class="form-control" name="birthday"
                                        value="{{ old('birthday', request('birthday', $birthday)) }}">
                                    <label class="focus-label">Tanggal Lahir </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group form-group form-focus select-focus focused">
                                    <select class="select2 col-lg-12" name="status" id="status">
                                        <option selected disabled>Status Penduduk</option>
                                        <option value="">--Semua Status--</option>
                                        <option value="tetap" {{ request('status') == 'tetap' ? 'selected' : '' }}>
                                            Penduduk Tetap</option>
                                        <option value="tidak_tetap" {{ request('status') == 'tidak_tetap' ? 'selected' : '' }}>
                                            Tidak Tetap</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-group form-focus select-focus focused">
                                    <select class="select2 col-lg-12" name="rt_id" id="rt_id">
                                        <option selected disabled>Pilih RT</option>
                                        @foreach ($rts as $item)
                                            <option value="{{ $item->id }}">RT : {{ $item->nomor }} | RW :
                                                {{ $item->rw }} | {{ $item->dusun }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="col-md-8 float-start">
                                    <button type="submit"
                                        onclick="javascript: form.action='{{ route('app.admin.penduduk.index') }}';"
                                        class="btn btn-primary w-20 btn-sm ">Filter Data
                                    </button>
                                    <button type="submit" target="_blank"
                                        onclick="javascript: form.action='{{ route('app.admin.penduduk.index') }}';"
                                        class="btn btn-warning w-20 btn-sm">Refresh</button>
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
                                            <th width="10%">Status Penduduk</th>
                                            <th>Nama</th>
                                            <th>NIK</th>
                                            <th>No KK</th>
                                            <th>Orangtua</th>
                                            {{-- <th>Alamat</th> --}}
                                            <th>Dusun/RT/RW</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($penduduks as $penduduk)
                                            <tr>
                                                <td>
                                                    <span
                                                        class="badge {{ $penduduk->status_penduduk == 'tetap' ? 'badge-primary' : 'badge-danger' }}">{{ strtoupper($penduduk->status_penduduk) }}</span>
                                                </td>
                                                <td><strong>{{ $penduduk->nama_lengkap }}</strong> <br> TGL Lahir :
                                                    {{ Carbon\Carbon::parse($penduduk->tgl_lahir)->isoFormat('dddd, D MMMM Y') }}
                                                </td>
                                                <td>{{ $penduduk->nik }}</td>
                                                <td>{{ $penduduk->no_kk }}</td>
                                                <td><strong>AYAH : {{ $penduduk->nama_ayah ?? '-' }} <br> IBU :
                                                        {{ $penduduk->nama_ibu ?? '-' }}</strong></td>
                                                {{-- <td>{!! wordwrap($penduduk->alamat, 50, "<br>\n") !!}</td> --}}
                                                <td>{{ $penduduk->Rt->dusun }} <br>RT: {{ $penduduk->Rt->nomor }}
                                                    /RW: {{ $penduduk->Rt->rw }}</td>
                                                <td>
                                                    <a href="{{ route('app.admin.penduduk.edit', [$penduduk->nik]) }}"
                                                        class="btn btn-sm btn-warning">
                                                        Edit
                                                    </a>
                                                    <a href="{{ route('app.admin.penduduk.detail', [$penduduk->nik]) }}"
                                                        class="btn btn-sm btn-primary">
                                                        Detail
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
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });

        $(document).ready(function() {
            $('#uploadBtn').click(function() {
                // Sembunyikan tombol upload
                $(this).hide();
                // Tampilkan tombol loading
                $('#loadingBtn').show();
                $('#closeBtn').hide();
            });
        });

        // document.addEventListener('DOMContentLoaded', function() {
        //     const importForm = document.getElementById('importForm');
        //     const importButton = document.getElementById('importButton');
        //     const spinner = document.getElementById('spinner');
        //     const closeButton = document.getElementById('closeButton');
        //     const cancelButton = document.getElementById('cancelButton');

        //     importForm.addEventListener('submit', function(event) {
        //         // Menampilkan spinner
        //         spinner.style.display = 'block';
        //         importButton.disabled = true; // Menonaktifkan tombol import
        //         cancelButton.disabled = true; //

        //         // Anda bisa menambahkan validasi lainnya di sini jika diperlukan

        //         // Form di-submit secara normal
        //     });
        //     $('#import-penduduk').on('hide.bs.modal', function(event) {
        //         if (!spinner.style.display === 'block') {
        //             event.preventDefault();
        //         }
        //     });
        //     $('#importModal').on('shown.bs.modal', function(event) {
        //         closeButton.disabled = true;
        //     });
        // });
    </script>
@endpush
