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
                <form action="#" method="post" enctype="multipart/form-data">
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
                                    <label class="col-lg-3 col-form-label">Nomor Kartu Keluarga<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="text" name="no_kk" maxlength="255" minlength="5"
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
                                    <label class="col-lg-3 col-form-label">Nama Lengkap<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="text" name="nama_lengkap" maxlength="255" minlength="5"
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
                                    <label class="col-lg-3 col-form-label">Dusun<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="text" name="dusun" maxlength="255" minlength="5" placeholder="Contoh: DUSUN CIMARA"
                                            class="form-control @error('dusun') is-invalid @enderror"
                                            value="{{ old('dusun') }}">
                                        <div class="invalid-feedback">
                                            @error('dusun')
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
                                                <input type="text" name="rt" maxlength="255" minlength="5" placeholder="Contoh: 001"
                                                    class="form-control @error('rt') is-invalid @enderror"
                                                    value="{{ old('rt') }}">
                                                <div class="invalid-feedback">
                                                    @error('rt')
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
                                                <input type="text" name="rw" maxlength="255" minlength="5" placeholder="Contoh: 001"
                                                    class="form-control @error('rw') is-invalid @enderror"
                                                    value="{{ old('rw') }}">
                                                <div class="invalid-feedback">
                                                    @error('rw')
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
                                    <div class="col-lg-5">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label">Kode Pos<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-8">
                                                <input type="text" name="kode_pos" maxlength="255" minlength="5"
                                                    class="form-control @error('kode_pos') is-invalid @enderror"
                                                    value="{{ old('kode_pos') }}">
                                                <div class="invalid-feedback">
                                                    @error('kode_pos')
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
                                        <select required name="province_id" id="province_id"
                                            class="select2 province form-control @error('province_id') is-invalid @enderror"
                                            value="{{ old('province_id') }}">
                                            <option value="" selected>== Pilih Provinsi ==</option>
                                            @foreach ($province as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('province_id')
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
                                            class="select2 regency form-control @error('regency_id') is-invalid @enderror"
                                            name="regency_id" id="regency_id" value="{{ old('regency_id') }}">
                                            <option value="" selected>== Pilih Kab. / Kota ==</option>

                                        </select>
                                        <div class="invalid-feedback">
                                            @error('regency_id')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Kecamatan <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select required name="district_id" id="district_id"
                                            class="select2 district form-control @error('district_id') is-invalid @enderror"
                                            value="{{ old('district_id') }}">
                                            <option value="" selected>== Pilih Kecamatan ==</option>

                                        </select>
                                        <div class="invalid-feedback">
                                            @error('district_id')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Desa / Kelurahan <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select required name="village_id" id="village_id"
                                            class="select2 village form-control @error('village_id') is-invalid @enderror "
                                            value="{{ old('village_id') }}">
                                            <option value="" selected>== Pilih Desa / Kelurahan ==</option>

                                        </select>
                                        <div class="invalid-feedback">
                                            @error('village_id')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label class="col-lg-6 col-form-label">Tanggal Pindah<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="date" name="tanggal_pindah" maxlength="255"
                                                    minlength="5"
                                                    class="form-control @error('tanggal_pindah') is-invalid @enderror"
                                                    value="{{ old('tanggal_pindah') }}">
                                                <div class="invalid-feedback">
                                                    @error('tanggal_pindah')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label">Nama Pemohon<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-8">
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
                                    </div>
                                </div>
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
                                        <select name="klasifikasi_pindah" id="klasifikasi_pindah"
                                            class="select2 form-control @error('klasifikasi_pindah') is-invalid @enderror"
                                            value="{{ old('klasifikasi_pindah') }}">
                                            <option selected disabled>--Pilih Klasifikasi Pindah--</option>
                                            @foreach ($KlasifikasiPindah as $klasifikasi)
                                                <option value="{{ $klasifikasi->id }}">{{ $klasifikasi->keterangan }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('klasifikasi_pindah')
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
                                        <select name="status_kk_tidak_pindah" id="status_kk_tidak_pindah"
                                            class="select2 form-control @error('status_kk_tidak_pindah') is-invalid @enderror"
                                            value="{{ old('status_kk_tidak_pindah') }}">
                                            <option selected disabled>--Pilih Status KK Tidak Pindah--</option>
                                            @foreach ($StatusKKTidakPindah as $statuskk)
                                                <option value="{{ $statuskk->id }}">{{ $statuskk->keterangan }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('status_kk_tidak_pindah')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Status KK Yang Pindah <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select name="status_kk_yang_pindah" id="status_kk_yang_pindah"
                                            class="select2 form-control @error('status_kk_yang_pindah') is-invalid @enderror"
                                            value="{{ old('status_kk_yang_pindah') }}">
                                            <option selected disabled>--Pilih Status KK Yang Pindah--</option>
                                            @foreach ($StatusKKYangPindah as $statuskk)
                                                <option value="{{ $statuskk->id }}">{{ $statuskk->keterangan }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('status_kk_yang_pindah')
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
                                    <label class="col-lg-3 col-form-label">Provinsi <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select required name="province_tujuan_id" id="province_tujuan_id"
                                            class="select2 province form-control @error('province_tujuan_id') is-invalid @enderror"
                                            value="{{ old('province_tujuan_id') }}">
                                            <option value="" selected>== Pilih Provinsi ==</option>
                                            @foreach ($province as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('province_tujuan_id')
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
                                            class="select2 regency form-control @error('regency_tujuan_id') is-invalid @enderror"
                                            name="regency_tujuan_id" id="regency_tujuan_id"
                                            value="{{ old('regency_tujuan_id') }}">
                                            <option value="" selected>== Pilih Kab. / Kota ==</option>

                                        </select>
                                        <div class="invalid-feedback">
                                            @error('regency_tujuan_id')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Kecamatan <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select required name="district_tujuan_id" id="district_tujuan_id"
                                            class="select2 district form-control @error('district_tujuan_id') is-invalid @enderror"
                                            value="{{ old('district_tujuan_id') }}">
                                            <option value="" selected>== Pilih Kecamatan ==</option>

                                        </select>
                                        <div class="invalid-feedback">
                                            @error('district_tujuan_id')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Desa / Kelurahan <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select required name="village_tujuan_id" id="village_tujuan_id"
                                            class="select2 village form-control @error('village_tujuan_id') is-invalid @enderror"
                                            value="{{ old('village_tujuan_id') }}">
                                            <option value="" selected>== Pilih Desa / Kelurahan ==</option>

                                        </select>
                                        <div class="invalid-feedback">
                                            @error('village_tujuan_id')
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
                        <a class="btn btn-secondary" href="{{ route('app.admin.penduduk.index') }}">Kembali</a>
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
            $('#province_tujuan_id').on('change', function() {
                onChangeSelect('{{ route('app.admin.penduduk.regency') }}', $(this).val(),
                    'regency_tujuan_id');
            });
            $('#regency_tujuan_id').on('change', function() {
                onChangeSelect('{{ route('app.admin.penduduk.district') }}', $(this).val(),
                    'district_tujuan_id');
            })
            $('#district_tujuan_id').on('change', function() {
                onChangeSelect('{{ route('app.admin.penduduk.village') }}', $(this).val(),
                    'village_tujuan_id');
            });
            $('#province_id').on('change', function() {
                onChangeSelect('{{ route('app.admin.penduduk.regency') }}', $(this).val(),
                    'regency_id');
            });
            $('#regency_id').on('change', function() {
                onChangeSelect('{{ route('app.admin.penduduk.district') }}', $(this).val(),
                    'district_id');
            })
            $('#district_id').on('change', function() {
                onChangeSelect('{{ route('app.admin.penduduk.village') }}', $(this).val(),
                    'village_id');
            });
        });
    </script>
@endpush
