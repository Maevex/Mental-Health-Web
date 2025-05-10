@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  <div class="card p-4 shadow" style="width: 100%; max-width: 400px;">
    <h4 class="text-center mb-4">Login</h4>

    @if (session('success'))
    <div class="alert alert-success">
    {{ session('success') }}
    </div>
    @endif
    
    @if ($errors->any())
    <div class="alert alert-danger">
    {{ $errors->first() }}
    </div>
    @endif


    <form action="/login" method="POST">
      @csrf
      <label>Email:</label>
      <input type="email" name="email" required class="form-control mb-2">

      <label>Password:</label>
      <input type="password" name="password" required class="form-control mb-3">

      <button type="submit" class="btn btn-success w-100">Login</button>
    </form>
  </div>
</div>
@endsection
