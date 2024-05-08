@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Pengurus Lembaga
        @endslot
        @slot('li_1')
            Pengurus Lembaga
        @endslot
        @slot('li_2')
            Form Tambah Baru
        @endslot
    @endcomponent

    <x-alert />

    <div class="row">
        <div class="col-sm-6 col-sm-12">
            <div class="card">
                <form action="{{ route('app.admin.kelembagaan.pengurus.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">NIK Penduduk <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <select required name="nik" id="nik"
                                        class="select2 form-control @error('nik') is-invalid @enderror"
                                        value="{{ old('nik') }}">
                                        <option value="" selected>== Pilih Penduduk ==</option>
                                        @foreach ($penduduks as $penduduk)
                                            <option value="{{ $penduduk->nik }}">( {{ $penduduk->nik }} ) {{ $penduduk->nama_lengkap }} | RT: {{ $penduduk->Rt->nomor }}/ RW: {{ $penduduk->Rt->rw }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('nik')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Lembaga <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <select required name="lembaga_id" id="lembaga_id"
                                        class="select2 form-control @error('lembaga_id') is-invalid @enderror"
                                        value="{{ old('lembaga_id') }}">
                                        <option value="" selected>== Pilih Lembaga ==</option>
                                        @foreach ($lembagas as $lembaga)
                                            <option value="{{ $lembaga->id }}">{{ $lembaga->nama_lembaga }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('lembaga_id')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Jabatan <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <select required name="jabatan_id" id="jabatan_id"
                                        class="select2 form-control @error('jabatan_id') is-invalid @enderror"
                                        value="{{ old('jabatan_id') }}">
                                        <option value="" selected>== Pilih Jabatan ==</option>
                                        @foreach ($jabatans as $jabatan)
                                            <option value="{{ $jabatan->id }}">{{ $jabatan->nama_jabatan }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('jabatan_id')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Tanggal Pengangkatan<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input type="date" name="tgl_pengangkatan" maxlength="255" minlength="5"
                                        class="form-control @error('tgl_pengangkatan') is-invalid @enderror"
                                        value="{{ old('tgl_pengangkatan') }}">
                                    <div class="invalid-feedback">
                                        @error('tgl_pengangkatan')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <span class="text-muted float-start">
                            <strong class="text-danger">*</strong> Harus diisi
                        </span>
                        <a class="btn btn-secondary" href="{{ route('app.admin.kelembagaan.pengurus.index') }}">Kembali</a>
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush
