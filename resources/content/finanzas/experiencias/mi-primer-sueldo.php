<?php

return [
    'title' => 'Mi primer sueldo',
    'summary' => 'Entiende tu recibo de nómina, distribuye tu primer sueldo y toma tus primeras decisiones como trabajador.',
    'icon' => 'hand-coins',
    'duration' => 12,

    'steps' => [
        [
            'title' => 'Entiende tu recibo de nómina',
            'blocks' => [
                ['type' => 'text', 'body' => ['Tu recibo de nómina muestra cuánto ganas y qué se descuenta. Entenderlo te ayuda a saber cuánto dinero tendrás realmente.']],
                ['type' => 'terms', 'items' => [
                    ['term' => 'Sueldo bruto', 'definition' => 'Lo que ganas antes de descuentos.'],
                    ['term' => 'Sueldo neto', 'definition' => 'Lo que recibes después de descuentos. Es el que usas para tu presupuesto.'],
                    ['term' => 'ISR', 'definition' => 'Impuesto Sobre la Renta. Tu empleador lo retiene y lo entera al SAT.'],
                    ['term' => 'Cuotas IMSS', 'definition' => 'Tu aportación a la seguridad social, que te da acceso a servicios médicos y otras prestaciones.'],
                    ['term' => 'Prestaciones', 'definition' => 'Beneficios adicionales: aguinaldo, vacaciones, prima vacacional y, si aplica, vales o fondo de ahorro.'],
                ]],
                ['type' => 'example', 'title' => 'Recibo ilustrativo', 'rows' => [
                    ['label' => 'Sueldo bruto mensual', 'value' => '$11,000'],
                    ['label' => 'Retención de ISR', 'value' => '- descuento'],
                    ['label' => 'Cuotas IMSS', 'value' => '- descuento'],
                    ['label' => 'Sueldo neto (lo que recibes)', 'value' => 'Menor al bruto', 'total' => true],
                ], 'note' => 'Los montos de retención dependen de tu sueldo y de las tablas vigentes. Revisa siempre tu recibo real.'],
            ],
        ],
        [
            'title' => 'Distribuye tu sueldo',
            'blocks' => [
                ['type' => 'tool', 'name' => 'paycheck'],
                ['type' => 'callout', 'tone' => 'tip', 'body' => 'Si todavía vives con tu familia, considera aportar a los gastos del hogar y aprovecha para ahorrar más que nunca.'],
            ],
        ],
        [
            'title' => 'Tus primeras decisiones',
            'blocks' => [
                ['type' => 'choice', 'id' => 'celebrar', 'title' => 'Situación', 'icon' => 'party-popper', 'scenario' => 'Recibiste tu primer sueldo. Tus amigos te proponen celebrar en grande.', 'options' => [
                    ['label' => 'Gasto la mitad del sueldo en la celebración.', 'feedback' => 'Celebrar está bien, pero gastar la mitad te deja sin dinero para necesidades.'],
                    ['label' => 'Celebro con un monto que ya incluí en mi presupuesto de gustos.', 'feedback' => '¡Perfecto! Disfrutas sin poner en riesgo tus necesidades ni tu ahorro.', 'best' => true],
                    ['label' => 'No celebro nada nunca.', 'feedback' => 'Un presupuesto también incluye gustos. El equilibrio te ayuda a sostenerlo.'],
                ]],
                ['type' => 'choice', 'id' => 'tarjeta', 'title' => 'Situación', 'icon' => 'credit-card', 'scenario' => 'Tu banco de nómina te ofrece una tarjeta de crédito preaprobada.', 'options' => [
                    ['label' => 'La acepto sin leer, es gratis.', 'feedback' => 'Revisa CAT, anualidad y comisiones. Una tarjeta no es dinero extra.'],
                    ['label' => 'Comparo sus condiciones y decido si la necesito.', 'feedback' => 'Excelente. Consulta la guía "Cómo sacar tu primera tarjeta de crédito".', 'best' => true],
                    ['label' => 'La acepto y uso todo el límite.', 'feedback' => 'Usar todo el límite puede generarte deuda y afectar tu historial.'],
                ]],
                ['type' => 'checklist', 'id' => 'trabajador', 'title' => 'Como trabajador, revisa que…', 'items' => [
                    'Conozco mi Número de Seguridad Social (NSS).',
                    'Sé si mi empleador me dio de alta en el IMSS.',
                    'Guardo mis recibos de nómina.',
                    'Conozco mi RFC.',
                ]],
            ],
        ],
    ],

    'summary_points' => [
        'Tu presupuesto se hace con el sueldo neto.',
        'Asigna un destino a cada peso, incluido el ahorro.',
        'Celebrar está bien si cabe en tu presupuesto.',
        'Una tarjeta preaprobada se compara antes de aceptarla.',
    ],

    'sources' => [
        ['name' => 'SAT', 'url' => 'https://www.sat.gob.mx', 'description' => 'Información sobre ISR y recibos de nómina (CFDI).'],
        ['name' => 'IMSS', 'url' => 'https://www.imss.gob.mx', 'description' => 'Seguridad social de los trabajadores.'],
    ],
];
