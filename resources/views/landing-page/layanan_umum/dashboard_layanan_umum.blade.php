@extends('landing-page.layout.main_administration')
@section('title')
    Layanan Umum
@endsection

@section('content-form-administrasi')
    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
        <div class="card border-0 mb-4 shadow-sm">
            <div class="card-body p-lg-5">
                <div class="mb-2 d-lg-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center ">
                        <img src="{{ asset('landings/assets/images/user_icon.png') }}" alt="avatar"
                            class="avatar avatar-lg rounded-circle">
                        <div class="ms-4">
                            <h5 class="mb-0">Username : {{ auth()->user()->username }}</h5>
                            <small>{{ $account->nama_lengkap }} </small><br>
                            <small>{{ $account->rt->dusun }}, RT: {{ $account->rt->nomor }}/ RW:
                                {{ $account->rt->rw }}</small><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
