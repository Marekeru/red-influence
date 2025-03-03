<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', \App\Models\Setting::getValue('site_title') ?? 'Website')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('storage/' . \App\Models\Setting::getValue('favicon')) }}">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <!-- Tailwind + eigene Styles -->
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-white text-gray-900">
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-4">Impressum</h1>
    <p>Hier stehen die Impressums-Informationen...</p>
    <a href="{{ url('/') }}" class="text-blue-500 hover:underline">Zurück zur Startseite</a>
</div>
</body>
</html>
