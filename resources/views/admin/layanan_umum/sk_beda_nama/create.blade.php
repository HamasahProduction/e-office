@extends('layout.mainSurat')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Keterangan Beda Nama
        @endslot
        @slot('li_1')
            Tambah Keterangan Beda Nama
        @endslot
        @slot('li_2')
            Form Tambah
        @endslot
    @endcomponent

    <x-alert />

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <form action="{{ route('app.admin.surat.skbn.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <small class="text-muted">DATA PEMOHON :</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">NIK <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select name="nik_pemohon" id="nik_pemohon" required
                                            class="select2 province form-control @error('nik_pemohon') is-invalid @enderror"
                                            value="{{ old('nik_pemohon') }}">
                                            <option selected disabled>--Pilih NIK Penduduk--</option>
                                            @foreach ($penduduks as $penduduk)
                                                <option value="{{ $penduduk->nik }}">( {{ $penduduk->nik }} ) |
                                                    {{ $penduduk->nama_lengkap }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('nik_pemohon')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Dokumen Berbeda<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="text" name="dokumen_berbeda" maxlength="255" minlength="3" required
                                            class="form-control @error('dokumen_berbeda') is-invalid @enderror"
                                            value="{{ old('dokumen_berbeda') }}">
                                        <div class="invalid-feedback">
                                            @error('dokumen_berbeda')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Nama Berbeda<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="text" name="perbedaan_nama" maxlength="255" minlength="3" required
                                            class="form-control @error('perbedaan_nama') is-invalid @enderror"
                                            value="{{ old('perbedaan_nama') }}">
                                        <div class="invalid-feedback">
                                            @error('perbedaan_nama')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Tanggal Surat<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="date" name="tgl_surat" maxlength="255" minlength="5" required
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

                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <small class="text-muted">DATA KESALAHAN NAMA :</small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <small class="text-muted">Silahkan Tambahkan Data Kesalahan Beda Nama Dengan Cara Klik Tombol Tambah
                                            Warna Hijau:</small>
                                    </div>
                                </div>
                                <table class="table" id="table">
                                    <thead>
                                        <th>
                                            <label class="col-md-1 col-form-label">Berkas<span
                                                    class="text-danger">*</span></label>
                                        </th>
                                        <th>
                                            <label class="col-md-1 col-form-label">Data<span
                                                    class="text-danger">*</span></label>
                                        </th>
                                        <th style="text-align: right">
                                            <button type="button" class="btn btn-success" name="add" id="add"><i
                                                    class="fas fa-plus"></i> Berkas</button>
                                        </th>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <span class="text-muted float-start">
                            <strong class="text-danger">*</strong> Harus diisi
                        </span>
                        <a class="btn btn-secondary" href="{{ route('app.admin.surat.skbn.index') }}">Kembali</a>
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
    <script>
        var i = 0;
        $('#add').click(function() {
            ++i;
            $('#table').append(
                ` <tr>
                        <td class="mr-2">
                            <div class="col-lg-12">
                                <input type="text" name="dokumen_berbeda_lainya[]" maxlength="255" required
                                    minlength="3"
                                    class="col-lg-12 form-control @error('dokumen_berbeda_lainya[]') is-invalid @enderror"
                                    value="{{ old('dokumen_berbeda_lainya[`+i+`]') }}">
                                <div class="invalid-feedback">
                                    @error('dokumen_berbeda_lainya[`+i+`]')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </td>
                        <td class="mr-2">
                            <div class="col-lg-12">
                                <input type="text" name="perbedaan_nama_lainya[]" maxlength="255" required
                                    minlength="3"
                                    class="col-lg-12 form-control @error('perbedaan_nama_lainya[]') is-invalid @enderror"
                                    value="{{ old('perbedaan_nama_lainya[`+i+`]') }}">
                                <div class="invalid-feedback">
                                    @error('perbedaan_nama_lainya[`+i+`]')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger remove-table-row" name="remove" style="color:red;" onmouseover="this.style.color='white';" onmouseout="this.style.color='red';">Hapus</button>
                        </td>
                    </tr>`);
        });
        $(document).on('click', '.remove-table-row', function() {
            $(this).parents('tr').remove();
        });
    </script>
@endpush
