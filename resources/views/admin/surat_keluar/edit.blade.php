@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Surat Keluar
        @endslot
        @slot('li_1')
            Surat Keluar
        @endslot
        @slot('li_2')
            Form Edit
        @endslot
    @endcomponent

    <x-alert />

    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{ route('app.admin.surat-keluar.update', $surat->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <small class="text-muted">DATA SURAT :</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Nomor Surat<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="text" name="nomor_surat" maxlength="255" minlength="5" required
                                            class="form-control @error('nomor_surat') is-invalid @enderror"
                                            value="{{ old('nomor_surat', $surat->nomor_surat) }}">
                                        <div class="invalid-feedback">
                                            @error('nomor_surat')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Instansi Tujuan<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="text" name="nama_instansi_dituju" maxlength="255" minlength="5" required
                                            class="form-control @error('nama_instansi_dituju') is-invalid @enderror"
                                            value="{{ old('nama_instansi_dituju', $surat->nama_instansi_dituju) }}">
                                        <div class="invalid-feedback">
                                            @error('nama_instansi_dituju')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Perihal<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="text" name="perihal" maxlength="255" minlength="5" required
                                            class="form-control @error('perihal') is-invalid @enderror"
                                            value="{{ old('perihal', $surat->perihal) }}">
                                        <div class="invalid-feedback">
                                            @error('perihal')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Tanggal Surat<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="date" name="tgl_surat" maxlength="255" minlength="5" required
                                            class="form-control @error('tgl_surat') is-invalid @enderror"
                                            value="{{ old('tgl_surat', $surat->tgl_surat) }}">
                                        <div class="invalid-feedback">
                                            @error('tgl_surat')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Tanggal Keluar Surat<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="date" name="tgl_pengiriman" maxlength="255" minlength="5" required
                                            class="form-control @error('tgl_pengiriman') is-invalid @enderror"
                                            value="{{ old('tgl_pengiriman', $surat->tgl_pengiriman) }}">
                                        <div class="invalid-feedback">
                                            @error('tgl_pengiriman')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Deskripsi Surat<span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <textarea name="deskripsi_surat" maxlength="255" minlength="5" class="form-control @error('deskripsi_surat') is-invalid @enderror"
                                            value="{{ old('deskripsi_surat', $surat->deskripsi_surat) }}" cols="10" rows="5">{{ $surat->deskripsi_surat }}</textarea>

                                        <div class="invalid-feedback">
                                            @error('deskripsi_surat')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <iframe id="fileurl" src="{{ asset('storage/'.$surat->file) }}" width="100%" height="450px">
                                </iframe>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">File Surat<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="file" name="file_surat" accept="application/pdf"
                                            class="form-control @error('file_surat') is-invalid @enderror"
                                            value="{{ old('file_surat', $surat->file) }}">
                                        <div class="invalid-feedback">
                                            @error('file_surat')
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
                        <a class="btn btn-secondary" href="{{ route('app.admin.surat-keluar.index') }}">Kembali</a>
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@endpush
