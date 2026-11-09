<?php

return [
    'title' => 'Recomendaciones de seguridad al trasladarte',
    'summary' => 'Hábitos para viajar seguro a pie, en transporte público, en taxi o con aplicaciones.',
    'icon' => 'shield-check',
    'duration' => 10,

    'steps' => [
        [
            'title' => 'Introducción',
            'blocks' => [
                ['type' => 'text', 'body' => ['Moverte con seguridad depende en gran parte de hábitos sencillos: planear, mantenerte atento y saber a quién pedir ayuda.']],
                ['type' => 'objectives', 'items' => [
                    'Hábitos de seguridad para cada forma de traslado.',
                    'Qué hacer si te sientes en riesgo.',
                    'Números de emergencia.',
                ]],
            ],
        ],
        [
            'title' => 'Según cómo te muevas',
            'blocks' => [
                ['type' => 'compare', 'items' => [
                    ['title' => 'A pie', 'icon' => 'footprints', 'body' => 'Elige calles iluminadas y concurridas.', 'pros' => ['Camina de frente al tráfico si no hay banqueta.', 'Usa cruces peatonales.'], 'cons' => ['Evita usar audífonos a todo volumen.']],
                    ['title' => 'Transporte público', 'icon' => 'bus', 'body' => 'Mantente atento a tus pertenencias.', 'pros' => ['Siéntate cerca del conductor si viajas de noche.', 'Ten tu pago a la mano.'], 'cons' => ['No muestres objetos de valor.']],
                    ['title' => 'Taxi o app', 'icon' => 'car-taxi-front', 'body' => 'Usa servicios con registro del viaje.', 'pros' => ['Verifica placas, modelo y nombre del conductor antes de subir.', 'Comparte el viaje con alguien.'], 'cons' => ['No subas a unidades que no coincidan con la app.']],
                    ['title' => 'Bicicleta', 'icon' => 'bike', 'body' => 'Usa casco y luces.', 'pros' => ['Usa ciclovías cuando existan.', 'Señaliza tus giros.'], 'cons' => ['Evita circular en sentido contrario.']],
                ]],
            ],
        ],
        [
            'title' => 'Si te sientes en riesgo',
            'blocks' => [
                ['type' => 'procedure', 'items' => [
                    ['title' => 'Busca un lugar concurrido', 'body' => 'Una tienda, farmacia o negocio abierto.'],
                    ['title' => 'Pide ayuda', 'body' => 'A personal de seguridad, comercios o personas cercanas.'],
                    ['title' => 'Llama al 911', 'body' => 'Es el número de emergencias en México.'],
                    ['title' => 'Comparte tu ubicación', 'body' => 'Con alguien de confianza, en tiempo real.'],
                ]],
                ['type' => 'callout', 'tone' => 'warning', 'title' => 'Tu seguridad primero', 'body' => 'Si te intentan robar, no te resistas: tus pertenencias se pueden recuperar, tu integridad no.'],
                ['type' => 'checklist', 'id' => 'habitos', 'title' => 'Mis hábitos de seguridad', 'items' => [
                    'Comparto mi ruta cuando viajo de noche o a un lugar nuevo.',
                    'Mantengo mi celular con batería.',
                    'Conozco el 911.',
                    'Verifico el vehículo antes de subir a un taxi o app.',
                ]],
            ],
        ],
        [
            'title' => 'Pon a prueba lo que aprendiste',
            'blocks' => [
                ['type' => 'quiz', 'id' => 'evaluacion', 'questions' => [
                    ['question' => '¿Qué verificas antes de subir a un auto de una app?', 'options' => ['Nada.', 'Placas, modelo y nombre del conductor.', 'Solo el color.'], 'answer' => 1, 'explanation' => 'Confirmar que coincidan con la app te protege de subir a un vehículo equivocado.'],
                    ['question' => '¿Cuál es el número de emergencias en México?', 'options' => ['911', '123', '060'], 'answer' => 0, 'explanation' => 'El 911 es el número nacional de emergencias.'],
                ]],
            ],
        ],
    ],

    'summary_points' => [
        'Planea, mantente atento y comparte tu ubicación.',
        'Verifica el vehículo antes de subir a un taxi o app.',
        'Si estás en riesgo: lugar concurrido, pide ayuda y llama al 911.',
    ],

    'sources' => [
        ['name' => 'Municipio de Torreón', 'url' => 'https://www.torreon.gob.mx', 'description' => 'Información municipal y de seguridad.'],
    ],
];
