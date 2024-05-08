@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Data Rukun Warga
        @endslot
        @slot('li_1')
            Rukun Warga
        @endslot
        @slot('li_2')
            Form Tambah Baru
        @endslot
    @endcomponent

    <x-alert />

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <form action="{{ route('app.admin.pengaturan.rt.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Nomor RT<span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input type="text" name="nomor" maxlength="255" minlength="3"
                                        class="form-control @error('nomor') is-invalid @enderror"
                                        value="{{ old('nomor') }}">
                                    <div class="invalid-feedback">
                                        @error('nomor')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">RW <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <select required name="rw_id" id="rw_id"
                                        class="select2 form-control @error('rw_id') is-invalid @enderror"
                                        value="{{ old('rw_id') }}">
                                        <option value="" selected>== Pilih RW ==</option>
                                        @foreach ($rws as $item)
                                            <option value="{{ $item->id }}">{{ $item->nomor }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('rw_id')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Dusun <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <select required name="dusun_id" id="dusun_id"
                                        class="select2 form-control @error('dusun_id') is-invalid @enderror"
                                        value="{{ old('dusun_id') }}">
                                        <option value="" selected>== Pilih Dusun ==</option>
                                        @foreach ($dusun as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_dusun }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('dusun_id')
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
                        <a class="btn btn-secondary" href="{{ route('app.admin.pengaturan.rt.rt') }}">Kembali</a>
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
