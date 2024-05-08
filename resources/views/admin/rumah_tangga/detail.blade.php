@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Detail Anggota Keluarga
        @endslot
        @slot('li_1')
            Detail Anggota Keluarga
        @endslot
        @slot('li_2')
            Detail Anggota Keluarga
        @endslot
    @endcomponent

    <x-alert />

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="profile-view">
                                            <div class="profile-img-wrap">
                                                <div class="profile-img">
                                                    <a href="#"><img alt=""
                                                            src="{{ asset('assets/img/user.jpg') }}"
                                                            loading="lazy" style="object-fit: cover"></a>
                                                </div>
                                            </div>
                                            <div class="profile-basic">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <ul class="personal-info">
                                                            <li>
                                                                <div class="title">KEPALA KELUARGA
                                                                </div>
                                                                <div class="text">
                                                                    <b>Warjono</b>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="title">Telepon:</div>
                                                                <div class="text">
                                                                    <a href="tel:08155060030">08155060030</a>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="title">Alamat:</div>
                                                                <div class="text">
                                                                    Dusun Kliwon <br>
                                                                    RT : 001
                                                                     <br>
                                                                    RW : 002 
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="title">NO KK:</div>
                                                                <div class="text">
                                                                    5201140104126994
                                                                </div>
                                                            </li>
                                                           
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <ul class="personal-info mt-2">
                                                            <li>
                                                                <div class="title">Program Bantuan
                                                                </div>
                                                                <div class="text">
                                                                    <ol>
                                                                        <li>Bansos</li>
                                                                        <li>PKH</li>
                                                                    </ol>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pro-edit">
                                                <a class="edit-icon"
                                                    href="#">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer text-end">
                    <span class="text-muted float-start">
                        <strong class="text-danger">*</strong> Harus diisi
                    </span>
                    <a class="btn btn-secondary btn-sm" href="{{ route('app.admin.kepala_keluarga.index') }}">Kembali</a>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="form-group">
                        <div class="col-lg-12">
                            <h4>Daftar Anggota Keluarga</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane show active">
                            <div class="table-responsive">
                                <table class="table table-striped custom-table no-footer mb-0 datatable" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Hubungan Keluarga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#</td>
                                            <td>5201147112817188</td>
                                            <td>WARJONO</td>
                                            <td>31 Desember 1980</td>
                                            <td>Laki-Laki</td>
                                            <td>KEPALA KELUARGA</td>
                                        </tr>
                                        <tr>
                                            <td>#</td>
                                            <td>5201147112817188</td>
                                            <td>ASMI</td>
                                            <td>31 Desember 1980</td>
                                            <td>Perempuan</td>
                                            <td>ISTRI</td>
                                        </tr>
                                        <tr>
                                            <td>#</td>
                                            <td>5201147112817188</td>
                                            <td>HASAN</td>
                                            <td>31 Desember 1996</td>
                                            <td>Laki-Laki</td>
                                            <td>ANAK</td>
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
