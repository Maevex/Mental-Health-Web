<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh;">
  <div class="card shadow p-4" style="width: 360px;">
    <h4 class="text-center mb-4">Selamat Datang</h4>
    <form method="POST" action="{{ route('login.submit') }}">
      @csrf

      <div class="mb-3">
        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required autofocus>
      </div>

      <div class="mb-3">
        <input type="password" name="password" class="form-control" placeholder="Password" required>
      </div>

      @if($errors->any())
        <div class="alert alert-danger small py-2 px-3">
          {{ $errors->first() }}
        </div>
      @endif

      <button type="submit" class="btn btn-primary w-100">Masuk</button>

      <div class="text-center mt-3">
        <a href="/register">Belum punya akun? Daftar di sini</a>
      </div>
    </form>
  </div>
</body>
</html>
