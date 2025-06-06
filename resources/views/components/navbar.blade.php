<nav style="background: #4A90E2; padding: 10px; color: white; display: flex; justify-content: space-between; align-items: center;">
    <div>
        <a href="{{ route('user.dash') }}" style="color: white; margin-right: 15px;">Dashboard</a>
        <a href="{{ url('/user/subkategori') }}" style="color: white; margin-right: 15px;">Subkategori</a>
        <a href="{{ url('/user/keluhan') }}" style="color: white; margin-right: 15px;">Keluhan</a>
        <a href="{{ url('/user/chat') }}" style="color: white;">Chat</a>
        <a href="{{ url('/user/profile') }}" style="color: white;">profile</a>
    </div>
    <form action="{{ url('/logout') }}" method="POST" style="margin: 0;">
        @csrf
        <button type="submit" style="background: transparent; border: none; color: white; cursor: pointer;">Logout</button>
    </form>
</nav>
