<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Enums\UserRole;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request) {
        $isActive = $request->view !== 'inactive';

        $activeCount = User::active()->count();
        $inactiveCount = User::inactive()->count();

        $users = $isActive ? User::active()->get() : User::inactive()->get();

        return view('admin.users.index', compact(
            'users',
            'activeCount',
            'inactiveCount',
        ));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|max:255',
            'username'  => 'required|alpha_num:ascii|unique:users,username|min:5|max:255',
            'password'  => 'required|confirmed|min:5|max:255',
        ],[
            'name.required'         => 'Nama harus diisi!',
            'username.required'     => 'Username harus diisi!',
            'username.alpha_num'    => 'Username hanya boleh diisi karakter A-Z a-z 0-9!',
            'password.required'     => 'Password harus diisi!',
            'name.max'              => 'Maksimal 255 karakter!',
            'username.max'          => 'Maksimal 255 karakter!',
            'username.unique'       => 'Username telah digunakan oleh akun lain!',
            'password.max'          => 'Maksimal 255 karakter!',
            'username.min'          => 'Minimal 5 karakter!',
            'password.min'          => 'Minimal 5 karakter!',
            'password.confirmed'    => 'Password dan Passwork konfirmasi tidak sama!',
        ]);

        User::create([
            'role'      => UserRole::Admin,
            'name'      => $request->name,
            'username'  => $request->username,
            'password'  => bcrypt($request->password),
            'is_active' => true,
        ]);

        return redirect()->route('app.admin.users.index')->withSuccess('Pengguna berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $user = User::find($id);
        abort_if(!$user, 400, 'Pengguna tidak ditemukan');

        return view('admin.users.edit', compact('user'));
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);
        abort_if(!$user, 400, 'Pengguna tidak ditemukan');

        $request->validate([
            'name'          => 'required|max:255',
            'username'      => 'required|alpha_num:ascii|unique:users,username,'.$user->id.'|min:5|max:255',
            'password'      => 'nullable|confirmed|min:5|max:255',
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
            'password.confirmed'    => 'Password dan Password konfirmasi tidak sama!',
        ]);

        $user->name     = $request->name;
        $user->username = $request->username;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->route('app.admin.users.index')->withSuccess('Pengguna berhasil diubah!');
    }

    public function activate($id)
    {
        $user = User::find($id);
        abort_if(!$user, 400, 'Pengguna tidak ditemukan');

        $user->is_active = true;
        $user->save();

        return redirect()->route('app.admin.users.index')->withSuccess('Pengguna berhasil diaktifkan!');
    }

    public function inactivate($id)
    {
        $user = User::find($id);
        abort_if(!$user, 400, 'Pengguna tidak ditemukan');

        $user->is_active = false;
        $user->save();

        return redirect()->route('app.admin.users.index')->withSuccess('Pengguna berhasil dinon-aktifkan!');
    }

    public function remove($id)
    {
        $user = User::find($id);
        abort_if(!$user, 400, 'Pengguna tidak ditemukan');

        $user->delete();

        return redirect()->route('app.admin.users.index')->withSuccess('Pengguna berhasil dihapus!');
    }

    function restore($id) {
        $user = User::onlyTrashed()->find($id);
        abort_if(!$user, 400, 'Pengguna tidak ditemukan');
        $user->restore();

        return redirect()->route('app.admin.users.index')->withSuccess('Pengguna berhasil dikembalikan!');
    }

}
