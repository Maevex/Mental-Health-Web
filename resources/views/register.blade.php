<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Register Serenity</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #89f7fe, #66a6ff);
      font-family: 'Poppins', sans-serif;
    }

    .card-custom {
      background-color: #fff;
      border-radius: 20px;
      padding: 30px;
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
    }

    .form-control-custom {
      height: 50px;
      background-color: #f0f4f8;
      border: none;
      border-radius: 15px;
      padding: 0 15px;
      font-size: 15px;
      color: #333;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    .form-control-custom:focus {
      box-shadow: 0 0 0 2px #4d9eff44;
    }

    .btn-gradient {
      background-color: #4d9eff;
      border: none;
      color: #fff;
      font-weight: bold;
      font-size: 16px;
      padding: 12px;
      border-radius: 15px;
      width: 100%;
  
}

.btn-gradient:hover {
   background-color: #368de0;
}


    .title-text {
      font-size: 24px;
      font-weight: 700;
      color: #333;
    }

    .title-accent {
      color: #4d9eff;
    }

    a {
      color: #3b82f6;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center min-vh-100">
  <div class="col-md-5">
    <div class="card card-custom">
      <h3 class="text-center mb-4 title-text">
        Start Your Journey with <span class="title-accent">Serenity</span>
      </h3>

      @if ($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      @if (session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      @endif

      <form action="/register" method="POST">
        @csrf
        <div class="mb-3">
          <input type="text" name="nama" placeholder="Nama" class="form-control form-control-custom" value="{{ old('nama') }}" required>
        </div>

        <div class="mb-3">
          <input type="email" name="email" placeholder="Email" class="form-control form-control-custom" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
          <input type="password" name="password" placeholder="Password" class="form-control form-control-custom" required>
        </div>

        <button type="submit" class="btn btn-gradient">Daftar</button>

        <div class="text-center mt-3">
          <a href="/login">Sudah punya akun? Login</a>
        </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>
