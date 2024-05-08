@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Data Rumah Tangga
        @endslot
        @slot('li_1')
            Data Rumah Tangga
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
                                    <input type="date" class="form-control" name="birthday"
                                        value="{{ old('birthday', request('birthday', $birthday)) }}">
                                    <label class="focus-label">Tanggal Lahir </label>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group ">
                                    <select class="select " name="status" id="status">
                                        <option selected disabled>Status Penduduk</option>
                                        <option value="">--Semua Status--</option>
                                        <option value="interest" {{ request('status') == 'interest' ? 'selected' : '' }}>
                                            Penduduk Tetap</option>
                                        <option value="booking" {{ request('status') == 'booking' ? 'selected' : '' }}>
                                            Penduduk Tidak Tetap</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <select class="select floating " name="jk" id="jk">
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
                                <div class="form-group ">
                                    <select class="select floating " name="dusun" id="dusun">
                                        <option selected disabled>Pilih Dusun</option>
                                        <option value="">--Pilih Dusun--</option>
                                        <option value="interest" {{ request('status') == 'interest' ? 'selected' : '' }}>
                                            Manis</option>
                                        <option value="booking" {{ request('status') == 'booking' ? 'selected' : '' }}>
                                            Kliwon</option>
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
                    </form>

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
                                            <th>Alamat</th>
                                            <th>Dusun</th>
                                            <th>RT</th>
                                            <th>RW</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#</td>
                                            <td>Joni</td>
                                            <td><a href="#"><u>5201142005716996</u></a></td>
                                            <td><a href="#"><u>5201140104126994</u></a></td>
                                            <td>5</td>
                                            <td>-</td>
                                            <td>Manis</td>
                                            <td>001</td>
                                            <td>002</td>
                                            <td>
                                                <a href="" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                                <a href="" class="btn btn-sm btn-warning">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </td>
                                        </tr>
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
@endpush
