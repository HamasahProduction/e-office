@extends('landing-page.layanan_nikah.dashboard_layanan_nikah')
@section('title')
    Surat Keterangan Duda / Janda
@endsection

@section('content-administrasi')
    <div class="col-lg-9 col-md-8">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body p-lg-5">
                <form class="row needs-validation g-3" novalidate>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <h3 class="mb-0">Form Surat Keterangan Duda / Janda</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="col-md-6 col-md-12">
                                <label for="ScheduleFirstnameInput" class="form-label">
                                    Nama Istri
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="ScheduleFirstnameInput" required />
                                <div class="invalid-feedback">masukan nama istri.</div>
                            </div>
                            <div class="col-md-6 col-md-12">
                                <label for="scheduleTextarea" class="form-label">Alamat Istri</label>
                                <textarea class="form-control" id="scheduleTextarea" placeholder="masukan alamat lengkap ...." rows="3" required></textarea>
                                <div class="invalid-feedback">Please write message.</div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="col-md-6 col-md-12">
                                <label for="scheduleLastnameInput" class="form-label">
                                    Nama Suami
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="scheduleLastnameInput" required />
                                <div class="invalid-feedback">masukan nama suami.</div>
                            </div>
                            <div class="col-md-6 col-md-12">
                                <label for="scheduleTextarea" class="form-label">Alamat Suami</label>
                                <textarea class="form-control" id="scheduleTextarea" placeholder="masukan alamat lengkap ...." rows="3" required></textarea>
                                <div class="invalid-feedback">Please write message.</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <label for="scheduleLastnameInput" class="form-label">
                            Tanggal Cerai
                            <span class="text-danger">*</span>
                        </label>
                        <input type="date" class="form-control" id="scheduleLastnameInput" required />
                        <div class="invalid-feedback">pilih tanggal cerai.</div>
                    </div>


                    <div class="d-grid">
                        <button class="btn btn-primary" type="submit">Ajukan Permohonan!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
