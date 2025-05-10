<!-- resources/views/user/dash.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
</head>
<body>
    <h1>Selamat datang di User Dashboard</h1>

    @if (session('success'))
        <div style="color: green; border: 1px solid green; padding: 10px;">
            {{ session('success') }}
        </div>
    @endif

    <p>Ini adalah halaman dashboard khusus untuk user.</p>
</body>
</html>
