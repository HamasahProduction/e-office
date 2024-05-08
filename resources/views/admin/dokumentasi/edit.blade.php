@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Dokumentasi
        @endslot
        @slot('li_1')
            Dokumentasi
        @endslot
        @slot('li_2')
            Form Edit
        @endslot
    @endcomponent

    <x-alert />

    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{ route('app.admin.dokumentasi.update', $surat->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <small class="text-muted">DATA DOKUMENTASI :</small>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Judul Dokumentasi<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="text" name="judul" maxlength="255" minlength="5" required
                                            class="form-control @error('judul') is-invalid @enderror"
                                            value="{{ old('judul') }}">
                                        <div class="invalid-feedback">
                                            @error('judul')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Tanggal Publish<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="date" name="tgl_publish" required
                                            class="form-control @error('tgl_publish') is-invalid @enderror"
                                            value="{{ old('tgl_publish') }}">
                                        <div class="invalid-feedback">
                                            @error('tgl_publish')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">File<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="file" name="file" accept="image/png, image/jpg, image/jpeg"
                                            class="form-control @error('file') is-invalid @enderror"
                                            value="{{ old('file') }}">
                                        <div class="invalid-feedback">
                                            @error('file')
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
                        <a class="btn btn-secondary" href="{{ route('app.admin.dokumentasi.index') }}">Kembali</a>
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@endpush
