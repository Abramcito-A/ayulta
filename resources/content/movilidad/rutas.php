<?php

/*
|--------------------------------------------------------------------------
| Illustrative transport routes (Torreón, Coahuila)
|--------------------------------------------------------------------------
|
| These routes are DEMONSTRATIONS. Names, paths and stops are fictitious and
| only teach how to read a route. They are not official routes. Map points use
| a 0-320 x 0-220 coordinate system for the illustrative SVG.
|
*/

return [
    [
        'key' => 'demo-a',
        'name' => 'Ruta Demo A',
        'label' => 'Centro ↔ Oriente',
        'color' => '#00A8E8',
        'description' => 'Recorrido ilustrativo que conecta una zona centro con una zona oriente pasando por una avenida principal.',
        'frequency' => 'Ejemplo: una unidad cada 10 a 15 minutos en horario de mayor demanda.',
        'schedule' => 'Ejemplo: de 6:00 a 21:00 h.',
        'points' => [[24, 168], [80, 168], [80, 112], [176, 112], [176, 64], [296, 64]],
        'stops' => [
            ['name' => 'Parada 1 · Zona Centro', 'note' => 'Inicio del recorrido. Punto con varias conexiones.', 'x' => 24, 'y' => 168],
            ['name' => 'Parada 2 · Mercado (ejemplo)', 'note' => 'Zona comercial con mucha afluencia.', 'x' => 80, 'y' => 140],
            ['name' => 'Parada 3 · Avenida principal', 'note' => 'Aquí puedes transbordar con la Ruta Demo B.', 'x' => 128, 'y' => 112],
            ['name' => 'Parada 4 · Hospital (ejemplo)', 'note' => 'Parada cercana a servicios de salud.', 'x' => 176, 'y' => 88],
            ['name' => 'Parada 5 · Zona Oriente', 'note' => 'Fin del recorrido. La unidad regresa por la misma vía.', 'x' => 296, 'y' => 64],
        ],
    ],
    [
        'key' => 'demo-b',
        'name' => 'Ruta Demo B',
        'label' => 'Norte ↔ Sur',
        'color' => '#0F172A',
        'description' => 'Recorrido ilustrativo que cruza la ciudad de norte a sur y se cruza con la Ruta Demo A.',
        'frequency' => 'Ejemplo: una unidad cada 15 a 20 minutos.',
        'schedule' => 'Ejemplo: de 6:30 a 20:30 h.',
        'points' => [[128, 16], [128, 112], [232, 112], [232, 204]],
        'stops' => [
            ['name' => 'Parada 1 · Zona Norte', 'note' => 'Inicio del recorrido, cerca de una zona habitacional.', 'x' => 128, 'y' => 16],
            ['name' => 'Parada 2 · Escuela (ejemplo)', 'note' => 'Mucha demanda en horarios de entrada y salida escolar.', 'x' => 128, 'y' => 64],
            ['name' => 'Parada 3 · Avenida principal', 'note' => 'Transbordo con la Ruta Demo A.', 'x' => 128, 'y' => 112],
            ['name' => 'Parada 4 · Plaza comercial (ejemplo)', 'note' => 'Zona de comercios y servicios.', 'x' => 232, 'y' => 148],
            ['name' => 'Parada 5 · Zona Sur', 'note' => 'Fin del recorrido.', 'x' => 232, 'y' => 204],
        ],
    ],
];
