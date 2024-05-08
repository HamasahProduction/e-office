@extends('layout.mainSurat')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Surat Keterangan Bepergian
        @endslot
        @slot('li_1')
            Surat Keterangan Bepergian
        @endslot
        @slot('li_2')
            Form Tambah Baru
        @endslot
    @endcomponent

    <x-alert />

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <form action="{{ route('app.admin.surat.skb.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
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
                                            <<option value="{{ $penduduk->nik }}">NIK : {{ $penduduk->nik }} | {{ $penduduk->nama_lengkap }}</option>
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
                                <label class="col-lg-3 col-form-label">Kepentingan<span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input type="text" name="kepentingan" maxlength="255" minlength="5"
                                        class="form-control @error('kepentingan') is-invalid @enderror"
                                        value="{{ old('kepentingan') }}">
                                    <div class="invalid-feedback">
                                        @error('kepentingan')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Provinsi <span class="text-danger">*</span></label>
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
                                    <select class="select2 regency form-control @error('regency_id') is-invalid @enderror"
                                        required name="regency_id" id="regency_id" value="{{ old('regency_id') }}">
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
                                <label class="col-lg-3 col-form-label">Kecamatan <span class="text-danger">*</span></label>
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
                                <label class="col-lg-3 col-form-label">Desa <span class="text-danger">*</span></label>
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
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Tanggal Surat<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input type="date" name="tgl_surat" maxlength="255" minlength="5"
                                        class="form-control @error('tgl_surat') is-invalid @enderror"
                                        value="{{ old('tgl_surat') }}">
                                    <div class="invalid-feedback">
                                        @error('tgl_surat')
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
                            <a href="{{ route('app.admin.surat.skb.index') }}" class="btn btn-secondary me-2">Kembali</a>
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
                onChangeSelect('{{ route('app.admin.surat.skb.regency') }}', $(this).val(),
                    'regency_id');
            });
            $('#regency_id').on('change', function() {
                onChangeSelect('{{ route('app.admin.surat.skb.district') }}', $(this).val(),
                    'district_id');
            })
            $('#district_id').on('change', function() {
                onChangeSelect('{{ route('app.admin.surat.skb.village') }}', $(this).val(),
                    'village_id');
            });
        });
    </script>
@endpush
