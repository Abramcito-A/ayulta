<?php

return [
    'title' => 'Obtén tu RFC',
    'summary' => 'Qué es el RFC, cómo inscribirte, consultar tu clave, descargar tu Constancia de Situación Fiscal y actualizar tus datos.',
    'icon' => 'landmark',
    'duration' => 15,

    'paths' => [
        'question' => '¿Qué necesitas hacer?',
        'options' => [
            'inscripcion' => ['label' => 'Inscribirme por primera vez', 'description' => 'Nunca he tenido RFC.', 'icon' => 'sparkles'],
            'consultar' => ['label' => 'Consultar mi RFC', 'description' => 'Creo que ya tengo, pero no sé cuál es.', 'icon' => 'search'],
            'constancia' => ['label' => 'Obtener mi Constancia de Situación Fiscal', 'description' => 'Me la piden en el trabajo o en un trámite.', 'icon' => 'file-text'],
            'actualizar' => ['label' => 'Actualizar mis datos', 'description' => 'Cambié de domicilio o de actividad.', 'icon' => 'file-pen'],
            'corregir' => ['label' => 'Corregir información', 'description' => 'Mi nombre u otro dato está mal.', 'icon' => 'circle-alert'],
        ],
    ],

    'steps' => [
        [
            'title' => 'Introducción',
            'blocks' => [
                ['type' => 'text', 'body' => [
                    'El Registro Federal de Contribuyentes (RFC) es la clave que te identifica ante el Servicio de Administración Tributaria (SAT). Te la piden para trabajar formalmente, recibir facturas, abrir algunas cuentas y realizar trámites.',
                    'Tener RFC no significa que debas pagar impuestos por sí mismo: tus obligaciones dependen de tu situación fiscal.',
                ]],
                ['type' => 'objectives', 'items' => [
                    'Qué es el RFC y qué es el SAT.',
                    'La diferencia entre inscripción y Constancia de Situación Fiscal.',
                    'Los tipos de situaciones fiscales más comunes.',
                    'Las modalidades de atención del SAT.',
                ]],
            ],
        ],
        [
            'title' => 'Conceptos básicos',
            'blocks' => [
                ['type' => 'terms', 'items' => [
                    ['term' => 'SAT', 'definition' => 'El Servicio de Administración Tributaria es el órgano del gobierno encargado de recaudar impuestos y administrar el RFC.'],
                    ['term' => 'RFC', 'definition' => 'Clave alfanumérica que te identifica como contribuyente. Para personas físicas tiene 13 caracteres: se forma con tu nombre, tu fecha de nacimiento y una homoclave.'],
                    ['term' => 'Inscripción al RFC', 'definition' => 'El trámite para registrarte por primera vez ante el SAT y obtener tu clave.'],
                    ['term' => 'Constancia de Situación Fiscal (CSF)', 'definition' => 'Documento que muestra tus datos ante el SAT: RFC, nombre, domicilio fiscal, régimen y obligaciones. No es una inscripción: es un comprobante de que ya estás inscrito.'],
                    ['term' => 'Contraseña del SAT', 'definition' => 'Clave de acceso para realizar trámites en línea.'],
                    ['term' => 'e.firma', 'definition' => 'Firma electrónica avanzada. Tiene la misma validez que tu firma autógrafa y se tramita de forma presencial.'],
                ]],
                ['type' => 'table', 'title' => 'Situaciones fiscales comunes (regímenes)', 'headers' => ['Situación', 'Para quién'], 'rows' => [
                    ['Sueldos y salarios', 'Personas que trabajan para un patrón y reciben nómina.'],
                    ['Actividades empresariales y profesionales', 'Personas que venden, ofrecen servicios o trabajan por su cuenta.'],
                    ['Régimen Simplificado de Confianza (RESICO)', 'Personas con ciertas actividades e ingresos dentro de los límites que marca la ley.'],
                    ['Arrendamiento', 'Personas que rentan inmuebles.'],
                    ['Sin obligaciones fiscales', 'Personas inscritas que por ahora no tienen ingresos que declarar.'],
                ], 'note' => 'Tu régimen depende de tus ingresos y actividades. Si tienes dudas, consulta al SAT o a un profesional.'],
            ],
        ],
        [
            'title' => 'Elige tu trámite',
            'blocks' => [
                ['type' => 'paths'],
            ],
        ],
        [
            'title' => 'Inscribirte por primera vez',
            'paths' => ['inscripcion'],
            'blocks' => [
                ['type' => 'text', 'body' => ['Las personas físicas pueden inscribirse al RFC en línea usando su CURP, según los servicios disponibles en el portal del SAT. Si vas a empezar a trabajar con un patrón, en muchos casos tu empleador puede inscribirte.']],
                ['type' => 'procedure', 'items' => [
                    ['title' => 'Ten lista tu CURP', 'body' => 'Verifica que tus datos sean correctos: el RFC toma tu información de la CURP.'],
                    ['title' => 'Entra al portal del SAT', 'body' => 'Busca la opción de inscripción al RFC para personas físicas con CURP.'],
                    ['title' => 'Captura tus datos', 'body' => 'Incluyendo tu domicilio y un correo electrónico.'],
                    ['title' => 'Descarga tu acuse', 'body' => 'En él aparece tu RFC. Guárdalo.'],
                    ['title' => 'Genera tu Contraseña', 'body' => 'Te permitirá hacer otros trámites en línea, como descargar tu constancia.'],
                ]],
            ],
        ],
        [
            'title' => 'Consultar tu RFC',
            'paths' => ['consultar'],
            'blocks' => [
                ['type' => 'list', 'style' => 'check', 'items' => [
                    'Revisa documentos donde aparezca: recibos de nómina, facturas o tu Constancia de Situación Fiscal.',
                    'En el portal del SAT hay servicios para obtener tu RFC con tu CURP si ya estás inscrito.',
                    'Si no logras obtenerlo en línea, agenda una cita en una oficina del SAT.',
                ]],
                ['type' => 'callout', 'tone' => 'warning', 'body' => 'Existen páginas no oficiales que "calculan" el RFC. Solo la homoclave que asigna el SAT es válida: usa siempre fuentes oficiales.'],
            ],
        ],
        [
            'title' => 'Obtener tu Constancia de Situación Fiscal',
            'paths' => ['constancia'],
            'blocks' => [
                ['type' => 'procedure', 'items' => [
                    ['title' => 'En el portal del SAT', 'body' => 'Ingresa con tu RFC y Contraseña o con tu e.firma y genera tu constancia en PDF.'],
                    ['title' => 'En la app oficial del SAT', 'body' => 'Desde tu celular, con tu RFC y Contraseña.'],
                    ['title' => 'En una oficina del SAT', 'body' => 'Con cita previa, si no puedes obtenerla en línea.'],
                ]],
                ['type' => 'callout', 'tone' => 'tip', 'body' => 'Revisa que tu domicilio fiscal y tu régimen sean correctos. Si no lo son, actualízalos antes de entregarla.'],
            ],
        ],
        [
            'title' => 'Actualizar tus datos',
            'paths' => ['actualizar'],
            'blocks' => [
                ['type' => 'list', 'style' => 'check', 'items' => [
                    'Cambio de domicilio fiscal: se puede hacer en línea con tu Contraseña o e.firma, según el caso.',
                    'Cambio de actividad o régimen: hay un trámite de actualización de actividades económicas y obligaciones.',
                    'Mantener tus datos al día evita problemas al facturar o recibir tu nómina.',
                ]],
            ],
        ],
        [
            'title' => 'Corregir información',
            'paths' => ['corregir'],
            'blocks' => [
                ['type' => 'list', 'style' => 'check', 'items' => [
                    'Si el error viene de tu CURP (por ejemplo, tu nombre), corrige primero tu CURP.',
                    'Para otros errores, agenda una cita en el SAT y lleva identificación oficial y los documentos que acrediten el dato correcto.',
                ]],
                ['type' => 'callout', 'tone' => 'info', 'body' => 'Consulta la guía "Consulta y descarga tu CURP" si necesitas corregirla.'],
            ],
        ],
        [
            'title' => 'Modalidades de atención',
            'blocks' => [
                ['type' => 'cards', 'items' => [
                    ['title' => 'En línea', 'body' => 'La mayoría de los trámites se hacen en el portal del SAT o en su app.', 'icon' => 'globe'],
                    ['title' => 'Por teléfono o chat', 'body' => 'El SAT ofrece orientación por sus canales oficiales de atención.', 'icon' => 'phone'],
                    ['title' => 'Presencial con cita', 'body' => 'Para trámites como la e.firma o correcciones. Las citas son gratuitas.', 'icon' => 'calendar'],
                ]],
                ['type' => 'links', 'items' => [
                    ['label' => 'Portal del SAT', 'url' => 'https://www.sat.gob.mx', 'description' => 'Inscripción, constancia y actualizaciones.', 'icon' => 'landmark'],
                    ['label' => 'Citas del SAT', 'url' => 'https://citas.sat.gob.mx', 'description' => 'Agenda atención presencial.', 'icon' => 'calendar'],
                ]],
            ],
        ],
        [
            'title' => 'Pon a prueba lo que aprendiste',
            'blocks' => [
                ['type' => 'quiz', 'id' => 'evaluacion', 'questions' => [
                    ['question' => '¿Qué es la Constancia de Situación Fiscal?', 'options' => ['El trámite para inscribirte.', 'Un documento que muestra tus datos ante el SAT.', 'Un pago de impuestos.'], 'answer' => 1, 'explanation' => 'La constancia comprueba tu inscripción y muestra tu régimen, domicilio y obligaciones.'],
                    ['question' => '¿Tener RFC significa que debes pagar impuestos?', 'options' => ['Sí, siempre.', 'No necesariamente: depende de tu situación fiscal.', 'Solo si eres mayor de 30 años.'], 'answer' => 1, 'explanation' => 'Tus obligaciones dependen de tus ingresos y régimen.'],
                    ['question' => '¿Cuál es una fuente confiable para obtener tu RFC con homoclave?', 'options' => ['Una calculadora en internet.', 'El SAT.', 'Una red social.'], 'answer' => 1, 'explanation' => 'Solo el SAT asigna la homoclave oficial.'],
                ]],
            ],
        ],
    ],

    'summary_points' => [
        'El RFC te identifica ante el SAT; la constancia comprueba tu inscripción.',
        'Puedes inscribirte en línea con tu CURP.',
        'Tu régimen fiscal depende de tus ingresos y actividades.',
        'Mantén tus datos actualizados y usa solo canales oficiales.',
    ],

    'sources' => [
        ['name' => 'Servicio de Administración Tributaria', 'url' => 'https://www.sat.gob.mx', 'description' => 'Trámites del RFC.'],
        ['name' => 'Citas SAT', 'url' => 'https://citas.sat.gob.mx', 'description' => 'Atención presencial.'],
    ],
];
