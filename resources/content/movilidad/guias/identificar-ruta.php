<?php

return [
    'title' => 'Cómo identificar una ruta de autobús',
    'summary' => 'Aprende a leer letreros, números, colores y recorridos para tomar el camión correcto.',
    'icon' => 'route',
    'duration' => 8,

    'steps' => [
        [
            'title' => 'Introducción',
            'blocks' => [
                ['type' => 'text', 'body' => ['Cada unidad de transporte muestra información para que sepas a dónde va. Aprender a leerla te evita tomar el camión equivocado.']],
                ['type' => 'objectives', 'items' => [
                    'Qué información muestra una unidad.',
                    'Cómo distinguir variantes de una misma ruta.',
                    'Cómo confirmar que vas en la dirección correcta.',
                ]],
            ],
        ],
        [
            'title' => 'Qué observar',
            'blocks' => [
                ['type' => 'cards', 'items' => [
                    ['title' => 'Número o nombre de ruta', 'body' => 'Suele estar en el parabrisas o en un costado de la unidad.', 'icon' => 'hash'],
                    ['title' => 'Destino o letrero', 'body' => 'Indica hacia dónde va y, a veces, por qué calles o zonas pasa.', 'icon' => 'flag'],
                    ['title' => 'Color de la unidad', 'body' => 'En algunas ciudades cada ruta tiene un color, pero no te guíes solo por eso.', 'icon' => 'palette'],
                    ['title' => 'Sentido del recorrido', 'body' => 'Una misma ruta pasa en ambos sentidos: confirma que vas hacia tu destino y no al lado contrario.', 'icon' => 'arrow-left-right'],
                ]],
                ['type' => 'callout', 'tone' => 'tip', 'body' => 'Practica con las rutas ilustrativas en "Rutas de transporte". Son de demostración, pero te ayudan a leer un recorrido.'],
            ],
        ],
        [
            'title' => 'Variantes y confirmación',
            'blocks' => [
                ['type' => 'procedure', 'items' => [
                    ['title' => 'Revisa si hay variantes', 'body' => 'Una ruta puede tener recorridos distintos con el mismo número. Lee el letrero completo.'],
                    ['title' => 'Pregunta al subir', 'body' => '"¿Pasa por…?" es una pregunta común y te evita errores.'],
                    ['title' => 'Sigue tu ubicación', 'body' => 'En el mapa del celular confirma que te acercas a tu destino.'],
                    ['title' => 'Si te equivocaste', 'body' => 'Bájate en la siguiente parada segura y consulta cómo regresar.'],
                ]],
                ['type' => 'example', 'title' => 'Mismo número, distinto destino', 'body' => ['Carlos vio llegar la ruta que siempre toma, pero el letrero decía otro destino final. Preguntó al conductor y resultó ser una variante que no pasaba por su trabajo. Esperó la siguiente unidad.']],
            ],
        ],
        [
            'title' => 'Pon a prueba lo que aprendiste',
            'blocks' => [
                ['type' => 'quiz', 'id' => 'evaluacion', 'questions' => [
                    ['question' => '¿Basta con el color para identificar tu ruta?', 'options' => ['Sí, siempre.', 'No, revisa también número, letrero y sentido.', 'Solo de noche.'], 'answer' => 1, 'explanation' => 'El color ayuda, pero el letrero y el sentido son lo que confirma tu ruta.'],
                    ['question' => 'Si subiste al camión equivocado…', 'options' => ['Te quedas hasta el final.', 'Te bajas en la siguiente parada segura y replanteas tu ruta.', 'Saltas del camión.'], 'answer' => 1, 'explanation' => 'Bajar en un punto seguro y consultar tu ruta es lo más práctico.'],
                ]],
            ],
        ],
    ],

    'summary_points' => [
        'Lee el número, el letrero de destino y el sentido.',
        'Algunas rutas tienen variantes: confirma antes de subir.',
        'Si te equivocas, bájate en un lugar seguro.',
    ],

    'sources' => [
        ['name' => 'Municipio de Torreón', 'url' => 'https://www.torreon.gob.mx', 'description' => 'Información municipal sobre transporte.'],
    ],
];
