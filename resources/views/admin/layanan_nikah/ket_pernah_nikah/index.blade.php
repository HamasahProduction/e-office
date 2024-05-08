@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Keterangan Pernah Nikah
        @endslot
        @slot('li_1')
            Keterangan Pernah Nikah
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
                                        <option value="booking" {{ request('status') == 'booking' ? 'selected' : '' }}>
                                            Legi</option>
                                        <option value="booking" {{ request('status') == 'booking' ? 'selected' : '' }}>
                                            Pahing</option>
                                    </select>
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
                                            <th>Jenis Kelamin</th>
                                            <th>Pekerjaan</th>
                                            <th>Alamat</th>
                                            <th>Tanggal Pernikahan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>050/SPBM/DESA/I/2023</td>
                                            <td>Nama : ALIYAH <br>KK : 5201144609786995 <br> NIK : 5201144609786995</td>
                                            <td>Nama : AMIR <br>KK : 5201144609786995 <br> NIK : 5201144609786995</td>
                                            <td>Perempuan</td>
                                            <td>Pelajar</td>
                                            <td>Dusun: kliwon <br> RT/RW : 001 / 001</td>
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
                                        <tr>
                                            <td>049/SPBM/DESA/I/2023</td>
                                            <td>Nama : ANA <br>KK : 5201144609786995 <br> NIK : 5201144609786995</td>
                                            <td>Nama : HASAN <br>KK : 5201144609786995 <br> NIK : 5201144609786995</td>
                                            <td>Perempuan</td>
                                            <td>Pelajar</td>
                                            <td>Dusun: kliwon <br> RT/RW : 001 / 001</td>
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
