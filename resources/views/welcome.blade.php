<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', \App\Models\Setting::getValue('site_title') ?? 'Website')</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="icon" type="image/png" href="{{ asset('storage/' . \App\Models\Setting::getValue('favicon')) }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --background-color-dark:    {{ \App\Models\Setting::getValue('background_color_dark') }};
            --background-color-accent:  {{ \App\Models\Setting::getValue('background_color_accent') }};
            --font-color-light:         {{ \App\Models\Setting::getValue('font_color_light') }};
            --font-color-accent:        {{ \App\Models\Setting::getValue('font_color_accent') }};
            --client-animation-speed:   {{ \App\Models\Setting::getValue('client_animation_speed') }};
        }
    </style>
</head>

<body>
@include('sections.hero')
@include('sections.about')
@include('sections.clients')
@include('sections.services')
@include('sections.team')
@include('sections.projects')
@include('sections.contact')
@include('sections.form')
</body>
</html>
