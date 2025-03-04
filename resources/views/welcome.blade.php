<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-black text-white">

<!-- Scroll-Snap Container -->
<div id="pagepiling">
    <div class="section" id="hero">@include('sections.hero')</div>
    <div class="section" id="about">@include('sections.about')</div>
    <div class="section" id="clients">@include('sections.clients')</div>
    <div class="section" id="projects">@include('sections.projects')</div>
    <div class="section" id="services">@include('sections.services')</div>
    <div class="section" id="team">@include('sections.team')</div>
    <div class="section" id="contact">@include('sections.contact')</div>
    <div class="section" id="form">@include('sections.form')</div>
</div>

</body>
</html>
