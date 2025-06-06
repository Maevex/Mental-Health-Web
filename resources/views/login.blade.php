<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login - Serenity</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #89f7fe, #66a6ff);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-card {
      background: white;
      padding: 30px 25px;
      border-radius: 20px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
      width: 100%;
      max-width: 380px;
    }

    .login-title {
      font-weight: 600;
      font-size: 24px;
      text-align: center;
      color: #333;
    }

    .login-subtitle {
      font-size: 14px;
      text-align: center;
      color: #555;
      margin-bottom: 20px;
    }

    .form-control {
      background-color: #f0f4f8;
      border-radius: 15px;
      border: none;
      padding: 12px 15px;
      font-size: 14px;
      color: #333;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.03);
    }

    .btn-login {
      background-color: #4d9eff;
      border: none;
      color: white;
      padding: 12px;
      border-radius: 15px;
      font-weight: 600;
      font-size: 15px;
    }

    .btn-login:hover {
      background-color: #368de0;
    }

    .login-link {
      margin-top: 18px;
      font-size: 14px;
      text-align: center;
    }

    .login-link a {
      color: #3b82f6;
      text-decoration: none;
    }

    .login-link a:hover {
      text-decoration: underline;
    }

    .alert-danger {
      font-size: 14px;
      padding: 8px 12px;
      border-radius: 12px;
    }
  </style>
</head>
<body>
  <div class="login-card">
    <div class="login-title">Find Peace with <span style="color: #4d9eff;">Serenity</span></div>
    <div class="login-subtitle">Let your thoughts be heard</div>

    <form method="POST" action="{{ route('login.submit') }}">
      @csrf

      <div class="mb-3">
        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required autofocus>
      </div>

      <div class="mb-3">
        <input type="password" name="password" class="form-control" placeholder="Password" required>
      </div>

      @if($errors->any())
        <div class="alert alert-danger">
          {{ $errors->first() }}
        </div>
      @endif

      <button type="submit" class="btn btn-login w-100 mt-2">Masuk</button>

      <div class="login-link">
        <a href="/register">Belum punya akun? Daftar di sini</a>
      </div>
    </form>
  </div>
</body>
</html>
