<?php

return [
    'title' => 'Controla tus gastos',
    'summary' => 'Clasifica gastos reales, descubre tus gastos hormiga y toma decisiones de consumo.',
    'icon' => 'receipt',
    'duration' => 10,

    'steps' => [
        [
            'title' => '¿Necesidad o no?',
            'blocks' => [
                ['type' => 'text', 'body' => ['Clasifica cada gasto. No hay respuestas perfectas: depende de tu situación, pero te mostraremos la clasificación más común y por qué.']],
                ['type' => 'tool', 'name' => 'expense-sort', 'items' => [
                    ['label' => 'Pago de la renta o aporte al hogar', 'answer' => 'need', 'why' => 'Vivienda es una necesidad básica.'],
                    ['label' => 'Tercera plataforma de streaming', 'answer' => 'want', 'why' => 'Entretenimiento: puedes conservar una y cancelar las demás.'],
                    ['label' => 'Transporte para ir a la escuela o al trabajo', 'answer' => 'need', 'why' => 'Te permite estudiar o generar ingresos.'],
                    ['label' => 'Café de cafetería todos los días', 'answer' => 'want', 'why' => 'Es un gasto hormiga clásico: pequeño, pero frecuente.'],
                    ['label' => 'Medicamentos recetados', 'answer' => 'need', 'why' => 'La salud es prioridad.'],
                    ['label' => 'Tenis de edición limitada', 'answer' => 'want', 'why' => 'Es un gusto. Si lo quieres, planéalo como una meta de ahorro.'],
                    ['label' => 'Recibo de luz', 'answer' => 'need', 'why' => 'Servicio básico del hogar.'],
                    ['label' => 'Envíos de comida a domicilio cada semana', 'answer' => 'want', 'why' => 'Cocinar en casa suele costar mucho menos.'],
                ]],
            ],
        ],
        [
            'title' => 'Tus gastos hormiga',
            'blocks' => [
                ['type' => 'text', 'body' => ['Los gastos hormiga son pequeños y frecuentes. Por separado parecen insignificantes, pero juntos pueden ser una parte importante de tu dinero.']],
                ['type' => 'tool', 'name' => 'small-expenses'],
                ['type' => 'list', 'title' => 'Gastos hormiga comunes', 'style' => 'bullet', 'items' => [
                    'Café, refrescos y botanas.',
                    'Comisiones por retirar en cajeros de otro banco.',
                    'Suscripciones que no usas.',
                    'Envíos a domicilio.',
                    'Compras pequeñas en apps y videojuegos.',
                ]],
            ],
        ],
        [
            'title' => 'Decide',
            'blocks' => [
                ['type' => 'choice', 'id' => 'oferta', 'title' => 'Situación', 'icon' => 'shopping-bag', 'scenario' => 'Ves una oferta de "3 meses sin intereses" en audífonos que no tenías planeado comprar.', 'options' => [
                    ['label' => 'Los compro, sin intereses no cuesta.', 'feedback' => 'Sin intereses no significa gratis: comprometes tu dinero de los próximos meses.'],
                    ['label' => 'Espero 24 horas y reviso si cabe en mi presupuesto.', 'feedback' => 'Muy bien. Si después de pensarlo cabe en tu presupuesto, es una decisión informada.', 'best' => true],
                    ['label' => 'Compro dos para aprovechar.', 'feedback' => 'Las ofertas te hacen gastar en lo que no necesitas.'],
                ]],
                ['type' => 'choice', 'id' => 'quincena', 'title' => 'Situación', 'icon' => 'wallet', 'scenario' => 'A mitad de quincena ya gastaste casi todo tu dinero para salidas.', 'options' => [
                    ['label' => 'Uso el dinero de la comida.', 'feedback' => 'Afectarías una necesidad por un gusto.'],
                    ['label' => 'Busco planes sin costo hasta la próxima quincena.', 'feedback' => '¡Exacto! Respetar tu límite es la clave de un presupuesto.', 'best' => true],
                    ['label' => 'Uso la tarjeta de crédito y pago después.', 'feedback' => 'Si no tienes cómo pagarlo, se vuelve deuda con intereses.'],
                ]],
            ],
        ],
    ],

    'summary_points' => [
        'Distinguir necesidades de gustos te ayuda a priorizar.',
        'Los gastos hormiga suman más de lo que parece.',
        'Espera antes de compras impulsivas y revisa tu presupuesto.',
    ],

    'sources' => [
        ['name' => 'PROFECO', 'url' => 'https://www.gob.mx/profeco', 'description' => 'Consejos para el consumo responsable.'],
    ],
];
