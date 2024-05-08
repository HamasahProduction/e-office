@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Penduduk Mutasi
        @endslot
        @slot('li_1')
            Penduduk Mutasi
        @endslot
        @slot('li_2')
            Daftar
        @endslot
        @slot('action_button')
        <a href="{{route('app.admin.penduduk.lahir')}}" class="btn btn-primary btn-md">
            <i class="fa fa-plus"></i> Tambah Mutasi
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
                                    <input type="date" class="form-control" name="birthday"
                                        value="{{ old('birthday', request('birthday', $birthday)) }}">
                                    <label class="focus-label">Tanggal Mutasi </label>
                                </div>
                            </div>

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
                                            <th>Nama</th>
                                            <th>NIK</th>
                                            <th>No KK</th>
                                            <th>Orangtua</th>
                                            <th>Alamat</th>
                                            <th>No Surat</th>
                                            <th>Tujuan</th>
                                            <th>Tanggal Pindah</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>ALIYAH</td>
                                            <td>5201144609786995</td>
                                            <td>5201144609786995</td>
                                            <td>Ayah : TOHIRIN <br> Ibu : ANISA</td>
                                            <td>Dusun: kliwon <br> RT/RW : 001 / 001</td>
                                            <td>320/260/N-4/XI/2023</td>
                                            <td>Kabupaten Cirebon Provinsi Jawa Barat</td>
                                            <td>12 Desember 2023</td>
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
                                            <td>ANA</td>
                                            <td>5201144609786995</td>
                                            <td>5201144609786995</td>
                                            <td>Ayah : TONO <br> Ibu : WARTIYEM</td>
                                            <td>Dusun: kliwon <br> RT/RW : 001 / 001</td>
                                            <td>319/259/N-4/XI/2023</td>
                                            <td>Kabupaten Cirebon Provinsi Jawa Barat</td>
                                            <td>12 Desember 2023</td>
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
