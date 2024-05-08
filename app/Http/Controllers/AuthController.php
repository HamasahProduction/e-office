<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginClient()
    {
        return view('auth.login_client');
    }

    public function index()
    {
        return view('auth.login');
    }


    public function loginProsesClient(Request $request)
    {
        try {
            $request->validate([
                'username' => 'required|max:255',
                'password' => 'required|max:255',
            ], [
                'username.required' => 'Username harus diisi!',
                'password.required' => 'Password harus diisi!',
            ]);
        
            if (
                Auth::attempt([
                    'username'  => $request->username,
                    'password'  => $request->password,
                    'is_active' => true,
                ])
            ) {
                return redirect()->route('lp.dashboard.redirect');
            } else {
                $error = "Username atau password salah.";
                return redirect()->route('login-client')->with('error', $error);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->validator->getMessageBag()->toArray();
    
            // Menggabungkan semua pesan kesalahan menjadi satu pesan
            $error = implode('<br>', $errors);

            return redirect()->route('login-client')->with('error', $error);
        }
    }
    
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|max:255',
            'password' => 'required|max:255',
        ], [
            'username.required' => 'Username harus diisi!',
            'password.required' => 'Password harus diisi!',
        ]);

        if (
            Auth::attempt([
                'username' => $request->username,
                'password' => $request->password,
                'is_active' => true,
            ])
        ) {
            return redirect()->route('app.dashboard.redirect');
        }

        return redirect()->route('app.login')->withError('Username dan password tidak sesuai!');
    }

    public function logoutClient()
    {
        Session::flush();
        Auth::logout();

        return redirect()->route('lp.root');
    }
    
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect()->route('app.login');
    }
}
