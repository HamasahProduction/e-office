@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Administrasi Umum
        @endslot
        @slot('li_1')
            Administrasi Umum
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

                            <div class="col-md-3">
                                <div class="form-group form-focus select-focus focused">
                                    <select class="select floating select2-hidden-accessible" name="status" id="status">
                                        <option selected disabled>Status Peraturan</option>
                                        <option value="">--Semua Status--</option>
                                        <option value="">Berlaku</option>
                                        <option value="">Tidak Berlaku / Dicabut</option>
                                    </select>
                                    <label class="focus-label">Status </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-focus select-focus focused">
                                    <select class="select floating select2-hidden-accessible" name="jenis_peraturan" id="jenis_peraturan">
                                        <option selected disabled>Jenis Peraturan</option>
                                        <option value="">--Semua--</option>
                                        <option value="">Peraturan Desa</option>
                                        <option value="">Peraturan Kepala Desa</option>
                                        <option value="">Peraturan Bersama Kepala Desa</option>
                                    </select>
                                    <label class="focus-label">Status </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group form-focus select-focus focused">
                                    <select class="select floating select2-hidden-accessible" name="tahun" id="tahun">
                                        <option selected disabled>Tahun</option>
                                        <option value="">--Pilih Tahun--</option>
                                        <option value="">2021</option>
                                        <option value="">2022</option>
                                        <option value="">2023</option>
                                    </select>
                                    <label class="focus-label">Tahun Ditetapkan </label>
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
                                <table class="table table-striped custom-table no-footer mb-0 datatable">
                                    <thead>
                                        <tr>
                                            <th>Aksi</th>
                                            <th>Judul</th>
                                            <th>Jenis Peraturan</th>
                                            <th>No./Tanggal Ditetapkan</th>
                                            <th>Uraian Singkat</th>
                                            <th>Status</th>
                                            <th>Tanggal Publish</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a href="" class="btn btn-xs btn-primary">
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                                <a href="" class="btn btn-xs btn-warning">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </td>
                                            <td>Perdes SPJ Tentang Keuang Desa Tahun 2023</td>
                                            <td>Peraturan Desa</td>
                                            <td>1 / 09-01-2016</td>
                                            <td>Perdes SPJ Tentang Keuang Desa Tahun 2016</td>
                                            <td>Aktif</td>
                                            <td>28 Mei 2018 06:57:37</td>
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
