<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KeluhanController extends Controller
{
    public function showForm()
    {
        return view('user.keluhan_form');
    }

    public function submit(Request $request)
{
    $kategori = $request->kategori;
    $keluhan = $request->keluhan;
    $token = session('jwt_token');

    \Log::info('Mengirim keluhan', [
        'kategori' => $kategori,
        'keluhan' => $keluhan,
        'token' => $token ? 'ADA' : 'KOSONG'
    ]);

    try {
        $response = Http::withToken($token)
            ->withHeaders([
                'Content-Type' => 'application/json'
            ])
            ->post('http://localhost:8080/analisa-keluhan', [
                'kategori' => $kategori,
                'keluhan' => $keluhan,
            ]);

        \Log::info('Status Response', ['status' => $response->status()]);
        \Log::info('Isi Response', ['body' => $response->body()]);

        if ($response->successful()) {
            $data = $response->json();

            return view('user.keluhan_form', [
                'kesimpulan' => $data['kesimpulan'] ?? '',
                'saran' => $data['saran'] ?? '',
                'rekomendasi' => $data['rekomendasi'] ?? '',
                'konsultan' => $data['konsultan'] ?? [],
                'kategori' => $kategori,
                'keluhan' => $keluhan,
            ]);
        } else {
            \Log::error('Gagal menghubungi backend', ['response' => $response->body()]);
            return back()->with('error', 'Gagal menghubungi server.')->withInput();
        }
    } catch (\Exception $e) {
        \Log::error('Exception saat kirim keluhan', ['message' => $e->getMessage()]);
        return back()->with('error', 'Terjadi kesalahan internal.')->withInput();
    }
}

}
