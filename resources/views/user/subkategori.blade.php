@extends('layouts.app')

@section('content')
<style>
  body {
    background: linear-gradient(to bottom right, #89f7fe, #66a6ff);
    min-height: 100vh;
  }

  .custom-card {
    background-color: rgba(255, 255, 255, 0.85);
    padding: 2rem;
    border-radius: 24px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    max-width: 700px;
    margin: 0 auto;
    animation: fadeSlide 0.7s ease-out;
  }

  .custom-title {
    font-size: 1.75rem;
    font-weight: bold;
    color: #0D47A1;
    text-align: center;
    margin-bottom: 2rem;
    font-family: 'Poppins', sans-serif;
  }

  .issue-button {
    background-color: #ffffff;
    border: none;
    padding: 1.2rem;
    border-radius: 18px;
    width: 100%;
    font-size: 1rem;
    font-family: 'Poppins', sans-serif;
    color: #1565C0;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    transition: all 0.2s ease;
    text-align: center;
    display: block;
    text-decoration: none;
  }

  .issue-button:hover {
    opacity: 0.9;
    transform: scale(0.98);
  }

  @keyframes fadeSlide {
    from {
      opacity: 0;
      transform: translateY(20px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
</style>

<div class="container py-5 d-flex align-items-center justify-content-center">
  <div class="custom-card">
    <h2 class="custom-title">Subkategori: {{ $kategori }}</h2>
    <div class="row g-3">
      @foreach($subkategori as $item)
        <div class="col-md-6">
          <a href="{{ route('user.keluhan', ['kategori' => $kategori, 'sub_kategori' => $item]) }}"
             class="issue-button">
            {{ $item }}
          </a>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
