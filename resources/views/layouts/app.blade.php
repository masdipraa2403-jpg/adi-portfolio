<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Adi Prasetyo — Portfolio' }}</title>
    <meta name="description" content="Portfolio personal Adi Prasetyo — Information Systems Student & Web Developer.">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/frontend.css') }}">
    <script defer src="{{ asset('assets/js/app.js') }}"></script>
</head>
<body class="site-body">
    @yield('content')
</body>
</html>
