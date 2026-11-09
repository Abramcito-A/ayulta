<?php

use Illuminate\Support\Facades\Blade;

function demoSession(): array
{
    return ['demo_user' => ['name' => 'Alex', 'email' => 'demo@ayulta.mx', 'is_demo' => true, 'remember' => false]];
}

it('highlights the current tab in the bottom navigation', function (string $routeName, string $label) {
    $this->withSession(demoSession())
        ->get(route($routeName))
        ->assertOk()
        ->assertSee('aria-label="Navegación principal"', false)
        ->assertSeeInOrder(['bottom-nav__item is-active', 'aria-current="page"', $label], false);
})->with([
    'inicio' => ['home', 'Inicio'],
    'favoritos' => ['navigation.favorites', 'Favoritos'],
    'notificaciones' => ['navigation.notifications', 'Notificaciones'],
    'perfil' => ['navigation.profile', 'Perfil'],
]);

it('hides the bottom navigation on authentication screens', function (string $routeName) {
    $this->get(route($routeName))
        ->assertOk()
        ->assertDontSee('aria-label="Navegación principal"', false);
})->with(['login', 'register']);

it('renders the profile with the account data and a logout form', function () {
    $this->withSession(demoSession())
        ->get(route('navigation.profile'))
        ->assertOk()
        ->assertSee('Alex')
        ->assertSee('demo@ayulta.mx')
        ->assertSee('Principiante')
        ->assertSee('action="'.route('logout').'"', false);
});

it('lists every guide on the favorites screen, hidden until saved, with an empty state', function () {
    $this->withSession(demoSession())
        ->get(route('navigation.favorites'))
        ->assertOk()
        ->assertSee('data-favorite-item="finanzas/primera-tarjeta-de-credito"', false)
        ->assertSee('data-favorite-item="vivienda/fraudes-de-vivienda"', false)
        ->assertSee('Aún no tienes favoritos');
});

it('shows educational reminders on the notifications screen', function () {
    $this->withSession(demoSession())
        ->get(route('navigation.notifications'))
        ->assertOk()
        ->assertSee('Tu banco nunca te pedirá tu NIP')
        ->assertSee(route('finance.guides.show', 'evita-fraudes'), false);
});

it('renders the button as a link or a button depending on href', function () {
    $link = Blade::render('<x-ui.button href="/x">Ir</x-ui.button>');
    $button = Blade::render('<x-ui.button variant="secondary">Ir</x-ui.button>');

    expect($link)->toContain('<a href="/x"', 'btn--primary')
        ->and($button)->toContain('<button type="button"', 'btn--secondary');
});

it('renders the input with a password toggle and its validation error', function () {
    $html = (string) $this->withViewErrors(['password' => 'La contraseña es obligatoria.'])
        ->blade('<x-ui.input name="password" label="Contraseña" type="password" icon="lock" toggle />');

    expect($html)->toContain('name="password"', 'data-password-toggle="password"', 'aria-invalid="true"', 'La contraseña es obligatoria.')
        ->not->toContain('value=');
});

it('keeps the previous value of non-password inputs', function () {
    $html = (string) $this->blade('<x-ui.input name="email" label="Correo" type="email" value="ana@example.mx" />');

    expect($html)->toContain('value="ana@example.mx"')
        ->not->toContain('data-password-toggle');
});
