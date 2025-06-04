@extends('layouts.app')

@section('content')
<div class="container py-4">
  <h2 class="mb-3">Keluhan kamu tentang:</h2>
  <p><strong>Kategori:</strong> {{ $kategori }}</p>
  <p><strong>Sub Kategori:</strong> {{ $sub_kategori }}</p>

  <form method="POST" action="{{ route('user.keluhan.submit') }}">
    @csrf
    <input type="hidden" name="kategori" value="{{ $kategori }}">
    <input type="hidden" name="sub_kategori" value="{{ $sub_kategori }}">

    <div class="mb-3">
      <label for="keluhan" class="form-label">Tulis Keluhanmu</label>
      <textarea class="form-control" name="keluhan" id="keluhan" rows="5" required></textarea>
    </div>

    <button type="submit" class="btn btn-success">Kirim & Lihat Hasil</button>
  </form>
</div>
@endsection
