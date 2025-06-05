<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
   public function showDashboard() {
  return view('user.dash');
}

public function showSubkategori(Request $request) {
  $kategori = $request->kategori;

  $subkategoriList = [
    'Masalah di Kampus' => ['Tugas menumpuk',
    'Kesulitan memahami materi kuliah',
    'Stres menghadapi ujian',
    'Masalah dengan teman sekelas',
    'Konflik dengan dosen',
    'Kesulitan mengatur waktu',
    'Kurangnya motivasi belajar',
    'Nilai yang tidak memuaskan',
    'Terlambat masuk kuliah',
    'Ketinggalan materi',
    'Kesulitan mengakses bahan ajar',
    'Dosen tidak responsif',
    'Terlalu banyak presentasi',
    'Kurangnya dukungan dari teman',
    'Lelah mengikuti organisasi',
    'Masalah skripsi atau tugas akhir',
    'Khawatir masa depan',
    'Stres karena ekspektasi orang tua',
    'Perbedaan pendapat saat kerja kelompok',
    'Lingkungan kampus yang tidak nyaman',],
    'Masalah di Rumah' => ['Pertengkaran dengan orang tua',
    'Tanggung jawab rumah tangga yang berat',
    'Kurangnya privasi',
    'Masalah dengan saudara',
    'Lingkungan rumah tidak nyaman',
    'Tidak bisa fokus belajar di rumah',
    'Tekanan untuk membantu ekonomi keluarga',
    'Masalah komunikasi antar anggota keluarga',
    'Rasa tidak dihargai di rumah',
    'Perbedaan pandangan dengan orang tua',
    'Kondisi rumah yang sempit',
    'Kurangnya kasih sayang',
    'Kekerasan verbal di rumah',
    'Masalah tempat tinggal sementara',
    'Tidak diperbolehkan keluar rumah',
    'Kurangnya fasilitas untuk belajar',
    'Orang tua terlalu protektif',
    'Kehilangan salah satu anggota keluarga',
    'Kondisi rumah yang berantakan',
    'Tuntutan peran dewasa sejak kecil',],
    'Masalah dengan Teman' => 
    ['Dikhianati teman',
    'Merasa tidak dianggap',
    'Kesulitan berkomunikasi',
    'Cemburu atau iri',
    'Terlalu bergantung pada teman',
    'Teman menjauh tanpa alasan',
    'Rasa tidak cocok dalam pertemanan',
    'Persaingan tidak sehat',
    'Salah paham berkepanjangan',
    'Sulit menemukan teman sejati',
    'Tidak dihargai pendapatnya',
    'Merasa selalu mengalah',
    'Dipaksa ikut arus',
    'Teman toxic',
    'Merasa dimanfaatkan',
    'Kurang waktu bersama',
    'Perbedaan nilai dan prinsip',
    'Teman tidak setia',
    'Perasaan diabaikan saat butuh',
    'Takut kehilangan teman baik',
  ],
    'Masalah Keuangan' => ['Uang bulanan tidak cukup',
    'Kesulitan membayar kuliah/kos',
    'Kehilangan sumber pemasukan',
    'Tidak bisa menabung',
    'Beban hutang pribadi',
    'Pemasukan tidak tetap',
    'Harga kebutuhan pokok naik',
    'Pengeluaran tidak terkontrol',
    'Gagal mengatur anggaran',
    'Gagal dalam usaha atau bisnis',
    'Tidak punya dana darurat',
    'Tergoda belanja online',
    'Tagihan menumpuk',
    'Tidak punya asuransi',
    'Ditipu dalam transaksi',
    'Tidak bisa membantu keluarga',
    'Penghasilan lebih kecil dari pengeluaran',
    'Terpaksa meminjam uang',
    'Kehilangan pekerjaan atau side job',
    'Tergoda investasi bodong',
  ],
    'Kesehatan Mental' => ['Depresi',
    'Kecemasan berlebih',
    'Sulit tidur (insomnia)',
    'Panik saat sendirian',
    'Overthinking berlebihan',
    'Mood swing ekstrem',
    'Sulit percaya diri',
    'Rasa tidak berguna',
    'Kesepian yang berkepanjangan',
    'Merasa selalu gagal',
    'Kecanduan gadget atau media sosial',
    'Gangguan makan',
    'Terlalu perfeksionis',
    'Trauma masa lalu',
    'Fobia sosial',
    'Sulit fokus dalam aktivitas',
    'Emosi tidak stabil',
    'Rasa ingin menyakiti diri sendiri',
    'Tidak punya tujuan hidup',
    'Selalu merasa cemas terhadap masa depan',
  ],

    // sama seperti di React Native
  ];

  $subkategori = $subkategoriList[$kategori] ?? [];

  return view('user.subkategori', compact('kategori', 'subkategori'));
}

public function showKeluhan(Request $request) {
  return view('user.keluhan', [
    'kategori' => $request->kategori,
    'sub_kategori' => $request->sub_kategori
  ]);
}

public function submitKeluhan(Request $request) {
  $token = session('token'); // atau dari auth jika pakai guard
  $response = Http::withToken($token)->post(env('GOLANG_API_URL').'/analisa-keluhan', [
    'keluhan' => $request->keluhan,
    'kategori' => $request->kategori,
    'sub_kategori' => $request->sub_kategori
  ]);

  if ($response->successful()) {
    $data = $response->json();
    return view('user.hasil', [
      'kategori' => $request->kategori,
      'sub_kategori' => $request->sub_kategori,
      'keluhan' => $request->keluhan,
      'kesimpulan' => $data['kesimpulan'],
      'saran' => $data['saran'],
      'rekomendasi' => $data['rekomendasi'] ?? '',
      'konsultan' => $data['konsultan'] ?? [] 

    ]);
  } else {
    return back()->with('error', 'Gagal memproses keluhan');
  }
}


public function chat(Request $request)
{
    $token = Session::get('token');
    $sesiRes = Http::withToken($token)->get(env('GOLANG_API_URL') . '/sesi');
    $sesiList = $sesiRes->json();

    $messages = [];
    $activeSesiId = $request->input('sesi_id');  // ✨ ambil dari query URL

    // if (!$activeSesiId && count($sesiList) > 0) {
    //     $lastSesi = end($sesiList);
    //     $activeSesiId = $lastSesi['sesi_id'];
    // }
    $activeSesiId = $request->input('sesi_id');
if ($activeSesiId === 'baru') {
    $activeSesiId = null; // biar kirim chat tanpa sesi_id → backend akan bikin sesi baru
}
    

    if ($activeSesiId) {
        $detailRes = Http::withToken($token)->get(env('GOLANG_API_URL') . '/sesi/' . $activeSesiId);
        $dataDetail = $detailRes->json();

        foreach ($dataDetail ?? [] as $item) {
    if (!empty($item['message'])) {
        $messages[] = ['sender' => 'user', 'content' => $item['message']];
    }
    if (!empty($item['chatbot_response'])) {
        $messages[] = ['sender' => 'bot', 'content' => $item['chatbot_response']];
    }
}

    }

    return view('user.chat', [
        'sesiList' => $sesiList,
        'messages' => $messages,
        'activeSesiId' => $activeSesiId,
    ]);
}

public function sendChat(Request $request)
{
    $token = Session::get('token');
     logger('Kirim pesan:', [
        'message' => $request->message,
        'sesi_id' => $request->sesi_id
    ]);

    $response = Http::withToken($token)->post(env('GOLANG_API_URL') . '/chat', [
    'message' => $request->message,
    'sesi_id' => $request->sesi_id !== null && $request->sesi_id !== '' ? (int) $request->sesi_id : null,

])->json();
      

    return redirect('/user/chat?sesi_id=' . ($response['sesi_id'] ?? $request->sesi_id));
}

}
