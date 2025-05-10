@extends('layouts.app')

@section('content')

@if (session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
@endif

<div class="container-fluid">
    <div class="row" style="height: 80vh;">
       <!-- Sidebar -->
<div class="col-md-3 border-end bg-light p-3 overflow-auto">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Sesi Chat</h5>
        <a href="#" class="btn btn-sm btn-success">+ New Chat</a>
    </div>
    <ul class="list-group">
        @forelse($sessions as $sesi)
            <a href="a" class="list-group-item list-group-item-action">
                Sesi #{{ $sesi['sesi_id'] }} <br>
                <small class="text-muted">{{ $sesi['waktu_mulai'] }}</small>
            </a>
        @empty
            <li class="list-group-item">Belum ada sesi</li>
        @endforelse
    </ul>
</div>

<!-- Chat Area -->
<div class="col-md-9 p-4 d-flex flex-column justify-content-between" style="height: 100%; background-color: #f8f9fa;">
  
    <div class="mb-4">
        <h4 class="text-muted text-center">Hai<br>Apa yang mau kamu keluhkan?</h4>
    </div>

    <!-- Input Chat -->
    <form>
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Tulis pesan di sini..." disabled>
            <button class="btn btn-primary" type="button" disabled>Kirim</button>
        </div>
    </form>
</div>


        
    </div>
</div>
@endsection
