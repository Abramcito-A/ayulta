<?php

return [
    'title' => 'Prepárate para independizarte',
    'summary' => 'Un juego de cuatro situaciones reales: elige, descubre la opción más recomendable y conoce tu resultado.',
    'icon' => 'gamepad-2',
    'duration' => 10,

    'steps' => [
        [
            'title' => 'Situación 1: El depósito',
            'blocks' => [
                ['type' => 'choice', 'id' => 's1', 'title' => 'Situación 1 de 4', 'icon' => 'banknote', 'scenario' => 'Te solicitan un depósito antes de mostrarte el departamento.', 'question' => '¿Qué haces?', 'options' => [
                    ['label' => 'Deposito para no perder la oportunidad.', 'feedback' => 'Pagar sin ver la vivienda es una de las formas más comunes de fraude.'],
                    ['label' => 'Pido visitarlo primero y verifico quién lo renta antes de pagar.', 'feedback' => 'Es lo más recomendable: confirmas que la vivienda existe, su estado y que la persona tiene derecho a rentarla.', 'best' => true],
                    ['label' => 'Deposito solo una parte.', 'feedback' => 'Aunque sea una parte, el riesgo de perderla es el mismo.'],
                ], 'tip' => 'Nunca entregues dinero sin visitar la vivienda y sin un recibo.'],
            ],
        ],
        [
            'title' => 'Situación 2: El contrato',
            'blocks' => [
                ['type' => 'choice', 'id' => 's2', 'title' => 'Situación 2 de 4', 'icon' => 'file-pen', 'scenario' => 'El contrato contiene cláusulas que no entiendes.', 'question' => '¿Qué haces?', 'options' => [
                    ['label' => 'Firmo, seguro son normales.', 'feedback' => 'Firmar sin entender te obliga a cumplir condiciones que podrían perjudicarte.'],
                    ['label' => 'Pido que me las expliquen, consulto con alguien de confianza y negocio antes de firmar.', 'feedback' => 'Muy bien: entender el contrato te protege y te permite negociar.', 'best' => true],
                    ['label' => 'No firmo nada y rento sin contrato.', 'feedback' => 'Sin contrato no tienes respaldo por escrito de lo acordado.'],
                ], 'tip' => 'Revisa con atención el depósito, los incrementos, las reparaciones y la terminación anticipada.'],
            ],
        ],
        [
            'title' => 'Situación 3: La reparación',
            'blocks' => [
                ['type' => 'choice', 'id' => 's3', 'title' => 'Situación 3 de 4', 'icon' => 'wrench', 'scenario' => 'Ya vives en el departamento y aparece una fuga de agua en el baño.', 'question' => '¿Qué haces?', 'options' => [
                    ['label' => 'La ignoro, no es mi casa.', 'feedback' => 'Una fuga puede empeorar, causar daños y aumentar el recibo de agua.'],
                    ['label' => 'Aviso por escrito al arrendador, con fotos, y reviso qué dice el contrato sobre reparaciones.', 'feedback' => 'Correcto: dejas constancia y actúas según lo acordado en el contrato.', 'best' => true],
                    ['label' => 'La reparo y descuento el costo de la renta sin avisar.', 'feedback' => 'Descontar sin acuerdo puede generar conflictos o incumplimiento del contrato.'],
                ], 'tip' => 'Guarda mensajes y fotos de todos los reportes.'],
            ],
        ],
        [
            'title' => 'Situación 4: Compartir departamento',
            'blocks' => [
                ['type' => 'choice', 'id' => 's4', 'title' => 'Situación 4 de 4', 'icon' => 'users', 'scenario' => 'Vas a compartir departamento con otras dos personas.', 'question' => '¿Qué haces antes de mudarse?', 'options' => [
                    ['label' => 'Nada, ya veremos sobre la marcha.', 'feedback' => 'Sin acuerdos claros es común que surjan conflictos por pagos y tareas.'],
                    ['label' => 'Acordamos por escrito cómo dividir renta, depósito, servicios y tareas, y quién firma el contrato.', 'feedback' => 'Excelente: los acuerdos claros previenen problemas de dinero y convivencia.', 'best' => true],
                    ['label' => 'Pongo todo a mi nombre y luego me pagan.', 'feedback' => 'Si alguien no paga, tú serías responsable de todo ante el arrendador.'],
                ], 'tip' => 'Definan también qué pasa si alguien decide irse antes.'],
            ],
        ],
        [
            'title' => 'Tus resultados',
            'blocks' => [
                ['type' => 'tool', 'name' => 'choice-results'],
                ['type' => 'list', 'title' => 'Recomendaciones para tu independencia', 'style' => 'check', 'items' => [
                    'Visita siempre antes de pagar.',
                    'Lee y entiende tu contrato.',
                    'Reporta los problemas por escrito.',
                    'Pon tus acuerdos de convivencia por escrito.',
                ]],
            ],
        ],
    ],

    'summary_points' => [
        'Visita y verifica antes de entregar dinero.',
        'Entiende cada cláusula antes de firmar.',
        'Deja constancia por escrito de reportes y acuerdos.',
    ],

    'sources' => [
        ['name' => 'PROFECO', 'url' => 'https://www.gob.mx/profeco', 'description' => 'Orientación al consumidor.'],
    ],
];
