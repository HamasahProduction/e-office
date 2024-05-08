@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Penduduk Meninggal
        @endslot
        @slot('li_1')
            Penduduk Meninggal
        @endslot
        @slot('li_2')
            Daftar
        @endslot
        @slot('action_button')
            <a href="{{route('app.admin.penduduk.lahir')}}" class="btn btn-danger btn-md">
                <i class="fa fa-plus"></i> Tambah Kematian
            </a>
            {{-- <a href="{{route('app.admin.penduduk.masuk')}}" class="btn btn-outline-success btn-md">
                <i class="fa fa-plus"></i> Penduduk Masuk
            </a> --}}
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
                                    <label class="focus-label">Tanggal Wafat </label>
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
                                        <option value="booking" {{ request('status') == 'booking' ? 'selected' : '' }}>
                                            Legi</option>
                                        <option value="booking" {{ request('status') == 'booking' ? 'selected' : '' }}>
                                            Pahing</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
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
                                            <th>Nama</th>
                                            <th>Nama Ayah</th>
                                            <th>Nama Ibu</th>
                                            <th>Alamat</th>
                                            <th>Keterangan</th>
                                            <th>Tanggal Kejadian</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Nama : ALIYAH <br>KK : 5201144609786995 <br> NIK : 5201144609786995</td>
                                            <td>TOHIRIN</td>
                                            <td>ANISA</td>
                                            <td>Dusun: kliwon <br> RT/RW : 001 / 001</td>
                                            <td>Covid</td>
                                            <td>20 Januari 2019</td>
                                            <td>
                                                <a href="" class="btn btn-sm btn-warning">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nama : ANA <br>KK : 5201144609786995 <br> NIK : 5201144609786995</td>
                                            <td>TONO</td>
                                            <td>WARTIYEM</td>
                                            <td>Dusun: kliwon <br> RT/RW : 001 / 001</td>
                                            <td>Sakit</td>
                                            <td>20 Januari 2021</td>
                                            <td>
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
