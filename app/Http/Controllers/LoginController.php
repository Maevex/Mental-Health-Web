<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        try {
            $response = Http::post(env('GOLANG_API_URL') . '/login', [
                'email' => $request->email,
                'password' => $request->password
            ]);

            if ($response->ok()) {
                $token = $response['token'];
                session(['token' => $token]);

                $decoded = json_decode(base64_decode(explode('.', $token)[1]), true);
                $role = $decoded['role'] ?? 'user';

                return redirect($role === 'admin' ? '/admin/dash' : '/user/dash');
            } else {
                return back()->withErrors(['email' => 'Login gagal, periksa kembali email/password.']);
            }
        } catch (\Exception $e) {
            return back()->withErrors(['email' => 'Terjadi kesalahan saat login.']);
        }
    }

    

    public function showRegisterForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        try {
            $response = Http::post(env('GOLANG_API_URL') . '/register', [
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            if ($response->ok()) {
                return redirect('/login')->with('success', 'Registrasi berhasil. Silakan login.');
            } else {
                $error = $response->json()['message'] ?? 'Registrasi gagal.';
                return back()->withErrors(['email' => $error])->withInput();
            }
        } catch (\Exception $e) {
            return back()->withErrors(['email' => 'Terjadi kesalahan saat registrasi.'])->withInput();
        }
    }


    
}
