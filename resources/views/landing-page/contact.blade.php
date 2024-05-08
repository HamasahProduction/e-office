@extends('landing-page.layout.main')
@section('title')
    Contact
@endsection

@section('content')
<div class="pattern-square"></div>
<!--Pageheader start-->
<section class="bg-info bg-opacity-10 pt-xl-9 pb-xl-0 py-5">
   <div class="container">
      <div class="row g-xl-7 gy-5">
         <div class="col-lg-6 col-12">
            <div class="me-xl-7">
               <div class="mb-5">
                  <h1 class="mb-3">Hubungi Kami</h1>
                  <p>apabila terdapat informasi yang inin di ketahui, silahkan hubungi kami dibawah ini :</p>
               </div>
               <div class="mb-5">
                  <ul class="list-unstyled">
                     <li class="mb-2 d-flex">
                        <span>
                           <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-dot" viewBox="0 0 16 16">
                              <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                           </svg>
                        </span>
                        <span class="ms-2">Whatsapp : 081234500151.</span>
                     </li>
                     <li class="mb-2 d-flex">
                        <span>
                           <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-dot" viewBox="0 0 16 16">
                              <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                           </svg>
                        </span>
                        <span class="ms-2">Email : rubathhuraidoh@gmail.com.</span>
                     </li>
                     <li class="mb-2 d-flex">
                        <span>
                           <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-dot" viewBox="0 0 16 16">
                              <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                           </svg>
                        </span>
                        <span class="ms-2">Alamat : Desa Hegarmukti Kecamatan Cikarang Pusat.</span>
                     </li>
                    
                  </ul>

                  <p class="mb-0 mt-5">
                     Apabila ingin memberi masukan, silahkan isi pada form masukan!
                     <br />
                  </p>
               </div>
            </div>
         </div>
         <div class="col-lg-6 col-12 mb-lg-n9">
            <div class="card shadow-sm">
               <div class="card-body">
                  <form class="row g-3 needs-validation" novalidate>
                     <div class="col-md-6">
                        <label for="contactFirstNameInput" class="form-label">
                           Nama Lengkap
                           <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="contactFirstNameInput" required />
                        <div class="invalid-feedback">Please enter firstname.</div>
                     </div>
                     <div class="col-md-6">
                        <label for="contactLastNameInput" class="form-label">
                           Kontak
                           <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="contactLastNameInput" required />
                        <div class="invalid-feedback">Please enter lastname.</div>
                     </div>
                     
                     <div class="col-md-12">
                        <label for="contactTextarea" class="form-label">Silahkan Masukan atau Pertanyaan... </label>
                        <textarea class="form-control" id="contactTextarea" rows="4" placeholder="Write to us" required></textarea>
                        <div class="invalid-feedback">Please enter a message.</div>
                     </div>
                     <div class="d-grid">
                        <button class="btn btn-primary" type="submit">Send</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!--Pageheader end-->
@endsection
