<?php

use Illuminate\Support\Facades\Blade;

function demoSession(): array
{
    return ['demo_user' => ['name' => 'Alex', 'email' => 'demo@ayulta.mx', 'remember' => false]];
}

it('highlights the current tab in the bottom navigation', function () {
    $this->withSession(demoSession())
        ->get(route('navigation.favorites'))
        ->assertOk()
        ->assertSee('aria-label="Navegación principal"', false)
        ->assertSeeInOrder(['text-[#00A8E8]', 'aria-current="page"', 'Favoritos'], false);
});

it('hides the bottom navigation on authentication screens', function () {
    $this->get(route('login'))
        ->assertOk()
        ->assertDontSee('aria-label="Navegación principal"', false);
});

it('renders the input field with a password toggle and its validation error', function () {
    $html = (string) $this->withViewErrors(['password' => 'La contraseña es obligatoria.'])->blade('<x-input-field icon="lock" placeholder="Contraseña" type="password" rightIcon="eye" name="password" />');

    expect($html)->toContain('name="password"', 'pl-12', 'pr-12', 'data-password-toggle="password"', 'aria-invalid="true"', 'La contraseña es obligatoria.');
});

it('renders the input field without a right icon using narrower padding', function () {
    $html = (string) $this->blade('<x-input-field icon="mail" placeholder="Correo" type="email" name="email" />');

    expect($html)->toContain('type="email"', 'pr-4')
        ->not->toContain('data-password-toggle')
        ->and(substr_count($html, '<svg'))->toBe(1);
});

it('renders the pill button as a link or a button depending on href', function () {
    $link = Blade::render('<x-pill-button href="/x" :active="true">Todos</x-pill-button>');
    $button = Blade::render('<x-pill-button>Todos</x-pill-button>');

    expect($link)->toContain('<a href="/x"', 'bg-[#00A8E8] text-white')
        ->and($button)->toContain('<button', 'type="button"', 'border border-gray-200');
});

it('renders the card menu with its icon, description and link', function () {
    $html = Blade::render('<x-card-menu title="Finanzas" icon="wallet" description="Tu dinero" href="/finanzas" />');

    expect($html)->toContain('href="/finanzas"', 'Finanzas', 'Tu dinero', 'm9 18 6-6-6-6')
        ->and(substr_count($html, '<svg'))->toBe(2);
});
