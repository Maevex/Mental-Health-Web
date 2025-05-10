@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  <div class="card p-4 shadow" style="width: 100%; max-width: 400px;">
    <h4 class="text-center mb-4">Register</h4>

    @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif

    {{-- ALERT ERROR --}}
    @if (session('error'))
      <div class="alert alert-danger">
        {{ session('error') }}
      </div>
    @endif


    <form method="POST" action="{{ url('/register') }}">
      @csrf
      <div class="form-group mb-3">
        <label for="name">Name</label>
        <input name="nama" type="text" class="form-control" id="name" required>
      </div>
      <div class="form-group mb-3">
        <label for="email">Email address</label>
        <input name="email" type="email" class="form-control" id="email" required>
      </div>
      <div class="form-group mb-3">
        <label for="password">Password</label>
        <input name="password" type="password" class="form-control" id="password" required>
      </div>
      <button type="submit" class="btn btn-success w-100">Register</button>
    </form>
  </div>
</div>
@endsection
