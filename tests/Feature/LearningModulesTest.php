<?php

use App\Support\LearningContent;

function signedIn(): array
{
    return ['demo_user' => ['name' => 'Alex', 'email' => 'demo@ayulta.mx', 'is_demo' => true, 'remember' => false]];
}

/**
 * @return array<string, array{string, string}>
 */
function activityDataset(string $kind): array
{
    $modules = require dirname(__DIR__, 2).'/resources/content/modules.php';
    $routes = ['finanzas' => 'finance', 'tramites' => 'procedures', 'movilidad' => 'mobility', 'vivienda' => 'housing'];
    $dataset = [];

    foreach ($modules as $moduleKey => $module) {
        foreach ($module[$kind] as $slug) {
            $dataset["{$moduleKey}/{$slug}"] = [$routes[$moduleKey], $slug];
        }
    }

    return $dataset;
}

it('shows the four modules on the home screen with working links', function () {
    $response = $this->withSession(signedIn())->get(route('home'))->assertOk();

    foreach (['finance', 'procedures', 'mobility', 'housing'] as $route) {
        $response->assertSee('href="'.route($route.'.index').'"', false);
    }

    $response->assertSee('Aprende a administrar tu dinero y tomar mejores decisiones económicas.')
        ->assertSee('Prepárate para rentar, comprar o independizarte.');
});

it('offers the expected number of guides in each module', function (string $route, int $guides, int $experiences) {
    $response = $this->withSession(signedIn())->get(route($route.'.index'))->assertOk();

    expect(substr_count($response->getContent(), 'data-activity-card='))->toBe($guides + $experiences);
})->with([
    'finanzas: 5 guías y 3 experiencias' => ['finance', 5, 3],
    'trámites: 6 guías' => ['procedures', 6, 0],
    'movilidad: 6 guías' => ['mobility', 6, 0],
    'vivienda: 7 guías y 2 experiencias' => ['housing', 7, 2],
]);

it('renders every guide as a step-by-step activity with a summary', function (string $route, string $slug) {
    $this->withSession(signedIn())
        ->get(route($route.'.guides.show', $slug))
        ->assertOk()
        ->assertSee('data-activity="', false)
        ->assertSee('data-step="0"', false)
        ->assertSee('Resumen y cierre')
        ->assertSee('data-complete-activity', false);
})->with(activityDataset('guides'));

it('renders every interactive experience', function (string $route, string $slug) {
    $this->withSession(signedIn())
        ->get(route($route.'.experiences.show', $slug))
        ->assertOk()
        ->assertSee('Experiencia interactiva')
        ->assertSee('data-tool="', false);
})->with(activityDataset('experiences'));

it('returns not found for a guide that does not exist', function () {
    $this->withSession(signedIn())
        ->get(route('finance.guides.show', 'guia-inexistente'))
        ->assertNotFound();
});

it('does not serve an experience from a module that does not define it', function () {
    $this->withSession(signedIn())
        ->get(route('housing.experiences.show', 'mi-primer-ahorro'))
        ->assertNotFound();
});

it('lets the credit card guide adapt to three different paths', function () {
    $this->withSession(signedIn())
        ->get(route('finance.guides.show', 'primera-tarjeta-de-credito'))
        ->assertOk()
        ->assertSee('data-paths="sin-credito"', false)
        ->assertSee('data-paths="trabajo"', false)
        ->assertSee('data-paths="digital"', false);
});

it('cites official sources with https links on every guide', function () {
    $content = app(LearningContent::class);

    foreach (['finanzas', 'tramites', 'movilidad', 'vivienda'] as $module) {
        foreach ($content->guides($module) as $guide) {
            expect($guide['sources'])->not->toBeEmpty("{$guide['id']} has no sources");

            foreach ($guide['sources'] as $source) {
                expect($source['url'])->toStartWith('https://');
            }
        }
    }
});

it('labels the mobility tools as demonstrations', function (string $route, string $label) {
    $this->withSession(signedIn())
        ->get(route($route))
        ->assertOk()
        ->assertSee($label);
})->with([
    'rutas' => ['mobility.routes', 'Rutas de demostración'],
    'planificador' => ['mobility.planner', 'No es un planificador en tiempo real'],
    'tráfico' => ['mobility.traffic', 'Ejemplo visual · No es tráfico en tiempo real'],
]);

it('shows both illustrative routes with their stops', function () {
    $this->withSession(signedIn())
        ->get(route('mobility.routes'))
        ->assertOk()
        ->assertSee('Ruta Demo A')
        ->assertSee('Ruta Demo B')
        ->assertSee('Parada 5 · Zona Oriente');
});

it('points the office locator to official sites without invented addresses', function () {
    $this->withSession(signedIn())
        ->get(route('procedures.offices'))
        ->assertOk()
        ->assertSee('Sin direcciones inventadas')
        ->assertSee('https://citas.sat.gob.mx', false)
        ->assertSee('Enlaces consultados el');
});

it('redirects the old module addresses to the new ones', function () {
    $this->withSession(signedIn())
        ->get('/modulos/finanzas')
        ->assertRedirect('/finanzas')
        ->assertStatus(301);
});
