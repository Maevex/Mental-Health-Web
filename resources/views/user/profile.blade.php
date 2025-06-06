@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow rounded-4 p-4 mx-auto" style="max-width: 500px;">
        <h2 class="text-center mb-4 fw-bold">Profil Pengguna</h2>

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if (isset($user))
            <div class="text-center mb-4">
                <img src="https://ui-avatars.com/api/?name={{ urlencode($user['nama']) }}&background=4d9eff&color=fff&size=128" class="rounded-circle shadow" width="100" height="100" alt="Avatar">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Nama:</label>
                <p>{{ $user['nama'] }}</p>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Email:</label>
                <p>{{ $user['email'] }}</p>
            </div>

            <div class="d-grid gap-2 mt-4">
                <a href="{{ url('/user/edit') }}" class="btn btn-primary">Edit Profil</a>
                <form action="{{ url('/logout') }}" method="POST" onsubmit="return confirm('Yakin ingin logout?')">
                    @csrf
                    <button class="btn btn-danger w-100">Logout</button>
                </form>
            </div>
        @endif
    </div>
</div>
@endsection
