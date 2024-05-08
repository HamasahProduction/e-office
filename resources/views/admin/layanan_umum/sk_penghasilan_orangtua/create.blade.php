{{-- @extends('layout.mainlayout', ['miniSidebar' => true]) --}}
@extends('layout.mainSurat')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Keterangan Penghasilan
        @endslot
        @slot('li_1')
            Keterangan Penghasilan
        @endslot
        @slot('li_2')
            Buat Surat
        @endslot
    @endcomponent

    <x-alert />
    <div class="row">
        <div class="col-5">
            <div class="card">
                <form action="{{ route('app.admin.surat.skp.store') }}" method="post" id="formPayment"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Kepala Keluarga<span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <select name="kk_id" id="kkSelected"
                                    class="select2 province form-control @error('kk_id') is-invalid @enderror">
                                    <option value="" disabled selected>== Pilih Kepala Keluarga ==</option>
                                    @foreach ($penduduks as $kk)
                                    <option value="{{ $kk->nik }}">NIK : {{ $kk->penduduk->nik }} | {{ $kk->penduduk->nama_lengkap }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    @error('standard_representative')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Penghasilan<span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" name="penghasilan" maxlength="255" minlength="5" id="penghasilan"
                                    class="form-control @error('penghasilan') is-invalid @enderror"
                                    value="{{ old('penghasilan') }}">
                                <div class="invalid-feedback">
                                    @error('penghasilan')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Tujuan / Kepentingan<span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <textarea name="note" maxlength="255" minlength="5" class="form-control @error('note') is-invalid @enderror"
                                    value="{{ old('note') }}" cols="10" rows="5"></textarea>

                                <div class="invalid-feedback">
                                    @error('note')
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
                        <a class="btn btn-secondary" href="{{ route('app.admin.surat.skp.index') }}">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-7">
            <div class="card">
                <div class="card-header">
                    <label class="col-lg-6 col-form-label">Data Penduduk Berdasarkan Kepala Keluarga Terpilih</label> <br>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane show active">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0 " id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>TTL</th>
                                            <th>Hubungan Keluarga</th>
                                            <th>Alamat</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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
            $('.select2').select2();
            var table = $('#dataTable').DataTable({
                searching: false,
                paging: false,
                processing: true,
                serverSide: false,
                ajax: {
                    url: '{{ route('app.admin.surat.skp.kepala-keluarga') }}', // Replace with your endpoint
                    type: 'GET',
                    data: function(d) {
                        d.kk_id = $('#kkSelected').val();
                    }
                },
                columns: [{
                        data: null,
                        orderable: false,
                        render: function(data, type, row) {
                            return `
                            <div class="form-check">
                                <input class="form-check-input payment-checkbox" type="checkbox" name="nik_anak" form="formPayment" value="${row.nik_anggota}">
                            </div>
                            `;
                        }
                    },
                    {
                        data: 'nik_anggota',
                        name: 'nik_anggota'
                    },
                    {
                        data: 'nama_lengkap',
                        name: 'nama_lengkap'
                    },
                    {
                        data: null,
                        orderable: false,
                        render: function(data, type, row) {
                            var tanggal = moment(row.tgl_lahir, "YYYY-MM-DD").format("DD MMMM YYYY");
                            return row.tempat_lahir + ', ' + tanggal;
                        }
                    },
                    {
                        data: 'hubungan_keluarga',
                        name: 'hubungan_keluarga'
                    },
                    {
                        data: 'alamat',
                        name: 'alamat'
                    },
                    // Add other columns as needed
                ],

            });

            // Handle user selection change
            $('#kkSelected').change(function() {
                table.ajax.reload();
            });

            // Handle checkbox changes
            $('#dataTable tbody').on('change', 'input[type="checkbox"]', function() {
                updateSelectedRowIds();
            });

            document.getElementById('penghasilan').addEventListener('keyup', function(e) {
                this.value = formatRupiah(this.value);
            });
        });


        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    </script>
@endpush
