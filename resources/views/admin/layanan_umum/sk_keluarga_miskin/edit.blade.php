@extends('layout.mainSurat')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Surat Keterangan Keluarga Miskin
        @endslot
        @slot('li_1')
            Surat Keterangan Keluarga Miskin
        @endslot
        @slot('li_2')
            Form Edit
        @endslot
    @endcomponent

    <x-alert />

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <form action="{{ route('app.admin.surat.skkm.update', $skkm->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <small class="text-muted"> <strong>FORM PENDUDUK TERDAFTAR:</strong></small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Masukan NIK Penduduk <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <select name="nik" id="nik"
                                        class="select2 province form-control @error('nik') is-invalid @enderror"
                                        value="{{ old('nik') }}">
                                        <option selected disabled>--Pilih NIK Penduduk--</option>
                                        @foreach ($penduduks as $penduduk)
                                        <option value="{{ $penduduk->nik }}" {{ $penduduk->nik ==$skkm->nik?'selected':'' }}>NIK : {{ $penduduk->nik }} | {{ $penduduk->nama_lengkap }}</option>
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
                                <label class="col-lg-3 col-form-label">Keperluan<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input type="text" name="nama_keperluan" maxlength="255" minlength="5"
                                        class="form-control @error('nama_keperluan') is-invalid @enderror"
                                        value="{{ old('nama_keperluan', $skkm->nama_keperluan) }}">
                                    <div class="invalid-feedback">
                                        @error('nama_keperluan')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Warganegara<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input type="text" name="warganegara" maxlength="255" minlength="3"
                                        class="form-control @error('warganegara') is-invalid @enderror"
                                        value="{{ old('warganegara', $skkm->warganegara) }}">
                                    <div class="invalid-feedback">
                                        @error('warganegara')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Masukan NIK Peruntukan <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <select name="nik_keperluan" id="nik_keperluan"
                                        class="select2 province form-control @error('nik_keperluan') is-invalid @enderror"
                                        value="{{ old('nik_keperluan') }}">
                                        <option selected disabled>--Pilih NIK Penduduk--</option>
                                        @foreach ($penduduks as $penduduk)
                                        <option value="{{ $penduduk->nik }}" {{ $penduduk->nik ==$skkm->nik_keperluan?'selected':'' }}>{{ $penduduk->nama_lengkap }} | <strong>{{ $penduduk->nik }}</strong></option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('nik_keperluan')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Tanggal Surat<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input type="date" name="tgl_surat" maxlength="255" minlength="5"
                                        class="form-control @error('tgl_surat') is-invalid @enderror"
                                        value="{{ old('tgl_surat', $skkm->tgl_surat) }}">
                                    <div class="invalid-feedback">
                                        @error('tgl_surat')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <span class="text-muted float-start">
                                <strong class="text-danger">*</strong> Harus diisi
                            </span>
                            <a href="{{ route('app.admin.surat.skkm.index') }}" class="btn btn-secondary me-2">Kembali</a>
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(function() {
            $('.select2').select2();
        });
    </script>
@endpush
