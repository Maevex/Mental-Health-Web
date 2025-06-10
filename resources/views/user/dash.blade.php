@extends('layouts.app')

@section('content')
<style>
  body {
    background: linear-gradient(to bottom, #89f7fe, #66a6ff);
    min-height: 100vh;
  }

  .card-glass {
    background: rgba(255, 255, 255, 0.85);
    border-radius: 24px;
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    padding: 32px;
    font-family: 'Nunito', sans-serif;
    height: 100%;
  }

  .title-style {
    font-size: 26px;
    font-weight: 700;
    color: #0D47A1;
    text-align: center;
    margin-bottom: 30px;
  }

  .issue-btn {
    background-color: white;
    color: #1565C0;
    border: none;
    border-radius: 18px;
    padding: 22px 16px;
    width: 100%;
    font-size: 16px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.07);
    transition: all 0.2s ease-in-out;
  }

  .issue-btn:hover {
    transform: scale(0.97);
    opacity: 0.9;
  }

  .tips-box, .quote-box {
    background-color: rgba(255, 255, 255, 0.75);
    border-radius: 16px;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.05);
    height: 100%;
  }

  .tips-box h5,
  .quote-box h5 {
    font-weight: 700;
    color: #0D47A1;
  }

  .quote {
    font-style: italic;
    color: #333;
  }

  @media (max-width: 992px) {
    .flex-lg-row {
      flex-direction: column !important;
    }
  }
</style>

<div class="container py-5">
  <div class="d-flex justify-content-center align-items-start flex-lg-row flex-column gap-4 gap-lg-5">

    <!-- Kiri: Kategori Utama -->
    <div class="col-lg-6">
      <div class="card-glass">
        <h2 class="title-style">Apa masalah yang kamu rasakan hari ini?</h2>

        @foreach([
          'Masalah di Kampus',
          'Masalah di Rumah',
          'Masalah di Kantor',
          'Masalah dengan Teman',
          'Masalah Keuangan',
          'Kesehatan Mental'
        ] as $kategori)
          <div class="mb-3">
            <a href="{{ route('user.subkategori', ['kategori' => $kategori]) }}">
              <button class="issue-btn">{{ $kategori }}</button>
            </a>
          </div>
        @endforeach
      </div>
    </div>

    <!-- Kanan: Tips & Quotes -->
<div class="col-lg-5">
  <div class="tips-box">
    <h5>Tips Mental Health 🧠</h5>
    <ul class="mt-2 ps-3">
      <li>Ambil waktu untuk dirimu sendiri.</li>
      <li>Tuliskan hal-hal yang kamu syukuri hari ini.</li>
      <li>Luangkan waktu istirahat dari layar dan notifikasi.</li>
      <li>Hubungi teman dekat saat butuh dukungan.</li>
    </ul>
  </div>

  <div class="quote-box">
    <h5>Quotes Hari Ini 🌤️</h5>
    <p class="quote mt-2">"Kesehatan mental bukan tujuan, tapi proses. Ini tentang bagaimana kamu mengendarai, bukan ke mana kamu pergi."</p>
  </div>

  

  <div class="quote-box">
    <h5>Self-Care Reminder ⏳</h5>
    <ul class="mt-2 ps-3">
      <li>Minum air putih sekarang juga 💧</li>
      <li>Atur napas dalam 3x → tarik... tahan... hembuskan</li>
      <li>Cek postur dudukmu 🪑</li>
    </ul>
  </div>
</div>

  </div>
</div>
@endsection
