<?php

return [
    'title' => 'Qué es el historial crediticio',
    'summary' => 'Aprende cómo se construye tu historial, cómo consultarlo gratis y cómo corregir errores.',
    'icon' => 'file-search',
    'duration' => 15,

    'steps' => [
        [
            'title' => 'Introducción',
            'blocks' => [
                ['type' => 'text', 'body' => [
                    'Cada vez que usas un crédito (una tarjeta, un préstamo, un celular a plazos), queda un registro de cómo pagas. Ese registro es tu historial crediticio y las instituciones lo consultan para decidir si te prestan y en qué condiciones.',
                ]],
                ['type' => 'objectives', 'items' => [
                    'Qué es el historial crediticio y quién lo administra.',
                    'Cómo se construye y qué lo afecta.',
                    'Cómo consultar tu reporte.',
                    'Qué hábitos de pago te benefician.',
                    'Mitos comunes y cómo hacer aclaraciones.',
                ]],
            ],
        ],
        [
            'title' => 'Qué es y cómo funciona',
            'blocks' => [
                ['type' => 'terms', 'items' => [
                    ['term' => 'Historial crediticio', 'definition' => 'El registro de tus créditos: cuáles tienes o tuviste, cuánto debes y si pagaste a tiempo.'],
                    ['term' => 'Sociedades de Información Crediticia (SIC)', 'definition' => 'Empresas autorizadas que guardan esta información. En México operan Buró de Crédito y Círculo de Crédito.'],
                    ['term' => 'Reporte de crédito', 'definition' => 'El documento donde puedes ver tu historial: créditos, saldos y comportamiento de pago.'],
                    ['term' => 'Score o calificación crediticia', 'definition' => 'Un número que resume tu historial. Entre más alto, mejor perciben tu riesgo. Se consulta por separado del reporte.'],
                ]],
                ['type' => 'callout', 'tone' => 'info', 'body' => '"Estar en Buró" no es algo malo por sí mismo: todas las personas con algún crédito aparecen ahí. Lo importante es si tu historial muestra pagos puntuales o atrasos.'],
            ],
        ],
        [
            'title' => 'Cómo se construye',
            'blocks' => [
                ['type' => 'procedure', 'items' => [
                    ['title' => 'Obtén un primer crédito pequeño', 'body' => 'Por ejemplo, una tarjeta garantizada o de entrada.'],
                    ['title' => 'Úsalo con moderación', 'body' => 'No uses todo tu límite. Una práctica común es mantener tu uso bajo respecto a tu límite.'],
                    ['title' => 'Paga puntual, siempre', 'body' => 'La puntualidad es lo que más pesa en tu historial.'],
                    ['title' => 'Dale tiempo', 'body' => 'Un buen historial se construye con meses y años de buen comportamiento.'],
                ]],
                ['type' => 'list', 'title' => 'Lo que puede afectarlo', 'style' => 'warning', 'items' => [
                    'Pagos atrasados o no pagados.',
                    'Usar casi todo tu límite de crédito de forma constante.',
                    'Solicitar muchos créditos en poco tiempo.',
                    'Ser aval de alguien que no paga.',
                ]],
            ],
        ],
        [
            'title' => 'Cómo consultarlo',
            'blocks' => [
                ['type' => 'text', 'body' => ['Tienes derecho a consultar tu reporte de crédito. Las sociedades de información crediticia ofrecen un reporte de crédito especial sin costo una vez cada 12 meses; consultas adicionales pueden tener costo.']],
                ['type' => 'procedure', 'items' => [
                    ['title' => 'Entra al sitio oficial', 'body' => 'De Buró de Crédito o de Círculo de Crédito. Escribe tú la dirección; no uses enlaces de mensajes.'],
                    ['title' => 'Solicita tu reporte especial', 'body' => 'Te pedirán datos personales y, en algunos casos, datos de tus créditos para verificar tu identidad.'],
                    ['title' => 'Revisa con calma', 'body' => 'Confirma que reconoces todos los créditos, saldos y fechas.'],
                ]],
                ['type' => 'links', 'items' => [
                    ['label' => 'Buró de Crédito', 'url' => 'https://www.burodecredito.com.mx', 'description' => 'Reporte de crédito especial.', 'icon' => 'file-search'],
                    ['label' => 'Círculo de Crédito', 'url' => 'https://www.circulodecredito.com.mx', 'description' => 'Reporte de crédito especial.', 'icon' => 'file-search'],
                ]],
            ],
        ],
        [
            'title' => 'Hábitos de pago y errores frecuentes',
            'blocks' => [
                ['type' => 'cards', 'items' => [
                    ['title' => 'Domicilia o programa recordatorios', 'body' => 'Así nunca se te pasa una fecha límite.', 'icon' => 'bell'],
                    ['title' => 'Paga más que el mínimo', 'body' => 'Idealmente, el total. Reduce intereses y muestra buen manejo.', 'icon' => 'circle-check'],
                    ['title' => 'Revisa tus estados de cuenta', 'body' => 'Detecta cargos que no reconoces a tiempo.', 'icon' => 'receipt'],
                ]],
                ['type' => 'list', 'title' => 'Errores frecuentes', 'style' => 'cross', 'items' => [
                    'Pensar que no tener crédito es igual a tener buen historial (sin historial, es difícil que te presten).',
                    'Cancelar todas tus tarjetas al pagar: a veces conviene conservar una sin costo y usarla poco.',
                    'Ser aval sin evaluar el riesgo.',
                    'Ignorar cobros o llamadas de cobranza sin verificar.',
                ]],
            ],
        ],
        [
            'title' => 'Mitos y realidades',
            'blocks' => [
                ['type' => 'myths', 'items' => [
                    ['myth' => 'Estar en Buró de Crédito significa que debes dinero.', 'fact' => 'Ahí aparece todo aquel que tiene o tuvo un crédito, pague bien o mal.'],
                    ['myth' => 'Puedes pagar para que te "saquen" de Buró.', 'fact' => 'Nadie puede borrar tu historial a cambio de dinero. Quien lo ofrece probablemente es un fraude.'],
                    ['myth' => 'Consultar tu propio reporte baja tu calificación.', 'fact' => 'Revisar tu propio reporte es tu derecho y es una buena práctica.'],
                    ['myth' => 'Si pago una deuda atrasada, el registro desaparece al instante.', 'fact' => 'El registro se actualiza mostrando que pagaste, y la ley establece plazos para eliminar la información según el monto y las condiciones del adeudo.'],
                ]],
            ],
        ],
        [
            'title' => 'Alternativas para aclaraciones',
            'blocks' => [
                ['type' => 'text', 'body' => ['Si encuentras un error (un crédito que no es tuyo, un saldo incorrecto o un pago que sí hiciste), puedes pedir que se corrija.']],
                ['type' => 'procedure', 'items' => [
                    ['title' => 'Reúne tus pruebas', 'body' => 'Comprobantes de pago, estados de cuenta o cartas de finiquito.'],
                    ['title' => 'Presenta una reclamación', 'body' => 'Ante la sociedad de información crediticia donde aparece el error. Ellos la turnan a la institución que reportó.'],
                    ['title' => 'Contacta a la institución', 'body' => 'También puedes aclarar directamente con el banco o la empresa que otorgó el crédito.'],
                    ['title' => 'Acude a CONDUSEF si no hay solución', 'body' => 'CONDUSEF puede orientarte y ayudarte con quejas contra instituciones financieras.'],
                ]],
                ['type' => 'callout', 'tone' => 'warning', 'body' => 'Si aparece un crédito que no solicitaste, podría tratarse de robo de identidad. Repórtalo de inmediato a la institución y consulta la guía "Evita fraudes y protege tu dinero".'],
            ],
        ],
        [
            'title' => 'Pon a prueba lo que aprendiste',
            'blocks' => [
                ['type' => 'quiz', 'id' => 'evaluacion', 'questions' => [
                    ['question' => '¿Qué es lo que más pesa en tu historial?', 'options' => ['Tu edad.', 'Pagar puntualmente.', 'Tener muchas tarjetas.'], 'answer' => 1, 'explanation' => 'La puntualidad en tus pagos es la base de un buen historial.'],
                    ['question' => '¿Con qué frecuencia puedes obtener un reporte de crédito especial sin costo?', 'options' => ['Una vez cada 12 meses.', 'Nunca, siempre se paga.', 'Solo al cumplir 18 años.'], 'answer' => 0, 'explanation' => 'Las sociedades de información crediticia ofrecen un reporte especial gratuito cada 12 meses.'],
                    ['question' => 'Alguien te ofrece borrarte de Buró por $1,500. ¿Qué es?', 'options' => ['Un servicio oficial.', 'Probablemente un fraude.', 'Un trámite de CONDUSEF.'], 'answer' => 1, 'explanation' => 'Nadie puede borrar tu historial a cambio de dinero.'],
                ]],
            ],
        ],
    ],

    'summary_points' => [
        'Tu historial crediticio registra cómo pagas tus créditos.',
        'Paga puntual y usa una parte moderada de tu límite.',
        'Consulta tu reporte especial gratuito cada 12 meses.',
        'Nadie puede "borrarte" de Buró a cambio de dinero.',
        'Si hay errores, presenta una reclamación y, si es necesario, acude a CONDUSEF.',
    ],

    'sources' => [
        ['name' => 'CONDUSEF', 'url' => 'https://www.condusef.gob.mx', 'description' => 'Orientación, quejas y educación financiera.'],
        ['name' => 'Buró de Crédito', 'url' => 'https://www.burodecredito.com.mx', 'description' => 'Sociedad de información crediticia.'],
        ['name' => 'Círculo de Crédito', 'url' => 'https://www.circulodecredito.com.mx', 'description' => 'Sociedad de información crediticia.'],
    ],
];
