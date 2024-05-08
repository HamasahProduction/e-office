@extends('layout.mainSurat')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Penduduk Pindah
        @endslot
        @slot('li_1')
            Penduduk Pindah
        @endslot
        @slot('li_2')
            Form F-1.08
        @endslot
    @endcomponent

    <x-alert />
    @if (session('errorSimpan'))
        <?php $errorSimpan = session('errorSimpan'); ?>
        @if (count($errorSimpan) > 0)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @foreach ($errorSimpan as $error)
                    <h5> {!! $error !!}</h5>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    @endif
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <form action="{{ route('app.admin.surat-keterangan-pindah-datang.store') }}" method="post"
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
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Pemohon <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select name="nik_pemohon" id="pemohon"
                                            class="multipleSelect form-control select2 @error('nik_pemohon') is-invalid @enderror"
                                            value="{{ old('nik_pemohon') }}" disabled>
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('nik_pemohon')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row" id="showPenduduk">
                                    <label class="col-lg-3 col-form-label">Anggota Keluarga <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select name="anggota_keluarga[]" id="anggota_keluarga" multiple="multiple"
                                            class="multipleSelect form-control select2 col-lg-12 @error('anggota_keluarga') is-invalid @enderror"
                                            value="{{ old('anggota_keluarga') }}" disabled>
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('anggota_keluarga')
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
                                    <div class="col-lg-12">
                                        <small class="text-muted">DATA KEPINDAHAN :</small>
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
                            </div>
                            <div class="col-lg-6">
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
                            href="{{ route('app.admin.surat-keterangan-pindah-datang.index') }}">Kembali</a>
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
@endpush
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.multipleSelect').select2();
            $('.select2').select2();
        });
        $(document).ready(function() {
            $('#showPenduduk').prop('disabled', true);
            $('#jenis_kepindahan_id').change(function() {
                var jenis_kepindahan = $(this).val();
                if (jenis_kepindahan == 3 || jenis_kepindahan == 4) {
                    $('#showPenduduk').prop('disabled', false);

                } else {
                    $('#showPenduduk').prop('disabled', true);
                }
            });

            $('#kk_id').change(function() {
                var kkId = $(this).val();
                if (kkId) {
                    $.ajax({
                        url: '{{ route('app.admin.surat-keterangan-pindah-datang.anggota-keluarga') }}',
                        type: 'GET',
                        data: {
                            kk_id: kkId
                        },
                        success: function(data) {
                            var jp = $('#jenis_kepindahan_id').val();

                            $('#pemohon').empty();
                            if (data.length > 0) {
                                $.each(data, function(key, value) {
                                    $('#pemohon').append('<option value="' +
                                        value.id + '">' + value.s_d_h_k.keterangan +
                                        ' | ' + value.nik + ' | ' + value
                                        .penduduk.nama_lengkap + '</option>');
                                });
                                $('#pemohon').prop('disabled', false);

                            } else {
                                $('#pemohon').append(
                                    '<option value="">--Tidak Ada Anggota Keluarga--</option>'
                                );
                                $('#pemohon').prop('disabled', true);
                            }
                            // console.info(jp);
                            if (jp == 3 || jp == 4) {
                                $('#anggota_keluarga').empty();
                                if (data.length > 0) {
                                    $.each(data, function(key, value) {
                                        $('#anggota_keluarga').append(
                                            '<option value="' +
                                            value.id + '">' + value.nik + ' | ' +
                                            value
                                            .penduduk.nama_lengkap + '</option>');
                                    });
                                    $('#anggota_keluarga').prop('disabled', false);

                                } else {
                                    $('#anggota_keluarga').append(
                                        '<option value="">--Tidak Ada Anggota Keluarga--</option>'
                                    );
                                    $('#anggota_keluarga').prop('disabled', true);
                                }
                            } else {
                                $('#anggota_keluarga').prop('disabled', true);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                } else {
                    $('#pemohon').empty();
                    $('#pemohon').prop('disabled', true);
                    $('#anggota_keluarga').empty();
                    $('#anggota_keluarga').prop('disabled', true);
                }
            });
        });

        $('#pemohon').change(function() {
            var idpemohon = $(this).val();
            console.info(idpemohon);
            $.ajax({
                url: '{{ route('app.admin.surat-keterangan-pindah-datang.alamat-pemohon') }}',
                type: 'GET',
                data: {
                    id: idpemohon
                },
                success: function(data) {
                    console.info(data);
                    $('#nama_dusun').val(data.rt.dusun);
                    $('#rt_asal').val(data.rt.nomor);
                    $('#rw_asal').val(data.rt.rw);
                    $('#provinsi_asal').val(data.province.name);
                    $('#kabupaten_asal').val(data.regency.name);
                    $('#kecamatan_asal').val(data.district.name);
                    $('#desa_asal').val(data.village.name);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

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
                onChangeSelect('{{ route('app.admin.surat-keterangan-pindah-datang.regency') }}', $(this)
                    .val(),
                    'kabupaten_tujuan');
            });
            $('#kabupaten_tujuan').on('change', function() {
                onChangeSelect('{{ route('app.admin.surat-keterangan-pindah-datang.district') }}', $(this)
                    .val(),
                    'kecamatan_tujuan');
            })
            $('#kecamatan_tujuan').on('change', function() {
                onChangeSelect('{{ route('app.admin.surat-keterangan-pindah-datang.village') }}', $(this)
                    .val(),
                    'desa_tujuan');
            });
            // $('#provinsi_asal').on('change', function() {
            //     onChangeSelect('{{ route('app.admin.surat-keterangan-pindah-datang.regency') }}', $(this)
            //         .val(),
            //         'kabupaten_asal');
            // });
            // $('#kabupaten_asal').on('change', function() {
            //     onChangeSelect('{{ route('app.admin.surat-keterangan-pindah-datang.district') }}', $(this)
            //         .val(),
            //         'kecamatan_asal');
            // })
            // $('#kecamatan_asal').on('change', function() {
            //     onChangeSelect('{{ route('app.admin.surat-keterangan-pindah-datang.village') }}', $(this)
            //         .val(),
            //         'desa_asal');
            // });
        });
    </script>
@endpush
