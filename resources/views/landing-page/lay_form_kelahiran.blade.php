<section class="pattern-square bg-info bg-opacity-10">
    <div class="container position-relative z-1 py-xl-9 py-6">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-md-12">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6 col-12 order-2" data-cue="slideInLeft">
                        <div class="me-xl-7">
                            <div class="mb-5">
                                <h2 class="h1 mb-4">Layanan Kependudukan</h2>
                                <p class="mb-0">Akses mudah dan cepat untuk masyarakat dalam mengakses berbagai
                                    layanan kependudukan pemerintah desa.!</p>
                            </div>
                            <div class="mb-5">
                                <ul class="list-unstyled">
                                    <li class="mb-2 d-flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="currentColor" class="bi bi-dot" viewBox="0 0 16 16">
                                            <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                                        </svg>
                                        <span class="ms-1">Biodata Penduduk</span>
                                    </li>
                                    <li class="mb-2 d-flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="currentColor" class="bi bi-dot" viewBox="0 0 16 16">
                                            <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                                        </svg>
                                        <span class="ms-1">Penduduk Pindah</span>
                                    </li>
                                    <li class="mb-2 d-flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="currentColor" class="bi bi-dot" viewBox="0 0 16 16">
                                            <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                                        </svg>
                                        <span class="ms-1">Kelahiran</span>
                                    </li>
                                    <li class="mb-2 d-flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="currentColor" class="bi bi-dot" viewBox="0 0 16 16">
                                            <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                                        </svg>
                                        <span class="ms-1">Kematian</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="d-md-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center mb-3 mb-md-0 small">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('landings/assets/images/avatar/avatar-7.jpg') }}"
                                            alt="Avatar" class="avatar avatar-lg rounded-circle" />
                                        <div class="ms-3">
                                            <h5 class="mb-0">Ardiansyah</h5>
                                            <small class="me-4">Kepala Desa</small>
                                            <small>cimara.desa.id</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12 order-lg-2" data-cue="slideInRight">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <form class="row needs-validation g-3" novalidate>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h3 class="mb-0">Formuli Kelahiran</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="ScheduleFirstnameInput" class="form-label">
                                            Nama Ayah
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="ScheduleFirstnameInput"
                                            required />
                                        <div class="invalid-feedback">Please enter firstname.</div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="scheduleLastnameInput" class="form-label">
                                            Nama Ibu
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="scheduleLastnameInput"
                                            required />
                                        <div class="invalid-feedback">Please enter lastname.</div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="scheduleEmailInput" class="form-label">
                                            NIK Ayah
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="email" class="form-control" id="scheduleEmailInput"
                                            required />
                                        <div class="invalid-feedback">Please enter email.</div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="scheduleTextarea" class="form-label">Keterangan Lahir</label>
                                        <textarea class="form-control" id="scheduleTextarea" placeholder="Write to us" rows="3" required></textarea>
                                        <div class="invalid-feedback">Please write message.</div>
                                    </div>
                                    <div class="d-grid">
                                        <button class="btn btn-primary" type="submit">Ajukan Permohonan!</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>