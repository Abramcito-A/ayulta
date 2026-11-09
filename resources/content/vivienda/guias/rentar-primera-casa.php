<?php

return [
    'title' => 'Cómo rentar tu primera casa',
    'summary' => 'Calcula cuánto puedes pagar, busca, visita, reúne requisitos y firma con seguridad tu primer contrato de renta.',
    'icon' => 'key-round',
    'duration' => 22,

    'paths' => [
        'question' => '¿Cómo vas a vivir?',
        'options' => [
            'solo' => ['label' => 'Solo o sola', 'description' => 'La renta y los gastos serán solo míos.', 'icon' => 'user-round'],
            'compartir' => ['label' => 'Compartiendo', 'description' => 'Viviré con amigos, pareja o roomies.', 'icon' => 'users'],
        ],
    ],

    'steps' => [
        [
            'title' => 'Introducción',
            'blocks' => [
                ['type' => 'text', 'body' => [
                    'Rentar tu primera vivienda es un gran paso hacia tu independencia. También es un compromiso: firmarás un contrato y deberás pagar puntualmente durante meses.',
                    'Esta guía te acompaña desde calcular tu presupuesto hasta recibir las llaves.',
                ]],
                ['type' => 'objectives', 'items' => [
                    'Cuánto puedes pagar de renta.',
                    'Qué opciones existen y cómo buscar.',
                    'Qué revisar al visitar una vivienda.',
                    'Qué requisitos te pueden pedir.',
                    'Cómo firmar y recibir la vivienda.',
                ]],
            ],
        ],
        [
            'title' => 'Conceptos básicos',
            'blocks' => [
                ['type' => 'terms', 'items' => [
                    ['term' => 'Arrendador', 'definition' => 'La persona dueña (o representante legal) que renta la vivienda.'],
                    ['term' => 'Arrendatario o inquilino', 'definition' => 'Tú: la persona que renta y paga por usar la vivienda.'],
                    ['term' => 'Depósito en garantía', 'definition' => 'Dinero que entregas al inicio para cubrir posibles daños o adeudos. Si entregas la vivienda en buen estado y sin deudas, se te devuelve según el contrato.'],
                    ['term' => 'Fiador o aval', 'definition' => 'Una persona que se compromete a pagar si tú no lo haces. Algunos arrendadores lo piden; otros aceptan una póliza jurídica.'],
                    ['term' => 'Póliza jurídica', 'definition' => 'Un servicio contratado que investiga al inquilino y respalda al arrendador en caso de incumplimiento. Tiene costo.'],
                ]],
            ],
        ],
        [
            'title' => '¿Cuánto puedes pagar?',
            'blocks' => [
                ['type' => 'text', 'body' => ['Una referencia común es que la renta no supere alrededor de 30% de tus ingresos netos. Además de la renta, considera servicios, transporte y comida.']],
                ['type' => 'example', 'title' => 'Con un ingreso neto de $12,000', 'rows' => [
                    ['label' => 'Renta recomendada (≈30%)', 'value' => 'Hasta $3,600'],
                    ['label' => 'Servicios (luz, agua, gas, internet)', 'value' => '≈ $800'],
                    ['label' => 'Comida y transporte', 'value' => '≈ $4,500'],
                    ['label' => 'Ahorro y otros gastos', 'value' => 'El resto', 'total' => true],
                ], 'note' => 'Cifras ilustrativas.'],
                ['type' => 'list', 'title' => 'Dinero que necesitas al inicio', 'style' => 'check', 'items' => [
                    'Primer mes de renta.',
                    'Depósito en garantía (con frecuencia, el equivalente a un mes; depende del contrato).',
                    'Póliza jurídica, si la piden.',
                    'Mudanza, muebles básicos y contratos de servicios.',
                ]],
            ],
        ],
        [
            'title' => 'Elige cómo vivirás',
            'blocks' => [
                ['type' => 'paths'],
            ],
        ],
        [
            'title' => 'Si vivirás solo o sola',
            'paths' => ['solo'],
            'blocks' => [
                ['type' => 'compare', 'items' => [
                    ['title' => 'Cuarto en renta', 'icon' => 'bed-double', 'body' => 'Rentas una habitación dentro de una casa.', 'pros' => ['Más económico.', 'A veces incluye servicios.'], 'cons' => ['Menos privacidad.', 'Reglas de la casa.']],
                    ['title' => 'Departamento pequeño o estudio', 'icon' => 'building', 'body' => 'Un espacio solo para ti.', 'pros' => ['Privacidad e independencia.'], 'cons' => ['Pagas todos los gastos.']],
                ]],
                ['type' => 'callout', 'tone' => 'tip', 'body' => 'Viviendo solo, tu fondo de emergencia es aún más importante: nadie más cubrirá un imprevisto.'],
            ],
        ],
        [
            'title' => 'Si vas a compartir',
            'paths' => ['compartir'],
            'blocks' => [
                ['type' => 'list', 'title' => 'Acuerden antes de firmar', 'style' => 'check', 'items' => [
                    'Quién firma el contrato y quién responde ante el arrendador.',
                    'Cómo se dividen la renta, el depósito y los servicios.',
                    'Qué pasa si alguien se va antes de terminar el contrato.',
                    'Reglas de limpieza, visitas y ruido.',
                ]],
                ['type' => 'callout', 'tone' => 'warning', 'body' => 'Si solo una persona firma, esa persona es responsable de todo ante el arrendador. Pongan sus acuerdos internos por escrito.'],
            ],
        ],
        [
            'title' => 'Busca y visita',
            'blocks' => [
                ['type' => 'procedure', 'items' => [
                    ['title' => 'Define tu zona', 'body' => 'Cerca de tu trabajo o escuela, con transporte y servicios.'],
                    ['title' => 'Busca en fuentes confiables', 'body' => 'Portales inmobiliarios conocidos, recomendaciones de conocidos o letreros en la zona.'],
                    ['title' => 'Agenda visitas', 'body' => 'Visita siempre en persona, de día y, si puedes, también de noche para conocer el entorno.'],
                    ['title' => 'Revisa a fondo', 'body' => 'Usa el checklist de visita.'],
                ]],
                ['type' => 'checklist', 'id' => 'visita', 'title' => 'Checklist de visita', 'items' => [
                    'Hay buena presión de agua y no hay fugas.',
                    'Las instalaciones eléctricas y de gas funcionan.',
                    'No hay humedad, grietas importantes ni plagas.',
                    'Puertas y ventanas cierran bien.',
                    'La zona tiene transporte, tiendas y es segura.',
                    'Pregunté qué servicios incluye la renta.',
                ]],
            ],
        ],
        [
            'title' => 'Requisitos y contrato',
            'blocks' => [
                ['type' => 'callout', 'tone' => 'warning', 'title' => 'Requisitos generales', 'body' => 'Cada arrendador define sus requisitos. Estos son los más comunes.'],
                ['type' => 'list', 'style' => 'check', 'items' => [
                    'Identificación oficial.',
                    'Comprobante de ingresos.',
                    'Referencias personales o de rentas anteriores.',
                    'Fiador o póliza jurídica, en algunos casos.',
                    'Depósito en garantía y primer mes de renta.',
                ]],
                ['type' => 'text', 'body' => ['Antes de firmar, lee el contrato completo. Consulta la guía "Qué revisar antes de firmar un contrato de renta" para saber qué cláusulas revisar.']],
            ],
        ],
        [
            'title' => 'Firma y entrega de la vivienda',
            'blocks' => [
                ['type' => 'procedure', 'items' => [
                    ['title' => 'Firma el contrato', 'body' => 'Asegúrate de recibir una copia firmada.'],
                    ['title' => 'Paga con comprobante', 'body' => 'Prefiere transferencias y pide recibo de cada pago.'],
                    ['title' => 'Haz un inventario', 'body' => 'Anota el estado de la vivienda y toma fotos con fecha. Que ambas partes lo firmen.'],
                    ['title' => 'Recibe llaves y contrata servicios', 'body' => 'Revisa si los servicios están a tu nombre o al del arrendador.'],
                ]],
                ['type' => 'list', 'title' => 'Errores frecuentes', 'style' => 'cross', 'items' => [
                    'Pagar sin haber visto la vivienda.',
                    'No pedir recibos.',
                    'No hacer inventario al entrar (después es difícil recuperar el depósito).',
                    'Rentar algo que supera tu presupuesto.',
                ]],
            ],
        ],
        [
            'title' => 'Pon a prueba lo que aprendiste',
            'blocks' => [
                ['type' => 'quiz', 'id' => 'evaluacion', 'questions' => [
                    ['question' => 'Una referencia común es que la renta no supere…', 'options' => ['Alrededor de 30% de tus ingresos.', '80% de tus ingresos.', 'Lo que quieras.'], 'answer' => 0, 'explanation' => 'Así te queda dinero para servicios, comida, transporte y ahorro.'],
                    ['question' => '¿Para qué sirve el inventario al entrar?', 'options' => ['Para decorar.', 'Para dejar constancia del estado de la vivienda y proteger tu depósito.', 'No sirve.'], 'answer' => 1, 'explanation' => 'Con fotos e inventario firmado puedes demostrar cómo recibiste la vivienda.'],
                    ['question' => 'Te piden depositar antes de visitar la vivienda. ¿Qué haces?', 'options' => ['Deposito para apartarla.', 'No deposito sin visitarla y verificar al arrendador.', 'Deposito la mitad.'], 'answer' => 1, 'explanation' => 'Es una señal de fraude frecuente.'],
                ]],
            ],
        ],
    ],

    'summary_points' => [
        'Calcula una renta que no supere alrededor de 30% de tu ingreso.',
        'Considera el dinero inicial: primer mes, depósito y mudanza.',
        'Visita en persona y revisa todo con un checklist.',
        'Lee el contrato, paga con comprobante y haz inventario.',
    ],

    'sources' => [
        ['name' => 'PROFECO', 'url' => 'https://www.gob.mx/profeco', 'description' => 'Orientación al consumidor sobre servicios inmobiliarios.'],
        ['name' => 'CONDUSEF', 'url' => 'https://www.condusef.gob.mx', 'description' => 'Educación financiera para tu presupuesto.'],
    ],
];
