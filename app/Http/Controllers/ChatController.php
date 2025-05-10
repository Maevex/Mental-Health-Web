<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cookie;

class ChatController extends Controller
{
    public function index()
    {
        
        $token = session('jwt_token');
        Log::info('JWT Token dari cookie:', ['token' => $token]);

        
        if (!$token) {
            Log::warning('Token JWT tidak ditemukan . Redirect ke login.');
            return redirect()->route('showLoginForm')->withErrors(['msg' => 'Silakan login dulu']);
        }

        // bearer token header
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token
        ])->get('http://localhost:8080/sesi'); 

        Log::info('Response dari GET /sesi:', ['status' => $response->status(), 'body' => $response->body()]);

       
        if ($response->failed()) {
            Log::error('Gagal fetch sesi', ['response' => $response->body()]);
            return back()->withErrors(['msg' => 'Gagal mengambil sesi']);
        }

        
        $sessions = is_array($response->json()) ? $response->json() : [];

        return view('user.chat', compact('sessions'));
    }
}
