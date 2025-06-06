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
    max-width: 800px;
    margin: auto;
  }

  .title-style {
    font-size: 26px;
    font-weight: 700;
    color: #0D47A1;
    text-align: center;
    margin-bottom: 30px;
    font-family: 'Poppins', sans-serif;
  }

  .button-wrapper {
    max-width: 400px;
    margin: 0 auto;
  }

  .issue-btn {
    background-color: white;
    color: #1565C0;
    border: none;
    border-radius: 18px;
    padding: 22px 16px;
    width: 100%;
    font-size: 16px;
    font-family: 'Poppins', sans-serif;
    box-shadow: 0 4px 6px rgba(0,0,0,0.07);
    transition: all 0.2s ease-in-out;
  }

  .issue-btn:hover {
    transform: scale(0.97);
    opacity: 0.9;
  }

  .grid-gap {
    gap: 1rem;
  }
</style>

<div class="container py-5 d-flex align-items-center justify-content-center">
  <div class="card-glass">
    <h2 class="title-style">Apa yang kamu rasakan hari ini?</h2>

    <div class="button-wrapper">
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
</div>
@endsection
