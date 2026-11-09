<?php

return [
    'title' => 'Qué gastos implica independizarte',
    'summary' => 'Gastos iniciales y mensuales que debes considerar antes de dejar la casa familiar.',
    'icon' => 'wallet',
    'duration' => 12,

    'steps' => [
        [
            'title' => 'Introducción',
            'blocks' => [
                ['type' => 'text', 'body' => ['Independizarte implica gastos que antes quizá no veías: desde el depósito de la renta hasta el papel de baño. Conocerlos te ayuda a planear sin sorpresas.']],
                ['type' => 'objectives', 'items' => [
                    'Qué gastos tendrás al inicio.',
                    'Qué gastos tendrás cada mes.',
                    'Cómo calcular si estás listo.',
                ]],
            ],
        ],
        [
            'title' => 'Gastos iniciales',
            'blocks' => [
                ['type' => 'list', 'style' => 'check', 'items' => [
                    'Depósito en garantía y primer mes de renta.',
                    'Póliza jurídica, si te la piden.',
                    'Mudanza o flete.',
                    'Muebles básicos: cama, mesa, sillas.',
                    'Cocina básica: platos, ollas, utensilios.',
                    'Contratación o instalación de servicios.',
                    'Artículos de limpieza iniciales.',
                ]],
            ],
        ],
        [
            'title' => 'Gastos mensuales',
            'blocks' => [
                ['type' => 'table', 'headers' => ['Gasto', 'Frecuencia', 'Nota'], 'rows' => [
                    ['Renta', 'Mensual', 'Tu gasto más grande.'],
                    ['Luz', 'Según tu recibo', 'Varía por temporada; en climas calurosos sube en verano.'],
                    ['Agua', 'Según tu recibo', 'A veces incluida en la renta.'],
                    ['Gas', 'Según consumo', 'De tanque o natural.'],
                    ['Internet y celular', 'Mensual', 'Compara planes.'],
                    ['Comida', 'Semanal', 'Cocinar en casa ahorra mucho.'],
                    ['Transporte', 'Diario', 'Depende de la ubicación.'],
                    ['Limpieza e higiene', 'Mensual', 'Fácil de olvidar.'],
                    ['Ahorro y emergencias', 'Mensual', 'No lo dejes fuera.'],
                ]],
                ['type' => 'callout', 'tone' => 'tip', 'body' => 'Usa el simulador de la guía "Cómo hacer un presupuesto mensual" para calcular con tus números.'],
            ],
        ],
        [
            'title' => 'Ejemplo y recomendaciones',
            'blocks' => [
                ['type' => 'example', 'title' => 'Mariana se independiza', 'body' => ['Mariana gana $13,000 netos. Antes de mudarse ahorró para el depósito, el primer mes y muebles básicos. Eligió un departamento de $3,800 cerca de su trabajo para ahorrar en transporte y armó su presupuesto incluyendo $1,000 de ahorro mensual.']],
                ['type' => 'checklist', 'id' => 'listo', 'title' => '¿Estoy listo para independizarme?', 'items' => [
                    'Tengo ingresos estables.',
                    'Tengo ahorrado el dinero inicial.',
                    'Mi renta no supera alrededor de 30% de mi ingreso.',
                    'Tengo un fondo de emergencia o estoy formándolo.',
                    'Hice un presupuesto mensual que cuadra.',
                ]],
            ],
        ],
    ],

    'summary_points' => [
        'Considera gastos iniciales y mensuales.',
        'No olvides limpieza, higiene y emergencias.',
        'Planea con un presupuesto antes de mudarte.',
    ],

    'sources' => [
        ['name' => 'PROFECO', 'url' => 'https://www.gob.mx/profeco', 'description' => 'Consejos de consumo y comparación de precios.'],
    ],
];
