<?php

return [
    'title' => 'Realiza tus trámites del IMSS',
    'summary' => 'Obtén tu NSS, date de alta en tu clínica, consulta tu vigencia de derechos, registra beneficiarios y usa IMSS Digital.',
    'icon' => 'heart-pulse',
    'duration' => 18,

    'paths' => [
        'question' => '¿Qué trámite necesitas?',
        'options' => [
            'nss' => ['label' => 'Obtener mi NSS', 'description' => 'Necesito mi Número de Seguridad Social.', 'icon' => 'hash'],
            'alta' => ['label' => 'Alta en clínica (UMF)', 'description' => 'Quiero registrarme en mi Unidad de Medicina Familiar.', 'icon' => 'hospital'],
            'vigencia' => ['label' => 'Consultar vigencia de derechos', 'description' => 'Quiero saber si tengo derecho a atención médica.', 'icon' => 'shield-check'],
            'beneficiarios' => ['label' => 'Registrar beneficiarios', 'description' => 'Quiero dar de alta a mi familia.', 'icon' => 'users'],
            'cambio' => ['label' => 'Cambiar de clínica', 'description' => 'Me mudé o necesito otra UMF.', 'icon' => 'map-pin'],
            'digital' => ['label' => 'Usar IMSS Digital', 'description' => 'Quiero hacer trámites desde mi celular.', 'icon' => 'smartphone'],
        ],
    ],

    'steps' => [
        [
            'title' => 'Introducción',
            'blocks' => [
                ['type' => 'text', 'body' => [
                    'El Instituto Mexicano del Seguro Social (IMSS) brinda seguridad social a trabajadores y sus familias: atención médica, incapacidades, pensiones y más.',
                    'Muchas personas confunden tres cosas distintas: tener NSS, estar dado de alta en una clínica y tener derechos vigentes. Esta guía te explica cada una por separado.',
                ]],
                ['type' => 'objectives', 'items' => [
                    'La diferencia entre NSS, alta en UMF y vigencia de derechos.',
                    'Cómo obtener tu NSS.',
                    'Cómo darte de alta en tu clínica y cambiarla.',
                    'Cómo registrar beneficiarios.',
                    'Qué puedes hacer en IMSS Digital.',
                ]],
            ],
        ],
        [
            'title' => 'NSS, UMF y vigencia: no son lo mismo',
            'blocks' => [
                ['type' => 'table', 'headers' => ['Concepto', 'Qué es', 'Qué NO significa'], 'rows' => [
                    ['NSS', 'Tu Número de Seguridad Social: un número de 11 dígitos que te identifica ante el IMSS de por vida.', 'No significa que tengas servicio médico.'],
                    ['Alta en UMF', 'Tu registro en la Unidad de Medicina Familiar (clínica) que te corresponde por tu domicilio.', 'No se puede usar si tus derechos no están vigentes.'],
                    ['Vigencia de derechos', 'Indica si en este momento tienes derecho a los servicios, por ejemplo porque tu patrón te dio de alta.', 'No es permanente: depende de que sigas asegurado.'],
                ]],
                ['type' => 'callout', 'tone' => 'warning', 'title' => 'Importante', 'body' => 'Obtener tu NSS no significa que tengas derechos vigentes. Para recibir atención médica como trabajador, tu patrón debe darte de alta en el IMSS (o debes estar asegurado por otra modalidad).'],
            ],
        ],
        [
            'title' => 'Elige tu trámite',
            'blocks' => [
                ['type' => 'paths'],
            ],
        ],
        [
            'title' => 'Obtener tu NSS',
            'paths' => ['nss'],
            'blocks' => [
                ['type' => 'procedure', 'items' => [
                    ['title' => 'Ten a la mano tu CURP y un correo', 'body' => 'Tu correo debe estar activo: ahí recibirás tu número.'],
                    ['title' => 'Entra al portal del IMSS o a IMSS Digital', 'body' => 'Busca el trámite de asignación o localización del NSS.'],
                    ['title' => 'Captura tus datos', 'body' => 'CURP y correo electrónico.'],
                    ['title' => 'Revisa tu correo', 'body' => 'Recibirás un documento con tu NSS. Guárdalo.'],
                ]],
                ['type' => 'callout', 'tone' => 'info', 'body' => 'Si ya tuviste un empleo formal, es probable que ya tengas NSS. El mismo trámite te ayuda a localizarlo.'],
            ],
        ],
        [
            'title' => 'Alta en tu clínica (UMF)',
            'paths' => ['alta'],
            'blocks' => [
                ['type' => 'procedure', 'items' => [
                    ['title' => 'Verifica tu vigencia de derechos', 'body' => 'Sin derechos vigentes no podrás usar los servicios.'],
                    ['title' => 'Regístrate en línea o en la clínica', 'body' => 'En IMSS Digital puedes darte de alta en la UMF que te corresponde según tu domicilio. También puedes acudir a la clínica.'],
                    ['title' => 'Ten a la mano tus datos', 'body' => 'NSS, CURP, código postal y correo electrónico.'],
                    ['title' => 'Conoce tu clínica', 'body' => 'Revisa tu consultorio y turno asignados.'],
                ]],
            ],
        ],
        [
            'title' => 'Consultar vigencia de derechos',
            'paths' => ['vigencia'],
            'blocks' => [
                ['type' => 'text', 'body' => ['El IMSS ofrece una constancia de vigencia de derechos que puedes obtener en línea. Te indica si tienes derecho a servicios médicos en este momento.']],
                ['type' => 'list', 'style' => 'check', 'items' => [
                    'Ten a la mano tu CURP, NSS y correo.',
                    'Si recién empezaste a trabajar, tu alta puede tardar unos días en reflejarse.',
                    'Si no apareces vigente y trabajas formalmente, pregunta a tu empleador si ya te dio de alta.',
                ]],
            ],
        ],
        [
            'title' => 'Registrar beneficiarios',
            'paths' => ['beneficiarios'],
            'blocks' => [
                ['type' => 'text', 'body' => ['Como asegurado, puedes registrar a familiares para que también reciban atención médica, siempre que cumplan las condiciones que establece el IMSS.']],
                ['type' => 'list', 'title' => 'Pueden ser beneficiarios, según las reglas del IMSS', 'style' => 'bullet', 'items' => [
                    'Tu cónyuge o concubina/concubinario.',
                    'Tus hijos, hasta cierta edad, que puede ampliarse si estudian o tienen alguna condición específica.',
                    'Tu padre y tu madre, si dependen económicamente de ti y viven contigo.',
                ]],
                ['type' => 'callout', 'tone' => 'info', 'body' => 'Necesitarás documentos que acrediten el parentesco (por ejemplo, actas). Consulta los requisitos vigentes en el portal del IMSS.'],
            ],
        ],
        [
            'title' => 'Cambiar de clínica',
            'paths' => ['cambio'],
            'blocks' => [
                ['type' => 'list', 'style' => 'check', 'items' => [
                    'La clínica se asigna según tu domicilio.',
                    'Si te mudas, puedes solicitar el cambio en IMSS Digital o en la clínica.',
                    'Ten a la mano tu nuevo código postal y un comprobante de domicilio.',
                ]],
            ],
        ],
        [
            'title' => 'IMSS Digital',
            'paths' => ['digital'],
            'blocks' => [
                ['type' => 'cards', 'items' => [
                    ['title' => 'NSS', 'body' => 'Asignación o localización.', 'icon' => 'hash'],
                    ['title' => 'Alta y cambio de clínica', 'body' => 'Registro en tu UMF.', 'icon' => 'hospital'],
                    ['title' => 'Vigencia de derechos', 'body' => 'Constancia en línea.', 'icon' => 'shield-check'],
                    ['title' => 'Semanas cotizadas', 'body' => 'Consulta cuánto tiempo has cotizado.', 'icon' => 'calendar'],
                ]],
                ['type' => 'callout', 'tone' => 'tip', 'body' => 'Descarga la app solo desde la tienda oficial de tu celular y verifica que el desarrollador sea el IMSS.'],
            ],
        ],
        [
            'title' => 'Sitios oficiales y localización',
            'blocks' => [
                ['type' => 'links', 'items' => [
                    ['label' => 'Portal del IMSS', 'url' => 'https://www.imss.gob.mx', 'description' => 'Trámites, NSS y vigencia de derechos.', 'icon' => 'heart-pulse'],
                    ['label' => 'Directorio del IMSS', 'url' => 'https://www.imss.gob.mx/directorio', 'description' => 'Busca clínicas y oficinas en Torreón, Coahuila.', 'icon' => 'map-pin'],
                    ['label' => 'Servicios digitales del IMSS', 'url' => 'https://serviciosdigitales.imss.gob.mx', 'description' => 'Trámites en línea.', 'icon' => 'smartphone'],
                ]],
                ['type' => 'checklist', 'id' => 'datos', 'title' => 'Ten listos estos datos', 'items' => [
                    'CURP.',
                    'NSS.',
                    'Correo electrónico activo.',
                    'Código postal de tu domicilio.',
                ]],
            ],
        ],
        [
            'title' => 'Pon a prueba lo que aprendiste',
            'blocks' => [
                ['type' => 'quiz', 'id' => 'evaluacion', 'questions' => [
                    ['question' => 'Si ya tienes tu NSS, ¿significa que tienes servicio médico?', 'options' => ['Sí, siempre.', 'No, necesitas tener derechos vigentes.', 'Solo los fines de semana.'], 'answer' => 1, 'explanation' => 'El NSS te identifica, pero la atención depende de tu vigencia de derechos.'],
                    ['question' => '¿Qué determina tu clínica (UMF)?', 'options' => ['Tu domicilio.', 'Tu edad.', 'Tu empleo.'], 'answer' => 0, 'explanation' => 'La UMF se asigna según tu domicilio.'],
                    ['question' => '¿Qué necesitas para obtener tu NSS en línea?', 'options' => ['CURP y correo electrónico.', 'Solo tu nombre.', 'Un pago.'], 'answer' => 0, 'explanation' => 'Con tu CURP y un correo activo puedes solicitarlo de forma gratuita.'],
                ]],
            ],
        ],
    ],

    'summary_points' => [
        'NSS, alta en UMF y vigencia de derechos son cosas distintas.',
        'El NSS se obtiene gratis en línea con tu CURP y correo.',
        'Para atención médica necesitas derechos vigentes y alta en tu UMF.',
        'IMSS Digital concentra muchos trámites desde tu celular.',
    ],

    'sources' => [
        ['name' => 'Instituto Mexicano del Seguro Social', 'url' => 'https://www.imss.gob.mx', 'description' => 'Trámites y servicios.'],
        ['name' => 'Servicios digitales del IMSS', 'url' => 'https://serviciosdigitales.imss.gob.mx', 'description' => 'Trámites en línea.'],
        ['name' => 'Directorio del IMSS', 'url' => 'https://www.imss.gob.mx/directorio', 'description' => 'Ubicación de unidades.'],
    ],
];
