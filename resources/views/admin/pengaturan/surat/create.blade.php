@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Data Pengaturan Surat
        @endslot
        @slot('li_1')
            Pengaturan Surat
        @endslot
        @slot('li_2')
            Form Tambah Baru
        @endslot
    @endcomponent

    <x-alert />

    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <form action="{{ route('app.admin.pengaturan.surat.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group row">
                                <label class="col-lg-5 col-form-label">Judul Surat<span class="text-danger">*</span></label>
                                <div class="col-lg-7">
                                    <input type="text" name="judul_surat" maxlength="255" minlength="5"
                                        class="form-control @error('judul_surat') is-invalid @enderror"
                                        value="{{ old('judul_surat') }}">
                                    <div class="invalid-feedback">
                                        @error('judul_surat')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-5 col-form-label">Kode Surat<span class="text-danger">*</span></label>
                                <div class="col-lg-7">
                                    <input type="text" name="kode_surat" maxlength="255" minlength="3"
                                        class="form-control @error('kode_surat') is-invalid @enderror"
                                        value="{{ old('kode_surat') }}">
                                    <div class="invalid-feedback">
                                        @error('kode_surat')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-5 col-form-label">Nomor Surat<span class="text-danger">*</span></label>
                                <div class="col-lg-7">
                                    <input type="text" name="nomor_surat" maxlength="255" minlength="3"
                                        class="form-control @error('nomor_surat') is-invalid @enderror"
                                        value="{{ old('nomor_surat') }}">
                                    <div class="invalid-feedback">
                                        @error('nomor_surat')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-5 col-form-label">Yang Bertandatangan <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-7">
                                    <select name="is_ttd" id="is_ttd"
                                        class="select2 form-control @error('is_ttd') is-invalid @enderror"
                                        value="{{ old('is_ttd') }}">
                                        <option selected disabled>--Pilih Yang Bertandatangan--</option>
                                        @foreach ($ttds as $isttd)
                                            <option value="{{ $isttd->id }}">{{ $isttd->nama }} | Jabatan :
                                                {{ $isttd->jabatan }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('is_ttd')
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
                        <a class="btn btn-secondary" href="{{ route('app.admin.pengaturan.surat.surat') }}">Kembali</a>
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
