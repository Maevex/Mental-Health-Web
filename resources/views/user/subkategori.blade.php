@extends('layouts.app')

@section('content')
<div class="container py-4">
  <h2 class="text-center mb-4">Subkategori: {{ $kategori }}</h2>
  <div class="row">
    @foreach($subkategori as $item)
      <div class="col-md-6 mb-3">
        <a href="{{ route('user.keluhan', ['kategori' => $kategori, 'sub_kategori' => $item]) }}"
           class="btn btn-primary w-100 py-3">
          {{ $item }}
        </a>
      </div>
    @endforeach
  </div>
</div>
@endsection
