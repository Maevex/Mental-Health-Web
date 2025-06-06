<nav class="custom-navbar">
  <div class="nav-left">
    <a href="{{ route('user.dash') }}">Dashboard</a>
    <a href="{{ url('/user/chat') }}">Chat</a>
    <a href="{{ url('/user/profile') }}">Profile</a>
  </div>
  <form action="{{ url('/logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
  </form>
</nav>

<style>
  .custom-navbar {
    background: #4A90E2;
    padding: 12px 24px;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-family: 'Poppins', sans-serif;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    border-radius: 0 0 20px 20px;
  }

  .custom-navbar a {
    color: white;
    text-decoration: none;
    margin-right: 18px;
    font-weight: 500;
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
    font-family: 'Poppins', sans-serif;
    font-weight: 500;
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
