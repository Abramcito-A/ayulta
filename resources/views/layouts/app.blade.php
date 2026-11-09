<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
        <meta name="theme-color" content="#00A8E8">
        <meta name="description" content="AYULTA: {{ config('ayulta.tagline') }} Guías educativas de finanzas, trámites, movilidad y vivienda.">
        <title>@yield('title', 'AYULTA') — {{ config('ayulta.tagline') }}</title>
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/logo/favicon-32.png') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/logo/icon-192.png') }}">
        <link rel="apple-touch-icon" href="{{ asset('images/logo/apple-touch-icon.png') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body
        class="app-body"
        data-user-key="{{ isset($currentUser) ? substr(sha1($currentUser['email']), 0, 12) : '' }}"
        data-points='@json(config('ayulta.points'))'
        data-levels='@json(config('ayulta.levels'))'
    >
        <a href="#contenido" class="skip-link">Saltar al contenido</a>
        <div @class(['app-shell', 'app-shell--with-nav' => View::hasSection('tab')])>
            <x-layout.flash />

            <main id="contenido" class="app-main">
                @yield('content')
            </main>

            @hasSection('tab')
                <x-layout.bottom-nav :active="trim($__env->yieldContent('tab'))" />
            @endif
        </div>

        <div class="toast" role="status" aria-live="polite" data-toast hidden></div>
    </body>
</html>
