<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Landing | Mental Health AI</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet" />
 <style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
  }

  body {
    background: white;
    color: #333;
    text-align: center; /* biar default-nya rata tengah */
  }

  header {
    background: linear-gradient(to right, #89f7fe, #66a6ff);
    padding: 3rem 2rem;
    color: white;
  }

  header h1 {
    font-size: 2.5rem;
    margin-bottom: 0.5rem;
  }
  
  header p {
    font-size: 1.1rem;
    margin-bottom: 1.5rem;
    
  }

  .btn {
    background: #4d9eff;
    color: white;
    padding: 0.8rem 1.5rem;
    border: none;
    border-radius: 8px;
    font-weight: bold;
    cursor: pointer;
    transition: background 0.3s ease;
  }

  .btn:hover {
    background: #3c8ce7;
  }

  section {
    padding: 3rem 2rem;
    max-width: 1000px;
    margin: auto;
  }

  h2 {
    color: #4d9eff;
    margin-bottom: 1rem;
    font-size: 1.8rem;
  }

  p {
    margin-bottom: 2rem;
    font-size: 1rem;
  }

  .features,
  .steps {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 1.5rem;
  }

  .feature-box,
  .step-box {
    background: #f7f9fc;
    padding: 1.5rem;
    border-radius: 12px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
    width: 220px;
  }

  footer {
    background: #f0f4f8;
    text-align: center;
    padding: 1rem;
    font-size: 0.9rem;
    color: #555;
    margin-top
    : 2rem;
  }
  .custom-navbar {
    background: #4A90E2;
    padding: 12px 24px;
    color: white;
    display: flex;
    justify-content: flex-end;
    align-items: center;
    font-family: 'Poppins', sans-serif;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    border-radius: 0 0 20px 20px;
  }

  .custom-navbar .nav-left {
    display: flex;
    gap: 18px;
  }

  .custom-navbar a {
    color: white;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.2s ease-in-out;
    padding: 6px 14px;
    border-radius: 8px;
  }

  .custom-navbar a:hover {
    background-color: rgba(255, 255, 255, 0.15);
  }

  @media (max-width: 768px) {
    .custom-navbar {
      flex-direction: column;
      align-items: center;
      gap: 10px;
    }

    .custom-navbar .nav-left {
      flex-direction: column;
      align-items: center;
      gap: 10px;
    }
  }
</style>

</head>
<body>
  <nav class="custom-navbar">
  <div class="nav-left">
    <a href="{{ url('/register') }}">Register</a>
    <a href="{{ url('/login') }}">Login</a>
  </div>
</nav>

  <header>
    <h1>Teman Bicara Saat Kamu Butuh</h1>
    <p>Aplikasi AI untuk bantu kamu memahami perasaan dan mencari solusi</p>
    <button class="btn">Mulai Sekarang</button>
  </header>

  <section>
    <h2>Masalah yang Sering Dihadapi</h2>
    <p>Banyak orang merasa kesepian, cemas, atau stres, tapi tidak tahu harus bicara ke siapa. Konsultasi seringkali tidak terjangkau atau tidak tersedia kapan saja.</p>
  </section>

  <section>
    <h2>Kenapa Aplikasi Ini?</h2>
    <p>Aplikasi ini menggunakan AI untuk menganalisis perasaanmu, memberikan masukan awal, dan menghubungkan ke konsultan jika diperlukan—semua dilakukan secara privat dan fleksibel.</p>
  </section>

  <section>
    <h2>Fitur Unggulan</h2>
    <div class="features">
      <div class="feature-box">✅ Chatbot AI Pintar</div>
      <div class="feature-box">✅ Deteksi Emosi Otomatis</div>
      <div class="feature-box">✅ Riwayat Percakapan Tersimpan</div>
      <div class="feature-box">✅ Akses Konsultan Profesional</div>
      <div class="feature-box">✅ Multi Sesi Chat seperti GPT</div>
    </div>
  </section>

  <section>
    <h2>Cara Menggunakan</h2>
    <div class="steps">
      <div class="step-box">1. Daftar atau Login</div>
      <div class="step-box">2. Mulai Percakapan dengan Chatbot</div>
      <div class="step-box">3. Lihat Hasil Analisis Perasaan</div>
      <div class="step-box">4. Lanjutkan atau Konsultasi</div>
    </div>
  </section>

  <footer>
    &copy; 2025 Mental Health AI — Dibuat oleh Ilham dan Kael ❤️
  </footer>
</body>
</html>
