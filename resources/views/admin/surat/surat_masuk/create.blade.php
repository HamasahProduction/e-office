@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Surat Masuk
        @endslot
        @slot('li_1')
            Surat Masuk
        @endslot
        @slot('li_2')
            Form Tambah Baru
        @endslot
    @endcomponent

    <x-alert />

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <form action="#" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Nomor Surat<span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="text" name="name" maxlength="255" minlength="5"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name') }}">
                                        <div class="invalid-feedback">
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Asal Surat<span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="text" name="city" maxlength="255" minlength="5"
                                            class="form-control @error('city') is-invalid @enderror"
                                            value="{{ old('city') }}">
                                        <div class="invalid-feedback">
                                            @error('city')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Tanggal Surat<span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="date" name="city" maxlength="255" minlength="5"
                                            class="form-control @error('city') is-invalid @enderror"
                                            value="{{ old('city') }}">
                                        <div class="invalid-feedback">
                                            @error('city')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Perihal<span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="text" name="perihal" maxlength="255" minlength="5"
                                            class="form-control @error('perihal') is-invalid @enderror"
                                            value="{{ old('perihal') }}">
                                        <div class="invalid-feedback">
                                            @error('perihal')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Jenis Surat <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select name="representative_id" id="representative_id"
                                            class="select2 province form-control @error('representative_id') is-invalid @enderror"
                                            value="{{ old('representative_id') }}">
                                            <option selected disabled>--Pilih Jenis Surat--</option>
                                            <option value="">Biasa</option>
                                            <option value="">Segera</option>
                                            <option value="">Sangat Segera</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('representative_id')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Tanggal Terima Disposisi<span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="date" name="city" maxlength="255" minlength="5"
                                            class="form-control @error('city') is-invalid @enderror"
                                            value="{{ old('city') }}">
                                        <div class="invalid-feedback">
                                            @error('city')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Tanda Terima<span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="text" name="perihal" maxlength="255" minlength="5"
                                            class="form-control @error('perihal') is-invalid @enderror"
                                            value="{{ old('perihal') }}">
                                        <div class="invalid-feedback">
                                            @error('perihal')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Tanggal Diteruskan<span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="date" name="city" maxlength="255" minlength="5"
                                            class="form-control @error('city') is-invalid @enderror"
                                            value="{{ old('city') }}">
                                        <div class="invalid-feedback">
                                            @error('city')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Diteruskan Kepada<span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="text" name="perihal" maxlength="255" minlength="5"
                                            class="form-control @error('perihal') is-invalid @enderror"
                                            value="{{ old('perihal') }}">
                                        <div class="invalid-feedback">
                                            @error('perihal')
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
                        <a class="btn btn-secondary" href="{{route('app.admin.penduduk.index')}}">Kembali</a>
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
