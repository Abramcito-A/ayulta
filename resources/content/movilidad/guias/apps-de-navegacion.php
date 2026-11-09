<?php

return [
    'title' => 'Cómo usar aplicaciones de navegación',
    'summary' => 'Busca rutas, compara opciones, consulta tráfico real y comparte tu ubicación desde tu celular.',
    'icon' => 'smartphone',
    'duration' => 10,

    'steps' => [
        [
            'title' => 'Introducción',
            'blocks' => [
                ['type' => 'text', 'body' => ['Las aplicaciones de navegación muestran rutas, tiempos estimados y tráfico en tiempo real. Son una gran ayuda, pero conviene saber interpretarlas.']],
                ['type' => 'objectives', 'items' => [
                    'Cómo buscar una ruta y elegir el modo de transporte.',
                    'Cómo leer tiempos y tráfico.',
                    'Cómo compartir tu ubicación.',
                    'Qué limitaciones tienen.',
                ]],
            ],
        ],
        [
            'title' => 'Paso a paso',
            'blocks' => [
                ['type' => 'procedure', 'items' => [
                    ['title' => 'Escribe tu destino', 'body' => 'Usa la dirección completa o el nombre del lugar.'],
                    ['title' => 'Confirma tu origen', 'body' => 'Revisa que tu ubicación actual sea correcta.'],
                    ['title' => 'Elige el modo', 'body' => 'Auto, transporte público, a pie o bicicleta.'],
                    ['title' => 'Compara opciones', 'body' => 'Revisa tiempo, transbordos y distancia caminando.'],
                    ['title' => 'Inicia la navegación', 'body' => 'Sigue las indicaciones y revisa el mapa de vez en cuando.'],
                ]],
                ['type' => 'cards', 'title' => 'Lee el tráfico', 'items' => [
                    ['title' => 'Verde', 'body' => 'Tráfico fluido.', 'icon' => 'circle'],
                    ['title' => 'Amarillo', 'body' => 'Tráfico moderado.', 'icon' => 'circle'],
                    ['title' => 'Rojo', 'body' => 'Tráfico intenso o detenido.', 'icon' => 'circle'],
                ]],
            ],
        ],
        [
            'title' => 'Recomendaciones y limitaciones',
            'blocks' => [
                ['type' => 'list', 'style' => 'check', 'items' => [
                    'Descarga el mapa de tu zona para usarlo sin datos, si la app lo permite.',
                    'Usa la función de compartir ubicación en tiempo real con alguien de confianza.',
                    'Ten el celular en un soporte si vas manejando; no lo manipules en movimiento.',
                ]],
                ['type' => 'list', 'title' => 'Limitaciones', 'style' => 'warning', 'items' => [
                    'La información de transporte público puede no estar completa o actualizada en todas las ciudades.',
                    'Los tiempos son estimaciones, no garantías.',
                    'Una ruta "más rápida" no siempre es la más segura: usa tu criterio.',
                ]],
                ['type' => 'links', 'title' => 'Aplicación de ejemplo', 'items' => [
                    ['label' => 'Google Maps', 'url' => 'https://www.google.com/maps', 'description' => 'Rutas, tráfico en tiempo real y transporte público.', 'icon' => 'map'],
                ]],
            ],
        ],
        [
            'title' => 'Pon a prueba lo que aprendiste',
            'blocks' => [
                ['type' => 'quiz', 'id' => 'evaluacion', 'questions' => [
                    ['question' => 'En un mapa de tráfico, ¿qué indica el color rojo?', 'options' => ['Tráfico fluido.', 'Tráfico intenso.', 'Calle cerrada siempre.'], 'answer' => 1, 'explanation' => 'Rojo indica tráfico intenso o detenido.'],
                    ['question' => 'Los tiempos que muestra la app son…', 'options' => ['Garantizados.', 'Estimaciones que pueden cambiar.', 'Siempre mayores al real.'], 'answer' => 1, 'explanation' => 'Son estimaciones basadas en datos disponibles.'],
                ]],
            ],
        ],
    ],

    'summary_points' => [
        'Escribe tu destino, elige el modo y compara opciones.',
        'Verde, amarillo y rojo indican el nivel de tráfico.',
        'Comparte tu ubicación y recuerda que los tiempos son estimaciones.',
    ],

    'sources' => [
        ['name' => 'Google Maps', 'url' => 'https://www.google.com/maps', 'description' => 'Aplicación de navegación de ejemplo.'],
    ],
];
