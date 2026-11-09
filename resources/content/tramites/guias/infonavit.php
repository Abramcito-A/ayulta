<?php

return [
    'title' => 'Conoce y utiliza Infonavit',
    'summary' => 'Crea Mi Cuenta Infonavit, consulta tu ahorro, entiende tu Subcuenta de Vivienda y prepárate antes de pedir un crédito.',
    'icon' => 'building-2',
    'duration' => 18,

    'paths' => [
        'question' => '¿Qué quieres hacer?',
        'options' => [
            'cuenta' => ['label' => 'Crear Mi Cuenta Infonavit', 'description' => 'Nunca he entrado a mi cuenta.', 'icon' => 'user-round'],
            'ahorro' => ['label' => 'Consultar mi ahorro y aportaciones', 'description' => 'Quiero saber cuánto tengo en mi Subcuenta de Vivienda.', 'icon' => 'piggy-bank'],
            'credito' => ['label' => 'Conocer la precalificación y el crédito', 'description' => 'Estoy pensando en pedir un crédito.', 'icon' => 'house'],
        ],
    ],

    'steps' => [
        [
            'title' => 'Introducción',
            'blocks' => [
                ['type' => 'text', 'body' => [
                    'El Instituto del Fondo Nacional de la Vivienda para los Trabajadores (Infonavit) administra el ahorro para vivienda de los trabajadores del sector privado y otorga créditos para comprar, construir, mejorar o pagar una vivienda.',
                    'Si trabajas formalmente, tu patrón aporta a tu Subcuenta de Vivienda aunque tú no lo notes. Ese dinero es tuyo.',
                ]],
                ['type' => 'objectives', 'items' => [
                    'Cómo funciona Infonavit y las aportaciones patronales.',
                    'Qué es la Subcuenta de Vivienda.',
                    'Cómo crear Mi Cuenta Infonavit y consultar tu ahorro.',
                    'Qué es la precalificación y qué considerar antes de solicitar un crédito.',
                ]],
            ],
        ],
        [
            'title' => 'Cómo funciona',
            'blocks' => [
                ['type' => 'terms', 'items' => [
                    ['term' => 'Aportaciones patronales', 'definition' => 'Tu patrón aporta el equivalente al 5% de tu salario base de cotización a tu Subcuenta de Vivienda. No se descuenta de tu sueldo.'],
                    ['term' => 'Subcuenta de Vivienda', 'definition' => 'Donde se acumulan esas aportaciones y sus rendimientos. Puedes usarla como parte de un crédito Infonavit. Si no la usas, existen reglas para recuperarla al retirarte.'],
                    ['term' => 'Mi Cuenta Infonavit', 'definition' => 'El portal donde consultas tu ahorro, tu precalificación y realizas trámites.'],
                    ['term' => 'Precalificación', 'definition' => 'Una evaluación que considera factores como tu edad, salario, ahorro y tiempo cotizando para saber si puedes solicitar un crédito y por cuánto.'],
                ]],
                ['type' => 'callout', 'tone' => 'info', 'body' => 'Las reglas, programas y requisitos de Infonavit se actualizan. Consulta siempre la información vigente en sus canales oficiales.'],
            ],
        ],
        [
            'title' => 'Elige qué necesitas',
            'blocks' => [
                ['type' => 'paths'],
            ],
        ],
        [
            'title' => 'Crear Mi Cuenta Infonavit',
            'paths' => ['cuenta'],
            'blocks' => [
                ['type' => 'procedure', 'items' => [
                    ['title' => 'Reúne tus datos', 'body' => 'Número de Seguridad Social (NSS), CURP, RFC, un correo electrónico y un número de celular.'],
                    ['title' => 'Entra al portal oficial', 'body' => 'Escribe la dirección tú mismo o entra desde gob.mx/infonavit.'],
                    ['title' => 'Regístrate', 'body' => 'Captura tus datos y crea una contraseña segura.'],
                    ['title' => 'Activa tu cuenta', 'body' => 'Sigue las instrucciones que te lleguen por correo.'],
                ]],
            ],
        ],
        [
            'title' => 'Consultar tu ahorro y aportaciones',
            'paths' => ['ahorro'],
            'blocks' => [
                ['type' => 'list', 'style' => 'check', 'items' => [
                    'En Mi Cuenta Infonavit puedes ver el saldo de tu Subcuenta de Vivienda.',
                    'Revisa que tus aportaciones aparezcan con regularidad mientras trabajas.',
                    'Si no aparecen aportaciones y tienes empleo formal, pregunta a tu patrón.',
                    'Tu estado de cuenta de la AFORE también muestra tu Subcuenta de Vivienda.',
                ]],
            ],
        ],
        [
            'title' => 'Precalificación y opciones de crédito',
            'paths' => ['credito'],
            'blocks' => [
                ['type' => 'text', 'body' => ['En Mi Cuenta Infonavit puedes consultar tu precalificación. Si cumples los requisitos, podrás conocer el monto aproximado de crédito al que podrías acceder.']],
                ['type' => 'compare', 'intro' => 'Infonavit ofrece distintas modalidades. Sus nombres y condiciones pueden cambiar; algunas opciones conocidas son:', 'items' => [
                    ['title' => 'Crédito Infonavit', 'icon' => 'house', 'body' => 'Para comprar una vivienda nueva o usada, construir, mejorar o pagar una hipoteca.'],
                    ['title' => 'Crédito con un banco', 'icon' => 'landmark', 'body' => 'Esquemas que combinan tu crédito Infonavit con uno bancario para alcanzar un monto mayor.'],
                    ['title' => 'Crédito con otra persona', 'icon' => 'users', 'body' => 'Esquemas para unir créditos con otra persona derechohabiente.'],
                ]],
            ],
        ],
        [
            'title' => 'Antes de solicitar un crédito',
            'blocks' => [
                ['type' => 'list', 'title' => 'Consideraciones', 'style' => 'warning', 'items' => [
                    'Calcula tu capacidad de pago: el descuento saldrá de tu nómina durante años.',
                    'Revisa las condiciones: tasa, plazo, seguros y cómo cambia el pago.',
                    'Considera gastos adicionales: avalúo, escrituración y mudanza.',
                    'Visita la vivienda y verifica su situación legal.',
                ]],
                ['type' => 'callout', 'tone' => 'warning', 'title' => 'Sin intermediarios', 'body' => 'Los trámites de Infonavit son gratuitos. Desconfía de "gestores" que te cobren por precalificarte o por liberar tu crédito.'],
                ['type' => 'links', 'items' => [
                    ['label' => 'Infonavit en gob.mx', 'url' => 'https://www.gob.mx/infonavit', 'description' => 'Información oficial y avisos.', 'icon' => 'building-2'],
                    ['label' => 'Mi Cuenta Infonavit', 'url' => 'https://micuenta.infonavit.org.mx', 'description' => 'Consulta tu ahorro y precalificación.', 'icon' => 'user-round'],
                ]],
            ],
        ],
        [
            'title' => 'Pon a prueba lo que aprendiste',
            'blocks' => [
                ['type' => 'quiz', 'id' => 'evaluacion', 'questions' => [
                    ['question' => '¿Quién hace las aportaciones a tu Subcuenta de Vivienda?', 'options' => ['Tu patrón.', 'Tú, con descuento en tu sueldo.', 'El banco.'], 'answer' => 0, 'explanation' => 'Tu patrón aporta el equivalente al 5% de tu salario base de cotización.'],
                    ['question' => '¿Qué es la precalificación?', 'options' => ['El pago de una cuota.', 'Una evaluación para saber si puedes solicitar un crédito y por cuánto.', 'Un seguro de vivienda.'], 'answer' => 1, 'explanation' => 'La precalificación considera factores como edad, salario, ahorro y tiempo cotizando.'],
                    ['question' => 'Un gestor te cobra por "liberar" tu crédito. ¿Qué haces?', 'options' => ['Pago, así es más rápido.', 'Desconfío: los trámites de Infonavit son gratuitos.', 'Le doy mis datos de Mi Cuenta.'], 'answer' => 1, 'explanation' => 'Nunca compartas tus accesos ni pagues a intermediarios.'],
                ]],
            ],
        ],
    ],

    'summary_points' => [
        'Tu patrón aporta el 5% de tu salario base a tu Subcuenta de Vivienda.',
        'Consulta tu ahorro y precalificación en Mi Cuenta Infonavit.',
        'Antes de un crédito, evalúa tu capacidad de pago y los gastos adicionales.',
        'Los trámites son gratuitos: no uses intermediarios.',
    ],

    'sources' => [
        ['name' => 'Infonavit', 'url' => 'https://www.gob.mx/infonavit', 'description' => 'Información oficial.'],
        ['name' => 'Mi Cuenta Infonavit', 'url' => 'https://micuenta.infonavit.org.mx', 'description' => 'Portal de derechohabientes.'],
    ],
];
