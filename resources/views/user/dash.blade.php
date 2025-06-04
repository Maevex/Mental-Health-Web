@extends('layouts.app')

@section('content')
<div class="container py-4">
  <h2 class="mb-4 text-center fw-bold">Apa yang kamu rasakan hari ini?</h2>
  <div class="row">
    @foreach([
      'Masalah di Kampus',
      'Masalah di Rumah',
      'Masalah di Kantor',
      'Masalah dengan Teman',
      'Masalah Keuangan',
      'Kesehatan Mental'
    ] as $kategori)
      <div class="col-md-6 mb-3">
        <a href="{{ route('user.subkategori', ['kategori' => $kategori]) }}" class="btn btn-outline-primary w-100 py-3">
          {{ $kategori }}
        </a>
      </div>
    @endforeach
  </div>
</div>
@endsection
