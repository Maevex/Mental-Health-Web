@extends('layouts.app')

@section('content')
<style>
  body {
    background: linear-gradient(to bottom , #89f7fe, #66a6ff);
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
    font-family: 'Nunito', sans-serif;
  }

  .issue-button {
  background-color: #ffffff;
  border: none;
  padding: 1.2rem;
  border-radius: 18px;
  width: 100%;
  font-size: 1rem;
  font-family: 'Nunito', sans-serif;
  color: #1565C0;
  box-shadow: 0 2px 6px rgba(0,0,0,0.1);
  transition: all 0.2s ease;
  text-align: center;
  text-decoration: none;
  min-height: 88px; /* Tambahkan ini untuk konsistensi tinggi */
  display: flex;          /* Flexbox untuk isi */
  align-items: center;    /* Tengah vertikal */
  justify-content: center; /* Tengah horizontal */
  text-align: center;
}

  .issue-button:hover {
    opacity: 0.9;
    transform: scale(0.98);
  }

  
</style>

<div class="container py-5 d-flex align-items-center justify-content-center">
  <div class="custom-card">
    <h2 class="custom-title">Subkategori: {{ $kategori }}</h2>
    <div class="row g-3">
      @foreach($subkategori as $item)
        <div class="col-md-6">
          <a href="{{ route('user.keluhan', ['kategori' => $kategori, 'sub_kategori' => $item]) }}"
             class="issue-button w-100">
            {{ $item }}
          </a>
        </div>
      @endforeach
    </div>
      <div class="d-flex justify-content-between align-items-center mt-4">
      @if($currentPage > 1)
        <a href="{{ route('user.subkategori', ['kategori' => $kategori, 'page' => $currentPage - 1]) }}"
           class="btn btn-outline-primary">
          &laquo; Sebelumnya
        </a>
      @else
        <span></span>
      @endif

      @if($currentPage < $lastPage)
        <a href="{{ route('user.subkategori', ['kategori' => $kategori, 'page' => $currentPage + 1]) }}"
           class="btn btn-outline-primary">
          Selanjutnya &raquo;
        </a>
      @endif
    </div>
      @if($currentPage == $lastPage)
  <div class="mt-5 text-center">
    <p style="font-family: 'Nunito', sans-serif; font-size: 1.1rem; color: #0D47A1;">
      Belum nemu masalah yang sesuai?
    </p>
    <a href="{{ route('user.keluhan', ['kategori' => $kategori]) }}"
       class="btn btn-primary px-4 py-2 rounded-pill shadow"
       style="font-family: 'Nunito', sans-serif;">
      Langsung ungkapin keluhanmu aja yuk!
    </a>
  </div>
@endif
  </div>
</div>
@endsection
