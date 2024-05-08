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
            Daftar
        @endslot
        @slot('action_button')
        <a href="{{route('app.admin.penduduk-pindah-datang.create')}}" class="btn btn-success btn-md">
            <i class="fa fa-plus"></i> Penduduk Pindah Datang
        </a>
       
    @endslot
    @endcomponent

    <x-alert />

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="" method="get">
                        <div class="row filter-row">

                            <div class="col-md-2">
                                <div class="form-group form-focus select-focus focused">
                                    <input type="date" class="form-control" name="birthday"
                                        value="">
                                    <label class="focus-label">Tanggal Pindah </label>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group form-focus select-focus focused">
                                    <select class="select floating select2-hidden-accessible" name="status" id="status">
                                        <option selected disabled>Status Penduduk</option>
                                        <option value="">--Semua Status--</option>
                                        <option value="interest" {{ request('status') == 'interest' ? 'selected' : '' }}>
                                            Penduduk Tetap</option>
                                        <option value="booking" {{ request('status') == 'booking' ? 'selected' : '' }}>
                                            Penduduk Tidak Tetap</option>
                                    </select>
                                    <label class="focus-label">Status </label>
                                </div>
                            </div>

                            <div class="col-md-8 col-12">
                                <div class="col-md-8 float-start">
                                    <button type="submit"
                                        onclick="javascript: form.action='{{ route('app.admin.penduduk.index') }}';"
                                        class="btn btn-primary w-20 btn-sm ">Filter Data
                                    </button>
                                    <button type="submit" target="_blank"
                                        onclick="javascript: form.action='{{ route('app.admin.penduduk.export') }}';"
                                        class="btn btn-success w-20 btn-sm">Download Data</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="tab-content">
                        <div class="tab-pane show active">
                            <div class="table-responsive">
                                <table class="table table-striped custom-table no-footer mb-0 datatable">
                                    <thead>
                                        <tr>
                                            <th>No KK</th>
                                            <th>Nama KK</th>
                                            <th>NIK Pemohon</th>
                                            <th>Nama Pemohon</th>
                                            <th>Status Surat</th>
                                            <th>Daerah Tujuan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pendudukPindahs as $pendudukPindah)
                                            <tr>
                                                <td>{{ $pendudukPindah->no_kk }}</td>
                                                <td>{{ $pendudukPindah->nama_kepala_keluarga }}</td>
                                                <td>{{ $pendudukPindah->nik_pemohon }}</td>
                                                <td>{{ $pendudukPindah->nama_pemohon }}</td>
                                                <td><span class="badge badge-info">{{ $pendudukPindah->status_surat }}</span></td>
                                                {{-- <td>
                                                    Dusun : {{ $pendudukPindah->dusun_asal }} RT: {{ $pendudukPindah->rt_asal }} / RW: {{ $pendudukPindah->rw_asal }}<br>
                                                    Desa : {{ $pendudukPindah->villageAsal->name }} <br>
                                                    Kecamatan : {{ $pendudukPindah->districtAsal->name }} <br>
                                                    Kabupaten : {{ $pendudukPindah->regencyAsal->name }} <br>
                                                    Provinsi : {{ $pendudukPindah->provinceAsal->name }} <br>
                                                </td> --}}
                                                <td>
                                                    Dusun : {{ $pendudukPindah->dusun_asal }} <br>
                                                    Desa : {{ $pendudukPindah->villageTujuan->name }} <br>
                                                    Kecamatan : {{ $pendudukPindah->districtTujuan->name }} <br>
                                                    Kabupaten : {{ $pendudukPindah->regencyTujuan->name }} <br>
                                                    Provinsi : {{ $pendudukPindah->provinceTujuan->name }} <br>
                                                </td>
                                                <td>
                                                    <a href="{{route('app.admin.penduduk-pindah-datang.detail', [$pendudukPindah->nik_pemohon])}}" class="btn btn-sm btn-primary">
                                                        Detail
                                                    </a>
                                                    
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    function printLetter(url) {
        // Load the content from the URL using AJAX
        fetch(url)
            .then(response => response.text())
            .then(data => {
                // Open a new window and write the fetched HTML content
                let printWindow = window.open('', '_blank');
                printWindow.document.write(data);
                printWindow.document.close();

                // Once the content is loaded, trigger the print dialog
                printWindow.onload = function() {
                    printWindow.print();
                };
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    }
</script>
@endpush
