<?php

return [
    'title' => 'Cómo hacer un presupuesto mensual',
    'summary' => 'Registra tus ingresos, clasifica tus gastos y distribuye tu dinero con un simulador que calcula todo por ti.',
    'icon' => 'calculator',
    'duration' => 20,

    'steps' => [
        [
            'title' => 'Introducción',
            'blocks' => [
                ['type' => 'text', 'body' => [
                    'Un presupuesto es un plan para tu dinero: decides de antemano a dónde irá cada peso. No es para limitarte, sino para que tu dinero alcance para lo importante y para tus metas.',
                ]],
                ['type' => 'objectives', 'items' => [
                    'Diferenciar ingresos fijos y variables.',
                    'Registrar tus ingresos del mes.',
                    'Clasificar tus gastos en necesidades y gastos no necesarios.',
                    'Distribuir tu dinero e incluir el ahorro.',
                    'Usar un simulador con cálculos automáticos.',
                ]],
            ],
        ],
        [
            'title' => 'Ingresos fijos y variables',
            'blocks' => [
                ['type' => 'cards', 'items' => [
                    ['title' => 'Ingresos fijos', 'body' => 'Llegan con la misma cantidad y frecuencia: sueldo, beca o pensión.', 'icon' => 'calendar'],
                    ['title' => 'Ingresos variables', 'body' => 'Cambian cada mes: propinas, comisiones, ventas, trabajos por proyecto.', 'icon' => 'trending-up'],
                ]],
                ['type' => 'callout', 'tone' => 'tip', 'body' => 'Si tus ingresos son variables, haz tu presupuesto con tu mes más bajo de los últimos meses. Lo que ganes de más, destínalo a ahorro o metas.'],
                ['type' => 'procedure', 'title' => 'Registra tus ingresos', 'items' => [
                    ['title' => 'Usa lo que realmente recibes', 'body' => 'Tu ingreso neto: lo que llega a tu cuenta o a tu mano después de descuentos.'],
                    ['title' => 'Incluye todas las fuentes', 'body' => 'Sueldo, apoyos, trabajos extra.'],
                    ['title' => 'Anota la fecha en que llegan', 'body' => 'Te ayuda a programar tus pagos.'],
                ]],
            ],
        ],
        [
            'title' => 'Clasifica tus gastos',
            'blocks' => [
                ['type' => 'table', 'headers' => ['Tipo', 'Ejemplos', 'Pregunta clave'], 'rows' => [
                    ['Necesidades', 'Vivienda, comida básica, transporte, servicios, salud, pagos de deudas', '¿Lo necesito para vivir o trabajar?'],
                    ['No necesarios', 'Salidas, comida fuera, suscripciones, ropa de moda, gustos', '¿Podría vivir sin esto este mes?'],
                    ['Ahorro', 'Fondo de emergencia, metas', '¿Cuánto aparto para mi futuro?'],
                ]],
                ['type' => 'cards', 'title' => 'Gastos fijos vs. variables', 'items' => [
                    ['title' => 'Fijos', 'body' => 'Mismo monto cada mes: renta, plan de celular, colegiatura.', 'icon' => 'lock'],
                    ['title' => 'Variables', 'body' => 'Cambian: comida, transporte, luz, entretenimiento.', 'icon' => 'shuffle'],
                ]],
                ['type' => 'callout', 'tone' => 'info', 'body' => 'Algunos gastos pueden ser necesidad o gusto según el caso. El internet puede ser necesario para estudiar o trabajar; una suscripción a varias plataformas, no.'],
            ],
        ],
        [
            'title' => 'Distribuye tu dinero',
            'blocks' => [
                ['type' => 'text', 'body' => ['Una referencia popular es la regla 50/30/20: alrededor de 50% para necesidades, 30% para gastos no necesarios y 20% para ahorro. No es una regla obligatoria: ajústala a tu realidad.']],
                ['type' => 'example', 'title' => 'Con un ingreso de $10,000', 'rows' => [
                    ['label' => 'Necesidades (50%)', 'value' => '$5,000'],
                    ['label' => 'No necesarios (30%)', 'value' => '$3,000'],
                    ['label' => 'Ahorro (20%)', 'value' => '$2,000'],
                    ['label' => 'Total', 'value' => '$10,000', 'total' => true],
                ]],
                ['type' => 'list', 'title' => 'Si no te alcanza', 'style' => 'check', 'items' => [
                    'Recorta primero los gastos no necesarios.',
                    'Revisa gastos fijos que puedas negociar o cambiar (plan de celular, suscripciones).',
                    'Empieza ahorrando poco, pero empieza.',
                    'Evita cubrir faltantes con tarjetas de crédito.',
                ]],
            ],
        ],
        [
            'title' => 'Simulador de presupuesto',
            'blocks' => [
                ['type' => 'text', 'body' => ['Cambia los montos de ejemplo por los tuyos. El simulador calcula tus totales, tu saldo disponible y tu distribución en tiempo real.']],
                ['type' => 'tool', 'name' => 'budget'],
            ],
        ],
        [
            'title' => 'Recomendaciones y errores frecuentes',
            'blocks' => [
                ['type' => 'list', 'title' => 'Recomendaciones', 'style' => 'check', 'items' => [
                    'Haz tu presupuesto al inicio del mes o el día que cobras.',
                    'Revísalo cada semana durante el primer mes.',
                    'Guarda tus recibos o anota tus gastos en el celular.',
                    'Asigna un destino a cada peso, incluso a lo que sobra.',
                ]],
                ['type' => 'list', 'title' => 'Errores frecuentes', 'style' => 'cross', 'items' => [
                    'Olvidar gastos anuales (inscripciones, seguros, regalos de fin de año).',
                    'No incluir el ahorro como un "gasto" fijo.',
                    'Hacer el presupuesto una vez y no volver a revisarlo.',
                    'Presupuestar con ingresos que todavía no recibes.',
                ]],
            ],
        ],
        [
            'title' => 'Pon a prueba lo que aprendiste',
            'blocks' => [
                ['type' => 'quiz', 'id' => 'evaluacion', 'questions' => [
                    ['question' => '¿Qué ingreso debes usar para tu presupuesto?', 'options' => ['El que recibes después de descuentos.', 'El sueldo bruto antes de impuestos.', 'El que esperas ganar algún día.'], 'answer' => 0, 'explanation' => 'Planea con lo que realmente llega a tu bolsillo: tu ingreso neto.'],
                    ['question' => '¿Cuál es una necesidad?', 'options' => ['Una suscripción adicional de streaming.', 'El transporte para ir a trabajar.', 'Ropa de temporada.'], 'answer' => 1, 'explanation' => 'El transporte para trabajar es necesario; los otros son gastos no necesarios.'],
                    ['question' => 'Si tu presupuesto no cuadra, ¿qué ajustas primero?', 'options' => ['Los gastos no necesarios.', 'La comida básica.', 'Pides una tarjeta nueva.'], 'answer' => 0, 'explanation' => 'Recorta primero lo que no es indispensable antes de tocar necesidades o endeudarte.'],
                ]],
            ],
        ],
    ],

    'summary_points' => [
        'Un presupuesto es un plan: decides a dónde va cada peso antes de gastarlo.',
        'Usa tu ingreso neto; con ingresos variables, planea con tu mes más bajo.',
        'Clasifica en necesidades, gastos no necesarios y ahorro.',
        'La regla 50/30/20 es una referencia que puedes adaptar.',
        'Revisa tu presupuesto cada mes y ajusta.',
    ],

    'sources' => [
        ['name' => 'CONDUSEF', 'url' => 'https://www.condusef.gob.mx', 'description' => 'Herramientas y materiales de educación financiera.'],
        ['name' => 'PROFECO', 'url' => 'https://www.gob.mx/profeco', 'description' => 'Consejos para el consumo responsable.'],
    ],
];
