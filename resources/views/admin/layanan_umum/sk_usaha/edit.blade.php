@extends('layout.mainSurat')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Surat Keterangan Usaha
        @endslot
        @slot('li_1')
            Surat Keterangan Usaha
        @endslot
        @slot('li_2')
            Form Edit
        @endslot
       
    @endcomponent

    <x-alert />

    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{ route('app.admin.surat.sku.update', $sku->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <small class="text-muted"> <strong>FORM PENDUDUK TERDAFTAR:</strong></small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Masukan NIK Penduduk <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <select name="nik" id="nik"
                                        class="select2 province form-control @error('nik') is-invalid @enderror"
                                        value="{{ old('nik') }}">
                                        <option selected disabled>--Pilih NIK Penduduk--</option>
                                        @foreach ($penduduks as $penduduk)
                                        <option value="{{ $penduduk->nik }}" {{ $penduduk->nik ==$sku->nik?'selected':'' }}>NIK : {{ $penduduk->nik }} | {{ $penduduk->nama_lengkap }}</option>
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
                                <label class="col-lg-3 col-form-label">Nama Usaha<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input type="text" name="nama_usaha_bynik" maxlength="255" minlength="5"
                                        class="form-control @error('nama_usaha_bynik') is-invalid @enderror"
                                        value="{{ old('nama_usaha_bynik', $sku->nama_usaha) }}">
                                    <div class="invalid-feedback">
                                        @error('nama_usaha_bynik')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Tanggal Surat<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input type="date" name="tgl_surat_bynik" maxlength="255" minlength="5"
                                        class="form-control @error('tgl_surat_bynik') is-invalid @enderror"
                                        value="{{ old('tgl_surat_bynik', $sku->tgl_surat) }}">
                                    <div class="invalid-feedback">
                                        @error('tgl_surat_bynik')
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
                            <a href="{{ route('app.admin.surat.sku.index') }}" class="btn btn-secondary me-2">Kembali</a>
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
