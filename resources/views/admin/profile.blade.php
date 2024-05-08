@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Profil
        @endslot
        @slot('li_1')
            Profil
        @endslot
        @slot('li_2')
            Form Ubah
        @endslot
    @endcomponent

    <x-alert />

    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <div class="card">
                <form action="{{ route('app.admin.profile.update') }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Nama <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" name="name" maxlength="255" minlength="5" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}">
                                <div class="invalid-feedback">@error('name') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Username <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username', $user->username) }}">
                                <div class="invalid-feedback">@error('username') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Role</label>
                            <div class="col-lg-9">
                                <input type="text" readonly class="form-control" value="{{ $user->role == App\Enums\UserRole::Admin ? 'Admin' : 'Pengguna' }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <small class="text-muted">Biarkan kosong jika tidak ingin mengubah password</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Password Lama</label>
                            <div class="col-lg-9">
                                <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror">
                                <div class="invalid-feedback">@error('old_password') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Password Baru</label>
                            <div class="col-lg-9">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                <div class="invalid-feedback">@error('password') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label class="col-lg-3 col-form-label">Konfirmasi Password</label>
                            <div class="col-lg-9">
                                <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                                <div class="invalid-feedback">@error('password_confirmation') {{ $message }} @enderror</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <span class="text-muted float-start">
                            <strong class="text-danger">*</strong> Harus diisi
                        </span>
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
