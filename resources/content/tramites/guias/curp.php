<?php

return [
    'title' => 'Consulta y descarga tu CURP',
    'summary' => 'Qué es la CURP, cómo buscarla y descargarla gratis, y qué hacer si tiene errores o está duplicada.',
    'icon' => 'fingerprint',
    'duration' => 10,

    'paths' => [
        'question' => '¿Qué quieres hacer?',
        'options' => [
            'consultar' => ['label' => 'Consultar mi CURP', 'description' => 'Ya conozco mi clave y quiero verificarla.', 'icon' => 'search'],
            'descargar' => ['label' => 'Descargarla', 'description' => 'Necesito el formato para un trámite.', 'icon' => 'download'],
            'buscar' => ['label' => 'Buscarla con mis datos', 'description' => 'No recuerdo mi clave.', 'icon' => 'user-round'],
            'corregir' => ['label' => 'Corregir errores', 'description' => 'Tiene un dato incorrecto o está duplicada.', 'icon' => 'circle-alert'],
        ],
    ],

    'steps' => [
        [
            'title' => 'Introducción',
            'blocks' => [
                ['type' => 'text', 'body' => [
                    'La Clave Única de Registro de Población (CURP) es un código de 18 caracteres que identifica a cada persona registrada en México. La administra el Registro Nacional de Población (RENAPO).',
                    'Te la piden para inscribirte en la escuela, trabajar, obtener tu RFC, tramitar tu pasaporte y muchos otros servicios. Consultarla y descargarla es gratis.',
                ]],
                ['type' => 'objectives', 'items' => [
                    'Para qué sirve la CURP.',
                    'Cómo buscarla y descargarla.',
                    'Cómo identificar errores.',
                    'Qué hacer ante duplicidades o inconsistencias.',
                ]],
            ],
        ],
        [
            'title' => 'Cómo se forma tu CURP',
            'blocks' => [
                ['type' => 'table', 'headers' => ['Parte', 'Qué representa'], 'rows' => [
                    ['Primeras 4 letras', 'Iniciales de tus apellidos y nombre.'],
                    ['6 números', 'Tu fecha de nacimiento (año, mes, día).'],
                    ['1 letra', 'Sexo registrado.'],
                    ['2 letras', 'Entidad de nacimiento.'],
                    ['3 letras', 'Consonantes internas de tus apellidos y nombre.'],
                    ['2 caracteres finales', 'Asignados para evitar claves repetidas.'],
                ]],
                ['type' => 'callout', 'tone' => 'tip', 'body' => 'Si conoces la estructura, puedes detectar errores rápidamente: por ejemplo, una fecha de nacimiento equivocada.'],
            ],
        ],
        [
            'title' => 'Elige qué necesitas',
            'blocks' => [
                ['type' => 'paths'],
            ],
        ],
        [
            'title' => 'Consultar y descargar',
            'paths' => ['consultar', 'descargar'],
            'blocks' => [
                ['type' => 'procedure', 'items' => [
                    ['title' => 'Entra a gob.mx/curp', 'body' => 'Es el sitio oficial. Escribe la dirección tú mismo.'],
                    ['title' => 'Escribe tu CURP', 'body' => 'Y resuelve la verificación de seguridad.'],
                    ['title' => 'Revisa tus datos', 'body' => 'Compáralos con tu acta de nacimiento.'],
                    ['title' => 'Descarga el PDF', 'body' => 'El formato que se descarga del sitio oficial es válido para trámites. Guárdalo en tu celular.'],
                ]],
            ],
        ],
        [
            'title' => 'Buscarla con tus datos',
            'paths' => ['buscar'],
            'blocks' => [
                ['type' => 'procedure', 'items' => [
                    ['title' => 'Elige la búsqueda por datos personales', 'body' => 'En gob.mx/curp.'],
                    ['title' => 'Captura tus datos tal como aparecen en tu acta', 'body' => 'Nombre(s), apellidos, fecha de nacimiento, sexo y entidad de nacimiento.'],
                    ['title' => 'Revisa el resultado', 'body' => 'Si no aparece, prueba con variantes de tu nombre como está escrito en tu acta (acentos, nombres compuestos).'],
                ]],
            ],
        ],
        [
            'title' => 'Errores y duplicidades',
            'paths' => ['corregir'],
            'blocks' => [
                ['type' => 'cards', 'items' => [
                    ['title' => 'El error está en tu acta de nacimiento', 'body' => 'La corrección se hace primero en el Registro Civil. Después se actualiza la CURP.', 'icon' => 'file-pen'],
                    ['title' => 'Tu acta está bien, pero la CURP no', 'body' => 'Solicita la corrección ante la autoridad que indique el portal: generalmente el Registro Civil o un módulo de atención de la CURP de tu entidad.', 'icon' => 'circle-alert'],
                    ['title' => 'Tienes dos CURP (duplicidad)', 'body' => 'Debes conservar solo una. Consulta con RENAPO o en un módulo de atención cómo solicitar la baja de la clave duplicada.', 'icon' => 'copy'],
                ]],
                ['type' => 'list', 'title' => 'Lleva contigo', 'style' => 'check', 'items' => [
                    'Tu acta de nacimiento.',
                    'Una identificación oficial.',
                    'Las CURP que aparecen con error o duplicadas, impresas o en tu celular.',
                ]],
            ],
        ],
        [
            'title' => 'Recomendaciones',
            'blocks' => [
                ['type' => 'list', 'style' => 'check', 'items' => [
                    'Usa solo el sitio oficial; la consulta es gratuita.',
                    'No pagues a páginas o personas que ofrecen "descargar tu CURP".',
                    'Guarda una copia en PDF en tu celular y en tu correo.',
                    'Revisa tu CURP antes de trámites importantes como el RFC o el pasaporte.',
                ]],
                ['type' => 'links', 'items' => [
                    ['label' => 'Consulta tu CURP', 'url' => 'https://www.gob.mx/curp', 'description' => 'Consulta y descarga oficial y gratuita.', 'icon' => 'fingerprint'],
                    ['label' => 'RENAPO', 'url' => 'https://www.gob.mx/segob/renapo', 'description' => 'Registro Nacional de Población.', 'icon' => 'landmark'],
                ]],
            ],
        ],
        [
            'title' => 'Pon a prueba lo que aprendiste',
            'blocks' => [
                ['type' => 'quiz', 'id' => 'evaluacion', 'questions' => [
                    ['question' => '¿Cuánto cuesta descargar tu CURP?', 'options' => ['Es gratis en el sitio oficial.', 'Se paga en línea.', 'Depende del estado.'], 'answer' => 0, 'explanation' => 'La consulta y descarga en gob.mx/curp es gratuita.'],
                    ['question' => 'Si tu acta de nacimiento tiene un error…', 'options' => ['Corriges directamente la CURP.', 'Primero corriges el acta en el Registro Civil.', 'No pasa nada.'], 'answer' => 1, 'explanation' => 'La CURP se basa en tu acta: si el acta está mal, corrígela primero.'],
                    ['question' => '¿Cuántos caracteres tiene la CURP?', 'options' => ['13', '18', '10'], 'answer' => 1, 'explanation' => 'La CURP tiene 18 caracteres; el RFC de persona física tiene 13.'],
                ]],
            ],
        ],
    ],

    'summary_points' => [
        'La CURP es tu clave única de 18 caracteres.',
        'Consúltala y descárgala gratis en gob.mx/curp.',
        'Si el error está en tu acta, corrígelo primero en el Registro Civil.',
        'Si tienes una CURP duplicada, solicita la baja de una.',
    ],

    'sources' => [
        ['name' => 'Consulta de CURP (gob.mx)', 'url' => 'https://www.gob.mx/curp', 'description' => 'Consulta y descarga oficial.'],
        ['name' => 'RENAPO', 'url' => 'https://www.gob.mx/segob/renapo', 'description' => 'Registro Nacional de Población.'],
    ],
];
