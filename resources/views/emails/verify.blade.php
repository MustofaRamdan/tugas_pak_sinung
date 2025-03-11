<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verifikasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .email-header {
            background-color: #007bff;
            color: #ffffff;
            text-align: center;
            padding: 20px;
        }
        .email-header h1 {
            margin: 0;
            font-size: 24px;
        }
        .email-body {
            padding: 20px;
            color: #333333;
            line-height: 1.6;
        }
        .email-body p {
            margin: 0 0 20px;
        }
        .email-footer {
            text-align: center;
            padding: 10px;
            background-color: #f4f4f4;
            color: #777777;
            font-size: 12px;
        }
        .btn-verify {
            display: inline-block;
            padding: 12px 24px;
            background-color: #007bff;
            color: #000000;
            text-decoration: none;
            border-radius: 4px;
            font-size: 16px;
        }
        .btn-verify:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            <h1>Verifikasi Email Anda</h1>
        </div>

        <!-- Body -->
        <div class="email-body">
            <p>Halo,</p>
            <p>Terima kasih telah mendaftar di aplikasi kami. Untuk melanjutkan, silakan verifikasi alamat email Anda dengan mengklik tombol di bawah ini:</p>
            <p style="text-align: center;">
                <a href="{{ $url }}" class="btn-verify">Verifikasi Email</a>
            </p>
            <p>Jika tombol di atas tidak berfungsi, salin dan tempel link berikut di browser Anda:</p>
            <p style="word-break: break-all;">{{ $url }}</p>
            <p>Terima kasih,</p>
            <p>Tim Kami</p>
        </div>

        <!-- Footer -->
        <div class="email-footer">
            <p>&copy; {{ date('Y') }} TuugasKu. All rights reserved.</p>
        </div>
    </div>
</body>
</html>