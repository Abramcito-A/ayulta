<?php

return [
    'title' => 'Mi camino hacia mi primera casa',
    'summary' => 'Recorre cinco etapas para prepararte, marca tu avance y descubre qué te falta para dar el paso.',
    'icon' => 'map',
    'duration' => 15,

    'steps' => [
        [
            'title' => 'Tu camino',
            'blocks' => [
                ['type' => 'text', 'body' => ['Prepararte para tu primera vivienda es un proceso. Avanza a tu ritmo: lee cada etapa, realiza las tareas sugeridas y márcala como completada cuando estés listo.']],
                ['type' => 'tool', 'name' => 'housing-path', 'stages' => [
                    [
                        'title' => 'Conoce tu situación económica',
                        'body' => 'Antes de pensar en dónde vivir, necesitas saber cuánto ganas, cuánto gastas y cuánto puedes destinar a vivienda.',
                        'tasks' => ['Registra tus ingresos y gastos de un mes.', 'Calcula cuánto puedes pagar de renta o mensualidad.', 'Revisa si tienes deudas pendientes.'],
                        'link' => ['label' => 'Haz tu presupuesto mensual', 'url' => route('finance.guides.show', 'presupuesto-mensual')],
                    ],
                    [
                        'title' => 'Aprende a ahorrar',
                        'body' => 'Necesitarás dinero para el depósito, el enganche, la mudanza y un fondo de emergencia.',
                        'tasks' => ['Define una meta de ahorro para tu vivienda.', 'Empieza tu fondo de emergencia.', 'Automatiza tu ahorro.'],
                        'link' => ['label' => 'Crea tu plan de ahorro', 'url' => route('finance.experiences.show', 'mi-primer-ahorro')],
                    ],
                    [
                        'title' => 'Conoce opciones de renta y compra',
                        'body' => 'Rentar y comprar tienen ventajas distintas. Elige según tu etapa de vida, tu estabilidad y tus metas.',
                        'tasks' => ['Compara costos de renta en tu zona.', 'Conoce los gastos de comprar una vivienda.', 'Decide qué opción te conviene hoy.'],
                        'link' => ['label' => 'Cómo rentar tu primera casa', 'url' => route('housing.guides.show', 'rentar-primera-casa')],
                    ],
                    [
                        'title' => 'Infórmate sobre Infonavit y precalificación',
                        'body' => 'Si trabajas formalmente, tienes un ahorro para vivienda. Conoce cuánto tienes y si podrías acceder a un crédito.',
                        'tasks' => ['Crea tu Mi Cuenta Infonavit.', 'Consulta tu Subcuenta de Vivienda.', 'Revisa tu precalificación.'],
                        'link' => ['label' => 'Cómo funciona Infonavit', 'url' => route('housing.guides.show', 'como-funciona-infonavit')],
                    ],
                    [
                        'title' => 'Prepárate para independizarte',
                        'body' => 'Más allá del dinero, independizarte implica responsabilidades nuevas: contratos, servicios, convivencia y decisiones.',
                        'tasks' => ['Haz la lista de gastos iniciales y mensuales.', 'Aprende qué revisar en un contrato.', 'Practica con el juego de independencia.'],
                        'link' => ['label' => 'Juega "Prepárate para independizarte"', 'url' => route('housing.experiences.show', 'preparate-para-independizarte')],
                    ],
                ]],
            ],
        ],
        [
            'title' => 'Reflexiona',
            'blocks' => [
                ['type' => 'note', 'id' => 'meta', 'label' => '¿Cuándo te gustaría independizarte y qué necesitas para lograrlo?', 'placeholder' => 'Ej. En un año, cuando tenga ahorrado el depósito y un fondo de emergencia.'],
                ['type' => 'callout', 'tone' => 'tip', 'body' => 'Regresa a esta experiencia cuando completes una etapa: tu avance se guarda en este dispositivo.'],
            ],
        ],
    ],

    'summary_points' => [
        'Primero conoce tus números: ingresos, gastos y deudas.',
        'El ahorro es la base para rentar o comprar.',
        'Compara renta y compra según tu etapa de vida.',
        'Infonavit puede ser parte de tu plan si trabajas formalmente.',
    ],

    'sources' => [
        ['name' => 'Infonavit', 'url' => 'https://www.gob.mx/infonavit', 'description' => 'Información oficial.'],
        ['name' => 'CONDUSEF', 'url' => 'https://www.condusef.gob.mx', 'description' => 'Educación financiera.'],
    ],
];
