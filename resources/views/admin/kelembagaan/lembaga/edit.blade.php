@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Lembaga
        @endslot
        @slot('li_1')
            Lembaga
        @endslot
        @slot('li_2')
            Form Edit
        @endslot
    @endcomponent

    <x-alert />

    <div class="row">
        <div class="col-sm-6 col-sm-12">
            <div class="card">
                <form action="{{ route('app.admin.kelembagaan.lembaga.update', $lembaga->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Nama Lembaga<span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" name="nama_lembaga" maxlength="255" minlength="3"
                                    class="form-control @error('nama_lembaga') is-invalid @enderror"
                                    value="{{ old('nama_lembaga', $lembaga->nama_lembaga) }}">
                                <div class="invalid-feedback">
                                    @error('nama_lembaga')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Logo Lem baga<span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <div class="col-lg-12 mb-2">
                                    <img src="{{ asset('storage/' . $lembaga->image) }}"
                                        style="height: 200px;width:200px;">
                                </div>
                                <input type="file" name="image" maxlength="255" minlength="5" accept="image/png, image/jpg, image/jpeg"
                                    class="form-control @error('image') is-invalid @enderror"
                                    value="{{ old('image') }}">
                                <div class="invalid-feedback">
                                    @error('image')
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
                        <a class="btn btn-secondary" href="{{ route('app.admin.kelembagaan.lembaga.index') }}">Kembali</a>
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
    </script>
@endpush
