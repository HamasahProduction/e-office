@extends('layout.mainSurat')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Keterangan Kelahiran
        @endslot
        @slot('li_1')
            Berdasarkan Keluarga
        @endslot
        @slot('li_2')
            Form Tambah
        @endslot
    @endcomponent

    <x-alert />

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <form action="{{ route('app.admin.surat.skk.storebykk') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <small class="text-muted">DATA KELAHIRAN :</small>
                                    </div>
                                </div>
                                <div class="form-group row" id="kepala_keluarga">
                                    <label class="col-lg-3 col-form-label">Kepala Keluarga <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select name="nik_kk" id="nik_kk"
                                            class="select2 province form-control @error('nik_kk') is-invalid @enderror"
                                            value="{{ old('nik_kk') }}">
                                            <option selected disabled>--Pilih NIK Penduduk--</option>
                                            @foreach ($kelompokKeluarga as $keluarga)
                                                <option value="{{ $keluarga->nik }}">( {{ $keluarga->nik }} ) |
                                                    SUAMI : {{ $keluarga->penduduk->nama_lengkap }}
                                                    @php
                                                        $wife = $keluarga->anggotaKeluargas->where('id_sdhk', 2)->first();
                                                    @endphp
                                                    @if ($wife)
                                                        - ISTRI : {{ $wife->penduduk->nama_lengkap }}
                                                    @else
                                                        | -
                                                    @endif
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('nik_kk')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">NIK Baru<span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="text" name="nik" maxlength="255" minlength="16" required
                                            class="form-control @error('nik') is-invalid @enderror"
                                            value="{{ old('nik') }}">
                                        <div class="invalid-feedback">
                                            @error('nik')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Nama Lengkap<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="text" name="nama_lengkap" maxlength="255" minlength="3" required
                                            class="form-control @error('nama_lengkap') is-invalid @enderror"
                                            value="{{ old('nama_lengkap') }}">
                                        <div class="invalid-feedback">
                                            @error('nama_lengkap')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Tempat Lahir<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="text" name="tempat_lahir" maxlength="255" minlength="5" required
                                            class="form-control @error('tempat_lahir') is-invalid @enderror"
                                            value="{{ old('tempat_lahir') }}">
                                        <div class="invalid-feedback">
                                            @error('tempat_lahir')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">TGL Lahir<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="date" name="tanggal_lahir" maxlength="255" minlength="5" required
                                            class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                            value="{{ old('tanggal_lahir') }}">
                                        <div class="invalid-feedback">
                                            @error('tanggal_lahir')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Jenis Kelamin<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select
                                            class="select2 regency form-control @error('jenis_kelamin') is-invalid @enderror"
                                            required name="jenis_kelamin" id="jenis_kelamin"
                                            value="{{ old('jenis_kelamin') }}">
                                            <option value="" selected>Pilih Satu</option>
                                            <option value="L">LAKI-LAKI</option>
                                            <option value="P">PEREMPUAN</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('jenis_kelamin')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Agama<span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select class="select2 regency form-control @error('agama') is-invalid @enderror"
                                            required name="agama" id="agama" value="{{ old('agama') }}">
                                            <option value="" selected>Pilih Agama</option>
                                            <option value="islam">ISLAM</option>
                                            <option value="kristen">KRISTEN</option>
                                            <option value="khatolik">KHATOLIK</option>
                                            <option value="hindu">HINDU</option>
                                            <option value="budha">BUDHA</option>
                                            <option value="khonghucu">KHONGHUCU</option>
                                            <option value="kepercayaan">KEPERCAYAAN</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('regency_id')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Alamat <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select name="rt_id" id="rt_id"
                                            class="select2 province form-control @error('rt_id') is-invalid @enderror"
                                            value="{{ old('rt_id') }}">
                                            <option selected disabled>--Pilih Alamat--</option>
                                            @foreach ($rt as $alamat)
                                                <option value="{{ $alamat->id }}">RT: {{ $alamat->nomor }} / RW: {{ $alamat->rw }} |
                                                    {{ $alamat->dusun }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('rt_id')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="col-lg-6">
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <small class="text-muted">DATA ORANGTUA :</small>
                                    </div>
                                </div>
                                
                                <div class="form-group row" id="suami">
                                    <label class="col-lg-3 col-form-label">NIK AYAH <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select name="nik_ayah" id="nik_ayah"
                                            class="select2 province form-control @error('nik_ayah') is-invalid @enderror"
                                            value="{{ old('nik_ayah') }}">
                                            <option selected disabled>--Pilih NIK Penduduk--</option>
                                            @foreach ($penduduks->where('jenis_kelamin','L') as $penduduk)
                                                <option value="{{ $penduduk->nik }}">( {{ $penduduk->nik }} ) |
                                                    {{ $penduduk->nama_lengkap }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('nik_ayah')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row" id="istri">
                                    <label class="col-lg-3 col-form-label">NIK IBU <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select name="nik_ibu" id="nik_ibu"
                                            class="select2 province form-control @error('nik_ibu') is-invalid @enderror"
                                            value="{{ old('nik_ibu') }}">
                                            <option selected disabled>--Pilih NIK Penduduk--</option>
                                            @foreach ($penduduks->where('jenis_kelamin','P') as $penduduk)
                                                <option value="{{ $penduduk->nik }}">( {{ $penduduk->nik }} ) |
                                                    {{ $penduduk->nama_lengkap }} </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('nik_ibu')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <span class="text-muted float-start">
                            <strong class="text-danger">*</strong> Harus diisi
                        </span>
                        <a class="btn btn-secondary" href="{{ route('app.admin.surat.skk.index') }}">Kembali</a>
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
