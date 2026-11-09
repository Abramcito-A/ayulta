<?php

return [
    'title' => 'Cómo evitar fraudes al buscar vivienda',
    'summary' => 'Reconoce anuncios falsos, verifica al arrendador o vendedor y protege tu dinero.',
    'icon' => 'shield-alert',
    'duration' => 12,

    'steps' => [
        [
            'title' => 'Introducción',
            'blocks' => [
                ['type' => 'text', 'body' => ['Los fraudes inmobiliarios aprovechan la prisa por encontrar vivienda. Conocer las señales de alerta te protege.']],
                ['type' => 'objectives', 'items' => [
                    'Señales de alerta en anuncios y tratos.',
                    'Cómo verificar a quien renta o vende.',
                    'Cómo pagar de forma segura.',
                ]],
            ],
        ],
        [
            'title' => 'Señales de alerta',
            'blocks' => [
                ['type' => 'list', 'style' => 'warning', 'items' => [
                    'Precio muy por debajo de otros en la misma zona.',
                    'Te piden depositar para "apartar" antes de visitar.',
                    'El "dueño" está fuera del país y te enviará las llaves.',
                    'Presionan para que decidas rápido.',
                    'No pueden mostrarte documentos que acrediten la propiedad.',
                    'Te piden pagos a cuentas de terceros sin recibo.',
                ]],
            ],
        ],
        [
            'title' => 'Cómo protegerte',
            'blocks' => [
                ['type' => 'procedure', 'items' => [
                    ['title' => 'Visita siempre en persona', 'body' => 'Nunca pagues sin conocer la vivienda.'],
                    ['title' => 'Verifica la identidad', 'body' => 'Pide identificación oficial y algún documento que vincule a la persona con la vivienda (por ejemplo, el recibo del predial a su nombre).'],
                    ['title' => 'Firma un contrato', 'body' => 'Con datos completos de ambas partes.'],
                    ['title' => 'Paga con comprobante', 'body' => 'Transferencias a nombre del arrendador y recibo de cada pago.'],
                    ['title' => 'Si es una compra', 'body' => 'Hazla siempre ante notario.'],
                ]],
            ],
        ],
        [
            'title' => 'Escenarios',
            'blocks' => [
                ['type' => 'choice', 'id' => 'anuncio', 'title' => 'Anuncio', 'icon' => 'megaphone', 'scenario' => 'Encuentras un departamento amueblado en una zona cara a la mitad del precio normal. El anunciante dice que está de viaje y te enviará las llaves al recibir el depósito.', 'options' => [
                    ['label' => 'Deposito rápido antes de que lo renten.', 'feedback' => 'Es un patrón clásico de fraude: precio bajo, dueño ausente y pago anticipado.'],
                    ['label' => 'No deposito y busco otras opciones.', 'feedback' => 'Muy bien. Sin visita ni verificación, no hay trato.', 'best' => true],
                    ['label' => 'Deposito la mitad.', 'feedback' => 'Perderías ese dinero. El riesgo sigue siendo alto.'],
                ]],
                ['type' => 'choice', 'id' => 'credito', 'title' => 'Crédito', 'icon' => 'building-2', 'scenario' => 'Un "gestor" te ofrece conseguir tu crédito Infonavit más rápido si le pagas una comisión.', 'options' => [
                    ['label' => 'Le pago, así me ahorro tiempo.', 'feedback' => 'Los trámites de Infonavit son gratuitos; es probable que pierdas tu dinero.'],
                    ['label' => 'Hago el trámite directamente en los canales oficiales.', 'feedback' => 'Exacto. Nunca compartas tus contraseñas ni pagues a intermediarios.', 'best' => true],
                    ['label' => 'Le doy mi contraseña para que lo haga.', 'feedback' => 'Con tus accesos podrían usar tu ahorro o tus datos.'],
                ]],
                ['type' => 'callout', 'tone' => 'tip', 'body' => 'Si fuiste víctima, reúne tus pruebas, denuncia ante el Ministerio Público y, si se trata de proveedores inmobiliarios, acude a PROFECO.'],
            ],
        ],
    ],

    'summary_points' => [
        'Desconfía de precios muy bajos y pagos antes de visitar.',
        'Verifica identidad y relación con la vivienda.',
        'Paga con comprobante y formaliza con contrato o notario.',
        'Los trámites de Infonavit son gratuitos.',
    ],

    'sources' => [
        ['name' => 'PROFECO', 'url' => 'https://www.gob.mx/profeco', 'description' => 'Quejas contra proveedores inmobiliarios.'],
        ['name' => 'Infonavit', 'url' => 'https://www.gob.mx/infonavit', 'description' => 'Alertas sobre intermediarios.'],
    ],
];
