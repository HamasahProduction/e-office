<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return view('admin.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name'          => 'required|max:255',
            'username'      => 'required|alpha_num:ascii|unique:users,username,'.$user->id.'|min:5|max:255',
            'password'      => 'nullable|confirmed|min:5|max:255',
            'old_password'  => 'required_with:password|max:255',
        ],[
            'name.required'         => 'Nama harus diisi!',
            'username.required'     => 'Username harus diisi!',
            'username.alpha_num'    => 'Username hanya boleh diisi karakter A-Z a-z 0-9!',
            'name.max'              => 'Maksimal 255 karakter!',
            'username.max'          => 'Maksimal 255 karakter!',
            'username.unique'       => 'Username telah digunakan oleh akun lain!',
            'password.max'          => 'Maksimal 255 karakter!',
            'username.min'          => 'Minimal 5 karakter!',
            'password.min'          => 'Minimal 5 karakter!',
            'password.confirmed'    => 'Password dan Passwork konfirmasi tidak sama!',
            'old_password.required_with' => 'Password lama harus diisi!',
            'old_password.max'      => 'Password lama maksimal 255 karakter!',
        ]);

        if ($request->password && Hash::check($request->old_password, $user->password)) {
            return back()->withError('Password lama tidak sesuai!');
        }

        $user->name         = $request->name;
        $user->username     = $request->username;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->route('app.admin.profile.index')->withSuccess('Profil berhasil diubah!');
    }
}
