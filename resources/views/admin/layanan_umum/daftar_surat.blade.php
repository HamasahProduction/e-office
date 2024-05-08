@extends('layout.mainSurat')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Daftar Surat
        @endslot
        @slot('li_1')
            Daftar Surat
        @endslot
        @slot('li_2')
            Daftar
        @endslot
    @endcomponent

    <x-alert />

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="tab-content">
                        <div class="tab-pane show active">
                            <div class="table-responsive">
                                <table class="table table-striped custom-table no-footer mb-0 datatable">
                                    <thead>
                                        <tr>
                                            <th>Nama Surat</th>
                                            <th>Kode Surat</th>
                                            <th>No Urut Surat</th>
                                            <th>Penerbit</th>
                                            <th>Jenis Surat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($daftarSurat as $surat)
                                            <tr>
                                                <td>{{ $surat->nama_surat }}</td>
                                                <td>{{ $surat->kode_surat }}</td>
                                                <td>{{ $surat->no_urut_surat }}</td>
                                                <td>{{ $surat->penerbit }}</td>
                                                <td>{{ $surat->jenis_surat }}</td>
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
@endpush
