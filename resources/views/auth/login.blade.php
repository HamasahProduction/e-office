<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-layout-mode="teal" data-sidebar="dark" data-sidebar-size="sm" data-sidebar-image="none" data-layout-width="fluid" data-layout-position="fixed" data-layout-style="default">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="robots" content="noindex, nofollow">
		<title>@yield('title', env('APP_NAME'))</title>
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{URL::asset('logo/logo_kuningan.png')}}">
        @include('layout.partials.head')
        @stack('styles')
  </head>
<body>
<body class="account-page">
    <div class="main-wrapper">
        <div class="account-content">
            <div class="container">

                <!-- Account Logo -->
                <div class="account-logo">
                    <img style="width: 250px !important;" src="{{ URL::asset('logo/logo_pemerintahan_cimara.png') }}">
                </div>
                <!-- /Account Logo -->

                <div class="account-box">
                    <div class="account-wrapper">
                        <h3 class="account-title">
                            {{ config('app.name') }}<br>
                        </h3>
                        <br>
                        {{-- <p class="account-subtitle">Silahkan Masuk untuk melanjutkan</p> --}}

                        <!-- Account Form -->
                        <x-alert/>
                        <form method="POST" action="{{ route('app.login.process') }}">
                            @csrf
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" autofocus="true" placeholder="Username" id="email" class="form-control @error('username') is-invalid @enderror" name="username" value="" required>
                                <div class="invalid-feedback">@error('username') {{ $message }} @enderror</div>
                            </div>
                            <div class="form-group Password-icon mt-2">
                                <div class="row">
                                    <div class="col">
                                        <label>Password</label>
                                    </div>
                                </div>
                                <div class="position-relative">
                                    <input type="password" placeholder="Password" id="password" required class="form-control pass-input @error('password') is-invalid @enderror" name="password" value="">
                                    {{-- <span class="fa fa-eye-slash toggle-password"></span> --}}
                                    <div class="invalid-feedback">@error('password') {{ $message }} @enderror</div>
                                </div>
                            </div>

                            <div class="form-group text-center mt-3">
                                <button class="btn btn-primary account-btn" type="submit">Login</button>
                            </div>

                            <br>
                        </form>
                        <!-- /Account Form -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layout.partials.footer-scripts')
    @stack('scripts')
 </body>
</html>
