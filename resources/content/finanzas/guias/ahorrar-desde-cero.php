<?php

return [
    'title' => 'Cómo empezar a ahorrar desde cero',
    'summary' => 'Define metas, arma tu fondo de emergencia y crea un hábito de ahorro aunque tus ingresos sean variables.',
    'icon' => 'piggy-bank',
    'duration' => 20,

    'paths' => [
        'question' => '¿Cómo son tus ingresos?',
        'options' => [
            'fijos' => ['label' => 'Fijos', 'description' => 'Recibo la misma cantidad cada semana, quincena o mes.', 'icon' => 'calendar'],
            'variables' => ['label' => 'Variables', 'description' => 'Cambian: propinas, ventas, trabajos por proyecto o comisiones.', 'icon' => 'trending-up'],
        ],
    ],

    'steps' => [
        [
            'title' => 'Introducción',
            'blocks' => [
                ['type' => 'text', 'body' => [
                    'Ahorrar no se trata de cuánto ganas, sino de lo que haces con lo que recibes. Incluso cantidades pequeñas, apartadas con constancia, te dan tranquilidad ante imprevistos y te acercan a tus metas.',
                ]],
                ['type' => 'objectives', 'items' => [
                    'Definir objetivos de ahorro claros y medibles.',
                    'Entender qué es un fondo de emergencia y por qué va primero.',
                    'Conocer alternativas seguras para guardar tu ahorro.',
                    'Elegir aportaciones semanales, quincenales o mensuales.',
                    'Ahorrar aunque tus ingresos sean variables.',
                    'Simular cuánto tiempo te tomará alcanzar tu meta.',
                ]],
            ],
        ],
        [
            'title' => 'Objetivos de ahorro',
            'blocks' => [
                ['type' => 'text', 'body' => ['Un objetivo claro te motiva y te ayuda a no gastar lo ahorrado. Un buen objetivo dice qué quieres, cuánto cuesta y para cuándo.']],
                ['type' => 'cards', 'items' => [
                    ['title' => 'Corto plazo (menos de 1 año)', 'body' => 'Un celular, un curso, un regalo o tu fondo de emergencia inicial.', 'icon' => 'clock'],
                    ['title' => 'Mediano plazo (1 a 5 años)', 'body' => 'Un viaje, el depósito para rentar un departamento o una computadora para trabajar.', 'icon' => 'calendar'],
                    ['title' => 'Largo plazo (más de 5 años)', 'body' => 'El enganche de una vivienda o tu retiro.', 'icon' => 'house'],
                ]],
                ['type' => 'example', 'title' => 'De un deseo a una meta', 'rows' => [
                    ['label' => 'Deseo', 'value' => '"Quiero ahorrar"'],
                    ['label' => 'Meta', 'value' => '"Ahorrar $6,000 para mi fondo de emergencia en 12 meses"', 'total' => true],
                ]],
                ['type' => 'note', 'id' => 'mi-meta', 'label' => 'Escribe tu primera meta de ahorro', 'placeholder' => 'Ej. Ahorrar $3,000 para un curso antes de junio'],
            ],
        ],
        [
            'title' => 'Tu fondo de emergencia',
            'blocks' => [
                ['type' => 'text', 'body' => [
                    'Un fondo de emergencia es dinero reservado solo para imprevistos: una consulta médica, una reparación o quedarte sin ingresos por un tiempo.',
                    'Una referencia común es reunir el equivalente a entre 3 y 6 meses de tus gastos básicos. Si eso te parece mucho, empieza con una meta pequeña, como un mes de gastos, y ve creciendo.',
                ]],
                ['type' => 'list', 'title' => 'Qué sí y qué no es una emergencia', 'style' => 'check', 'items' => [
                    'Sí: un gasto médico inesperado.',
                    'Sí: una reparación necesaria para trabajar o vivir.',
                    'Sí: cubrir tus gastos básicos si pierdes tu ingreso.',
                ]],
                ['type' => 'list', 'style' => 'cross', 'items' => [
                    'No: una oferta o unas vacaciones.',
                    'No: un gasto que ya sabías que llegaría (eso se planea en tu presupuesto).',
                ]],
                ['type' => 'callout', 'tone' => 'tip', 'body' => 'Guarda tu fondo de emergencia separado del dinero que usas a diario, pero en un lugar donde puedas disponer de él rápido.'],
            ],
        ],
        [
            'title' => 'Alternativas para ahorrar',
            'blocks' => [
                ['type' => 'compare', 'items' => [
                    ['title' => 'Cuenta de ahorro en un banco', 'icon' => 'landmark', 'body' => 'Tu dinero está en una institución regulada y separada de tu efectivo.', 'pros' => ['Los depósitos en bancos están protegidos por el IPAB hasta el límite que marca la ley.', 'Fácil acceso.'], 'cons' => ['Revisa comisiones y saldo mínimo.', 'Algunas no pagan rendimientos.']],
                    ['title' => 'Apartados o "cajitas" en apps bancarias', 'icon' => 'smartphone', 'body' => 'Muchas apps permiten separar dinero para una meta dentro de tu cuenta.', 'pros' => ['Separas tu ahorro sin abrir otra cuenta.', 'Ves tu avance.'], 'cons' => ['Verifica que la institución esté regulada.']],
                    ['title' => 'Instrumentos con rendimiento', 'icon' => 'trending-up', 'body' => 'Existen opciones reguladas que pagan intereses por tu ahorro, por ejemplo instrumentos de deuda gubernamental o cuentas con rendimiento.', 'pros' => ['Tu dinero crece con el tiempo.'], 'cons' => ['Revisa plazos: algunos no permiten retirar de inmediato.', 'Ningún rendimiento alto está garantizado: desconfía de promesas exageradas.']],
                    ['title' => 'Alcancía o efectivo en casa', 'icon' => 'piggy-bank', 'body' => 'Útil para empezar el hábito con monedas o billetes pequeños.', 'pros' => ['Muy sencillo.'], 'cons' => ['Riesgo de robo o pérdida.', 'Es fácil gastarlo.', 'No genera rendimientos.']],
                ]],
                ['type' => 'callout', 'tone' => 'warning', 'title' => 'Cuidado con las "inversiones milagro"', 'body' => 'Si te prometen ganancias muy altas, rápidas y "seguras", es probable que sea un fraude. Verifica siempre a la institución en el sitio de CONDUSEF.'],
            ],
        ],
        [
            'title' => '¿Cómo son tus ingresos?',
            'blocks' => [
                ['type' => 'paths'],
            ],
        ],
        [
            'title' => 'Ahorro con ingresos fijos',
            'paths' => ['fijos'],
            'blocks' => [
                ['type' => 'procedure', 'items' => [
                    ['title' => 'Elige la frecuencia', 'body' => 'Ahorra con la misma frecuencia con la que cobras: semanal, quincenal o mensual.'],
                    ['title' => 'Define un monto fijo', 'body' => 'Empieza con algo que no te haga falta, por ejemplo 5% o 10% de tu ingreso.'],
                    ['title' => 'Págate primero', 'body' => 'Separa tu ahorro el mismo día que recibes tu dinero, antes de gastar.'],
                    ['title' => 'Automatiza', 'body' => 'Si tu banco lo permite, programa una transferencia automática a tu apartado o cuenta de ahorro.'],
                ]],
                ['type' => 'table', 'title' => 'Mismo ahorro, distinta frecuencia', 'headers' => ['Frecuencia', 'Aportación', 'Al año'], 'rows' => [
                    ['Semanal', '$100', '$5,200'],
                    ['Quincenal', '$200', '$4,800'],
                    ['Mensual', '$400', '$4,800'],
                ], 'note' => 'Un año tiene 52 semanas y 24 quincenas. Cifras ilustrativas sin rendimientos.'],
            ],
        ],
        [
            'title' => 'Ahorro con ingresos variables',
            'paths' => ['variables'],
            'blocks' => [
                ['type' => 'text', 'body' => ['Si tus ingresos cambian, un monto fijo puede ser difícil de sostener. En su lugar, ahorra un porcentaje de cada ingreso.']],
                ['type' => 'procedure', 'items' => [
                    ['title' => 'Calcula tu ingreso mínimo', 'body' => 'Revisa tus últimos 3 a 6 meses e identifica el mes más bajo. Planea tus gastos básicos con ese número.'],
                    ['title' => 'Ahorra un porcentaje', 'body' => 'De cada pago que recibas, separa un porcentaje fijo (por ejemplo 10%).'],
                    ['title' => 'Aprovecha los meses buenos', 'body' => 'Cuando ganes más de lo normal, ahorra un porcentaje mayor para compensar los meses bajos.'],
                    ['title' => 'Prioriza tu fondo de emergencia', 'body' => 'Con ingresos variables, este fondo es todavía más importante.'],
                ]],
                ['type' => 'example', 'title' => 'Ahorrar 10% de cada ingreso', 'rows' => [
                    ['label' => 'Semana 1: ganaste $1,800', 'value' => 'Ahorras $180'],
                    ['label' => 'Semana 2: ganaste $900', 'value' => 'Ahorras $90'],
                    ['label' => 'Semana 3: ganaste $2,400', 'value' => 'Ahorras $240'],
                    ['label' => 'Total ahorrado', 'value' => '$510', 'total' => true],
                ]],
            ],
        ],
        [
            'title' => 'Hábitos que ayudan',
            'blocks' => [
                ['type' => 'cards', 'items' => [
                    ['title' => 'Regla de las 24 horas', 'body' => 'Antes de una compra no planeada, espera un día. Muchas veces el impulso desaparece.', 'icon' => 'clock'],
                    ['title' => 'Revisa tus gastos hormiga', 'body' => 'Cafés, botanas, envíos y apps: pequeños gastos frecuentes que suman mucho.', 'icon' => 'coffee'],
                    ['title' => 'Redondea', 'body' => 'Ahorra el cambio o redondea tus compras y aparta la diferencia.', 'icon' => 'coins'],
                    ['title' => 'Celebra tus avances', 'body' => 'Ver tu progreso te motiva a continuar.', 'icon' => 'party-popper'],
                ]],
                ['type' => 'list', 'title' => 'Errores frecuentes', 'style' => 'cross', 'items' => [
                    'Ahorrar "lo que sobre" al final del mes (casi nunca sobra).',
                    'Usar el ahorro para gastos que no son emergencias.',
                    'Ponerse metas imposibles y abandonarlas.',
                    'Guardar todo el ahorro en efectivo en casa.',
                ]],
            ],
        ],
        [
            'title' => 'Simula tu ahorro',
            'blocks' => [
                ['type' => 'text', 'body' => ['Usa el simulador para definir tu meta personalizada, tu aportación y tu frecuencia. Tus datos se guardan en este dispositivo.']],
                ['type' => 'tool', 'name' => 'savings'],
            ],
        ],
        [
            'title' => 'Pon a prueba lo que aprendiste',
            'blocks' => [
                ['type' => 'quiz', 'id' => 'evaluacion', 'questions' => [
                    ['question' => '¿Para qué sirve un fondo de emergencia?', 'options' => ['Para vacaciones.', 'Para imprevistos como gastos médicos o quedarte sin ingresos.', 'Para comprar en ofertas.'], 'answer' => 1, 'explanation' => 'El fondo de emergencia es solo para imprevistos que no puedes posponer.'],
                    ['question' => 'Si tus ingresos son variables, conviene…', 'options' => ['Ahorrar un porcentaje de cada ingreso.', 'No ahorrar hasta tener ingresos fijos.', 'Ahorrar solo en diciembre.'], 'answer' => 0, 'explanation' => 'Un porcentaje se adapta a lo que ganas y mantiene el hábito.'],
                    ['question' => '¿Qué significa "págate primero"?', 'options' => ['Comprarte algo cada quincena.', 'Separar tu ahorro en cuanto recibes tu dinero.', 'Pagar tus deudas al final.'], 'answer' => 1, 'explanation' => 'Separar el ahorro primero evita que se gaste en otras cosas.'],
                    ['question' => 'Te ofrecen duplicar tu dinero en un mes "sin riesgo". ¿Qué haces?', 'options' => ['Invierto todo mi ahorro.', 'Desconfío y verifico a la institución con CONDUSEF.', 'Invierto la mitad.'], 'answer' => 1, 'explanation' => 'Rendimientos muy altos, rápidos y "garantizados" son una señal típica de fraude.'],
                ]],
            ],
        ],
    ],

    'summary_points' => [
        'Una meta clara dice qué, cuánto y para cuándo.',
        'El fondo de emergencia va primero: empieza con un mes de gastos y crece.',
        'Guarda tu ahorro en instituciones reguladas y separado de tu gasto diario.',
        'Con ingresos variables, ahorra un porcentaje de cada ingreso.',
        'La constancia importa más que el monto.',
    ],

    'sources' => [
        ['name' => 'CONDUSEF', 'url' => 'https://www.condusef.gob.mx', 'description' => 'Educación financiera y verificación de instituciones.'],
        ['name' => 'IPAB', 'url' => 'https://www.gob.mx/ipab', 'description' => 'Protección de depósitos bancarios.'],
    ],
];
