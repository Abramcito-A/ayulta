<?php

it('renders the login experience for guests', function () {
    $this->get(route('login'))
        ->assertOk()
        ->assertSee('Iniciar sesión')
        ->assertSee('demo@ayulta.mx')
        ->assertSee('Continuar con Google');
});

it('logs in with the default demonstration account', function () {
    $this->post(route('login.store'), [
        'email' => 'demo@ayulta.mx',
        'password' => 'ayulta123',
        'remember' => '1',
    ])->assertRedirectToRoute('home')
        ->assertSessionHas('demo_user.email', 'demo@ayulta.mx')
        ->assertSessionHas('demo_user.remember', true);

    $this->get(route('home'))
        ->assertOk()
        ->assertSee('Hola, Alex.');
});

it('rejects invalid demonstration credentials', function () {
    $this->from(route('login'))->post(route('login.store'), [
        'email' => 'demo@ayulta.mx',
        'password' => 'incorrecta',
    ])->assertRedirect(route('login'))
        ->assertSessionHasErrors('email');
});

it('creates a temporary account that can sign in again after logout', function () {
    $this->post(route('register.store'), [
        'name' => 'Ana Torres',
        'email' => 'ana@example.mx',
        'password' => 'contraseña-segura',
        'password_confirmation' => 'contraseña-segura',
    ])->assertRedirectToRoute('home')
        ->assertSessionHas('demo_user.email', 'ana@example.mx');

    $this->post(route('logout'))
        ->assertRedirectToRoute('login')
        ->assertSessionMissing('demo_user');

    $this->get(route('home'))->assertRedirectToRoute('login');

    $this->post(route('login.store'), [
        'email' => 'ANA@example.mx',
        'password' => 'contraseña-segura',
    ])->assertRedirectToRoute('home')
        ->assertSessionHas('demo_user.email', 'ana@example.mx');
});

it('shows validation errors for an incomplete registration', function () {
    $this->from(route('register'))->post(route('register.store'), [
        'name' => '',
        'email' => 'no-es-correo',
        'password' => 'corta',
        'password_confirmation' => 'diferente',
    ])->assertRedirect(route('register'))
        ->assertSessionHasErrors(['name', 'email', 'password']);
});

it('explains in Spanish when registration passwords do not match', function () {
    $this->from(route('register'))->post(route('register.store'), [
        'name' => 'Ana Torres',
        'email' => 'ana@example.mx',
        'password' => 'contraseña-segura',
        'password_confirmation' => 'otra-contraseña',
    ])->assertRedirect(route('register'))
        ->assertSessionHasErrors([
            'password' => 'Las contraseñas no coinciden.',
        ]);
});

it('keeps private destinations behind demonstration authentication', function () {
    $privateRoutes = [
        'home',
        'navigation.favorites',
        'navigation.notifications',
        'navigation.profile',
        'modules.finanzas',
        'modules.tramites',
        'modules.movilidad',
        'modules.vivienda',
    ];

    foreach ($privateRoutes as $routeName) {
        $this->get(route($routeName))->assertRedirectToRoute('login');
    }
});

it('opens each module without exposing unfinished lesson content', function () {
    $this->withSession([
        'demo_user' => [
            'name' => 'Alex',
            'email' => 'demo@ayulta.mx',
            'is_demo' => true,
        ],
    ]);

    foreach (['finanzas', 'tramites', 'movilidad', 'vivienda'] as $module) {
        $this->get(route('modules.'.$module))
            ->assertOk()
            ->assertSee('Estamos preparando este espacio')
            ->assertSee('PRÓXIMAMENTE');
    }
});

it('renders each primary navigation destination for an authenticated visitor', function () {
    $this->withSession([
        'demo_user' => [
            'name' => 'Alex',
            'email' => 'demo@ayulta.mx',
            'is_demo' => true,
        ],
    ]);

    $navigationLabels = [
        'home' => 'Inicio',
        'navigation.favorites' => 'Favoritos',
        'navigation.notifications' => 'Notificaciones',
        'navigation.profile' => 'Perfil',
    ];

    foreach ($navigationLabels as $routeName => $label) {
        $this->get(route($routeName))
            ->assertOk()
            ->assertSee($label)
            ->assertSee('aria-current="page"', false);
    }
});

it('simulates password recovery without sending email', function () {
    $this->from(route('login'))->post(route('password.recovery'), [
        'recovery_email' => 'persona@example.mx',
    ])->assertRedirect(route('login'))
        ->assertSessionHas('success', 'Recuperación simulada: en una aplicación real recibirías instrucciones por correo.');
});
