@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Penduduk Lahir
        @endslot
        @slot('li_1')
            Penduduk Lahir
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
                                    <label class="col-lg-3 col-form-label">Nama<span class="text-danger">*</span></label>
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
                                    <label class="col-lg-3 col-form-label">Kota<span class="text-danger">*</span></label>
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
                                    <label class="col-lg-3 col-form-label">Alamat<span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="text" name="address" maxlength="255" minlength="5"
                                            class="form-control @error('address') is-invalid @enderror"
                                            value="{{ old('address') }}">
                                        <div class="invalid-feedback">
                                            @error('address')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Kontak<span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="text" name="phone" maxlength="255" minlength="5"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            value="{{ old('phone') }}">
                                        <div class="invalid-feedback">
                                            @error('phone')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Perwakilan <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select name="representative_id" id="representative_id"
                                            class="select2 province form-control @error('representative_id') is-invalid @enderror"
                                            value="{{ old('representative_id') }}">
                                            <option selected disabled>--Pilih Perwakilan--</option>
                                            <option value="">--</option>
                                            <option value="">--</option>
                                            <option value="">--</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('representative_id')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Paket <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select name="package" id="package"
                                            class="select2 province form-control @error('package') is-invalid @enderror"
                                            value="{{ old('package') }}">
                                            <option selected disabled>--Pilih Paket--</option>
                                            <option value="">--</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('package')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Status <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select name="status"
                                            class="select2 form-control @error('status') is-invalid @enderror"
                                            value="{{ old('status') }}">
                                            <option selected disabled>--Pilih Status--</option>
                                            <option value="interest ">tertarik</option>
                                            <option value="booking">di pesan</option>
                                            <option value="full_payment">pembayaran lunas</option>
                                            <option value="departure">keberangkatan</option>
                                            <option value="return">kembali</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('status')
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
