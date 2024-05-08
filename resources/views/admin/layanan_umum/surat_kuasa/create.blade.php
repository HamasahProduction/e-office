@extends('layout.mainSurat')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Surat Kuasa
        @endslot
        @slot('li_1')
            Surat Kuasa
        @endslot
        @slot('li_2')
            Form Tambah Baru
        @endslot
    @endcomponent

    <x-alert />

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <form action="{{ route('app.admin.surat-kuasa.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <small class="text-muted"> <strong>FORM PENDUDUK TERDAFTAR:</strong></small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Nama Ahli Waris<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input type="text" name="nama_ahli_waris" maxlength="255" minlength="5"
                                        class="form-control @error('nama_ahli_waris') is-invalid @enderror"
                                        value="{{ old('nama_ahli_waris') }}">
                                    <div class="invalid-feedback">
                                        @error('nama_ahli_waris')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">NIK Anggota Ahli Waris <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <select name="nik_anggota_ahli_waris" id="nik_anggota_ahli_waris"
                                        class="select2 province form-control @error('nik_anggota_ahli_waris') is-invalid @enderror"
                                        value="{{ old('nik_anggota_ahli_waris') }}">
                                        <option selected disabled>--Pilih NIK Penduduk--</option>
                                        @foreach ($penduduks as $penduduk)
                                            <option value="{{ $penduduk->nik }}">NIK : {{ $penduduk->nik }} |
                                                {{ $penduduk->nama_lengkap }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('nik_anggota_ahli_waris')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">NIK Penerima Kuasa <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <select name="nik_penerima_kuasa" id="nik_penerima_kuasa"
                                        class="select2 province form-control @error('nik_penerima_kuasa') is-invalid @enderror"
                                        value="{{ old('nik_penerima_kuasa') }}">
                                        <option selected disabled>--Pilih NIK Penduduk--</option>
                                        @foreach ($penduduks as $penduduk)
                                            <option value="{{ $penduduk->nik }}">NIK : {{ $penduduk->nik }} |
                                                {{ $penduduk->nama_lengkap }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('nik_penerima_kuasa')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Keterangan<span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <textarea name="keterangan" maxlength="255" minlength="5" required cols="30" rows="4"
                                        class="form-control @error('keterangan') is-invalid @enderror" value="{{ old('keterangan') }}"></textarea>
                                    <div class="invalid-feedback">
                                        @error('keterangan')
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
                                        value="{{ old('tgl_surat') }}">
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
                            <a href="{{ route('app.admin.surat-kuasa.index') }}" class="btn btn-secondary me-2">Kembali</a>
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
