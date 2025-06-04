@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Pilih Kategori Masalah</h3>
    <div class="row mt-4">
        @foreach (['Kampus', 'Rumah', 'Kantor'] as $kategori)
        <div class="col-md-4 mb-3">
            <a href="{{ route('keluhan.form', ['kategori' => $kategori]) }}" class="btn btn-outline-primary w-100">
                {{ $kategori }}
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
