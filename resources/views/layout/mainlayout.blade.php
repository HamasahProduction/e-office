<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-layout-mode="blue" data-layout-width="fluid" data-layout-position="fixed" data-layout-style="default">

    
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <title>@yield('title', env('APP_NAME'))</title>
    @include('layout.partials.head')
    @stack('styles')
</head>

<body>

    <div class="main-wrapper">

        @include('layout.partials.header')
        @include('layout.partials.nav')

        <div class="page-wrapper">

            <div class="content container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
    @include('layout.partials.footer-scripts')
    @stack('scripts')
</body>

</html>
