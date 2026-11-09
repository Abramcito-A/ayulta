<?php

return [
    'title' => 'Qué hacer si pierdes tu transporte',
    'summary' => 'Mantén la calma y conoce tus opciones si se te va el camión, te pasas de parada o se acaban las corridas.',
    'icon' => 'clock-alert',
    'duration' => 8,

    'steps' => [
        [
            'title' => 'Introducción',
            'blocks' => [
                ['type' => 'text', 'body' => ['A todos nos ha pasado: el camión se fue, nos pasamos de parada o ya no hay corridas. Tener un plan te ayuda a resolverlo con calma y seguridad.']],
                ['type' => 'objectives', 'items' => [
                    'Qué hacer en cada situación.',
                    'Cómo elegir una alternativa segura.',
                    'Cómo prepararte para que no vuelva a pasar.',
                ]],
            ],
        ],
        [
            'title' => 'Situaciones comunes',
            'blocks' => [
                ['type' => 'cards', 'items' => [
                    ['title' => 'Se fue el camión', 'body' => 'Revisa cada cuánto pasa la ruta. Si la espera es larga, considera otra ruta que te acerque.', 'icon' => 'bus'],
                    ['title' => 'Te pasaste de parada', 'body' => 'Bájate en la siguiente parada segura y regresa caminando por calles concurridas o toma la ruta en sentido contrario.', 'icon' => 'map-pin'],
                    ['title' => 'Ya no hay corridas', 'body' => 'Usa un taxi de sitio o una app de transporte con registro del viaje, o pide a alguien de confianza que pase por ti.', 'icon' => 'moon'],
                ]],
            ],
        ],
        [
            'title' => 'Decide',
            'blocks' => [
                ['type' => 'choice', 'id' => 'noche', 'title' => 'Situación', 'icon' => 'moon', 'scenario' => 'Son las 10:30 p. m., perdiste la última corrida y estás en una parada poco iluminada.', 'options' => [
                    ['label' => 'Camino a casa por calles oscuras.', 'feedback' => 'Caminar de noche por zonas solas aumenta el riesgo.'],
                    ['label' => 'Me muevo a un lugar iluminado y pido un transporte con registro del viaje o llamo a alguien de confianza.', 'feedback' => 'Muy bien. Priorizas tu seguridad y alguien sabe dónde estás.', 'best' => true],
                    ['label' => 'Acepto el aventón de un desconocido.', 'feedback' => 'Subir con desconocidos es riesgoso. Usa opciones con registro.'],
                ], 'tip' => 'Comparte tu ubicación en tiempo real con alguien de confianza.'],
            ],
        ],
        [
            'title' => 'Prevención',
            'blocks' => [
                ['type' => 'checklist', 'id' => 'prevencion', 'title' => 'Para la próxima vez', 'items' => [
                    'Conozco el horario de la última corrida.',
                    'Tengo guardado el número de un taxi de sitio o una app confiable.',
                    'Llevo un poco de dinero extra para emergencias.',
                    'Mi celular tiene batería suficiente.',
                ]],
            ],
        ],
    ],

    'summary_points' => [
        'Mantén la calma y busca un lugar seguro e iluminado.',
        'Conoce la frecuencia y el horario de tu ruta.',
        'Ten un plan B y dinero de emergencia.',
    ],

    'sources' => [
        ['name' => 'Municipio de Torreón', 'url' => 'https://www.torreon.gob.mx', 'description' => 'Información municipal.'],
    ],
];
