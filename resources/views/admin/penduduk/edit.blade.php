@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Penduduk
        @endslot
        @slot('li_1')
            Tambah Penduduk
        @endslot
        @slot('li_2')
            Form Edit
        @endslot
    @endcomponent

    <x-alert />

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <form action="{{ route('app.admin.penduduk.update', [$penduduk->nik]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <small class="text-muted">DATA DIRI :</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">NIK<span class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <input type="text" name="nik" maxlength="255" minlength="5"
                                            class="form-control @error('nik') is-invalid @enderror"
                                            value="{{ old('nik', $penduduk->nik) }}">
                                        <div class="invalid-feedback">
                                            @error('nik')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Nomor KK<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <input type="text" name="no_kk" maxlength="255" minlength="5"
                                            class="form-control @error('no_kk') is-invalid @enderror"
                                            value="{{ old('no_kk', $penduduk->no_kk) }}">
                                        <div class="invalid-feedback">
                                            @error('no_kk')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Nama Lengkap<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <input type="text" name="nama_lengkap" maxlength="255" minlength="5"
                                            class="form-control @error('nama_lengkap') is-invalid @enderror"
                                            value="{{ old('nama_lengkap', $penduduk->nama_lengkap) }}">
                                        <div class="invalid-feedback">
                                            @error('nama_lengkap')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Tempat Lahir<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <input type="text" name="tempat_lahir" maxlength="255" minlength="5"
                                            class="form-control @error('tempat_lahir') is-invalid @enderror"
                                            value="{{ old('tempat_lahir', $penduduk->tempat_lahir) }}">
                                        <div class="invalid-feedback">
                                            @error('tempat_lahir')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">TGL Lahir<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <input type="date" name="tanggal_lahir" maxlength="255" minlength="5"
                                            class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                            value="{{ old('tanggal_lahir', $penduduk->tgl_lahir) }}">
                                        <div class="invalid-feedback">
                                            @error('tanggal_lahir')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Pekerjaan<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <select class="select2 form-control @error('pekerjaan') is-invalid @enderror"
                                            required name="id_pekerjaan" id="id_pekerjaan"
                                            value="{{ old('id_pekerjaan') }}">
                                            <option value="" selected>Pilih Pekerjaan</option>
                                            @foreach ($pekerjaan as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == $penduduk->id_pekerjaan ? 'selected' : '' }}>
                                                    {{ $item->keterangan }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('id_pekerjaan')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Gender<span class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <select
                                            class="select2 regency form-control @error('jenis_kelamin') is-invalid @enderror"
                                            name="jenis_kelamin" id="jenis_kelamin" value="{{ old('jenis_kelamin') }}">
                                            <option value="" selected>Pilih Satu</option>
                                            <option value="L" {{ $penduduk->jenis_kelamin == 'L' ? 'selected' : '' }}>
                                                LAKI-LAKI</option>
                                            <option value="P" {{ $penduduk->jenis_kelamin == 'P' ? 'selected' : '' }}>
                                                PEREMPUAN</option>

                                        </select>
                                        <div class="invalid-feedback">
                                            @error('regency_id')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Alamat<span class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <textarea name="alamat" maxlength="255" minlength="5" required cols="30" rows="4"
                                            class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}">{{ $penduduk->alamat }}</textarea>
                                        <div class="invalid-feedback">
                                            @error('alamat')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Warganegara<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <select class="select2 form-control @error('kewarganegaraan') is-invalid @enderror"
                                            name="kewarganegaraan" id="kewarganegaraan"
                                            value="{{ old('kewarganegaraan') }}">
                                            <option value="" selected>Pilih Satu</option>
                                            <option value="wni"
                                                {{ $penduduk->kewarganegaraan == 'WNI' ? 'selected' : '' }}>WNI</option>
                                            <option value="wna"
                                                {{ $penduduk->kewarganegaraan == 'WNA' ? 'selected' : '' }}>WNA</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('kewarganegaraan')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Pendidikan<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <select
                                            class="select2 regency form-control @error('id_pendidikan') is-invalid @enderror"
                                            required name="id_pendidikan" id="id_pendidikan"
                                            value="{{ old('id_pendidikan') }}">
                                            <option value="" selected>Pilih Satu</option>
                                            @foreach ($pendidikan as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ !empty($pendidikan->id_pendidikan) ? ($item->id == $penduduk->id_pendidikan ? 'selected' : '') : '' }}>
                                                    {{ $item->keterangan }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('id_pendidikan')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Agama<span class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <select class="select2 regency form-control @error('agama') is-invalid @enderror"
                                            name="agama" id="agama" value="{{ old('agama') }}">
                                            <option value="" selected>Pilih Agama</option>
                                            <option value="islam" {{ $penduduk->agama == 'ISLAM' ? 'selected' : '' }}>
                                                ISLAM</option>
                                            <option value="kristen" {{ $penduduk->agama == 'KRISTEN' ? 'selected' : '' }}>
                                                KRISTEN</option>
                                            <option value="khatolik"
                                                {{ $penduduk->agama == 'KHATOLIK' ? 'selected' : '' }}>KHATOLIK</option>
                                            <option value="hindu" {{ $penduduk->agama == 'HINDU' ? 'selected' : '' }}>
                                                HINDU</option>
                                            <option value="budha" {{ $penduduk->agama == 'BUDHA' ? 'selected' : '' }}>
                                                BUDHA</option>
                                            <option value="khonghucu"
                                                {{ $penduduk->agama == 'KHONGHUCU' ? 'selected' : '' }}>KHONGHUCU</option>
                                            <option value="kepercayaan"
                                                {{ $penduduk->agama == 'KEPERCAYAAN' ? 'selected' : '' }}>KEPERCAYAAN
                                            </option>
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('regency_id')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Status Pernikahan<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <select
                                            class="select2 regency form-control @error('id_status_perkawinan') is-invalid @enderror"
                                            required name="id_status_perkawinan" id="id_status_perkawinan"
                                            value="{{ old('id_status_perkawinan') }}">
                                            <option value="" selected>Pilih Satu</option>
                                            @foreach ($statusPerkawinan as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == $penduduk->id_status_perkawinan ? 'selected' : '' }}>
                                                    {{ $item->keterangan }}</option>
                                            @endforeach
                                        </select>

                                        <div class="invalid-feedback">
                                            @error('id_status_perkawinan')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Hubungan Keluarga<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <select required name="id_sdhk" id="id_sdhk"
                                            class="select2 form-control @error('id_sdhk') is-invalid @enderror" required
                                            value="{{ old('id_sdhk') }}">
                                            <option value="" selected>Pilih Hubungan</option>
                                            @foreach ($sdhk as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == $penduduk->id_sdhk ? 'selected' : '' }}>
                                                    {{ $item->keterangan }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('id_sdhk')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <small class="text-muted">DATA ORANGTUA :</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">NIK AYAH<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <input type="text" name="nama_ayah" maxlength="255"
                                            class="form-control @error('nama_ayah') is-invalid @enderror"
                                            value="{{ old('nama_ayah', $penduduk->nama_ayah) }}">
                                        <div class="invalid-feedback">
                                            @error('nama_ayah')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">NIK IBU<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <input type="text" name="nama_ibu" maxlength="255"
                                            class="form-control @error('nama_ibu') is-invalid @enderror"
                                            value="{{ old('nama_ibu', $penduduk->nama_ibu) }}">
                                        <div class="invalid-feedback">
                                            @error('nama_ibu')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-4">
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <small class="text-muted">SILAHKAN PILIH ALAMAT :</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Pilih RT <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <select required name="rt_id" id="rt_id"
                                            class="select2 rt form-control @error('rt_id') is-invalid @enderror"
                                            value="{{ old('rt_id') }}">
                                            <option value="" selected>== Pilih RT ==</option>
                                            @foreach ($rt as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $penduduk->rt_id == $item->id ? 'selected' : '' }}>RT :
                                                    {{ $item->nomor }} | RW :
                                                    {{ $item->rw }} | {{ $item->dusun }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('rt_id')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Provinsi <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <select required name="province_id" id="province_id"
                                            class="select2 province form-control @error('province_id') is-invalid @enderror"
                                            value="{{ old('province_id') }}">
                                            <option value="" selected>== Pilih Provinsi ==</option>
                                            @foreach ($province as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $penduduk->province_id == $item->id ? 'selected' : '' }}>
                                                    {{ $item->name }}</option>
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
                                    <label class="col-lg-4 col-form-label">Kab. / Kota <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <select
                                            class="select2 regency form-control @error('regency_id') is-invalid @enderror"
                                            name="regency_id" id="regency_id" value="{{ old('regency_id') }}">
                                            <option value="" selected>== Pilih Kab. / Kota ==</option>
                                            @foreach ($regency as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $penduduk->regency_id == null ? '' : ($item->id == $penduduk->regency_id ? 'selected' : '') }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('regency_id')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Kecamatan <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <select required name="district_id" id="district_id"
                                            class="select2 district form-control @error('district_id') is-invalid @enderror"
                                            value="{{ old('district_id') }}">
                                            <option value="" selected>== Pilih Kecamatan ==</option>
                                            @foreach ($district as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $penduduk->district_id == null ? '' : ($item->id == $penduduk->district_id ? 'selected' : '') }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('district_id')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Desa <span class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <select required name="village_id" id="village_id"
                                            class="select2 village form-control @error('village_id') is-invalid @enderror "
                                            value="{{ old('village_id') }}">
                                            <option value="" selected>== Pilih Desa / Kelurahan ==</option>
                                            @foreach ($village as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $penduduk->village_id == null ? '' : ($item->id == $penduduk->village_id ? 'selected' : '') }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('village_id')
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
