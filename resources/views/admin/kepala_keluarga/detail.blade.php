@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Detail Anggota Keluarga
        @endslot
        @slot('li_1')
            Detail Anggota Keluarga
        @endslot
        @slot('li_2')
            Detail Anggota Keluarga
        @endslot
        @slot('action_button')
            <a href="{{ route('app.admin.kepala_keluarga.index') }}" class="btn btn-secondary me-2">
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
                                                                <div class="title">Nama Lengkap
                                                                </div>
                                                                <div class="text">
                                                                    <b>: {{ $kk->penduduk->nama_lengkap }}</b>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="title">NIK</div>
                                                                <div class="text">
                                                                    <a href="#">: {{ $kk->penduduk->nik }}</a>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="title">No KK</div>
                                                                <div class="text">:
                                                                    {{ $kk->penduduk->no_kk }}
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="title">Jenis Kelamin</div>
                                                                <div class="text">:
                                                                    {{ $kk->penduduk->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="title">Tempat, Tanggal Lahir</div>
                                                                <div class="text">:
                                                                    {{ $kk->penduduk->tempat_lahir }},
                                                                    {{ $kk->penduduk->tgl_lahir }}
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="title">Kondisi</div>
                                                                <div class="text">:
                                                                    {{ $kk->penduduk->is_live == true ? 'HIDUP' : 'MENINGGAL' }}
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="title">Alamat</div>
                                                                <div class="text">
                                                                    <ol>
                                                                        <li>Dusun :
                                                                            {{ $kk->penduduk->rt->dusun}} -
                                                                            RT : {{ $kk->penduduk->rt->nomor }} / RW :
                                                                            {{ $kk->penduduk->rt->rw }}</li>
                                                                        <li><strong><small><i>Lengkap :
                                                                                        {{ $kk->penduduk->alamat }}</i></small></strong>
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
                                                                    {{ $kk->penduduk->SDHK->keterangan }}
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="title">Pekerjaan</div>
                                                                <div class="text">:
                                                                    {{ $kk->penduduk->Pekerjaan->keterangan }}
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="title">Agama</div>
                                                                <div class="text">:
                                                                    {{ $kk->penduduk->agama }}
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="title">Status Pernikahan</div>
                                                                <div class="text">:
                                                                    {{ $kk->penduduk->StatusPerkawinan->keterangan }}
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="title">Nama Ayah</div>
                                                                <div class="text">:
                                                                    {{ $kk->penduduk->nama_ayah ?? '-' }}
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="title">Nama Ibu</div>
                                                                <div class="text">:
                                                                    {{ $kk->penduduk->nama_ibu ?? '-' }}
                                                                </div>
                                                            </li>

                                                            {{-- <li>
                                                                <div class="title">Status Dalam Keluarga
                                                                </div>
                                                                <div class="text">
                                                                    <ol>
                                                                        @if ($kk->penduduk->is_kepala_keluarga == 1)
                                                                            <li>KEPALA KELUARGA</li>
                                                                        @else
                                                                            @if ($kk->penduduk->is_keluarga == 1)
                                                                                <li>ANGGOTA KELUARGA</li>
                                                                            @else
                                                                                <li>TIDAK PUNYA KELUARGA</li>
                                                                            @endif
                                                                        @endif
                                                                    </ol>
                                                                </div>
                                                            </li> --}}

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pro-edit">
                                                <a class="edit-icon"
                                                    href="{{ route('app.admin.penduduk.edit', [$kk->penduduk->nik]) }}">
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
                            <h4>Daftar Anggota Keluarga</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <form action="{{ route('app.admin.kepala_keluarga.add_members') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-header">
                                    Form Tambah Anggota
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <input type="hidden" name="id_kepala_keluarga" value="{{ $kk->nik }}">
                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label class="col-lg-12 col-form-label">Pilih Penduduk <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-lg-12">
                                                    <select required name="nik" id="nik"
                                                        class="select2 form-control @error('nik') is-invalid @enderror"
                                                        value="{{ old('nik') }}">
                                                        <option value="" selected disabled>== Pilih Penduduk ==
                                                        </option>
                                                        @foreach ($penduduks as $penduduk)
                                                            <option value="{{ $penduduk->nik }}">
                                                                {{ $penduduk->nama_lengkap }} |
                                                                <strong>NIK
                                                                    : {{ $penduduk->nik }}</strong>
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        @error('nik')
                                                            {{ $message }}
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label class="col-lg-12 col-form-label">Pilih Hubungan Keluarg <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-lg-12">
                                                    <select required name="id_sdhk" id="id_sdhk"
                                                        class="select2 form-control @error('id_sdhk') is-invalid @enderror"
                                                        required value="{{ old('id_sdhk') }}">
                                                        <option value="" selected>Pilih Hubungan</option>
                                                        @foreach ($sdhk as $item)
                                                            <option value="{{ $item->id }}">{{ $item->keterangan }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        @error('id_sdhk')
                                                            {{ $message }}
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label class="col-lg-12 col-form-label">Nama Ayah<span
                                                        class="text-danger">*</span></label>
                                                <div class="col-lg-12">
                                                    <input type="text" name="nama_ayah" maxlength="255"
                                                        minlength="3" required
                                                        class="form-control @error('nama_ayah') is-invalid @enderror"
                                                        value="{{ old('nama_ayah') }}">
                                                    <div class="invalid-feedback">
                                                        @error('nama_ayah')
                                                            {{ $message }}
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label class="col-lg-12 col-form-label">Nama Ibu<span
                                                        class="text-danger">*</span></label>
                                                <div class="col-lg-12">
                                                    <input type="text" name="nama_ibu" maxlength="255" minlength="3"
                                                        required
                                                        class="form-control @error('nama_ibu') is-invalid @enderror"
                                                        value="{{ old('nama_ibu') }}">
                                                    <div class="invalid-feedback">
                                                        @error('nama_ibu')
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
                                    <button class="btn btn-primary">Tambahkan Anggota</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-8">
                            <div class="tab-content">
                                <div class="tab-pane show active">
                                    <div class="table-responsive">
                                        <table class="table table-striped custom-table no-footer mb-0 datatable"
                                            id="datatable">
                                            <thead>
                                                <tr>
                                                    <th>Hubungan Keluarga</th>
                                                    <th>Status Kepindahan</th>
                                                    <th>NIK</th>
                                                    <th>Nama</th>
                                                    <th>Tanggal Lahir</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Orangtua</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($keluarga as $anggota)
                                                    <tr>
                                                        <td>{{ $anggota->SDHK->keterangan }}</td>
                                                        <td><span class="badge badge-danger">{{ $anggota->is_mutasi==true?'Sudah Pindah':'-' }}</span></td>
                                                        <td>{{ $anggota->penduduk->nik }}</td>
                                                        <td>{{ $anggota->penduduk->nama_lengkap }}</td>
                                                        <td>{{ $anggota->penduduk->tgl_lahir }}</td>
                                                        <td>{{ $anggota->penduduk->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}
                                                        </td>
                                                        <td>
                                                            AYAH : {{ $anggota->nama_ayah}} <br>
                                                            IBU : {{ $anggota->nama_ibu}}
                                                        </td>
                                                        <td>
                                                            <button type="button"
                                                                data-action="{{ route('app.admin.kepala_keluarga.remove.member', $anggota->id) }}"
                                                                class="btn btn-danger btn-sm btn-delete btn-sm">
                                                                Hapus
                                                            </button>
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
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
        $(function() {

            $('.btn-delete').on('click', function() {
                var action = $(this).data('action');
                var id = $(this).data('id');
                swal.fire({
                    title: "Apakah Anda Yakin?",
                    text: "Anda yakin menghapus data ini?",
                    icon: "info",
                    showCancelButton: true,
                    confirmButtonText: "Hapus!",
                    cancelButtonText: "Batal!",
                    // reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: action,
                            type: 'DELETE',
                            cache: false,
                            dataType: 'json',
                            data: {
                                id: id,
                                _token: "{{ csrf_token() }}",
                            },
                            success: function(response) {
                                Swal.fire({
                                    type: 'success',
                                    icon: 'success',
                                    title: `${response.message}`,
                                    showConfirmButton: true,
                                    timer: 6000
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                });
                            }
                        });
                    }
                });
            });

        });
    </script>
@endpush
