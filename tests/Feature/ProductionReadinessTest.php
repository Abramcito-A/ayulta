<?php

use App\Http\Middleware\ApplyRememberedSessionLifetime;
use Illuminate\Support\Facades\Storage;
use Illuminate\Testing\TestResponse;

/**
 * Sends the cookies of a previous response with the next request, as a browser would.
 */
function carryCookies(TestResponse $response): void
{
    foreach ($response->headers->getCookies() as $cookie) {
        if ($cookie->getExpiresTime() !== 0 && $cookie->getExpiresTime() < time()) {
            continue;
        }

        if ($cookie->getName() === ApplyRememberedSessionLifetime::COOKIE) {
            test()->withUnencryptedCookie($cookie->getName(), $cookie->getValue());

            continue;
        }

        test()->withCookie($cookie->getName(), $response->getCookie($cookie->getName())->getValue());
    }
}

it('answers the health check without a session or database', function () {
    config(['database.default' => 'mysql', 'session.driver' => 'cookie']);

    $this->get('/up')->assertOk();
});

it('keeps the demo login working with the cookie session driver', function () {
    config(['session.driver' => 'cookie']);

    $login = $this->post(route('login.store'), ['email' => 'demo@ayulta.mx', 'password' => 'ayulta123'])
        ->assertRedirectToRoute('home');

    carryCookies($login);

    $this->get(route('home'))->assertOk()->assertSee('Hola, Alex.');
});

it('stores registered accounts in an encrypted cookie when the filesystem is ephemeral', function () {
    config(['session.driver' => 'cookie', 'ayulta.demo_users_driver' => 'cookie']);
    Storage::fake('local');

    $register = $this->post(route('register.store'), [
        'name' => 'Ana Torres',
        'email' => 'ana@example.mx',
        'password' => 'contraseña-segura',
        'password_confirmation' => 'contraseña-segura',
    ])->assertRedirectToRoute('home');

    $accounts = json_decode($register->getCookie('ayulta_demo_accounts')->getValue(), true);

    expect($accounts['ana@example.mx']['password'])->not->toBe('contraseña-segura');
    Storage::disk('local')->assertMissing('demo/users.json');

    carryCookies($register);

    $this->post(route('login.store'), ['email' => 'ana@example.mx', 'password' => 'contraseña-segura'])
        ->assertRedirectToRoute('home')
        ->assertSessionHas('demo_user.name', 'Ana Torres');
});

it('extends the cookie session when the visitor asks to stay signed in', function () {
    config(['session.driver' => 'cookie']);

    $login = $this->post(route('login.store'), ['email' => 'demo@ayulta.mx', 'password' => 'ayulta123', 'remember' => '1']);
    $sessionCookie = $login->getCookie(config('session.cookie'), decrypt: false);

    expect($login->getCookie(ApplyRememberedSessionLifetime::COOKIE, decrypt: false)->getValue())->toBe('1')
        ->and($sessionCookie->getExpiresTime())->toBeGreaterThan(now()->addDays(13)->getTimestamp());
});

it('forgets the remember cookie on logout', function () {
    $this->withSession(['demo_user' => ['name' => 'Alex', 'email' => 'demo@ayulta.mx', 'is_demo' => true, 'remember' => true]]);

    $logout = $this->post(route('logout'));

    expect($logout->getCookie(ApplyRememberedSessionLifetime::COOKIE, decrypt: false)->getExpiresTime())->toBeLessThan(time());
});

it('serves AYULTA pages without connecting to a database', function () {
    config(['database.default' => 'mysql', 'database.connections.mysql.host' => '203.0.113.1']);

    $this->withSession(['demo_user' => ['name' => 'Alex', 'email' => 'demo@ayulta.mx', 'is_demo' => true, 'remember' => false]]);

    foreach (['home', 'finance.index', 'procedures.index', 'mobility.planner', 'housing.index', 'navigation.profile'] as $routeName) {
        $this->get(route($routeName))->assertOk();
    }

    $this->get(route('finance.guides.show', 'primera-tarjeta-de-credito'))->assertOk();
});
