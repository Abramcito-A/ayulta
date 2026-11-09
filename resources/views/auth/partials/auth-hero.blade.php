<x-ui.illustration name="ciudad" class="auth-bg" />

<header class="auth-brand">
    <img
        class="auth-brand__mark"
        src="{{ asset('images/logo/ayulta-logo.png') }}"
        srcset="{{ asset('images/logo/ayulta-logo.png') }} 1x, {{ asset('images/logo/ayulta-logo@2x.png') }} 2x"
        alt=""
        width="256"
        height="256"
    >
    <p class="auth-brand__name">ayulta</p>
    <p class="auth-brand__tagline">La vida adulta,<br>más fácil.</p>
</header>

<nav class="segmented-tabs" aria-label="Acceso a tu cuenta">
    <a href="{{ route('login') }}" @class(['segmented-tabs__item', 'is-active' => $active === 'login']) @if ($active === 'login') aria-current="page" @endif>Iniciar sesión</a>
    <a href="{{ route('register') }}" @class(['segmented-tabs__item', 'is-active' => $active === 'register']) @if ($active === 'register') aria-current="page" @endif>Registrarme</a>
</nav>
