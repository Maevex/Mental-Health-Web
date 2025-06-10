@extends('layouts.app')
@section('content')
<style>
  body {
    background: linear-gradient(to bottom, #89f7fe, #66a6ff);
    min-height: 100vh;
    font-family: 'Nunito', sans-serif;
  }
  .keluhan-card {
    background-color: #fff;
    border-radius: 20px;
    padding: 24px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    margin: auto;
    margin-top: 40px;
  }
  .keluhan-title {
    font-size: 24px;
    font-weight: 600;
    text-align: center;
    color: #0D47A1;
    font-weight: bold;
  }
  .keluhan-subtitle {
    font-size: 16px;
    text-align: center;
    color: #1565C0;
    margin-bottom: 20px;
  }
  .keluhan-textarea {
    height: 150px;
    background-color: #f0f4f8;
    border-radius: 16px;
    padding: 16px;
    border: 1.5px solid #d1e3ff;
    font-size: 15px;
    color: #333;
    box-shadow: 0 2px 6px rgba(0,0,0,0.05);
  }
  .keluhan-button {
    background-color: #4d9eff;
    color: white;
    font-weight: 600;
    padding: 12px 20px;
    border-radius: 15px;
    border: none;
    width: 100%;
    font-size: 16px;
    transition: background 0.3s;
  }
  .keluhan-button:hover {
    background-color: #3b85e0;
  }
</style>

<div class="container">
  <div class="keluhan-card">
    <h2 class="keluhan-title">Keluhanmu tentang:</h2>
    <p class="keluhan-subtitle">{{ $sub_kategori }}</p>

    <form method="POST" action="{{ route('user.keluhan.submit') }}">
      @csrf
      <input type="hidden" name="kategori" value="{{ $kategori }}">
      <input type="hidden" name="sub_kategori" value="{{ $sub_kategori }}">

      <div class="mb-3">
        <textarea class="form-control keluhan-textarea" name="keluhan" placeholder="Tulis keluhanmu di sini..." required></textarea>
      </div>

      <button type="submit" class="keluhan-button">Kirim & Lihat Hasil</button>
    </form>
  </div>
</div>
@endsection
