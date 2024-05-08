{{-- <!doctype html> --}}
<html lang="en">
   @include('landing-page.layout.partials.head')

   <body>
      <!-- Navbar -->
      @include('landing-page.layout.partials.header')

      <main>
        @yield('content')
      </main>
      <!-- Footer -->
     @include('landing-page.layout.partials.footer')
      <!-- Scroll top -->
      <div class="btn-scroll-top">
         <svg class="progress-square svg-content" width="100%" height="100%" viewBox="0 0 40 40">
            <path d="M8 1H32C35.866 1 39 4.13401 39 8V32C39 35.866 35.866 39 32 39H8C4.13401 39 1 35.866 1 32V8C1 4.13401 4.13401 1 8 1Z" />
         </svg>
      </div>
      <!-- Libs JS -->
      @include('landing-page.layout.partials.footer-script')
      @stack('scripts')
   </body>
</html>
