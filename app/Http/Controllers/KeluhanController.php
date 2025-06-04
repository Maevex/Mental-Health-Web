<!-- 

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Http;

// class KeluhanController extends Controller
// {
//     public function showForm(Request $request) {
//     $kategori = $request->query('kategori') ?? session('kategori');
//     session(['kategori' => $kategori]);
//     return view('user.keluhan_form', compact('kategori'));
// }

//     public function showKategori() {
//     return view('user.keluhan_kategori');
// }

//     public function submit(Request $request)
// {
//     $kategori = $request->kategori;
//     $keluhan = $request->keluhan;
//     $token = session('jwt_token');

//     \Log::info('Mengirim keluhan', [
//         'kategori' => $kategori,
//         'keluhan' => $keluhan,
//         'token' => $token ? 'ADA' : 'KOSONG'
//     ]);

//     try {
//         $response = Http::withToken($token)
//             ->withHeaders([
//                 'Content-Type' => 'application/json'
//             ])
//             ->post('http://localhost:8080/analisa-keluhan', [
//                 'kategori' => $kategori,
//                 'keluhan' => $keluhan,
//             ]);

//         \Log::info('Status Response', ['status' => $response->status()]);
//         \Log::info('Isi Response', ['body' => $response->body()]);

//         if ($response->successful()) {
//          $data = $response->json();

//     session([
//         'kesimpulan' => $data['kesimpulan'] ?? '',
//         'saran' => $data['saran'] ?? '',
//         'rekomendasi' => $data['rekomendasi'] ?? '',
//         'konsultan' => $data['konsultan'] ?? [],
//         'kategori' => $kategori,
//         'keluhan' => $keluhan,
//     ]);

//     return redirect()->route('keluhan.hasil');
// } else {
//             \Log::error('Gagal menghubungi backend', ['response' => $response->body()]);
//             return back()->with('error', 'Gagal menghubungi server.')->withInput();
//         }
//     } catch (\Exception $e) {
//         \Log::error('Exception saat kirim keluhan', ['message' => $e->getMessage()]);
//         return back()->with('error', 'Terjadi kesalahan internal.')->withInput();
//     }
// }

//     public function showHasil() {
//     return view('user.keluhan_hasil', [
//         'kesimpulan' => session('kesimpulan'),
//         'saran' => session('saran'),
//         'rekomendasi' => session('rekomendasi'),
//         'konsultan' => session('konsultan'),
//         'kategori' => session('kategori'),
//         'keluhan' => session('keluhan'),
//     ]);
// }

// } -->
