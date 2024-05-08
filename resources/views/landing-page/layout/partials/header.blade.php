<header>
    <nav class="navbar navbar-expand-lg mb-5">
       <div class="container px-3">
          <a class="navbar-brand" href="#"><img src="{{ asset('landings/assets/images/logo/logo_pemerintahan_cimara.png')}}" width="200" alt /></a>
          <button class="navbar-toggler offcanvas-nav-btn" type="button">
             <i class="bi bi-list"></i>
          </button>
          <div class="offcanvas offcanvas-start offcanvas-nav" style="width: 20rem">
             <div class="offcanvas-header">
                <a href="#" class="text-inverse"><img src="{{ asset('landings/assets/images/logo/logo_square.png')}}" width="200" alt /></a>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
             </div>
             @include('landing-page.layout.partials.nav')
          </div>
       </div>
    </nav>
 </header>