<?php

return [
    'title' => 'Cómo funciona Infonavit',
    'summary' => 'Del ahorro en tu Subcuenta de Vivienda al pago de tu crédito: cómo usar Infonavit para tu hogar.',
    'icon' => 'building-2',
    'duration' => 20,

    'steps' => [
        [
            'title' => 'Introducción',
            'blocks' => [
                ['type' => 'text', 'body' => [
                    'Si trabajas formalmente en el sector privado, tienes un ahorro para vivienda en Infonavit. Entender cómo funciona te ayuda a decidir si te conviene usarlo para comprar, construir o mejorar tu hogar.',
                ]],
                ['type' => 'objectives', 'items' => [
                    'De dónde sale tu ahorro para vivienda.',
                    'Cómo se evalúa si puedes obtener un crédito.',
                    'Cómo se paga un crédito Infonavit.',
                    'Qué pasa si pierdes tu empleo.',
                    'Errores comunes y cómo evitarlos.',
                ]],
            ],
        ],
        [
            'title' => 'Tu ahorro para vivienda',
            'blocks' => [
                ['type' => 'procedure', 'items' => [
                    ['title' => 'Tu patrón aporta', 'body' => 'El equivalente al 5% de tu salario base de cotización, sin descontarlo de tu sueldo.'],
                    ['title' => 'Se acumula en tu Subcuenta de Vivienda', 'body' => 'Junto con sus rendimientos.'],
                    ['title' => 'Puedes usarlo', 'body' => 'Como parte de un crédito para vivienda.'],
                    ['title' => 'Si no lo usas', 'body' => 'Existen reglas para recuperarlo al retirarte.'],
                ]],
                ['type' => 'callout', 'tone' => 'tip', 'body' => 'Revisa en Mi Cuenta Infonavit que tus aportaciones estén registradas.'],
            ],
        ],
        [
            'title' => 'La precalificación',
            'blocks' => [
                ['type' => 'text', 'body' => ['Infonavit evalúa si puedes recibir un crédito y por cuánto, considerando factores como tu edad, salario, ahorro y el tiempo que llevas cotizando de forma continua. Los criterios pueden actualizarse.']],
                ['type' => 'list', 'title' => 'Cómo mejorar tu situación', 'style' => 'check', 'items' => [
                    'Mantener un empleo formal de manera continua.',
                    'Revisar que tu patrón haga las aportaciones.',
                    'Mantener tus datos actualizados en Mi Cuenta Infonavit.',
                ]],
            ],
        ],
        [
            'title' => 'Cómo se paga el crédito',
            'blocks' => [
                ['type' => 'cards', 'items' => [
                    ['title' => 'Descuento por nómina', 'body' => 'Mientras trabajas, tu patrón descuenta el pago de tu sueldo y lo entrega a Infonavit.', 'icon' => 'banknote'],
                    ['title' => 'Aportaciones patronales', 'body' => 'Mientras tienes crédito, las aportaciones de tu patrón ayudan a pagarlo.', 'icon' => 'building-2'],
                    ['title' => 'Pago directo', 'body' => 'Si dejas de tener relación laboral, debes pagar directamente por los canales oficiales.', 'icon' => 'wallet'],
                ]],
            ],
        ],
        [
            'title' => 'Si pierdes tu empleo',
            'blocks' => [
                ['type' => 'list', 'style' => 'check', 'items' => [
                    'El crédito no desaparece: debes seguir pagando directamente.',
                    'Infonavit cuenta con apoyos para acreditados que pierden su empleo; infórmate en sus canales oficiales.',
                    'Comunícate pronto: actuar a tiempo evita que la deuda crezca.',
                ]],
                ['type' => 'callout', 'tone' => 'warning', 'body' => 'Desconfía de quien te ofrezca "congelar" o "liquidar" tu crédito a cambio de dinero. Usa solo canales oficiales.'],
            ],
        ],
        [
            'title' => 'Errores comunes y recomendaciones',
            'blocks' => [
                ['type' => 'list', 'title' => 'Errores comunes', 'style' => 'cross', 'items' => [
                    'Pagar a gestores o "coyotes" para obtener el crédito.',
                    'Comprar una vivienda lejos de tu trabajo o escuela sin considerar el costo del traslado.',
                    'No visitar la vivienda antes de comprar.',
                    'No revisar los gastos adicionales.',
                ]],
                ['type' => 'list', 'title' => 'Recomendaciones', 'style' => 'check', 'items' => [
                    'Consulta tu precalificación con tiempo.',
                    'Compara opciones de vivienda y ubicación.',
                    'Lee todos los documentos antes de firmar.',
                ]],
                ['type' => 'links', 'items' => [
                    ['label' => 'Infonavit en gob.mx', 'url' => 'https://www.gob.mx/infonavit', 'description' => 'Información oficial.', 'icon' => 'building-2'],
                    ['label' => 'Mi Cuenta Infonavit', 'url' => 'https://micuenta.infonavit.org.mx', 'description' => 'Ahorro, precalificación y trámites.', 'icon' => 'user-round'],
                ]],
            ],
        ],
        [
            'title' => 'Pon a prueba lo que aprendiste',
            'blocks' => [
                ['type' => 'quiz', 'id' => 'evaluacion', 'questions' => [
                    ['question' => 'Si pierdes tu empleo y tienes crédito Infonavit…', 'options' => ['El crédito se cancela.', 'Debes seguir pagando directamente.', 'Lo paga tu antiguo patrón.'], 'answer' => 1, 'explanation' => 'La deuda continúa; existen apoyos, pero debes comunicarte con Infonavit.'],
                    ['question' => '¿Qué factores considera la precalificación?', 'options' => ['Tu color favorito.', 'Edad, salario, ahorro y tiempo cotizando, entre otros.', 'Solo tu nombre.'], 'answer' => 1, 'explanation' => 'Varios factores determinan si puedes acceder a un crédito y por cuánto.'],
                ]],
            ],
        ],
    ],

    'summary_points' => [
        'Tu patrón aporta a tu Subcuenta de Vivienda.',
        'La precalificación considera edad, salario, ahorro y continuidad laboral.',
        'El crédito se paga por nómina; si pierdes tu empleo, pagas directamente.',
        'Todos los trámites son gratuitos: evita intermediarios.',
    ],

    'sources' => [
        ['name' => 'Infonavit', 'url' => 'https://www.gob.mx/infonavit', 'description' => 'Información oficial.'],
        ['name' => 'Mi Cuenta Infonavit', 'url' => 'https://micuenta.infonavit.org.mx', 'description' => 'Portal de derechohabientes.'],
    ],
];
