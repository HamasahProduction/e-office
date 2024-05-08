<?php $page="error-404";?>
@extends('layout.errorlayout')
@section('content')
    <div class="error-box">
        <h1>404</h1>
        <h3><i class="fa fa-warning"></i> Oops! Halaman yang anda cari tidak ada!</h3>
        <br><br>
        <a href="{{ route('lp.root') }}" class="btn btn-custom">Kembali Ke Halaman Utama</a>
    </div>
@endsection
