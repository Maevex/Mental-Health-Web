@extends('layouts.app')

@section('content')
<div class="container py-4">
  <h2 class="mb-3 text-center">Hasil Analisis</h2>

  <div class="mb-3">
    <h5><strong>Kategori:</strong> {{ $kategori }}</h5>
    <h5><strong>Sub Kategori:</strong> {{ $sub_kategori }}</h5>
    <p><strong>Keluhan:</strong><br>{{ $keluhan }}</p>
  </div>

  <div class="alert alert-info">
    <h5><strong>Kesimpulan:</strong></h5>
    <p>{{ $kesimpulan }}</p>
  </div>

  <div class="alert alert-success">
    <h5><strong>Saran:</strong></h5>
    <p>{{ $saran }}</p>
  </div>

  @if(!empty($rekomendasi))
  <div class="alert alert-warning">
    <h5><strong>Rekomendasi:</strong></h5>
    <p>{{ $rekomendasi }}</p>
    @if(!empty($konsultan))
  <div class="mt-4">
    <h5 class="text-primary"><strong>Kontak Konsultan Terkait:</strong></h5>
    @foreach ($konsultan as $k)
      <div class="card mb-3 shadow-sm">
        <div class="card-body">
          <h5 class="card-title"><i class="bi bi-person-circle"></i> {{ $k['nama'] }}</h5>
          <p class="card-text">{{ $k['spesialisasi'] }} ({{ $k['pengalaman'] }})</p>
          <p class="card-text"><strong>📞</strong> {{ $k['no_telepon'] }}</p>
          <p class="card-text"><strong>✉️</strong> {{ $k['email'] }}</p>
        </div>
      </div>
    @endforeach
  </div>
@endif

  </div>
  @endif
</div>
@endsection
