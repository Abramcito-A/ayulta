<?php

return [
    'title' => 'Tramita tu INE',
    'summary' => 'Primera vez, renovación, reposición, cambio de domicilio o consulta de estatus: qué llevar y cómo es el proceso.',
    'icon' => 'id-card',
    'duration' => 15,

    'paths' => [
        'question' => '¿Qué trámite necesitas?',
        'options' => [
            'primera-vez' => ['label' => 'Primera vez', 'description' => 'Nunca he tenido credencial para votar.', 'icon' => 'sparkles'],
            'renovacion' => ['label' => 'Renovación', 'description' => 'Mi credencial está vencida o por vencer.', 'icon' => 'rotate-ccw'],
            'reposicion' => ['label' => 'Reposición', 'description' => 'La perdí, me la robaron o está dañada.', 'icon' => 'search'],
            'domicilio' => ['label' => 'Cambio de domicilio', 'description' => 'Me mudé y necesito actualizarla.', 'icon' => 'map-pin'],
            'estatus' => ['label' => 'Consultar estatus', 'description' => 'Ya hice mi trámite y quiero saber cómo va.', 'icon' => 'clock'],
        ],
    ],

    'steps' => [
        [
            'title' => 'Introducción',
            'blocks' => [
                ['type' => 'text', 'body' => [
                    'La credencial para votar que expide el Instituto Nacional Electoral (INE) te permite votar y es una de las identificaciones oficiales más usadas en México para trámites, bancos y servicios.',
                    'El trámite es gratuito y personal: nadie puede hacerlo por ti ni cobrarte por una cita.',
                ]],
                ['type' => 'objectives', 'items' => [
                    'Qué documentos se piden y para qué sirve cada uno.',
                    'Cómo agendar una cita y encontrar un módulo.',
                    'Cómo es el procedimiento en el módulo.',
                    'Cómo y cuándo recoger tu credencial.',
                ]],
            ],
        ],
        [
            'title' => 'Qué necesitas en general',
            'blocks' => [
                ['type' => 'callout', 'tone' => 'warning', 'title' => 'Información general', 'body' => 'Estos son los tipos de documentos que pide el INE. La lista exacta de documentos aceptados está en el portal oficial y puede cambiar.'],
                ['type' => 'cards', 'items' => [
                    ['title' => 'Documento de nacionalidad', 'body' => 'Para demostrar que eres mexicano. Lo más común es el acta de nacimiento en original. También se aceptan otros documentos como la carta de naturalización o el certificado de nacionalidad.', 'icon' => 'flag'],
                    ['title' => 'Identificación con fotografía', 'body' => 'Para comprobar tu identidad, por ejemplo pasaporte, cédula profesional, licencia de conducir o credencial escolar con fotografía, según la lista vigente del INE. Si no tienes ninguna, consulta las alternativas que contempla el INE.', 'icon' => 'id-card'],
                    ['title' => 'Comprobante de domicilio', 'body' => 'Para registrar dónde vives: recibos de luz, agua, teléfono o predial, entre otros. Debe ser reciente; el INE indica la antigüedad máxima aceptada.', 'icon' => 'house'],
                ]],
                ['type' => 'list', 'title' => 'Requisitos particulares que pueden aplicar', 'style' => 'bullet', 'items' => [
                    'Si tu nombre en el acta tiene errores, quizá debas corregirla primero en el Registro Civil.',
                    'Si naciste en el extranjero de padres mexicanos, se piden documentos específicos.',
                    'Si tienes 17 años, revisa en el portal si puedes tramitarla según el calendario electoral.',
                ]],
            ],
        ],
        [
            'title' => 'Elige tu trámite',
            'blocks' => [
                ['type' => 'paths'],
            ],
        ],
        [
            'title' => 'Primera vez',
            'paths' => ['primera-vez'],
            'blocks' => [
                ['type' => 'text', 'body' => ['Si nunca has tenido credencial, necesitas presentar los tres tipos de documentos en original: nacionalidad, identificación con fotografía y comprobante de domicilio.']],
                ['type' => 'callout', 'tone' => 'tip', 'body' => 'Revisa que tu nombre, fecha y lugar de nacimiento coincidan en todos tus documentos. Las diferencias pueden retrasar tu trámite.'],
            ],
        ],
        [
            'title' => 'Renovación',
            'paths' => ['renovacion'],
            'blocks' => [
                ['type' => 'text', 'body' => ['La credencial tiene una vigencia impresa. Cuando vence, deja de ser válida como identificación y debes renovarla.']],
                ['type' => 'list', 'style' => 'check', 'items' => [
                    'Lleva tu credencial anterior, si la tienes.',
                    'Presenta los documentos que el INE solicita para tu caso.',
                    'Aprovecha para actualizar tu domicilio si cambió.',
                ]],
                ['type' => 'callout', 'tone' => 'tip', 'body' => 'No esperes al último momento: en periodos cercanos a elecciones suele haber más demanda en los módulos.'],
            ],
        ],
        [
            'title' => 'Reposición',
            'paths' => ['reposicion'],
            'blocks' => [
                ['type' => 'text', 'body' => ['Si perdiste tu credencial, te la robaron o está dañada, puedes solicitar una reposición. Si tus datos no cambiaron, el trámite suele ser más sencillo.']],
                ['type' => 'list', 'style' => 'check', 'items' => [
                    'Presenta una identificación con fotografía.',
                    'Si te la robaron, considera reportarlo para prevenir el robo de identidad.',
                    'Si además cambiaron tus datos, lleva los documentos correspondientes.',
                ]],
            ],
        ],
        [
            'title' => 'Cambio de domicilio',
            'paths' => ['domicilio'],
            'blocks' => [
                ['type' => 'text', 'body' => ['Si te mudaste, debes actualizar tu domicilio. Así votarás en la casilla que te corresponde y tu identificación estará al día.']],
                ['type' => 'list', 'style' => 'check', 'items' => [
                    'Lleva un comprobante de tu nuevo domicilio.',
                    'Presenta una identificación con fotografía.',
                    'Acude a un módulo cercano a tu nuevo domicilio.',
                ]],
            ],
        ],
        [
            'title' => 'Consultar el estatus',
            'paths' => ['estatus'],
            'blocks' => [
                ['type' => 'procedure', 'items' => [
                    ['title' => 'Ten a la mano tu comprobante', 'body' => 'Al hacer tu trámite te entregan un comprobante con un número de folio.'],
                    ['title' => 'Consulta en el portal del INE', 'body' => 'En la sección de credencial encontrarás la opción para consultar el estado de tu trámite.'],
                    ['title' => 'También puedes llamar a INETEL', 'body' => 'La línea de atención del INE es 800 433 2000.'],
                ]],
            ],
        ],
        [
            'title' => 'Cita, módulo y procedimiento',
            'blocks' => [
                ['type' => 'procedure', 'items' => [
                    ['title' => 'Agenda tu cita', 'body' => 'En el portal del INE o llamando a INETEL (800 433 2000). Es gratuita.'],
                    ['title' => 'Ubica tu módulo', 'body' => 'En el portal del INE busca la opción para ubicar módulos. En Torreón, Coahuila, selecciona tu municipio o escribe tu código postal.'],
                    ['title' => 'Acude puntual con tus documentos originales', 'body' => 'El personal revisará tus documentos.'],
                    ['title' => 'Toma de datos', 'body' => 'Te tomarán fotografía, huellas dactilares y firma.'],
                    ['title' => 'Recibe tu comprobante', 'body' => 'Guárdalo: lo necesitarás para recoger tu credencial.'],
                ]],
                ['type' => 'links', 'items' => [
                    ['label' => 'Credencial para votar (INE)', 'url' => 'https://www.ine.mx/credencial/', 'description' => 'Requisitos, citas y localizador de módulos.', 'icon' => 'id-card'],
                ]],
            ],
        ],
        [
            'title' => 'Entrega de tu credencial',
            'blocks' => [
                ['type' => 'list', 'style' => 'check', 'items' => [
                    'Regresa al módulo en la fecha que te indiquen, con tu comprobante.',
                    'La credencial se entrega personalmente: verificarán tu identidad con tu huella.',
                    'Revisa que todos tus datos sean correctos antes de irte.',
                    'Si no la recoges dentro del plazo que te indiquen, tu trámite puede cancelarse.',
                ]],
                ['type' => 'checklist', 'id' => 'antes-de-ir', 'title' => 'Checklist antes de ir al módulo', 'items' => [
                    'Tengo cita confirmada.',
                    'Llevo mi documento de nacionalidad en original.',
                    'Llevo mi identificación con fotografía.',
                    'Llevo mi comprobante de domicilio reciente.',
                    'Mis datos coinciden en todos los documentos.',
                    'Sé la dirección del módulo.',
                ]],
            ],
        ],
        [
            'title' => 'Pon a prueba lo que aprendiste',
            'blocks' => [
                ['type' => 'quiz', 'id' => 'evaluacion', 'questions' => [
                    ['question' => '¿Cuánto cuesta tramitar tu credencial para votar?', 'options' => ['Es gratuita.', 'Depende del módulo.', 'Se paga la cita.'], 'answer' => 0, 'explanation' => 'El trámite es gratuito. Desconfía de quien te cobre por una cita.'],
                    ['question' => '¿Para qué sirve el comprobante de domicilio?', 'options' => ['Para demostrar tu nacionalidad.', 'Para registrar dónde vives.', 'Para pagar el trámite.'], 'answer' => 1, 'explanation' => 'El comprobante de domicilio registra dónde vives y define tu sección electoral.'],
                    ['question' => '¿Puede otra persona recoger tu credencial?', 'options' => ['Sí, con una carta poder.', 'No, se entrega personalmente.', 'Sí, si es familiar.'], 'answer' => 1, 'explanation' => 'Por seguridad, la credencial solo se entrega a su titular.'],
                ]],
            ],
        ],
    ],

    'summary_points' => [
        'El trámite es gratuito y personal.',
        'Necesitas documentos de nacionalidad, identificación con fotografía y domicilio.',
        'Agenda tu cita en el portal del INE o en INETEL (800 433 2000).',
        'Guarda tu comprobante y recoge tu credencial en el plazo indicado.',
        'Confirma los requisitos vigentes en el portal oficial.',
    ],

    'sources' => [
        ['name' => 'Instituto Nacional Electoral', 'url' => 'https://www.ine.mx/credencial/', 'description' => 'Credencial para votar: requisitos, citas y módulos.'],
    ],
];
