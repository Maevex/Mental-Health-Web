<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function register(Request $request)
{
    $response = Http::post('http://localhost:8080/register', [
        'nama' => $request->input('nama'),
        'email' => $request->input('email'),
        'password' => $request->input('password'),
    ]);

    if ($response->successful()) {
        return redirect()->route('showLoginForm')->with('success', 'register success');
    }

    return Redirect::back()->withErrors(['msg' => 'failed to register!']);
}

    public function showLoginForm()
    {
        return view('login'); 
    }
    



public function login(Request $request)
{
    $response = Http::post('http://localhost:8080/login', [
        'email' => $request->input('email'),
        'password' => $request->input('password'),
    ]);

    if ($response->successful()) {
        $data = $response->json();
        $token = $data['token'];

     
        try {
            $payload = JWT::decode($token, new Key('secret_key', 'HS256')); 

            
            $userId = $payload->user_id;
            $email = $payload->email;
            $role = $payload->role ?? 'user';
            $exp = $payload->exp;

            
            session(['jwt_token' => $token, 'user_role' => $role, 'user_id' => $userId]);
            session()->save(); 
            Log::info('Token JWT disimpan di session:', ['token' => $token]);


            if ($role === 'admin') {
             return redirect('/keluhan');
                } else {
            return redirect('/keluhan')->with('success', 'Login berhasil!');

                }

            } catch (\Exception $e) {
            session()->flash('error', 'Token tidak valid atau telah kedaluwarsa.');
            return redirect('/login');
        }
    }

    return Redirect::back()->withErrors(['message' => 'failed to login!']);
}





    public function showRegisterForm()
    {
        // Mengembalikan tampilan form register
        return view('register');
    }
}
