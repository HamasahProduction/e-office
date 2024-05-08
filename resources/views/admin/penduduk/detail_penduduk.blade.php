@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Detail Penduduk
        @endslot
        @slot('li_1')
            Penduduk
        @endslot
        @slot('li_2')
            Detail Penduduk
        @endslot
        @slot('action_button')
            <a href="{{ route('app.admin.penduduk.index') }}" class="btn btn-secondary me-2">
                <i class="fa fa-reply"></i> Kembali
            </a>
        @endslot
    @endcomponent

    <x-alert />

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="profile-view">
                                            <div class="profile-img-wrap">
                                                <div class="profile-img">
                                                    <a href="#"><img alt=""
                                                            src="{{ asset('assets/img/user.jpg') }}" loading="lazy"
                                                            style="object-fit: cover"></a>
                                                </div>
                                            </div>
                                            <div class="profile-basic">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <ul class="personal-info">
                                                            <li>
                                                                <div class="title">Nama Lengkap</div>
                                                                <div class="text">
                                                                    <b>: {{ $penduduk->nama_lengkap }}</b>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="title">NIK</div>
                                                                <div class="text">
                                                                    <a href="#">: {{ $penduduk->nik }}</a>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="title">No KK</div>
                                                                <div class="text">:
                                                                    {{ $penduduk->no_kk }}
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="title">Jenis Kelamin</div>
                                                                <div class="text">:
                                                                    {{ $penduduk->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="title">Tempat, Tanggal Lahir</div>
                                                                <div class="text">:
                                                                    {{ $penduduk->tempat_lahir }},
                                                                    {{ $penduduk->tgl_lahir }}
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="title">Kondisi</div>
                                                                <div class="text">:
                                                                    {{ $penduduk->is_live == true ? 'HIDUP' : 'MENINGGAL' }}
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="title">Alamat</div>
                                                                <div class="text">
                                                                    <ol>
                                                                        <li>Dusun : {{ $penduduk->rt->dusun }} -
                                                                            RT : {{ $penduduk->rt->nomor }} / RW :
                                                                            {{ $penduduk->rt->rw }}</li>
                                                                        <li><strong><small><i>Lengkap :
                                                                                        {{ $penduduk->alamat }}</i></small></strong>
                                                                        </li>
                                                                    </ol>

                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <ul class="personal-info mt-2">
                                                            <li>
                                                                <div class="title">Hubungan Keluarga</div>
                                                                <div class="text">:
                                                                    {{ $penduduk->SDHK->keterangan }}
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="title">Pendidikan</div>
                                                                <div class="text">:
                                                                    {{ $penduduk->id_pendidikan==null?'DATA KOSONG':$penduduk->Pendidikan->keterangan }}
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="title">Pekerjaan</div>
                                                                <div class="text">:
                                                                    {{ $penduduk->Pekerjaan->keterangan }}
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="title">Agama</div>
                                                                <div class="text">:
                                                                    {{ $penduduk->agama }}
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="title">Status Pernikahan</div>
                                                                <div class="text">:
                                                                    {{ $penduduk->StatusPerkawinan->keterangan }}
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="title">Nama Ayah</div>
                                                                <div class="text">:
                                                                    {{ $penduduk->nama_ayah ?? '-' }}
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="title">Nama Ibu</div>
                                                                <div class="text">:
                                                                    {{ $penduduk->nama_ibu ?? '-' }}
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="title">Status Dalam Keluarga
                                                                </div>
                                                                <div class="text">
                                                                    <ol>
                                                                        @if ($penduduk->is_kepala_keluarga == 1)
                                                                            <li>KEPALA KELUARGA</li>
                                                                        @else
                                                                            @if ($penduduk->is_keluarga == 1)
                                                                                <li>ANGGOTA KELUARGA</li>
                                                                            @else
                                                                                <li>TIDAK PUNYA KELUARGA</li>
                                                                            @endif
                                                                        @endif
                                                                    </ol>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pro-edit">
                                                <a class="edit-icon"
                                                    href="{{ route('app.admin.penduduk.edit', [$penduduk->nik]) }}">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="form-group">
                        <div class="col-lg-12">
                            @if (!empty($kk))
                                <h4><strong>INFORMASI KELUARGA</strong></h4>
                            @else
                                <h4><strong>PENDUDUK BELUM MEMILIKI INFORMASI KELUARGA</strong></h4>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane show active">
                            <div class="table-responsive">
                                <table class="table table-striped custom-table no-footer mb-0 datatable" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>Hubungan Keluarga</th>
                                            <th>Anggota</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Anggota</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($kk))
                                            <tr>
                                                <td>{{$kk->penduduk->SDHK->keterangan}}</td>
                                                <td><strong>{{ $kk->penduduk->nama_lengkap }}</strong> <br>{{ $kk->penduduk->nik }}</td>
                                                <td>{{ $kk->penduduk->tgl_lahir }}</td>
                                                <td>{{ $kk->penduduk->jenis_kelamin=='L'?'Laki-Laki':'Perempuan' }}</td>
                                                <td>
                                                    <ol>
                                                        @foreach ($kk->anggotaKeluargas as $anggotaKeluarga)
                                                            <li>
                                                                <strong>{{ $anggotaKeluarga->penduduk->nama_lengkap }}</strong><br>
                                                                <small>
                                                                    ({{ $anggotaKeluarga->penduduk->nik }})
                                                                </small>
                                                            </li>
                                                        @endforeach
                                                    </ol>
                                                </td>
                                            </tr>
                                        @endif
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
