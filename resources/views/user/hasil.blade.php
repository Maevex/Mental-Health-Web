@extends('layouts.app')

@section('content')
<style>
  body {
    background: linear-gradient(to bottom, #f5f7fa, #c3cfe2);
    font-family: 'Poppins', sans-serif;
  }

  .hasil-container {
    max-width: 800px;
    margin: 0 auto;
    padding: 30px 20px;
  }

  .hasil-title {
    font-size: 26px;
    font-weight: 700;
    color: #333;
    margin-bottom: 30px;
    text-align: center;
  }

  .hasil-label {
    font-weight: 600;
    color: #444;
    font-size: 16px;
  }

  .hasil-value {
    color: #333;
    margin-bottom: 10px;
    font-size: 15px;
  }

  .section-title {
    font-size: 18px;
    font-weight: 700;
    margin-top: 25px;
    color: #007AFF;
  }

  .chat-btn {
    background-color: #007AFF;
    color: white;
    border: none;
    padding: 14px 24px;
    border-radius: 30px;
    font-weight: 600;
    margin-top: 25px;
    box-shadow: 0 4px 10px rgba(0, 122, 255, 0.3);
    transition: background-color 0.3s ease;
    display: inline-block;
    text-decoration: none;
  }

  .chat-btn:hover {
    background-color: #0062cc;
  }

  .konsultan-card {
    background-color: white;
    border-radius: 16px;
    padding: 18px;
    margin-bottom: 15px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.08);
  }

  .konsultan-name {
    font-size: 16px;
    font-weight: 700;
    color: #222;
    margin-bottom: 5px;
  }

  .konsultan-detail {
    color: #555;
    font-size: 14px;
    margin-bottom: 4px;
  }
</style>

<div class="hasil-container">
  <div class="hasil-title">📝 Hasil Analisis Keluhan</div>

  <div class="mb-3">
    <p class="hasil-label">Kategori: <span class="hasil-value">{{ $kategori }}</span></p>
    <p class="hasil-label">Sub Kategori: <span class="hasil-value">{{ $sub_kategori }}</span></p>
    <p class="hasil-label">Keluhan:</p>
    <p class="hasil-value">"{{ $keluhan }}"</p>
  </div>

  <div class="section-title">🧠 Kesimpulan Chatbot</div>
  <p class="hasil-value">{!! nl2br(e($kesimpulan)) !!}</p>

  <p class="hasil-value" style="font-weight: 700;">{{ $saran }}</p>

  <a href="{{ url('/user/chat') }}" class="chat-btn">💬 Mulai Chat</a>

  @if(!empty($rekomendasi))
  <div class="section-title mt-4">📌 {{ $rekomendasi }}</div>

  @if(!empty($konsultan))
    <div class="mt-3">
      @foreach ($konsultan as $k)
        <div class="konsultan-card">
          <div class="konsultan-name">
            <i class="bi bi-person-circle text-primary"></i> {{ $k['nama'] }}
          </div>
          <div class="konsultan-detail">{{ $k['spesialisasi'] }} ({{ $k['pengalaman'] }})</div>
          <div class="konsultan-detail">📞 {{ $k['no_telepon'] }}</div>
          <div class="konsultan-detail">✉️ {{ $k['email'] }}</div>
        </div>
      @endforeach
    </div>
  @endif
  @endif
</div>
@endsection
