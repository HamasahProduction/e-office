@extends('layout.mainSurat')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Surat Keterangan Tempat Usaha
        @endslot
        @slot('li_1')
            Surat Keterangan Tempat Usaha
        @endslot
        @slot('li_2')
            Daftar
        @endslot
        @slot('action_button')
        <a href="{{route('app.admin.surat.sku.create')}}" class="btn btn-primary btn-md">
            <i class="fa fa-plus"></i> Buat Surat
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
                                <div class="form-group ">
                                    <select class="select floating " name="jk" id="jk">
                                        <option selected disabled>Jenis Kelamin</option>
                                        <option value="">--Jenis Kelamin--</option>
                                        <option value="interest" {{ request('status') == 'interest' ? 'selected' : '' }}>
                                            Laki-Laki</option>
                                        <option value="booking" {{ request('status') == 'booking' ? 'selected' : '' }}>
                                            Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <select class="select floating " name="dusun" id="dusun">
                                        <option selected disabled>Pilih Dusun</option>
                                        <option value="">--Pilih Dusun--</option>
                                        <option value="interest" {{ request('status') == 'interest' ? 'selected' : '' }}>
                                            Manis</option>
                                        <option value="booking" {{ request('status') == 'booking' ? 'selected' : '' }}>
                                            Kliwon</option>
                                        <option value="booking" {{ request('status') == 'booking' ? 'selected' : '' }}>
                                            Legi</option>
                                        <option value="booking" {{ request('status') == 'booking' ? 'selected' : '' }}>
                                            Pahing</option>
                                    </select>
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
                                            <th>Nomor Surat</th>
                                            <th>Nama Lengkap</th>
                                            <th>Tanggal Berdiri</th>
                                            <th>Alamat Usaha</th>
                                            <th>Usaha</th>
                                            <th>Penghasilan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>050/SKTU/DESA/I/2015</td>
                                            <td>Nama : ALIYAH <br>KK : 5201144609786995 <br> NIK : 5201144609786995</td>
                                            <td>05 Januari 2023</td>
                                            <td>Dusun: kliwon <br> RT/RW : 001 / 001</td>
                                            <td>Konveksi</td>
                                            <td>Rp. 4000.000</td>
                                            <td>
                                                <a href="" class="btn btn-sm btn-warning">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <button onclick="printDiv('printable')" class="btn btn-primary btn-sm me-2 "><i class="fa fa-print"></i> Print</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>049/SKTU/DESA/I/2015</td>
                                            <td>Nama : ANA <br>KK : 5201144609786995 <br> NIK : 5201144609786995</td>
                                            <td>05 Januari 2023</td>
                                            <td>Dusun: kliwon <br> RT/RW : 001 / 001</td>
                                            <td>Konveksi</td>
                                            <td>Rp. 4000.000</td>
                                            <td>
                                                <a href="" class="btn btn-sm btn-warning">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <button onclick="printDiv('printable')" class="btn btn-primary btn-sm me-2 "><i class="fa fa-print"></i> Print</button>
                                            </td>
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
    <div class="row">
        <div class="col-lg-12" id="printable" >
            @include('admin.layanan_umum.sk_tempat_usaha.template_surat.preview_surat')
        </div>
    </div>
@endsection
@push('style')
    <style>
        @media print {

            /* Mengatur ukuran kertas cetak menjadi F4 */
            @page {
                size: 216mm 330mm;
                /* F4 */
            }

            /* Optional: Anda juga dapat menetapkan orientasi kertas jika diperlukan */
            /* @page {
                                            size: 330mm 216mm; // F4 landscape
                                        } */

            /* Contoh styling tambahan untuk konten cetak */
            body {
                font-family: Arial, sans-serif;
                margin: 20mm;
                /* Margin halaman cetak */
            }
        }
    </style>
@endpush
@push('scripts')
    <script>
         function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;

            // Show print dialog and get the result
            var printResult = window.print();

            // If the print dialog returns false (cancelled), reload the page
            if (!printResult) {
                location.reload();
            }

            document.body.innerHTML = originalContents;
        }
    </script>
@endpush