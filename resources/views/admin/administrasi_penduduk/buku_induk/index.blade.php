@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Data Buku Induk Penduduk
        @endslot
        @slot('li_1')
            Data Buku Induk Penduduk
        @endslot
        @slot('li_2')
            Daftar
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="" method="get">
                        <div class="row filter-row">

                            <div class="col-md-2">
                                <div class="form-group form-focus select-focus focused">
                                    <input type="date" class="form-control" name="birthday"
                                        value="{{ old('birthday', request('birthday', $birthday)) }}">
                                    <label class="focus-label">Tanggal Lahir </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group form-group form-focus select-focus focused">
                                    <select class="select2 col-lg-12" name="status" id="status">
                                        <option selected disabled>Status Penduduk</option>
                                        <option value="">--Semua Status--</option>
                                        <option value="tetap" {{ request('status') == 'tetap' ? 'selected' : '' }}>
                                            Penduduk Tetap</option>
                                        <option value="tidak_tetap"
                                            {{ request('status') == 'tidak_tetap' ? 'selected' : '' }}>
                                            Tidak Tetap</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-group form-focus select-focus focused">
                                    <select class="select2 col-lg-12" name="rt_id" id="rt_id">
                                        <option selected disabled>Pilih RT</option>
                                        @foreach ($rts as $item)
                                            <option value="{{ $item->id }}">RT : {{ $item->nomor }} | RW :
                                                {{ $item->rw }} | {{ $item->dusun }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="col-md-8 float-start">
                                    <button type="submit"
                                        onclick="javascript: form.action='{{ route('app.admin.penduduk.index') }}';"
                                        class="btn btn-primary w-20 btn-sm ">Filter Data
                                    </button>
                                    <button type="submit" target="_blank"
                                        onclick="javascript: form.action='{{ route('app.admin.penduduk.index') }}';"
                                        class="btn btn-warning w-20 btn-sm">Refresh</button>
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
                                            <th>Dusun/RT/RW</th>
                                            <th>Nama</th>
                                            <th>NIK</th>
                                            <th>No KK</th>
                                            <th style="width: 10%">Orangtua</th>
                                            <th>Alamat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($penduduks as $penduduk)
                                            <tr>
                                                <td>{{ $penduduk->Rt->dusun }} <br>RT: {{ $penduduk->Rt->nomor }}
                                                    /RW: {{ $penduduk->Rt->rw }}</td>
                                                <td><strong>{{ $penduduk->nama_lengkap }}</strong> <br> TGL Lahir :
                                                    {{ Carbon\Carbon::parse($penduduk->tgl_lahir)->isoFormat('dddd, D MMMM Y') }}
                                                </td>
                                                <td>{{ $penduduk->nik }}</td>
                                                <td>{{ $penduduk->no_kk }}</td>
                                                <td><strong>AYAH : {{ $penduduk->nama_ayah ?? '-' }} <br> IBU :
                                                        {{ $penduduk->nama_ibu ?? '-' }}</strong></td>
                                                <td>{!! wordwrap($penduduk->alamat, 50, "<br>\n") !!}</td>

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
    </script>
@endpush
