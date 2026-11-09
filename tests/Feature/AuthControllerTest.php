<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

it('renders the login experience for guests', function () {
    $this->get(route('login'))
        ->assertOk()
        ->assertSee('Iniciar sesión')
        ->assertSee('demo@ayulta.mx')
        ->assertSee('Continuar con Google')
        ->assertSee('Mantener sesión iniciada')
        ->assertSee('¿Olvidaste tu contraseña?');
});

it('logs in with the default demonstration account and remembers the session', function () {
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
        ->assertSessionHasErrors(['email' => 'No encontramos una cuenta con esos datos. Verifica tu correo y contraseña.'])
        ->assertSessionMissing('demo_user');
});

it('requires email and password to log in', function () {
    $this->from(route('login'))->post(route('login.store'), [])
        ->assertRedirect(route('login'))
        ->assertSessionHasErrors([
            'email' => 'Escribe tu correo electrónico.',
            'password' => 'Escribe tu contraseña.',
        ]);
});

it('stores registered accounts in a private file with hashed passwords', function () {
    Storage::fake('local');

    $this->post(route('register.store'), [
        'name' => 'Ana Torres',
        'email' => 'Ana@Example.mx',
        'password' => 'contraseña-segura',
        'password_confirmation' => 'contraseña-segura',
    ])->assertRedirectToRoute('home')
        ->assertSessionHas('demo_user.email', 'ana@example.mx');

    $accounts = json_decode(Storage::disk('local')->get('demo/users.json'), true);

    expect($accounts)->toHaveKey('ana@example.mx')
        ->and($accounts['ana@example.mx']['name'])->toBe('Ana Torres')
        ->and($accounts['ana@example.mx']['password'])->not->toBe('contraseña-segura')
        ->and(Hash::check('contraseña-segura', $accounts['ana@example.mx']['password']))->toBeTrue();
});

it('lets a registered account sign in again after logging out', function () {
    Storage::fake('local');

    $this->post(route('register.store'), [
        'name' => 'Ana Torres',
        'email' => 'ana@example.mx',
        'password' => 'contraseña-segura',
        'password_confirmation' => 'contraseña-segura',
    ]);

    $this->post(route('logout'))
        ->assertRedirectToRoute('login')
        ->assertSessionMissing('demo_user');

    $this->get(route('home'))->assertRedirectToRoute('login');

    $this->post(route('login.store'), [
        'email' => 'ANA@example.mx',
        'password' => 'contraseña-segura',
    ])->assertRedirectToRoute('home')
        ->assertSessionHas('demo_user.name', 'Ana Torres');
});

it('does not register an email that already exists', function () {
    Storage::fake('local');

    $this->from(route('register'))->post(route('register.store'), [
        'name' => 'Otra persona',
        'email' => 'demo@ayulta.mx',
        'password' => 'contraseña-segura',
        'password_confirmation' => 'contraseña-segura',
    ])->assertRedirect(route('register'))
        ->assertSessionHasErrors(['email' => 'Este correo ya está registrado en esta demostración.']);

    Storage::disk('local')->assertMissing('demo/users.json');
});

it('shows validation errors for an incomplete registration', function () {
    $this->from(route('register'))->post(route('register.store'), [
        'name' => '',
        'email' => 'no-es-correo',
        'password' => 'corta',
        'password_confirmation' => 'diferente',
    ])->assertRedirect(route('register'))
        ->assertSessionHasErrors([
            'name' => 'Escribe tu nombre.',
            'email' => 'Escribe un correo electrónico válido.',
            'password' => 'La contraseña debe tener al menos 8 caracteres.',
        ]);
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

it('keeps private destinations behind demonstration authentication', function (string $routeName, array $parameters) {
    $this->get(route($routeName, $parameters))->assertRedirectToRoute('login');
})->with([
    'inicio' => ['home', []],
    'favoritos' => ['navigation.favorites', []],
    'notificaciones' => ['navigation.notifications', []],
    'perfil' => ['navigation.profile', []],
    'finanzas' => ['finance.index', []],
    'guía de finanzas' => ['finance.guides.show', ['primera-tarjeta-de-credito']],
    'trámites' => ['procedures.index', []],
    'movilidad' => ['mobility.index', []],
    'planificador' => ['mobility.planner', []],
    'vivienda' => ['housing.index', []],
]);

it('returns to the requested page after signing in', function () {
    $this->get(route('finance.index'))->assertRedirectToRoute('login');

    $this->post(route('login.store'), [
        'email' => 'demo@ayulta.mx',
        'password' => 'ayulta123',
    ])->assertRedirect(route('finance.index'));
});

it('sends signed-in visitors away from the login and register screens', function () {
    $this->withSession(['demo_user' => ['name' => 'Alex', 'email' => 'demo@ayulta.mx', 'is_demo' => true, 'remember' => false]]);

    $this->get(route('login'))->assertRedirectToRoute('home');
    $this->get(route('register'))->assertRedirectToRoute('home');
});

it('simulates password recovery without sending email', function () {
    $this->from(route('login'))->post(route('password.recovery'), [
        'recovery_email' => 'persona@example.mx',
    ])->assertRedirect(route('login'))
        ->assertSessionHas('success', 'Recuperación simulada: no se envió ningún correo. En la demostración puedes usar demo@ayulta.mx / ayulta123.');
});

it('validates the password recovery email', function () {
    $this->from(route('login'))->post(route('password.recovery'), ['recovery_email' => 'no-es-correo'])
        ->assertRedirect(route('login'))
        ->assertSessionHasErrors(['recovery_email' => 'Escribe un correo electrónico válido.']);
});
