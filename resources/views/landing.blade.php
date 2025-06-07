<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Serenity - Temukan Kedamaianmu</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #89f7fe, #66a6ff);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 40px 20px;
    }

    .landing-card {
      background: white;
      padding: 40px 30px;
      border-radius: 20px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
      max-width: 700px;
      width: 100%;
    }

    .title {
      font-size: 32px;
      font-weight: 700;
      color: #333;
    }

    .title span {
      color: #4d9eff;
    }

    .subtitle {
      font-size: 18px;
      color: #666;
      margin-top: 10px;
      margin-bottom: 30px;
    }

    .overview {
      font-size: 15px;
      color: #444;
      margin-bottom: 35px;
      line-height: 1.6;
    }

    .btn-start {
      background-color: #4d9eff;
      color: white;
      border: none;
      border-radius: 15px;
      padding: 12px 25px;
      font-weight: 600;
      font-size: 16px;
    }

    .btn-start:hover {
      background-color: #368de0;
    }
  </style>
</head>
<body>
  <div class="landing-card">
    <div class="title">Find Peace with <span>Serenity</span></div>
    <div class="subtitle">Let your mind speak. Let the healing begin.</div>

    <div class="overview">
      Serenity adalah aplikasi kesehatan mental yang dirancang untuk membantumu berbicara tentang perasaan, menemukan ketenangan, dan mendapatkan bantuan bila dibutuhkan. <br><br>
      Dengan dukungan AI dan fitur konsultasi, kamu dapat mencurahkan isi hati dengan aman dan nyaman. Setiap sesi memberikanmu ruang pribadi untuk berbicara dan menemukan makna dari perasaanmu sendiri.
    </div>

    <a href="{{ url('/login') }}" class="btn btn-start">Mulai Sekarang</a>
  </div>
</body>
</html>
