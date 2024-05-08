@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Kepala Keluarga
        @endslot
        @slot('li_1')
            Kepala Keluarga
        @endslot
        @slot('li_2')
            Form Tambah Baru
        @endslot
    @endcomponent

    <x-alert />

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form action="{{ route('app.admin.kepala_keluarga.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Pilih Kepala Keluarga <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <select required name="nik" id="nik"
                                            class="select2 form-control @error('nik') is-invalid @enderror"
                                            value="{{ old('nik') }}">
                                            <option value="" selected>== Pilih Kepala Keluarga ==</option>
                                            @foreach ($penduduks as $penduduk)
                                                <option value="{{ $penduduk->nik }}">NIK : {{ $penduduk->nik }} | {{ $penduduk->nama_lengkap }}</option>
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
                                    <label class="col-lg-4 col-form-label">Nomor KK<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <input type="text" name="no_kk" maxlength="255" minlength="16" required
                                            class="form-control @error('no_kk') is-invalid @enderror"
                                            value="{{ old('no_kk') }}">
                                        <div class="invalid-feedback">
                                            @error('no_kk')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Nama Ayah<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <input type="text" name="nama_ayah" maxlength="255" minlength="3" required
                                            class="form-control @error('nama_ayah') is-invalid @enderror"
                                            value="{{ old('nama_ayah') }}">
                                        <div class="invalid-feedback">
                                            @error('nama_ayah')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Nama Ibu<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <input type="text" name="nama_ibu" maxlength="255" minlength="3" required
                                            class="form-control @error('nama_ibu') is-invalid @enderror"
                                            value="{{ old('nama_ibu') }}">
                                        <div class="invalid-feedback">
                                            @error('nama_ibu')
                                                {{ $message }}
                                            @enderror
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
                        <a class="btn btn-secondary" href="{{ route('app.admin.kepala_keluarga.index') }}">Kembali</a>
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
