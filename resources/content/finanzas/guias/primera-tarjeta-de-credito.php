<?php

return [
    'title' => 'Cómo sacar tu primera tarjeta de crédito',
    'summary' => 'Entiende cómo funciona el crédito, compara opciones y aprende a usar tu primera tarjeta sin pagar intereses de más.',
    'icon' => 'credit-card',
    'duration' => 25,

    'paths' => [
        'question' => '¿Cuál es tu situación?',
        'options' => [
            'sin-credito' => ['label' => 'Nunca he tenido crédito', 'description' => 'No tengo tarjetas ni préstamos a mi nombre.', 'icon' => 'sprout'],
            'trabajo' => ['label' => 'Ya trabajo y recibo un sueldo', 'description' => 'Tengo ingresos comprobables o cuenta de nómina.', 'icon' => 'briefcase'],
            'digital' => ['label' => 'Quiero una tarjeta digital', 'description' => 'Me interesa solicitarla y usarla desde una app.', 'icon' => 'smartphone'],
        ],
    ],

    'steps' => [
        [
            'title' => 'Introducción',
            'blocks' => [
                ['type' => 'text', 'body' => [
                    'Una tarjeta de crédito puede ser una gran herramienta: te ayuda a construir tu historial crediticio, te da protección en compras y te permite resolver imprevistos. Pero si no entiendes cómo funciona, también puede convertirse en una deuda difícil de pagar.',
                    'En esta guía aprenderás desde cero qué es, cómo se usa, cómo comparar opciones y qué revisar antes de solicitar tu primera tarjeta.',
                ]],
                ['type' => 'objectives', 'items' => [
                    'Qué es una tarjeta de crédito y en qué se diferencia de una de débito.',
                    'Cómo funcionan la fecha de corte, la fecha límite de pago y el pago mínimo.',
                    'Qué son el CAT, la tasa de interés, la anualidad y las comisiones.',
                    'Qué alternativas existen según tu situación y cómo compararlas.',
                    'Cómo leer un estado de cuenta y pagar sin generar intereses.',
                ]],
                ['type' => 'callout', 'tone' => 'info', 'title' => 'Información educativa', 'body' => 'AYULTA no recomienda bancos ni tarjetas específicas. Las condiciones (tasas, comisiones, requisitos) las define cada institución y cambian con el tiempo.'],
            ],
        ],
        [
            'title' => 'Conceptos básicos',
            'blocks' => [
                ['type' => 'terms', 'items' => [
                    ['term' => 'Tarjeta de crédito', 'definition' => 'Un préstamo que el banco te da para que compres hoy y pagues después. El dinero no es tuyo: es una deuda que debes devolver.'],
                    ['term' => 'Límite de crédito', 'definition' => 'La cantidad máxima que el banco te presta. Si tu límite es de $8,000, no puedes deber más que eso.'],
                    ['term' => 'Saldo', 'definition' => 'Lo que debes en un momento determinado: tus compras, más intereses y comisiones si los hay.'],
                    ['term' => 'Crédito disponible', 'definition' => 'La parte de tu límite que todavía puedes usar. Se recupera conforme vas pagando.'],
                    ['term' => 'Intereses', 'definition' => 'El costo de usar dinero prestado. Se generan cuando no pagas el total de lo que debes a tiempo.'],
                ]],
                ['type' => 'table', 'title' => 'Crédito vs. débito', 'headers' => ['', 'Débito', 'Crédito'], 'rows' => [
                    ['¿De quién es el dinero?', 'Tuyo, está en tu cuenta.', 'Del banco: es un préstamo.'],
                    ['¿Genera deuda?', 'No.', 'Sí, si no pagas el total.'],
                    ['¿Construye historial?', 'No.', 'Sí, si pagas puntual.'],
                    ['¿Cobra intereses?', 'No.', 'Sí, si no liquidas a tiempo.'],
                    ['¿Para qué sirve mejor?', 'Gastos diarios.', 'Compras planeadas que puedes pagar.'],
                ]],
                ['type' => 'procedure', 'title' => 'Cómo funciona el ciclo de una tarjeta', 'items' => [
                    ['title' => 'Compras durante el periodo', 'body' => 'Durante aproximadamente un mes usas tu tarjeta y tus compras se van sumando a tu saldo.'],
                    ['title' => 'Fecha de corte', 'body' => 'El banco cierra el periodo, suma lo que debes y genera tu estado de cuenta.'],
                    ['title' => 'Días para pagar', 'body' => 'Después del corte tienes un plazo (lo indica tu estado de cuenta) para pagar.'],
                    ['title' => 'Fecha límite de pago', 'body' => 'Si pagas el total antes de esta fecha, no pagas intereses por esas compras. Si pagas menos, el resto genera intereses.'],
                ]],
            ],
        ],
        [
            'title' => 'Conoce tu situación financiera',
            'blocks' => [
                ['type' => 'text', 'body' => [
                    'Antes de pensar en qué tarjeta pedir, revisa si estás en condiciones de usarla bien. Una tarjeta no aumenta tus ingresos: solo adelanta dinero que tendrás que pagar.',
                ]],
                ['type' => 'checklist', 'id' => 'situacion', 'title' => 'Hazte estas preguntas', 'items' => [
                    'Sé cuánto dinero recibo al mes (aunque sea aproximado).',
                    'Sé cuánto gasto al mes en necesidades básicas.',
                    'Me sobra dinero al final del mes con regularidad.',
                    'No tengo pagos atrasados en otros créditos o servicios.',
                    'Puedo explicar para qué quiero la tarjeta.',
                ]],
                ['type' => 'callout', 'tone' => 'tip', 'title' => 'Una referencia útil', 'body' => 'Una recomendación común en educación financiera es que la suma de tus pagos de deudas no supere alrededor de 30% de tus ingresos. Si ya estás cerca de ese límite, primero ordena tus finanzas.'],
            ],
        ],
        [
            'title' => 'Elige tu camino',
            'blocks' => [
                ['type' => 'paths'],
            ],
        ],
        [
            'title' => 'Alternativas si nunca has tenido crédito',
            'paths' => ['sin-credito'],
            'blocks' => [
                ['type' => 'text', 'body' => ['Si nunca has tenido crédito, los bancos no tienen información para saber cómo pagas. Por eso existen productos pensados para empezar.']],
                ['type' => 'compare', 'items' => [
                    ['title' => 'Tarjeta garantizada', 'icon' => 'shield-check', 'body' => 'Dejas un depósito en garantía y el banco te da un límite similar a ese monto. Usarla y pagarla puntual construye tu historial.', 'pros' => ['Fácil de obtener sin historial.', 'Te ayuda a aprender con un límite controlado.'], 'cons' => ['Necesitas tener el dinero del depósito.', 'Revisa si cobra anualidad o comisiones.']],
                    ['title' => 'Tarjeta básica o de entrada', 'icon' => 'credit-card', 'body' => 'Algunos bancos ofrecen tarjetas con límites bajos y pocas comisiones para clientes nuevos.', 'pros' => ['Requisitos más sencillos.', 'Suelen tener menos beneficios, pero también menos costos.'], 'cons' => ['El límite inicial es bajo.', 'Compara el CAT: puede ser alto.']],
                    ['title' => 'Tarjeta departamental o de tienda', 'icon' => 'shopping-bag', 'body' => 'La otorga una tienda para comprar en sus sucursales. También reporta tu comportamiento de pago.', 'pros' => ['Fácil de solicitar.', 'Sirve para construir historial.'], 'cons' => ['Su CAT suele ser de los más altos.', 'Solo puedes usarla en esa tienda.', 'Facilita compras impulsivas.']],
                ]],
                ['type' => 'callout', 'tone' => 'tip', 'body' => 'Empieza con un límite bajo y úsala para gastos pequeños que ya tenías planeados (por ejemplo, una recarga o un servicio). Paga el total cada mes.'],
            ],
        ],
        [
            'title' => 'Si ya trabajas y recibes un sueldo',
            'paths' => ['trabajo'],
            'blocks' => [
                ['type' => 'text', 'body' => ['Tener ingresos comprobables abre más opciones. Muchos bancos ofrecen tarjetas a sus clientes de nómina porque conocen sus depósitos.']],
                ['type' => 'compare', 'items' => [
                    ['title' => 'Tarjeta con tu banco de nómina', 'icon' => 'landmark', 'body' => 'Tu banco ve tus depósitos y puede ofrecerte una tarjeta con requisitos más simples.', 'pros' => ['Trámite más sencillo.', 'A veces es una oferta preaprobada.'], 'cons' => ['No la aceptes solo porque es fácil: compárala.']],
                    ['title' => 'Tarjeta clásica en otro banco', 'icon' => 'building-2', 'body' => 'Puedes solicitarla en cualquier banco presentando comprobantes de ingreso.', 'pros' => ['Puedes elegir la de menor costo.'], 'cons' => ['Te pedirán más documentos.', 'Cada solicitud genera una consulta a tu historial.']],
                ]],
                ['type' => 'list', 'title' => 'Documentos que suelen pedir', 'style' => 'check', 'items' => [
                    'Identificación oficial vigente (como tu INE).',
                    'Comprobante de domicilio reciente.',
                    'Comprobante de ingresos (recibos de nómina o estados de cuenta).',
                    'RFC o CURP, según la institución.',
                ]],
                ['type' => 'callout', 'tone' => 'warning', 'body' => 'Una oferta "preaprobada" no significa que sea la mejor. Revisa su CAT, anualidad y comisiones antes de aceptar.'],
            ],
        ],
        [
            'title' => 'Si quieres una tarjeta digital',
            'paths' => ['digital'],
            'blocks' => [
                ['type' => 'text', 'body' => ['Hay bancos y empresas financieras que ofrecen tarjetas que se solicitan y administran desde una app. Pueden ser prácticas, pero debes confirmar que la empresa esté autorizada y supervisada.']],
                ['type' => 'procedure', 'title' => 'Antes de descargar la app', 'items' => [
                    ['title' => 'Verifica que la institución esté registrada', 'body' => 'Busca su nombre en el sitio de CONDUSEF (Buró de Entidades Financieras y registro de prestadores de servicios financieros).'],
                    ['title' => 'Descarga solo desde la tienda oficial', 'body' => 'Usa la tienda de aplicaciones de tu teléfono y revisa que el desarrollador coincida con la empresa.'],
                    ['title' => 'Lee el contrato y la carátula', 'body' => 'Aunque sea digital, debe mostrarte CAT, tasa de interés, comisiones y condiciones.'],
                    ['title' => 'Protege tu acceso', 'body' => 'Activa el bloqueo con huella o rostro y nunca compartas los códigos que te lleguen por SMS.'],
                ]],
                ['type' => 'compare', 'items' => [
                    ['title' => 'Tarjeta digital', 'icon' => 'smartphone', 'body' => 'Se solicita en línea y suele tener una tarjeta virtual para compras por internet.', 'pros' => ['Trámite rápido.', 'Control de gastos desde la app.', 'Puedes congelar la tarjeta al momento.'], 'cons' => ['Verifica que la empresa esté regulada.', 'Revisa cómo y dónde puedes pagar.']],
                ]],
            ],
        ],
        [
            'title' => 'Cómo comparar opciones',
            'blocks' => [
                ['type' => 'terms', 'title' => 'Lo que debes revisar', 'items' => [
                    ['term' => 'CAT (Costo Anual Total)', 'definition' => 'Indicador que incluye la tasa de interés, comisiones y otros costos en un solo porcentaje anual. Sirve para comparar: entre más bajo, más barato es el crédito. Se expresa sin IVA y es para fines informativos.'],
                    ['term' => 'Tasa de interés', 'definition' => 'El porcentaje que te cobran sobre lo que debes si no pagas el total. Revisa si es anual y si es fija o variable.'],
                    ['term' => 'Anualidad', 'definition' => 'Cuota que algunas tarjetas cobran cada año solo por tenerla. Hay tarjetas sin anualidad.'],
                    ['term' => 'Comisiones', 'definition' => 'Cobros por situaciones específicas: pago tardío, disposición de efectivo, reposición de tarjeta, entre otros.'],
                ]],
                ['type' => 'table', 'title' => 'Ejemplo de comparación (datos ficticios)', 'headers' => ['Concepto', 'Tarjeta A', 'Tarjeta B'], 'rows' => [
                    ['CAT promedio', 'Más bajo', 'Más alto'],
                    ['Anualidad', 'Sí cobra', 'Sin anualidad'],
                    ['Comisión por pago tardío', 'Sí', 'Sí'],
                    ['Beneficios', 'Pocos', 'Meses sin intereses'],
                ], 'note' => 'Si siempre pagas el total, la anualidad pesa más que el CAT. Si a veces podrías dejar saldo, el CAT es lo más importante.'],
                ['type' => 'links', 'title' => 'Herramientas oficiales para comparar', 'items' => [
                    ['label' => 'CONDUSEF', 'url' => 'https://www.condusef.gob.mx', 'description' => 'Simuladores, cuadros comparativos y Buró de Entidades Financieras.', 'icon' => 'scale'],
                    ['label' => 'Banco de México', 'url' => 'https://www.banxico.org.mx', 'description' => 'Información sobre CAT y tarjetas de crédito.', 'icon' => 'landmark'],
                ]],
            ],
        ],
        [
            'title' => 'Requisitos y solicitud',
            'blocks' => [
                ['type' => 'callout', 'tone' => 'warning', 'title' => 'Requisitos generales vs. particulares', 'body' => 'Esta lista es general. Cada institución define sus requisitos exactos: confírmalos en su sitio oficial o en sucursal.'],
                ['type' => 'list', 'title' => 'Lo que normalmente te piden', 'style' => 'check', 'items' => [
                    'Ser mayor de edad.',
                    'Identificación oficial vigente.',
                    'Comprobante de domicilio.',
                    'En algunos casos, comprobante de ingresos.',
                    'Autorizar la consulta de tu historial crediticio.',
                ]],
                ['type' => 'procedure', 'title' => 'Pasos para solicitarla', 'items' => [
                    ['title' => 'Elige 2 o 3 opciones', 'body' => 'Compara CAT, anualidad y comisiones.'],
                    ['title' => 'Revisa la carátula del contrato', 'body' => 'Es el resumen con los datos más importantes. Pídela antes de firmar.'],
                    ['title' => 'Presenta tu solicitud', 'body' => 'En sucursal, en el sitio del banco o en su app oficial.'],
                    ['title' => 'Espera la respuesta', 'body' => 'El banco puede aprobarla, rechazarla o darte un límite menor al que pediste.'],
                    ['title' => 'Activa y configura', 'body' => 'Activa la tarjeta por los canales oficiales y configura alertas de compras.'],
                ]],
                ['type' => 'callout', 'tone' => 'warning', 'title' => 'Alerta de fraude', 'body' => 'Desconfía de quien te pida un pago por adelantado para "aprobar" tu tarjeta. Las instituciones formales no cobran por solicitarla.'],
            ],
        ],
        [
            'title' => 'Fechas y pagos',
            'blocks' => [
                ['type' => 'terms', 'items' => [
                    ['term' => 'Fecha de corte', 'definition' => 'El día en que termina tu periodo. Todo lo que compraste se suma en tu estado de cuenta.'],
                    ['term' => 'Fecha límite de pago', 'definition' => 'El último día para pagar sin cargos por atraso. Viene en tu estado de cuenta.'],
                    ['term' => 'Pago mínimo', 'definition' => 'Lo menos que puedes pagar para no caer en atraso. Pero el saldo restante sigue generando intereses.'],
                    ['term' => 'Pago para no generar intereses', 'definition' => 'Si pagas esta cantidad completa antes de la fecha límite, no pagas intereses por las compras del periodo.'],
                ]],
                ['type' => 'tool', 'name' => 'statement'],
                ['type' => 'example', 'title' => 'Pagar el mínimo vs. pagar el total', 'body' => ['Ana debe $3,200 al corte. Si paga solo el mínimo ($320), los $2,880 restantes generan intereses el siguiente mes, y si sigue comprando, su deuda crece.', 'Si paga los $3,200 completos, no paga intereses y libera su crédito disponible.'], 'rows' => [
                    ['label' => 'Saldo al corte', 'value' => '$3,200'],
                    ['label' => 'Si pagas el mínimo, queda generando intereses', 'value' => '$2,880'],
                    ['label' => 'Si pagas el total, queda generando intereses', 'value' => '$0', 'total' => true],
                ], 'note' => 'Cifras ilustrativas.'],
                ['type' => 'choice', 'id' => 'pago', 'title' => 'Decide', 'scenario' => 'Te llega el estado de cuenta de demostración: saldo al corte $3,200, pago mínimo $320. Tienes el dinero completo. ¿Qué haces?', 'options' => [
                    ['label' => 'Pago $320 porque es lo que me piden.', 'feedback' => 'El pago mínimo evita el atraso, pero los $2,880 restantes generarán intereses.'],
                    ['label' => 'Pago los $3,200 antes de la fecha límite.', 'feedback' => 'Exacto: pagas lo que usaste, no pagas intereses y mantienes un buen historial.', 'best' => true],
                    ['label' => 'Pago después de la fecha límite, cuando me acuerde.', 'feedback' => 'Pagar tarde genera comisiones, intereses y puede dañar tu historial crediticio.'],
                ], 'tip' => 'Programa un recordatorio o domicilia el pago para nunca pasarte de la fecha límite.'],
            ],
        ],
        [
            'title' => 'Checklist antes de solicitar',
            'blocks' => [
                ['type' => 'checklist', 'id' => 'previa', 'title' => 'Antes de firmar, confirma que…', 'items' => [
                    'Comparé al menos dos opciones.',
                    'Conozco el CAT, la anualidad y las comisiones.',
                    'Leí la carátula del contrato.',
                    'Sé cuál será mi fecha de corte y mi fecha límite de pago.',
                    'Tengo un plan para pagar el total cada mes.',
                    'Verifiqué que la institución está registrada ante CONDUSEF.',
                    'Configuraré alertas de compras en la app del banco.',
                ]],
                ['type' => 'list', 'title' => 'Errores frecuentes', 'style' => 'cross', 'items' => [
                    'Ver el límite de crédito como dinero extra.',
                    'Pagar siempre solo el mínimo.',
                    'Usar la tarjeta para retirar efectivo (suele tener comisión e intereses inmediatos).',
                    'Solicitar muchas tarjetas al mismo tiempo.',
                    'Prestar tu tarjeta a otras personas.',
                ]],
            ],
        ],
        [
            'title' => 'Pon a prueba lo que aprendiste',
            'blocks' => [
                ['type' => 'quiz', 'id' => 'evaluacion', 'questions' => [
                    ['question' => '¿Qué indica el CAT?', 'options' => ['El límite de crédito.', 'El costo total anual del crédito, incluyendo intereses y comisiones.', 'Los puntos que acumulas.'], 'answer' => 1, 'explanation' => 'El CAT reúne en un porcentaje el costo del crédito para que puedas comparar opciones.'],
                    ['question' => 'Si pagas el "pago para no generar intereses" antes de la fecha límite…', 'options' => ['No pagas intereses por las compras del periodo.', 'Pagas solo la mitad de los intereses.', 'Tu límite de crédito baja.'], 'answer' => 0, 'explanation' => 'Pagar el total a tiempo es la forma de usar la tarjeta sin costo por intereses.'],
                    ['question' => '¿Qué pasa si solo pagas el mínimo?', 'options' => ['Nada, es lo recomendable.', 'El saldo restante genera intereses.', 'El banco cancela tu tarjeta.'], 'answer' => 1, 'explanation' => 'El mínimo evita el atraso, pero el resto de la deuda sigue generando intereses.'],
                    ['question' => '¿Cuál es una diferencia entre débito y crédito?', 'options' => ['Con débito usas tu dinero; con crédito usas dinero prestado.', 'Las dos generan deuda.', 'Solo la de débito construye historial.'], 'answer' => 0, 'explanation' => 'La tarjeta de crédito es un préstamo; la de débito usa el dinero de tu cuenta.'],
                    ['question' => 'Alguien te pide $500 para "garantizar" la aprobación de tu tarjeta. ¿Qué haces?', 'options' => ['Pago, así es el trámite.', 'Desconfío: las instituciones formales no cobran por aprobar una solicitud.', 'Le doy mis datos para que lo haga por mí.'], 'answer' => 1, 'explanation' => 'Cobrar por adelantado para aprobar un crédito es una señal clásica de fraude.'],
                ]],
            ],
        ],
    ],

    'summary_points' => [
        'Una tarjeta de crédito es un préstamo: úsala solo para lo que puedes pagar.',
        'Compara con el CAT, la anualidad y las comisiones.',
        'Paga el total antes de la fecha límite para no generar intereses.',
        'Empieza con un límite bajo y construye tu historial pagando puntual.',
        'Verifica que la institución esté registrada y nunca pagues por "aprobar" tu crédito.',
    ],

    'sources' => [
        ['name' => 'CONDUSEF', 'url' => 'https://www.condusef.gob.mx', 'description' => 'Educación financiera, comparadores y Buró de Entidades Financieras.'],
        ['name' => 'Banco de México', 'url' => 'https://www.banxico.org.mx', 'description' => 'Información sobre tarjetas de crédito y el CAT.'],
    ],
];
