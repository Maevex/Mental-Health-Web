<!-- Navbar -->
<nav class="custom-navbar">
  <div class="nav-left">
    <a href="{{ route('user.dash') }}">Keluhan</a>
    <a href="{{ url('/user/chat') }}">Chat</a>
    <a href="{{ url('/user/profile') }}">Profile</a>
  </div>
  <form action="{{ url('/logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
  </form>
</nav>

<!-- Google Fonts Nunito -->
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

<style>
  body {
    font-family: 'Nunito', sans-serif;
    padding-top: 70px; /* biar konten nggak ketimpa navbar */
  }

  .custom-navbar {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 999;
    background: #4A90E2;
    padding: 12px 24px;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-family: 'Nunito', sans-serif;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    border-radius: 0 0 20px 20px;
  }

  .custom-navbar a {
    color: white;
    text-decoration: none;
    margin-right: 18px;
    font-weight: 600;
    transition: all 0.2s ease-in-out;
  }

  .custom-navbar a:hover {
    opacity: 0.85;
  }

  .custom-navbar form {
    margin: 0;
  }

  .custom-navbar button {
    background: white;
    color: #1565C0;
    border: none;
    padding: 6px 16px;
    border-radius: 12px;
    font-family: 'Nunito', sans-serif;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.2s ease-in-out;
  }

  .custom-navbar button:hover {
    background: #e3f2fd;
  }

  @media (max-width: 768px) {
    .custom-navbar {
      flex-direction: column;
      align-items: flex-start;
      gap: 10px;
    }

    .custom-navbar .nav-left {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
    }

    .custom-navbar button {
      width: 100%;
    }
  }
</style>
