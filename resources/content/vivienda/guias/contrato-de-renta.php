<?php

return [
    'title' => 'Qué revisar antes de firmar un contrato de renta',
    'summary' => 'Las cláusulas que debes leer con lupa para proteger tu dinero y tus derechos como inquilino.',
    'icon' => 'file-pen',
    'duration' => 12,

    'steps' => [
        [
            'title' => 'Introducción',
            'blocks' => [
                ['type' => 'text', 'body' => ['El contrato de arrendamiento define tus derechos y obligaciones. Leerlo completo antes de firmar te evita problemas con el pago, el depósito o la salida.']],
                ['type' => 'objectives', 'items' => [
                    'Qué datos debe tener un contrato.',
                    'Qué cláusulas revisar con atención.',
                    'Qué hacer si no entiendes algo.',
                ]],
            ],
        ],
        [
            'title' => 'Lo que debe incluir',
            'blocks' => [
                ['type' => 'checklist', 'id' => 'contenido', 'title' => 'Revisa que el contrato tenga', 'items' => [
                    'Nombres completos de arrendador e inquilino.',
                    'Dirección completa de la vivienda.',
                    'Monto de la renta, fecha y forma de pago.',
                    'Duración del contrato y condiciones de renovación.',
                    'Monto del depósito y condiciones para su devolución.',
                    'Quién paga cada servicio.',
                    'Inventario del estado de la vivienda (como anexo).',
                ]],
            ],
        ],
        [
            'title' => 'Cláusulas a revisar con lupa',
            'blocks' => [
                ['type' => 'cards', 'items' => [
                    ['title' => 'Incrementos de renta', 'body' => 'Cuándo y cómo puede subir la renta.', 'icon' => 'trending-up'],
                    ['title' => 'Reparaciones y mantenimiento', 'body' => 'Qué reparaciones le tocan al arrendador y cuáles a ti.', 'icon' => 'wrench'],
                    ['title' => 'Terminación anticipada', 'body' => 'Qué pasa si quieres salir antes y si hay penalización.', 'icon' => 'log-out'],
                    ['title' => 'Mascotas, visitas y subarriendo', 'body' => 'Si están permitidos y en qué condiciones.', 'icon' => 'users'],
                    ['title' => 'Penalizaciones por atraso', 'body' => 'Cuánto te cobrarían si pagas tarde.', 'icon' => 'clock'],
                ]],
                ['type' => 'callout', 'tone' => 'warning', 'body' => 'Si no entiendes una cláusula, pide que te la expliquen y, si es necesario, que la modifiquen antes de firmar. Todo acuerdo verbal debe quedar por escrito.'],
            ],
        ],
        [
            'title' => 'Practica',
            'blocks' => [
                ['type' => 'choice', 'id' => 'clausula', 'title' => 'Situación', 'icon' => 'file-pen', 'scenario' => 'El contrato dice: "El depósito no será reembolsable bajo ninguna circunstancia".', 'options' => [
                    ['label' => 'Firmo, así son todos.', 'feedback' => 'No todos los contratos son así. Esa cláusula te deja sin forma de recuperar tu depósito.'],
                    ['label' => 'Pregunto y negocio que se devuelva si entrego la vivienda en buen estado.', 'feedback' => 'Correcto. El depósito normalmente garantiza daños o adeudos; negocia condiciones claras de devolución.', 'best' => true],
                    ['label' => 'Firmo y luego lo reclamo.', 'feedback' => 'Lo firmado te obliga. Negocia antes.'],
                ]],
            ],
        ],
    ],

    'summary_points' => [
        'Lee el contrato completo antes de firmar.',
        'Revisa depósito, incrementos, reparaciones y terminación anticipada.',
        'Todo acuerdo debe quedar por escrito y con copia para ti.',
    ],

    'sources' => [
        ['name' => 'PROFECO', 'url' => 'https://www.gob.mx/profeco', 'description' => 'Orientación al consumidor.'],
    ],
];
