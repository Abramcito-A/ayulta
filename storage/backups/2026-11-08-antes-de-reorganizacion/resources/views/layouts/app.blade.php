<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
        <meta name="theme-color" content="#E6F8FF">
        <title>@yield('title', 'AYULTA — La vida adulta, más fácil.')</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[#E6F8FF] text-[#0F172A] font-sans antialiased min-h-screen relative">
        <div @class(['max-w-md mx-auto bg-white min-h-screen shadow-2xl overflow-x-hidden', 'pb-24' => View::hasSection('tab')])>
            <main id="main-content">
                <x-flash-message />
                @yield('content')
            </main>

            @hasSection('tab')
                <x-bottom-nav :active="trim($__env->yieldContent('tab'))" />
            @endif
        </div>
    </body>
</html>
