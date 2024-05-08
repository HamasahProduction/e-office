@extends('landing-page.layanan_nikah.dashboard_layanan_nikah')
@section('title')
    Pengantar Nikah
@endsection

@section('content-administrasi')
    <div class="col-lg-9 col-md-8">
        {{-- <div class="mb-4">
            <h1 class="mb-0 h3"> Pengantar Nikah</h1>
        </div> --}}
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body p-lg-5">
                <form class="row needs-validation g-3" novalidate>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <h3 class="mb-0">Form Pengajuan Pengantar Nikah</h3>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <label for="ScheduleFirstnameInput" class="form-label">
                            Nama Lengkap
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="ScheduleFirstnameInput" required />
                        <div class="invalid-feedback">masukan nama lengkap.</div>
                    </div>
                    <div class="col-md-6 col-12">
                        <label for="scheduleLastnameInput" class="form-label">
                            Nama Pasangan
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="scheduleLastnameInput" required />
                        <div class="invalid-feedback">masukan nama pasangan.</div>
                    </div>
                    <div class="col-md-6 col-12">
                        <label for="scheduleLastnameInput" class="form-label">
                            Tanggal Akad
                            <span class="text-danger">*</span>
                        </label>
                        <input type="date" class="form-control" id="scheduleLastnameInput" required />
                        <div class="invalid-feedback">pilih tanggal akad.</div>
                    </div>
                    <div class="col-md-6 col-12">
                        <label for="scheduleLastnameInput" class="form-label">
                            Tanggal Resepsi
                            <span class="text-danger">*</span>
                        </label>
                        <input type="date" class="form-control" id="scheduleLastnameInput" required />
                        <div class="invalid-feedback">pilih tanggal resepsi.</div>
                    </div>
                    
                    <div class="d-grid">
                        <button class="btn btn-primary" type="submit">Ajukan Permohonan!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
