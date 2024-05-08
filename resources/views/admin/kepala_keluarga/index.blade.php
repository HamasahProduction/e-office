@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Data Kepala Keluarga
        @endslot
        @slot('li_1')
            Data Kepala Keluarga
        @endslot
        @slot('li_2')
            Daftar
        @endslot
        @slot('action_button')
            <a href="{{ route('app.admin.kepala_keluarga.create') }}" class="btn btn-success btn-md">
                <i class="fa fa-plus"></i> Tambah Kepala Keluarga
            </a>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#import-kelompok-keluarga"><i
                    class="fa fa-download"></i> Import KK</button>
            @include('admin.kepala_keluarga.modal.import_kk');
        @endslot
    @endcomponent

    <x-alert />
    @if (session('errorimport'))
        <?php $errorimport = session('errorimport'); ?>
        @if (count($errorimport) > 0)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h4>Ops, ada beberapa kepala keluarga yang tidak berhasil diimport!</h4>
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
                    {{-- <form action="" method="get">
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
                                    <select class="select2 floating col-lg-12 " name="jk" id="jk">
                                        <option selected disabled>Jenis Kelamin</option>
                                        <option value="">--Jenis Kelamin--</option>
                                        <option value="interest" {{ request('status') == 'interest' ? 'selected' : '' }}>
                                            Laki-Laki</option>
                                        <option value="booking" {{ request('status') == 'booking' ? 'selected' : '' }}>
                                            Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group form-group form-focus select-focus focused">
                                    <select class="select2 floating col-lg-12" name="rt_id" id="rt_id">
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
                                        onclick="javascript: form.action='{{ route('app.admin.penduduk.export') }}';"
                                        class="btn btn-success w-20 btn-sm">Download</button>
                                </div>
                            </div>
                        </div>
                    </form> --}}

                    <div class="tab-content">
                        <div class="tab-pane show active">
                            <div class="table-responsive">
                                <table class="table table-striped custom-table no-footer mb-0 datatable">
                                    <thead>
                                        <tr>
                                            <th width="10%">Ceklis</th>
                                            <th>Kepala Keluarga</th>
                                            <th>NIK</th>
                                            <th>No KK</th>
                                            <th>Jumlah Anggota</th>
                                            <th>Dusun | RT/RW</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kepalaKeluarga as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->penduduk->nama_lengkap }}</td>
                                                <td><a href="#"><u>{{ $item->penduduk->nik }}</u></a></td>
                                                <td><a href="#"><u>{{ $item->penduduk->no_kk }}</u></a></td>
                                                <td>
                                                    Jumlah Anggota :
                                                    {{ $item->jumlah_anggota == null ? '0' : $item->jumlah_anggota }} Orang<br>
                                                    <small class="text-muted">
                                                        <i>
                                                            <strong>
                                                                Jumlah Pindah :
                                                                {{ $item->jumlah_anggota_pindah == null ? '0' : $item->jumlah_anggota_pindah }} Orang
                                                            </strong>
                                                        </i>
                                                    </small>
                                                </td>
                                                <td>{{ $item->penduduk->rt->dusun }} RT: {{ $item->penduduk->rt->nomor }}
                                                    /
                                                    RW: {{ $item->penduduk->rt->rw }}</td>
                                                <td>
                                                    @if (!empty($kepalaKeluarga))
                                                        <a href="{{ route('app.admin.kepala_keluarga.detail', [$item->nik]) }}"
                                                            class="btn btn-sm btn-warning">
                                                            Detail
                                                        </a>
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
    </script>
@endpush
