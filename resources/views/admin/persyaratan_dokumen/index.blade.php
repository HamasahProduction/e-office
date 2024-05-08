@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Persyaratan Dokumen
        @endslot
        @slot('li_1')
            Persyaratan Dokumen
        @endslot
        @slot('li_2')
            Daftar
        @endslot
        @slot('action_button')
            <a href="#" class="btn btn-primary btn-md">
                <i class="fa fa-plus"></i> Persyaratan Dokumen
            </a>
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
                                            <th>Aksi</th>
                                            <th>Nama Dokumen</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a href="" class="btn btn-xs btn-primary">
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                                <a href="" class="btn btn-xs btn-warning">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </td>
                                            <td>Fotokopi Akta Kelahiran/Surat Kelahiran bagi keluarga yang mempunyai anak</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="" class="btn btn-xs btn-primary">
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                                <a href="" class="btn btn-xs btn-warning">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </td>
                                            <td>Fotokopi Ijasah Terakhir</td>
                                        </tr>
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
