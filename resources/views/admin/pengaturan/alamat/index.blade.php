@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Data Alamat
        @endslot
        @slot('li_1')
            Data Alamat
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
                    <form action="" method="get">
                        <div class="row filter-row">
                            {{-- <div class="col-md-3">
                                <div class="form-group form-group form-focus select-focus focused">
                                    <select class="select2 col-lg-12 form-control" name="province_id" id="province_id">
                                        <option selected disabled>Pilih Provinsi</option>
                                        @foreach ($province as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-group form-focus select-focus focused">
                                    <select class="select2 col-lg-12 form-control" name="kab_id" id="kab_id">
                                        <option selected disabled>Pilih Kabupaten</option>
                                        @foreach ($kabupaten as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                                <div class="form-group form-group form-focus select-focus focused">
                                    <select class="select2 col-lg-12 form-control" name="kode" id="kode">
                                        <option selected disabled>Pilih Kecamatan</option>
                                        @foreach ($kecamatan as $item)
                                            <option value="{{ $item->id }}">{{ $item->regency->name }} | KECAMATAN {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="col-md-8 float-start">
                                    <button type="submit"
                                        onclick="javascript: form.action='{{ route('app.admin.pengaturan.alamat.index') }}';"
                                        class="btn btn-primary w-20 btn-sm ">Filter Data
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="tab-content">
                        <div class="tab-pane show active">
                            <div class="table-responsive">
                                <table class="table table-striped custom-table no-footer mb-0" style="width: 100%;"
                                    id="datatable">
                                    <thead>
                                        <tr>
                                            <th>Provinsi</th>
                                            <th>Kabupaten/Kota</th>
                                            <th>Kecamatan</th>
                                            <th>Desa/Kelurahan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($alamat as $data)
                                            <tr>
                                                <td>Kode {{ $data->district->regency->province->id }} | {{ $data->district->regency->province->name }}</td>
                                                <td>Kode {{ $data->district->regency->id }} | {{ $data->district->regency->name }}</td>
                                                <td>Kode {{ $data->district->id }} | {{ $data->district->name }}</td>
                                                <td>Kode {{ $data->id }} | {{ $data->name }}</td>
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
         $(document).ready(function() {
            $('.select2').select2();
        });
        $(document).ready(function() {
            $('#datatable').DataTable({
                scrollX: true,
            });

        });
    </script>
@endpush
