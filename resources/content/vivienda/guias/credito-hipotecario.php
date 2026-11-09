<?php

return [
    'title' => 'Cómo prepararte para un crédito hipotecario',
    'summary' => 'Ordena tu historial, junta tu enganche y compara créditos para pedir una hipoteca con confianza.',
    'icon' => 'landmark',
    'duration' => 15,

    'steps' => [
        [
            'title' => 'Introducción',
            'blocks' => [
                ['type' => 'text', 'body' => ['Un crédito hipotecario puede durar muchos años. Prepararte con tiempo te ayuda a obtener mejores condiciones y a pagar con tranquilidad.']],
                ['type' => 'objectives', 'items' => [
                    'Qué revisan las instituciones antes de prestarte.',
                    'Cómo preparar tu enganche.',
                    'Cómo comparar créditos.',
                ]],
            ],
        ],
        [
            'title' => 'Qué revisan antes de prestarte',
            'blocks' => [
                ['type' => 'cards', 'items' => [
                    ['title' => 'Historial crediticio', 'body' => 'Que pagues puntualmente tus créditos actuales.', 'icon' => 'file-search'],
                    ['title' => 'Ingresos estables', 'body' => 'Antigüedad laboral o ingresos comprobables.', 'icon' => 'briefcase'],
                    ['title' => 'Capacidad de pago', 'body' => 'Que el pago mensual sea razonable respecto a tus ingresos.', 'icon' => 'calculator'],
                    ['title' => 'Enganche', 'body' => 'El monto que puedes aportar al inicio.', 'icon' => 'piggy-bank'],
                ]],
            ],
        ],
        [
            'title' => 'Prepárate paso a paso',
            'blocks' => [
                ['type' => 'procedure', 'items' => [
                    ['title' => 'Consulta tu historial', 'body' => 'Solicita tu reporte de crédito especial y corrige errores.'],
                    ['title' => 'Reduce tus deudas', 'body' => 'Menos deudas significan más capacidad de pago.'],
                    ['title' => 'Ahorra para el enganche y los gastos', 'body' => 'Incluye escrituración, avalúo y comisiones.'],
                    ['title' => 'Reúne tus documentos', 'body' => 'Identificación, comprobantes de ingresos y de domicilio, estados de cuenta.'],
                    ['title' => 'Compara al menos tres opciones', 'body' => 'Con simuladores oficiales.'],
                ]],
            ],
        ],
        [
            'title' => 'Cómo comparar',
            'blocks' => [
                ['type' => 'table', 'headers' => ['Concepto', 'Qué revisar'], 'rows' => [
                    ['CAT', 'El costo total del crédito; sirve para comparar.'],
                    ['Tasa', 'Si es fija (no cambia) o variable (puede cambiar).'],
                    ['Plazo', 'A mayor plazo, menor pago mensual pero más intereses en total.'],
                    ['Enganche', 'Qué porcentaje del valor piden.'],
                    ['Comisiones y seguros', 'Apertura, avalúo, seguros de vida y daños.'],
                    ['Pagos anticipados', 'Si puedes abonar a capital sin penalización.'],
                ]],
                ['type' => 'links', 'items' => [
                    ['label' => 'CONDUSEF', 'url' => 'https://www.condusef.gob.mx', 'description' => 'Simuladores y comparativos de crédito hipotecario.', 'icon' => 'scale'],
                ]],
            ],
        ],
        [
            'title' => 'Pon a prueba lo que aprendiste',
            'blocks' => [
                ['type' => 'quiz', 'id' => 'evaluacion', 'questions' => [
                    ['question' => 'A mayor plazo del crédito…', 'options' => ['Pagas menos intereses en total.', 'El pago mensual baja, pero pagas más intereses en total.', 'No cambia nada.'], 'answer' => 1, 'explanation' => 'Un plazo largo reduce el pago mensual pero aumenta el costo total.'],
                    ['question' => '¿Qué significa una tasa fija?', 'options' => ['Que no cambia durante el crédito.', 'Que cambia cada mes.', 'Que no hay intereses.'], 'answer' => 0, 'explanation' => 'Una tasa fija da certeza sobre tus pagos.'],
                ]],
            ],
        ],
    ],

    'summary_points' => [
        'Revisa y mejora tu historial antes de solicitar.',
        'Ahorra para el enganche y los gastos adicionales.',
        'Compara CAT, tasa, plazo, comisiones y seguros.',
    ],

    'sources' => [
        ['name' => 'CONDUSEF', 'url' => 'https://www.condusef.gob.mx', 'description' => 'Comparadores y simuladores.'],
        ['name' => 'Banco de México', 'url' => 'https://www.banxico.org.mx', 'description' => 'Información sobre el CAT.'],
    ],
];
