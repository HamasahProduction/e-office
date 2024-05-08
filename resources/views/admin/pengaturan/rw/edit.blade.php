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
            Form Edit
        @endslot
    @endcomponent

    <x-alert />

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <form action="{{ route('app.admin.pengaturan.rw.update',[$rws->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Nomor Rw<span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input type="text" name="nomor" maxlength="255" minlength="3"
                                        class="form-control @error('nomor') is-invalid @enderror"
                                        value="{{ old('nomor', $rws->nomor) }}">
                                    <div class="invalid-feedback">
                                        @error('nomor')
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
                        <a class="btn btn-secondary" href="{{ route('app.admin.pengaturan.rw.rw') }}">Kembali</a>
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
