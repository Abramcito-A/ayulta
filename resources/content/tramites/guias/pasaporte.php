<?php

return [
    'title' => 'Tramita tu pasaporte',
    'summary' => 'Primera expedición, renovación o pasaporte para menores: requisitos generales, pago, cita y entrega.',
    'icon' => 'plane',
    'duration' => 15,

    'paths' => [
        'question' => '¿Qué necesitas?',
        'options' => [
            'primera' => ['label' => 'Primera expedición', 'description' => 'Nunca he tenido pasaporte mexicano.', 'icon' => 'sparkles'],
            'renovacion' => ['label' => 'Renovación', 'description' => 'Ya tuve pasaporte y quiero uno nuevo.', 'icon' => 'rotate-ccw'],
            'menores' => ['label' => 'Pasaporte para un menor', 'description' => 'Es para una persona menor de edad.', 'icon' => 'baby'],
        ],
    ],

    'steps' => [
        [
            'title' => 'Introducción',
            'blocks' => [
                ['type' => 'text', 'body' => [
                    'El pasaporte mexicano lo expide la Secretaría de Relaciones Exteriores (SRE). Es el documento que te identifica como mexicano en el extranjero y también es una identificación oficial dentro del país.',
                ]],
                ['type' => 'objectives', 'items' => [
                    'Qué documentos se piden para acreditar nacionalidad e identidad.',
                    'Cómo pagar los derechos y agendar tu cita.',
                    'Qué vigencias existen y qué considerar sobre los costos.',
                    'Cómo es la atención presencial y la entrega.',
                ]],
                ['type' => 'callout', 'tone' => 'warning', 'title' => 'Sobre los costos', 'body' => 'Las tarifas del pasaporte se actualizan periódicamente y dependen de la vigencia. AYULTA no muestra montos: consúltalos en el portal oficial de la SRE antes de pagar.'],
            ],
        ],
        [
            'title' => 'Requisitos generales',
            'blocks' => [
                ['type' => 'cards', 'items' => [
                    ['title' => 'Acreditación de nacionalidad', 'body' => 'Normalmente con tu acta de nacimiento. También existen otros documentos que acreditan la nacionalidad mexicana, como la carta de naturalización.', 'icon' => 'flag'],
                    ['title' => 'Identificación oficial', 'body' => 'Con fotografía, por ejemplo tu credencial para votar. La SRE publica la lista de identificaciones aceptadas.', 'icon' => 'id-card'],
                    ['title' => 'Comprobante de pago', 'body' => 'Del pago de derechos correspondiente a la vigencia que elegiste.', 'icon' => 'receipt'],
                    ['title' => 'Documentación adicional', 'body' => 'Según tu caso: CURP, pasaporte anterior, documentos de los padres en caso de menores, entre otros.', 'icon' => 'file-text'],
                ]],
                ['type' => 'callout', 'tone' => 'info', 'body' => 'Los requisitos exactos pueden variar según tu caso. Revisa la lista completa en el portal de la SRE antes de tu cita.'],
            ],
        ],
        [
            'title' => 'Elige tu caso',
            'blocks' => [
                ['type' => 'paths'],
            ],
        ],
        [
            'title' => 'Primera expedición',
            'paths' => ['primera'],
            'blocks' => [
                ['type' => 'list', 'style' => 'check', 'items' => [
                    'Documento que acredite tu nacionalidad, en original.',
                    'Identificación oficial con fotografía vigente.',
                    'Comprobante del pago de derechos.',
                    'Los documentos adicionales que indique la SRE para tu caso.',
                ]],
                ['type' => 'callout', 'tone' => 'tip', 'body' => 'Revisa que tu nombre sea idéntico en tu acta y en tu identificación. Si hay diferencias, consulta a la SRE antes de acudir.'],
            ],
        ],
        [
            'title' => 'Renovación',
            'paths' => ['renovacion'],
            'blocks' => [
                ['type' => 'list', 'style' => 'check', 'items' => [
                    'Lleva tu pasaporte anterior.',
                    'Identificación oficial con fotografía.',
                    'Comprobante del pago de derechos.',
                    'Si tu pasaporte anterior se perdió o fue robado, consulta los requisitos adicionales.',
                ]],
            ],
        ],
        [
            'title' => 'Pasaporte para menores',
            'paths' => ['menores'],
            'blocks' => [
                ['type' => 'list', 'style' => 'check', 'items' => [
                    'Acta de nacimiento del menor.',
                    'Presencia de ambos padres o de quien ejerza la patria potestad o tutela, con identificación oficial.',
                    'Si uno de los padres no puede acudir, consulta las alternativas que acepta la SRE.',
                    'Identificación del menor, cuando aplique según su edad.',
                    'Comprobante del pago de derechos.',
                ]],
                ['type' => 'callout', 'tone' => 'info', 'body' => 'Las vigencias disponibles para menores dependen de su edad.'],
            ],
        ],
        [
            'title' => 'Vigencias, pago y cita',
            'blocks' => [
                ['type' => 'text', 'body' => ['El pasaporte se expide con distintas vigencias (por ejemplo, 1, 3, 6 o 10 años), y algunas solo están disponibles para adultos. A mayor vigencia, mayor costo. Existen descuentos para ciertos grupos de población; verifica si te corresponde.']],
                ['type' => 'procedure', 'items' => [
                    ['title' => 'Elige la vigencia', 'body' => 'Según tu edad y tus planes de viaje.'],
                    ['title' => 'Paga los derechos', 'body' => 'Consulta en el portal de la SRE el monto vigente y las formas de pago. Guarda tu comprobante.'],
                    ['title' => 'Agenda tu cita', 'body' => 'En el sistema oficial de citas de la SRE. Las citas son gratuitas.'],
                    ['title' => 'Acude con tus documentos', 'body' => 'Llega con anticipación a la oficina que elegiste.'],
                ]],
                ['type' => 'callout', 'tone' => 'warning', 'title' => 'Cuidado con intermediarios', 'body' => 'Nadie debe cobrarte por una cita. Usa solo el sistema oficial de la SRE.'],
                ['type' => 'links', 'items' => [
                    ['label' => 'Citas SRE', 'url' => 'https://citas.sre.gob.mx', 'description' => 'Sistema oficial de citas para pasaporte.', 'icon' => 'calendar'],
                    ['label' => 'Secretaría de Relaciones Exteriores', 'url' => 'https://www.gob.mx/sre', 'description' => 'Requisitos, tarifas vigentes y oficinas.', 'icon' => 'plane'],
                ]],
            ],
        ],
        [
            'title' => 'Atención presencial y entrega',
            'blocks' => [
                ['type' => 'procedure', 'items' => [
                    ['title' => 'Revisión de documentos', 'body' => 'El personal verifica tus documentos originales.'],
                    ['title' => 'Captura de datos', 'body' => 'Te toman fotografía, huellas y firma.'],
                    ['title' => 'Revisión de datos', 'body' => 'Confirma que tu información sea correcta antes de la impresión.'],
                    ['title' => 'Entrega', 'body' => 'La oficina te indicará cuándo y cómo recoger tu pasaporte. Revísalo al recibirlo.'],
                ]],
                ['type' => 'checklist', 'id' => 'antes-de-ir', 'title' => 'Checklist antes de tu cita', 'items' => [
                    'Tengo mi cita confirmada.',
                    'Pagué los derechos y llevo el comprobante.',
                    'Llevo mi documento de nacionalidad en original.',
                    'Llevo mi identificación oficial vigente.',
                    'Revisé los requisitos adicionales para mi caso.',
                ]],
            ],
        ],
        [
            'title' => 'Pon a prueba lo que aprendiste',
            'blocks' => [
                ['type' => 'quiz', 'id' => 'evaluacion', 'questions' => [
                    ['question' => '¿Dónde consultas el costo vigente del pasaporte?', 'options' => ['En un video de redes.', 'En el portal oficial de la SRE.', 'Con un gestor.'], 'answer' => 1, 'explanation' => 'Las tarifas cambian; consúltalas siempre en el portal oficial.'],
                    ['question' => 'Para el pasaporte de un menor, normalmente…', 'options' => ['Basta con que acuda el menor.', 'Deben acudir ambos padres o tutores, o presentar la alternativa que acepte la SRE.', 'No se necesita acta de nacimiento.'], 'answer' => 1, 'explanation' => 'Se requiere el consentimiento de quienes ejercen la patria potestad o tutela.'],
                    ['question' => '¿Cuánto cuesta agendar una cita?', 'options' => ['Es gratuita.', 'Depende del gestor.', 'Se paga en la oficina.'], 'answer' => 0, 'explanation' => 'La cita es gratuita; solo pagas los derechos del pasaporte.'],
                ]],
            ],
        ],
    ],

    'summary_points' => [
        'Acredita nacionalidad e identidad con documentos originales.',
        'Paga los derechos según la vigencia y consulta el monto vigente en la SRE.',
        'Agenda tu cita gratuita en el sistema oficial.',
        'Para menores, se requiere el consentimiento de padres o tutores.',
    ],

    'sources' => [
        ['name' => 'Secretaría de Relaciones Exteriores', 'url' => 'https://www.gob.mx/sre', 'description' => 'Requisitos y tarifas vigentes del pasaporte.'],
        ['name' => 'Citas SRE', 'url' => 'https://citas.sre.gob.mx', 'description' => 'Sistema oficial de citas.'],
    ],
];
