<?php

return [
    'title' => 'Cómo utilizar el transporte público',
    'summary' => 'Desde esperar en la parada hasta bajarte en tu destino: todo lo que necesitas para tu primer viaje en camión.',
    'icon' => 'bus',
    'duration' => 10,

    'steps' => [
        [
            'title' => 'Introducción',
            'blocks' => [
                ['type' => 'text', 'body' => ['El transporte público es una de las formas más económicas de moverte por la ciudad. Usarlo por primera vez puede dar nervios, pero con un poco de preparación es sencillo.']],
                ['type' => 'objectives', 'items' => [
                    'Qué preparar antes de salir.',
                    'Cómo subir, pagar y viajar.',
                    'Cómo saber cuándo bajar.',
                    'Recomendaciones de convivencia y seguridad.',
                ]],
            ],
        ],
        [
            'title' => 'Antes de salir',
            'blocks' => [
                ['type' => 'checklist', 'id' => 'antes', 'title' => 'Prepárate', 'items' => [
                    'Sé qué ruta me lleva a mi destino.',
                    'Sé dónde está la parada más cercana.',
                    'Llevo el pago exacto o mi tarjeta de transporte, si existe en mi ciudad.',
                    'Mi celular tiene batería.',
                    'Le dije a alguien a dónde voy (si es un viaje nuevo).',
                ]],
                ['type' => 'callout', 'tone' => 'tip', 'body' => 'Pregunta a personas de confianza o consulta una aplicación de navegación para confirmar qué ruta tomar.'],
            ],
        ],
        [
            'title' => 'Paso a paso de tu viaje',
            'blocks' => [
                ['type' => 'procedure', 'items' => [
                    ['title' => 'Espera en la parada', 'body' => 'Ubícate en un lugar visible y seguro. Ten tu pago a la mano.'],
                    ['title' => 'Identifica la unidad', 'body' => 'Revisa el número o nombre de la ruta y el destino en el letrero del parabrisas.'],
                    ['title' => 'Haz la parada', 'body' => 'Levanta la mano con anticipación para que el conductor se detenga.'],
                    ['title' => 'Sube y paga', 'body' => 'Paga al subir y, si tienes dudas, pregunta al conductor si la unidad pasa por tu destino.'],
                    ['title' => 'Ubícate', 'body' => 'Si vas de pie, sujétate bien. Cede el asiento a quien lo necesite.'],
                    ['title' => 'Avisa tu bajada', 'body' => 'Toca el timbre o avisa al conductor una cuadra antes.'],
                    ['title' => 'Baja con cuidado', 'body' => 'Espera a que la unidad se detenga por completo y revisa que no vengan motos o bicicletas.'],
                ]],
            ],
        ],
        [
            'title' => 'Ejemplo',
            'blocks' => [
                ['type' => 'example', 'title' => 'Tu primer viaje a la escuela', 'body' => ['Sofía necesita llegar a su escuela. Revisó en una app que la ruta que le sirve pasa a dos cuadras de su casa. Salió 15 minutos antes para tener margen, identificó la ruta por el letrero y pidió su bajada una cuadra antes con el timbre.']],
                ['type' => 'callout', 'tone' => 'tip', 'body' => 'Los primeros viajes, sigue tu ubicación en el mapa del celular para saber cuánto falta.'],
            ],
        ],
        [
            'title' => 'Recomendaciones',
            'blocks' => [
                ['type' => 'list', 'style' => 'check', 'items' => [
                    'Ten a la mano tu pago para no sacar la cartera completa.',
                    'Guarda tu celular cuando no lo uses.',
                    'Respeta los asientos preferentes.',
                    'Si te sientes inseguro, bájate en un lugar concurrido y pide ayuda.',
                ]],
                ['type' => 'list', 'title' => 'Errores frecuentes', 'style' => 'cross', 'items' => [
                    'No revisar el destino de la unidad (algunas rutas tienen variantes).',
                    'Esperar a pedir la bajada en el último momento.',
                    'Salir sin tiempo extra en hora pico.',
                ]],
            ],
        ],
        [
            'title' => 'Pon a prueba lo que aprendiste',
            'blocks' => [
                ['type' => 'quiz', 'id' => 'evaluacion', 'questions' => [
                    ['question' => '¿Cuándo debes avisar tu bajada?', 'options' => ['Justo en tu parada.', 'Con anticipación, alrededor de una cuadra antes.', 'Cuando el camión se detenga.'], 'answer' => 1, 'explanation' => 'Avisar con anticipación da tiempo al conductor de detenerse con seguridad.'],
                    ['question' => '¿Qué revisas para saber si es tu ruta?', 'options' => ['El color del asiento.', 'El número o nombre de la ruta y su destino.', 'La velocidad.'], 'answer' => 1, 'explanation' => 'El letrero indica la ruta y su destino; algunas rutas tienen variantes.'],
                ]],
            ],
        ],
    ],

    'summary_points' => [
        'Planea tu ruta y ten tu pago listo.',
        'Identifica la unidad por su letrero y pide la parada con la mano.',
        'Avisa tu bajada con anticipación y baja con cuidado.',
    ],

    'sources' => [
        ['name' => 'Municipio de Torreón', 'url' => 'https://www.torreon.gob.mx', 'description' => 'Información municipal sobre transporte y movilidad.'],
    ],
];
