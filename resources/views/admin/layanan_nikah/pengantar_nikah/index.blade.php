@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Pengantar Nikah
        @endslot
        @slot('li_1')
            Pengantar Nikah
        @endslot
        @slot('li_2')
            Daftar
        @endslot
        @slot('action_button')
        <a href="{{route('app.admin.penduduk.lahir')}}" class="btn btn-primary btn-md">
            <i class="fa fa-plus"></i> Buat Surat
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
                                    <select class="select floating select2-hidden-accessible" name="status" id="status">
                                        <option selected disabled>Status Penduduk</option>
                                        <option value="">--Semua Status--</option>
                                        <option value="interest" {{ request('status') == 'interest' ? 'selected' : '' }}>
                                            Penduduk Tetap</option>
                                        <option value="booking" {{ request('status') == 'booking' ? 'selected' : '' }}>
                                            Penduduk Tidak Tetap</option>
                                    </select>
                                    <label class="focus-label">Status </label>
                                </div>
                            </div>

                            <div class="col-md-8 col-12">
                                <div class="col-md-8 float-start">
                                    <button type="submit"
                                        onclick="javascript: form.action='{{ route('app.admin.penduduk.index') }}';"
                                        class="btn btn-primary w-20 btn-sm ">Filter Data
                                    </button>
                                    <button type="submit" target="_blank"
                                        onclick="javascript: form.action='{{ route('app.admin.penduduk.export') }}';"
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
                                            <th>Nomor Surat</th>
                                            <th>Nama Lengkap</th>
                                            <th>Nama Pasangan</th>
                                            <th>Tanggal Akad</th>
                                            <th>Tanggal Resepsi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>011/SPN/DESA/I/2023</td>
                                            <td>ALIYAH</td>
                                            <td>AMIR</td>
                                            <td>12 Januari 2023</td>
                                            <td>16 Januari 2023</td>
                                            <td>
                                                <a href="" class="btn btn-sm btn-warning">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-print"></i> Cetak
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>010/SPN/DESA/I/2023</td>
                                            <td>ANA</td>
                                            <td>HASAN</td>
                                            <td>01 Januari 2023</td>
                                            <td>05 Januari 2023</td>
                                            <td>
                                                <a href="" class="btn btn-sm btn-warning">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-print"></i> Cetak
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
