@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Penduduk Pindah Datang
        @endslot
        @slot('li_1')
            Penduduk Pindah Datang
        @endslot
        @slot('li_2')
            Form F-1.08
        @endslot
    @endcomponent

    <x-alert />

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <form action="{{ route('app.admin.penduduk-pindah-datang.store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <small class="text-muted">DATA DAERAH ASAL :</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Kepala Keluarga <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select name="kk_id" id="kk_id"
                                            class="select2 form-control @error('kk_id') is-invalid @enderror"
                                            value="{{ old('kk_id') }}">
                                            <option selected disabled>--Pilih Kepala Keluarga--</option>
                                            @foreach ($kepalaKeluarga as $kk)
                                                <option value="{{ $kk->id }}">NIK: {{ $kk->nik }} |
                                                    {{ $kk->penduduk->nama_lengkap }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('kk_id')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Nomor Kartu Keluarga<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="text" name="no_kk" maxlength="16" minlength="5"
                                            class="form-control @error('no_kk') is-invalid @enderror"
                                            value="{{ old('no_kk') }}">
                                        <div class="invalid-feedback">
                                            @error('no_kk')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Nama Kepala Keluarga<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="text" name="nama_kepala_keluarga" maxlength="255" minlength="5"
                                            class="form-control @error('nama_kepala_keluarga') is-invalid @enderror"
                                            value="{{ old('nama_kepala_keluarga') }}">
                                        <div class="invalid-feedback">
                                            @error('nama_kepala_keluarga')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Dusun<span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="text" name="dusun_asal" maxlength="255" minlength="5"
                                            placeholder="Contoh: DUSUN CIMARA"
                                            class="form-control @error('dusun_asal') is-invalid @enderror"
                                            value="{{ old('dusun_asal') }}">
                                        <div class="invalid-feedback">
                                            @error('dusun_asal')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label class="col-lg-6 col-form-label">RT<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" name="rt_asal" maxlength="3" minlength="2"
                                                    placeholder="Contoh: 001"
                                                    class="form-control @error('rt_asal') is-invalid @enderror"
                                                    value="{{ old('rt_asal') }}">
                                                <div class="invalid-feedback">
                                                    @error('rt_asal')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">RW<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" name="rw_asal" maxlength="3" minlength="2"
                                                    placeholder="Contoh: 001"
                                                    class="form-control @error('rw_asal') is-invalid @enderror"
                                                    value="{{ old('rw_asal') }}">
                                                <div class="invalid-feedback">
                                                    @error('rw_asal')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-7    ">
                                        <div class="form-group row">
                                            <label class="col-lg-5 col-form-label">Telpon / No HP<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-7">
                                                <input type="text" name="no_hp" maxlength="13" minlength="5"
                                                    class="form-control @error('no_hp') is-invalid @enderror"
                                                    value="{{ old('no_hp') }}">
                                                <div class="invalid-feedback">
                                                    @error('no_hp')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label">Kode Pos<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-8">
                                                <input type="text" name="kode_pos_asal" maxlength="5" minlength="5"
                                                    class="form-control @error('kode_pos_asal') is-invalid @enderror"
                                                    value="{{ old('kode_pos_asal') }}">
                                                <div class="invalid-feedback">
                                                    @error('kode_pos_asal')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Provinsi <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select name="provinsi_asal" id="provinsi_asal"
                                            class="select2 province form-control @error('provinsi_asal') is-invalid @enderror"
                                            value="{{ old('provinsi_asal') }}">
                                            <option value="" selected>== Pilih Provinsi ==</option>
                                            @foreach ($province as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('provinsi_asal')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Kab. / Kota <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select
                                            class="select2 regency form-control @error('kabupaten_asal') is-invalid @enderror"
                                            name="kabupaten_asal" id="kabupaten_asal"
                                            value="{{ old('kabupaten_asal') }}">
                                            <option value="" selected>== Pilih Kab. / Kota ==</option>

                                        </select>
                                        <div class="invalid-feedback">
                                            @error('kabupaten_asal')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Kecamatan <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select name="kecamatan_asal" id="kecamatan_asal"
                                            class="select2 district form-control @error('kecamatan_asal') is-invalid @enderror"
                                            value="{{ old('kecamatan_asal') }}">
                                            <option value="" selected>== Pilih Kecamatan ==</option>

                                        </select>
                                        <div class="invalid-feedback">
                                            @error('kecamatan_asal')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Desa / Kelurahan <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select name="desa_asal" id="desa_asal"
                                            class="select2 village form-control @error('desa_asal') is-invalid @enderror "
                                            value="{{ old('desa_asal') }}">
                                            <option value="" selected>== Pilih Desa / Kelurahan ==</option>

                                        </select>
                                        <div class="invalid-feedback">
                                            @error('desa_asal')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Tanggal Pindah<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="date" name="rencana_tgl_pindah" maxlength="255" minlength="5"
                                            class="form-control @error('rencana_tgl_pindah') is-invalid @enderror"
                                            value="{{ old('rencana_tgl_pindah') }}">
                                        <div class="invalid-feedback">
                                            @error('rencana_tgl_pindah')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Pemohon <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select name="penduduk_id" id="penduduk_id"
                                            class="select2 form-control @error('penduduk_id') is-invalid @enderror"
                                            value="{{ old('penduduk_id') }}">
                                            <option selected disabled>--Pilih Penduduk--</option>
                                            @foreach ($pemohon as $penduduk)
                                                <option value="{{ $kk->nik }}">NIK: {{ $penduduk->nik }} |
                                                    {{ $penduduk->nama_lengkap }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('penduduk_id')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Nama Pemohon<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="text" name="nama_pemohon" maxlength="255" minlength="5"
                                            class="form-control @error('nama_pemohon') is-invalid @enderror"
                                            value="{{ old('nama_pemohon') }}">
                                        <div class="invalid-feedback">
                                            @error('nama_pemohon')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">NIK Pemohon<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="text" name="nik_pemohon" maxlength="16" minlength="16"
                                            class="form-control @error('nik_pemohon') is-invalid @enderror"
                                            value="{{ old('nik_pemohon') }}">
                                        <div class="invalid-feedback">
                                            @error('nik_pemohon')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <small class="text-muted">DATA KEPINDAHAN :</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Alasan Pindah <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select name="alasan_pindah_id" id="alasan_pindah_id"
                                            class="select2 form-control @error('alasan_pindah_id') is-invalid @enderror"
                                            value="{{ old('alasan_pindah_id') }}">
                                            <option selected disabled>--Pilih Alasan Pindah--</option>
                                            @foreach ($AlasanPindah as $alasan)
                                                <option value="{{ $alasan->id }}">{{ $alasan->keterangan }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('alasan_pindah_id')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Klasifikasi Pindah <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select name="klasifikasi_pindah_id" id="klasifikasi_pindah_id"
                                            class="select2 form-control @error('klasifikasi_pindah_id') is-invalid @enderror"
                                            value="{{ old('klasifikasi_pindah_id') }}">
                                            <option selected disabled>--Pilih Klasifikasi Pindah--</option>
                                            @foreach ($KlasifikasiPindah as $klasifikasi)
                                                <option value="{{ $klasifikasi->id }}">{{ $klasifikasi->keterangan }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('klasifikasi_pindah_id')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Jenis Kepindahan <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select name="jenis_kepindahan_id" id="jenis_kepindahan_id"
                                            class="select2 form-control @error('jenis_kepindahan_id') is-invalid @enderror"
                                            value="{{ old('jenis_kepindahan_id') }}">
                                            <option selected disabled>--Pilih Jenis Kepindahan--</option>
                                            @foreach ($JenisPindah as $jenis)
                                                <option value="{{ $jenis->id }}">{{ $jenis->keterangan }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('jenis_kepindahan_id')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Status KK Tidak Pindah <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select name="status_kk_tdk_pindah_id" id="status_kk_tdk_pindah_id"
                                            class="select2 form-control @error('status_kk_tdk_pindah_id') is-invalid @enderror"
                                            value="{{ old('status_kk_tdk_pindah_id') }}">
                                            <option selected disabled>--Pilih Status KK Tidak Pindah--</option>
                                            @foreach ($StatusKKTidakPindah as $statuskk)
                                                <option value="{{ $statuskk->id }}">{{ $statuskk->keterangan }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('status_kk_tdk_pindah_id')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Status KK Yang Pindah <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select name="status_kk_pindah_id" id="status_kk_pindah_id"
                                            class="select2 form-control @error('status_kk_pindah_id') is-invalid @enderror"
                                            value="{{ old('status_kk_pindah_id') }}">
                                            <option selected disabled>--Pilih Status KK Yang Pindah--</option>
                                            @foreach ($StatusKKYangPindah as $statuskk)
                                                <option value="{{ $statuskk->id }}">{{ $statuskk->keterangan }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('status_kk_pindah_id')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <small class="text-muted">SILAHKAN PILIH ALAMAT TUJUAN PINDAH :</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Dusun Tujuan<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="text" name="dusun_tujuan" maxlength="255" minlength="5"
                                            placeholder="Contoh: DUSUN CIMARA"
                                            class="form-control @error('dusun_tujuan') is-invalid @enderror"
                                            value="{{ old('dusun_tujuan') }}">
                                        <div class="invalid-feedback">
                                            @error('dusun_tujuan')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label class="col-lg-6 col-form-label">RT Tujuan<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" name="rt_tujuan" maxlength="3" minlength="2"
                                                    placeholder="Contoh: 001"
                                                    class="form-control @error('rt_tujuan') is-invalid @enderror"
                                                    value="{{ old('rt_tujuan') }}">
                                                <div class="invalid-feedback">
                                                    @error('rt_tujuan')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label class="col-lg-5 col-form-label">RW Tujuan<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-7">
                                                <input type="text" name="rw_tujuan" maxlength="3" minlength="2"
                                                    placeholder="Contoh: 001"
                                                    class="form-control @error('rw_tujuan') is-invalid @enderror"
                                                    value="{{ old('rw_tujuan') }}">
                                                <div class="invalid-feedback">
                                                    @error('rw_tujuan')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Kode Pos Tujuan<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="text" name="kode_pos_tujuan" maxlength="5" minlength="5"
                                            class="form-control @error('kode_pos_tujuan') is-invalid @enderror"
                                            value="{{ old('kode_pos_tujuan') }}">
                                        <div class="invalid-feedback">
                                            @error('kode_pos_tujuan')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Provinsi <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select name="provinsi_tujuan" id="provinsi_tujuan"
                                            class="select2 province form-control @error('provinsi_tujuan') is-invalid @enderror"
                                            value="{{ old('provinsi_tujuan') }}">
                                            <option value="" selected>== Pilih Provinsi ==</option>
                                            @foreach ($province as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('provinsi_tujuan')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Kab. / Kota <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select
                                            class="select2 regency form-control @error('kabupaten_tujuan') is-invalid @enderror"
                                            name="kabupaten_tujuan" id="kabupaten_tujuan"
                                            value="{{ old('kabupaten_tujuan') }}">
                                            <option value="" selected>== Pilih Kab. / Kota ==</option>

                                        </select>
                                        <div class="invalid-feedback">
                                            @error('kabupaten_tujuan')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Kecamatan <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select name="kecamatan_tujuan" id="kecamatan_tujuan"
                                            class="select2 district form-control @error('kecamatan_tujuan') is-invalid @enderror"
                                            value="{{ old('kecamatan_tujuan') }}">
                                            <option value="" selected>== Pilih Kecamatan ==</option>

                                        </select>
                                        <div class="invalid-feedback">
                                            @error('kecamatan_tujuan')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Desa / Kelurahan <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select name="desa_tujuan" id="desa_tujuan"
                                            class="select2 village form-control @error('desa_tujuan') is-invalid @enderror"
                                            value="{{ old('desa_tujuan') }}">
                                            <option value="" selected>== Pilih Desa / Kelurahan ==</option>

                                        </select>
                                        <div class="invalid-feedback">
                                            @error('desa_tujuan')
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
                        <a class="btn btn-secondary"
                            href="{{ route('app.admin.penduduk-pindah-datang.index') }}">Kembali</a>
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function onChangeSelect(url, id, name) {
            // send ajax request to get the cities of the selected province and append to the select tag
            console.log(id);
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    id: id
                },
                success: function(data) {
                    $('#' + name).empty();
                    $('#' + name).append('<option>==Pilih Salah Satu==</option>');

                    console.log(data);
                    $.each(data, function(key, value) {
                        $('#' + name).append('<option value="' + value.id + '">' + value.name +
                            '</option>');
                    });
                }
            });
        }
        $(function() {
            $('.select2').select2();
            $('#provinsi_tujuan').on('change', function() {
                onChangeSelect('{{ route('app.admin.penduduk.regency') }}', $(this).val(),
                    'kabupaten_tujuan');
            });
            $('#kabupaten_tujuan').on('change', function() {
                onChangeSelect('{{ route('app.admin.penduduk.district') }}', $(this).val(),
                    'kecamatan_tujuan');
            })
            $('#kecamatan_tujuan').on('change', function() {
                onChangeSelect('{{ route('app.admin.penduduk.village') }}', $(this).val(),
                    'desa_tujuan');
            });
            $('#provinsi_asal').on('change', function() {
                onChangeSelect('{{ route('app.admin.penduduk.regency') }}', $(this).val(),
                    'kabupaten_asal');
            });
            $('#kabupaten_asal').on('change', function() {
                onChangeSelect('{{ route('app.admin.penduduk.district') }}', $(this).val(),
                    'kecamatan_asal');
            })
            $('#kecamatan_asal').on('change', function() {
                onChangeSelect('{{ route('app.admin.penduduk.village') }}', $(this).val(),
                    'desa_asal');
            });
        });
    </script>
@endpush
