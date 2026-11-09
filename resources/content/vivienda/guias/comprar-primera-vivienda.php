<?php

return [
    'title' => 'Cómo comprar tu primera vivienda',
    'summary' => 'Formas de pago, costos que nadie te dice, documentos a revisar y los pasos para comprar con seguridad.',
    'icon' => 'house',
    'duration' => 25,

    'paths' => [
        'question' => '¿Cómo planeas pagar?',
        'options' => [
            'infonavit' => ['label' => 'Con crédito Infonavit', 'description' => 'Trabajo formalmente y tengo Subcuenta de Vivienda.', 'icon' => 'building-2'],
            'bancario' => ['label' => 'Con crédito hipotecario bancario', 'description' => 'Pediré un préstamo a un banco.', 'icon' => 'landmark'],
            'contado' => ['label' => 'De contado o con ahorro propio', 'description' => 'Pagaré con mis recursos.', 'icon' => 'wallet'],
        ],
    ],

    'steps' => [
        [
            'title' => 'Introducción',
            'blocks' => [
                ['type' => 'text', 'body' => [
                    'Comprar una vivienda es, para muchas personas, la decisión financiera más grande de su vida. Requiere planeación, ahorro y revisar con cuidado los documentos.',
                ]],
                ['type' => 'objectives', 'items' => [
                    'Las formas de pagar una vivienda.',
                    'Los costos además del precio.',
                    'Qué documentos revisar para evitar problemas legales.',
                    'Los pasos de la compra hasta la escrituración.',
                ]],
                ['type' => 'callout', 'tone' => 'info', 'body' => 'Esta guía es educativa. Para una compra real, apóyate en un notario público y en las instituciones oficiales.'],
            ],
        ],
        [
            'title' => 'Conceptos básicos',
            'blocks' => [
                ['type' => 'terms', 'items' => [
                    ['term' => 'Enganche', 'definition' => 'La parte del precio que pagas con tus recursos al inicio. Los créditos hipotecarios suelen pedir un porcentaje como enganche.'],
                    ['term' => 'Crédito hipotecario', 'definition' => 'Un préstamo de largo plazo para comprar una vivienda, que queda como garantía hasta que lo pagas.'],
                    ['term' => 'Avalúo', 'definition' => 'Un estudio hecho por un perito que determina el valor de la vivienda.'],
                    ['term' => 'Escrituración', 'definition' => 'El proceso ante notario para formalizar la compra y registrar que la vivienda es tuya.'],
                    ['term' => 'Certificado de libertad de gravamen', 'definition' => 'Documento del Registro Público de la Propiedad que indica si la vivienda tiene deudas o limitaciones (por ejemplo, una hipoteca).'],
                ]],
            ],
        ],
        [
            'title' => 'Costos además del precio',
            'blocks' => [
                ['type' => 'cards', 'items' => [
                    ['title' => 'Gastos de escrituración', 'body' => 'Honorarios del notario, derechos de registro e impuestos como el de adquisición de inmuebles. Representan una parte adicional del valor de la vivienda.', 'icon' => 'file-text'],
                    ['title' => 'Avalúo', 'body' => 'Necesario en compras con crédito.', 'icon' => 'scale'],
                    ['title' => 'Comisiones del crédito', 'body' => 'Algunos créditos cobran por apertura o investigación.', 'icon' => 'receipt'],
                    ['title' => 'Seguros', 'body' => 'Los créditos hipotecarios suelen incluir seguros de vida y de daños.', 'icon' => 'shield-check'],
                    ['title' => 'Mudanza y equipamiento', 'body' => 'Muebles, electrodomésticos, reparaciones.', 'icon' => 'truck'],
                    ['title' => 'Gastos recurrentes', 'body' => 'Predial, agua, mantenimiento y, en su caso, cuotas de condominio.', 'icon' => 'calendar'],
                ]],
                ['type' => 'callout', 'tone' => 'tip', 'body' => 'Pide una cotización de gastos de escrituración al notario antes de comprometerte.'],
            ],
        ],
        [
            'title' => 'Elige tu forma de pago',
            'blocks' => [
                ['type' => 'paths'],
            ],
        ],
        [
            'title' => 'Con crédito Infonavit',
            'paths' => ['infonavit'],
            'blocks' => [
                ['type' => 'list', 'style' => 'check', 'items' => [
                    'Consulta tu precalificación en Mi Cuenta Infonavit.',
                    'Tu Subcuenta de Vivienda puede usarse como parte del pago.',
                    'Los pagos se descuentan de tu nómina.',
                    'Toma el curso o la orientación que Infonavit solicite antes del crédito.',
                ]],
                ['type' => 'callout', 'tone' => 'info', 'body' => 'Consulta la guía "Cómo funciona Infonavit" de este módulo.'],
            ],
        ],
        [
            'title' => 'Con crédito bancario',
            'paths' => ['bancario'],
            'blocks' => [
                ['type' => 'list', 'style' => 'check', 'items' => [
                    'Compara el CAT, la tasa (fija o variable), el plazo y el enganche que pide cada banco.',
                    'Revisa tu historial crediticio antes de solicitar.',
                    'Ten comprobantes de ingresos estables.',
                    'Usa los simuladores de CONDUSEF para comparar.',
                ]],
                ['type' => 'callout', 'tone' => 'info', 'body' => 'Consulta la guía "Cómo prepararte para un crédito hipotecario".'],
            ],
        ],
        [
            'title' => 'De contado',
            'paths' => ['contado'],
            'blocks' => [
                ['type' => 'list', 'style' => 'check', 'items' => [
                    'Aunque no haya crédito, revisa todos los documentos de la vivienda.',
                    'Formaliza la compra ante notario: un contrato privado no basta para registrar la propiedad.',
                    'No entregues el pago total sin escrituración en proceso.',
                    'Conserva tu fondo de emergencia: no uses todo tu ahorro.',
                ]],
            ],
        ],
        [
            'title' => 'Documentos a revisar',
            'blocks' => [
                ['type' => 'checklist', 'id' => 'documentos', 'title' => 'Antes de comprometerte, revisa', 'items' => [
                    'Escrituras a nombre de quien vende.',
                    'Certificado de libertad de gravamen.',
                    'Predial al corriente.',
                    'Recibos de agua al corriente.',
                    'Identificación oficial de quien vende.',
                    'En condominios, constancia de no adeudo de cuotas.',
                ]],
                ['type' => 'callout', 'tone' => 'warning', 'body' => 'Si el vendedor no puede mostrar escrituras o hay irregularidades, detente y consulta con un notario.'],
            ],
        ],
        [
            'title' => 'Pasos de la compra',
            'blocks' => [
                ['type' => 'procedure', 'items' => [
                    ['title' => 'Define tu presupuesto', 'body' => 'Precio + gastos de escrituración + mudanza, sin quedarte sin fondo de emergencia.'],
                    ['title' => 'Consigue tu financiamiento', 'body' => 'Precalificación o preaprobación de crédito.'],
                    ['title' => 'Busca y visita viviendas', 'body' => 'Visita varias, a distintas horas.'],
                    ['title' => 'Revisa documentos', 'body' => 'Con apoyo del notario.'],
                    ['title' => 'Avalúo y autorización del crédito', 'body' => 'Si compras con crédito.'],
                    ['title' => 'Firma de escrituras', 'body' => 'Ante notario.'],
                    ['title' => 'Registro y entrega', 'body' => 'El notario registra la propiedad y recibes la vivienda.'],
                ]],
            ],
        ],
        [
            'title' => 'Pon a prueba lo que aprendiste',
            'blocks' => [
                ['type' => 'quiz', 'id' => 'evaluacion', 'questions' => [
                    ['question' => '¿Qué indica el certificado de libertad de gravamen?', 'options' => ['El color de la casa.', 'Si la vivienda tiene deudas o limitaciones.', 'El precio final.'], 'answer' => 1, 'explanation' => 'Te ayuda a saber si la vivienda está libre de hipotecas u otras cargas.'],
                    ['question' => 'Además del precio, debes considerar…', 'options' => ['Solo la mudanza.', 'Gastos de escrituración, avalúo, seguros y gastos recurrentes.', 'Nada más.'], 'answer' => 1, 'explanation' => 'Estos costos pueden sumar una cantidad importante.'],
                    ['question' => '¿Quién formaliza la compra para registrarla?', 'options' => ['Un notario público.', 'Un amigo.', 'El vendedor.'], 'answer' => 0, 'explanation' => 'La escrituración se hace ante notario y se inscribe en el Registro Público.'],
                ]],
            ],
        ],
    ],

    'summary_points' => [
        'El precio no es el único costo: considera escrituración, avalúo, seguros y mudanza.',
        'Revisa escrituras, libertad de gravamen y pagos al corriente.',
        'Formaliza siempre la compra ante notario.',
        'No uses todo tu ahorro: conserva tu fondo de emergencia.',
    ],

    'sources' => [
        ['name' => 'CONDUSEF', 'url' => 'https://www.condusef.gob.mx', 'description' => 'Comparadores de créditos hipotecarios.'],
        ['name' => 'Infonavit', 'url' => 'https://www.gob.mx/infonavit', 'description' => 'Créditos para trabajadores.'],
        ['name' => 'PROFECO', 'url' => 'https://www.gob.mx/profeco', 'description' => 'Derechos del consumidor en la compra de vivienda.'],
    ],
];
