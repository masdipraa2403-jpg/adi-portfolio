<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login — Adi Portfolio</title>

    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/backend.css') }}">
</head>
<body class="login-page">

<section class="login-art" aria-hidden="true">
    <div class="login-orb"></div>
    <div class="login-copy">
        <span class="section-kicker">ADI PRASETYO</span>
        <h1>Portfolio<br><span>CMS.</span></h1>
        <p>Kelola pendidikan, pengalaman, skill, sertifikat, project, dan pesan dari satu dashboard yang sederhana.</p>
    </div>
</section>

<section class="login-panel">
    <a class="brand" href="{{ route('home') }}">Adi<span>.</span></a>

    <div class="login-box">
        <span class="section-kicker">ADMIN ACCESS</span>
        <h2>Welcome back.</h2>
        <p>Masuk untuk mengelola portfolio.</p>

        @if($errors->any())
            <div class="alert error">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('admin.login.store') }}">
            @csrf

            <label>
                Email
                <input type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="admin@adiprasetyo.dev">
            </label>

            <label>
                Password
                <input type="password" name="password" required autocomplete="current-password" placeholder="••••••••">
            </label>

            <label class="check">
                <input type="checkbox" name="remember" value="1">
                Ingat saya
            </label>

            <button class="btn btn-primary" type="submit">Sign In <span>↗</span></button>
        </form>

        <div class="login-hint">
            Akun admin awal dari seeder: <b>admin@adiprasetyo.dev</b> / <b>password</b>
        </div>

        <a class="back-link" href="{{ route('home') }}" style="display:inline-flex;margin-top:18px;">← Kembali ke website</a>
    </div>
</section>

</body>
</html>
