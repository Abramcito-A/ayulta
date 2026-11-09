<?php

return [
    'title' => 'Cómo planear un recorrido',
    'summary' => 'Calcula tiempos, elige rutas y prepara alternativas para llegar a tiempo a tu destino.',
    'icon' => 'map',
    'duration' => 10,

    'steps' => [
        [
            'title' => 'Introducción',
            'blocks' => [
                ['type' => 'text', 'body' => ['Planear un recorrido te ayuda a llegar a tiempo, gastar menos y viajar con más seguridad, sobre todo cuando vas a un lugar nuevo.']],
                ['type' => 'objectives', 'items' => [
                    'Cómo definir origen, destino y hora de llegada.',
                    'Cómo calcular el tiempo total.',
                    'Cómo preparar una alternativa.',
                ]],
            ],
        ],
        [
            'title' => 'Paso a paso',
            'blocks' => [
                ['type' => 'procedure', 'items' => [
                    ['title' => 'Define tu destino y tu hora de llegada', 'body' => 'Por ejemplo, "entrevista a las 10:00".'],
                    ['title' => 'Busca opciones de ruta', 'body' => 'En una app de navegación o preguntando a personas de confianza.'],
                    ['title' => 'Calcula el tiempo total', 'body' => 'Caminata + espera + viaje + transbordos + caminata final.'],
                    ['title' => 'Agrega tiempo extra', 'body' => 'Suma un margen, sobre todo en hora pico o si es tu primera vez.'],
                    ['title' => 'Prepara un plan B', 'body' => 'Otra ruta, un taxi o una app por si algo falla.'],
                ]],
                ['type' => 'example', 'title' => 'Calcula tu hora de salida', 'rows' => [
                    ['label' => 'Caminar a la parada', 'value' => '8 min'],
                    ['label' => 'Esperar la unidad', 'value' => '10 min'],
                    ['label' => 'Viaje', 'value' => '25 min'],
                    ['label' => 'Caminar al destino', 'value' => '5 min'],
                    ['label' => 'Margen de seguridad', 'value' => '15 min'],
                    ['label' => 'Sal con al menos', 'value' => '63 min de anticipación', 'total' => true],
                ], 'note' => 'Tiempos ilustrativos.'],
            ],
        ],
        [
            'title' => 'Practica',
            'blocks' => [
                ['type' => 'text', 'body' => ['Usa el planificador demostrativo de AYULTA para practicar. Recuerda que es un ejemplo y no un planificador en tiempo real.']],
                ['type' => 'links', 'title' => 'Herramientas', 'items' => [
                    ['label' => 'Google Maps', 'url' => 'https://www.google.com/maps', 'description' => 'Consulta rutas reales y tiempos estimados.', 'icon' => 'map'],
                ]],
                ['type' => 'list', 'title' => 'Recomendaciones', 'style' => 'check', 'items' => [
                    'Haz el recorrido un día antes si es algo importante.',
                    'Revisa el horario de la última corrida si regresarás tarde.',
                    'Comparte tu ruta con alguien de confianza.',
                ]],
            ],
        ],
        [
            'title' => 'Pon a prueba lo que aprendiste',
            'blocks' => [
                ['type' => 'quiz', 'id' => 'evaluacion', 'questions' => [
                    ['question' => '¿Qué debes sumar para calcular tu tiempo total?', 'options' => ['Solo el tiempo de viaje.', 'Caminata, espera, viaje, transbordos y un margen.', 'Nada, se calcula solo.'], 'answer' => 1, 'explanation' => 'Todas las etapas cuentan, y el margen te protege de imprevistos.'],
                    ['question' => '¿Para qué sirve un plan B?', 'options' => ['Para no llegar.', 'Para tener una alternativa si algo falla.', 'Para gastar más.'], 'answer' => 1, 'explanation' => 'Una alternativa te da tranquilidad si tu ruta principal se retrasa.'],
                ]],
            ],
        ],
    ],

    'summary_points' => [
        'Define destino y hora de llegada.',
        'Suma todas las etapas y un margen de seguridad.',
        'Ten siempre un plan B.',
    ],

    'sources' => [
        ['name' => 'Municipio de Torreón', 'url' => 'https://www.torreon.gob.mx', 'description' => 'Información de movilidad municipal.'],
    ],
];
