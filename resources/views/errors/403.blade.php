@extends('layout.errorlayout')
@section('content')
    <div class="error-box">
        <h1>Oops</h1>
        <h3>
            <i class="fa fa-warning"></i>
            Anda tidak memiliki akses ke halaman ini
        </h3>
        <br>
        <a href="{{ route('app.dashboard.redirect') }}" class="btn btn-custom">Kembali ke beranda</a>
    </div>

@endsection
