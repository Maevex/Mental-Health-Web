<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Landing | Mental Health AI</title>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Nunito', sans-serif;
    }

    body {
      background: white;
      color: #333;
      text-align: center;
      line-height: 1.6;
    }

    .custom-navbar {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 999;
      background: #4A90E2;
      padding: 12px 24px;
      color: white;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      border-radius: 0 0 20px 20px;
    }

    .custom-navbar .nav-left {
     display: flex;
    align-items: center;
    }
    .custom-navbar .nav-left a {
  font-family: 'Nunito', sans-serif;
  font-size: 1rem;
  color: white;
  text-decoration: none;
  margin-right: 18px;
  font-weight: 500;
  transition: all 0.2s ease-in-out;
}
.custom-navbar .nav-left a:hover {
  text-decoration: underline;
}
  .custom-navbar a.brand {
    font-weight: 700;
    font-size: 1.2rem;
    margin-right: 24px;
  }

    .custom-navbar .nav-right a {
      background: white;
      color: #1565C0;
      text-decoration: none;
      padding: 8px 18px;
      border-radius: 12px;
      font-weight: 600;
      margin-left: 12px;
      transition: background 0.2s ease-in-out;
    }

    .custom-navbar .nav-right a:hover {
      background: #e3f2fd;
    }

    header {
      background: linear-gradient(to bottom, #89f7fe, #66a6ff);
      padding: 160px 20px 100px;
      color: white;
    }

    header h1 {
      font-size: 3rem;
      margin-bottom: 0.5rem;
    }

    header p {
      font-size: 1.2rem;
      margin-bottom: 1.5rem;
    }

    .btn {
      background: #4d9eff;
      color: white;
      padding: 0.8rem 1.6rem;
      border: none;
      border-radius: 10px;
      font-weight: bold;
      font-size: 1rem;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .btn:hover {
      background: #3c8ce7;
    }

    section {
      padding: 60px 20px;
      max-width: 1000px;
      margin: auto;
      text-align: left;
    }

    h2 {
      color: #4d9eff;
      margin-bottom: 1.2rem;
      font-size: 2rem;
      text-align: center;
    }

    p {
      margin-bottom: 1.5rem;
      font-size: 1rem;
    }

    .features, .steps {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 1.5rem;
      margin-top: 2rem;
    }

    .feature-box, .step-box {
      background: #f7f9fc;
      padding: 1.5rem;
      border-radius: 12px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
      text-align: center;
      font-weight: 600;
      color: #333;
    }

    footer {
      background: #f0f4f8;
      text-align: center;
      padding: 1.2rem;
      font-size: 0.9rem;
      color: #555;
      margin-top: 4rem;
    }

    .brand-color {
      color: #4d9eff;
    }

    @media (max-width: 768px) {
      .custom-navbar {
        flex-direction: column;
        align-items: flex-start;
      }

      .custom-navbar .nav-right {
        margin-top: 10px;
        width: 100%;
        display: flex;
        flex-direction: column;
        gap: 8px;
      }

      .custom-navbar .nav-right a {
        width: 100%;
        text-align: center;
      }

      header h1 {
        font-size: 2.2rem;
      }

      header p {
        font-size: 1rem;
      }
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="custom-navbar">
    <div class="nav-left">
       <a href="{{ url('/') }}" class="brand">Serenity</a>
    <a href="{{ route('user.dash') }}">Keluhan</a>
    <a href="{{ url('/user/chat') }}">Chat</a>
    <!-- <a href="{{ url('/user/profile') }}">Profile</a> -->
    </div>
    <div class="nav-right">
  @if (session('token'))
    <form action="{{ url('/logout') }}" method="POST" style="display: inline;">
      @csrf
      <button type="submit" style="background: white; color: #1565C0; padding: 8px 18px; border-radius: 12px; font-weight: 600; border: none; cursor: pointer;">Logout</button>
    </form>
  @else
    <a href="{{ url('/register') }}">Register</a>
    <a href="{{ url('/login') }}">Login</a>
  @endif
</div>

  </nav>

  <!-- Header -->
  <header>
    <h1>Find Peace with <span class="brand-color">Serenity</span></h1>
    <p>Let your mind speak. Let the healing begin.</p>
    <a href="{{ url('/register') }}" class="btn">Let's get started</a>
  </header>

  <section>
    <h2>Mengapa Kami Membangun Ini</h2>
    <p>Di dunia yang serba cepat ini, kesehatan mental seringkali diabaikan. Banyak orang memendam beban—kecemasan, kesepian, stres, atau kelelahan emosional—namun tidak tahu ke mana harus mengadu. Meskipun terapi tradisional sangat membantu, tidak semua orang bisa mengaksesnya. Beberapa merasa terlalu mahal, tinggal di daerah tanpa dukungan profesional, atau merasa takut dan malu untuk berbicara.</p>
    <p>Kami menciptakan Serenity untuk menghilangkan hambatan tersebut. Misi kami adalah menyediakan ruang yang aman, pribadi, dan cerdas di mana siapa pun bisa mengekspresikan perasaannya dengan bebas—kapan pun dan di mana pun. Didukung AI dan dukungan profesional jika dibutuhkan, Serenity membantu pengguna merefleksikan, memahami perasaannya, dan memulai proses penyembuhan tanpa tekanan atau penilaian.</p>
    <p style="text-align: center;"><strong>Karena kesehatan mental adalah hak, bukan kemewahan.</strong></p>

  </section>

  <section>
    <h2>Mengapa Aplikasi Ini?</h2>
    <p>Serenity adalah aplikasi kesehatan mental berbasis AI yang memungkinkan pengguna untuk mencurahkan isi hati, membicarakan masalah, dan menerima umpan balik cerdas atau dukungan profesional jika diperlukan. Dengan sesi pribadi, analisis emosi, dan fitur multi-chat, Serenity menyediakan ruang yang aman untuk refleksi dan penyembuhan.</p>
  </section>

  <section>
  <h2>Fitur Utama Kami</h2>
    <div class="features">
      <div class="feature-box"><i class="fas fa-check-circle brand-color"></i> Konsultasi untuk masalah dan keluhan</div>
      <div class="feature-box"><i class="fas fa-check-circle brand-color"></i> Analisis emosi dari masukan pengguna</div>
      <div class="feature-box"><i class="fas fa-check-circle brand-color"></i> Chatbot berbasis AI</div>
      <div class="feature-box"><i class="fas fa-check-circle brand-color"></i> Akses ke konsultan profesional</div>
      <div class="feature-box"><i class="fas fa-check-circle brand-color"></i> Dukungan multi-sesi chat</div>
      <div class="feature-box"><i class="fas fa-check-circle brand-color"></i> Riwayat percakapan tersimpan</div>
    </div>
</section>

<section>
   <h2>Cara Menggunakan</h2>
    <div class="steps">
      <div class="step-box"><i class="fas fa-circle-notch brand-color"></i> 1. Daftar atau Masuk</div>
      <div class="step-box"><i class="fas fa-circle-notch brand-color"></i> 2. Pilih kategori keluhan</div>
      <div class="step-box"><i class="fas fa-circle-notch brand-color"></i> 3. Pilih sub-kategori masalah</div>
      <div class="step-box"><i class="fas fa-circle-notch brand-color"></i> 4. Ceritakan keluhanmu secara spesifik</div>
      <div class="step-box"><i class="fas fa-circle-notch brand-color"></i> 5. Tunggu hasil analisis emosional</div>
      <div class="step-box"><i class="fas fa-circle-notch brand-color"></i> 6. Chat dengan AI berdasarkan hasilnya</div>
    </div>
</section>


  <footer>
    &copy; Serenity 2023. All rights reserved.
  </footer>

</body>
</html>
