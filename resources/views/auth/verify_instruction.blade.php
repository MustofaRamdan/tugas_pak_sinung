<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Jika kamu menggunakan CSS framework seperti Tailwind -->
</head>
<body>
    <div class="container" style="max-width: 600px; margin: 50px auto; text-align: center;">
        <div class="alert alert-info" style="border: 1px solid #ccc; padding: 20px; background-color: #f0f8ff;">
            <h4>Silakan cek email Anda!</h4>
            <p>Kami telah mengirimkan email verifikasi ke alamat email <strong>{{ $pendingUser->email }}</strong>. Silakan klik link di dalam email untuk memverifikasi akun Anda.</p>
            <p>Link verifikasi ini akan kedaluwarsa dalam waktu 1 menit </p>
            <p>Mohon link nya di click terlebih dahulu, ketika link sudah kadaluarsa untuk membuat akun dengan email yg sama</p>
        </div>

    </div>
</body>
</html>
