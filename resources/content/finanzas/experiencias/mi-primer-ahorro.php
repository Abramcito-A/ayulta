<?php

return [
    'title' => 'Mi primer ahorro',
    'summary' => 'Elige una meta, arma tu plan de depósitos y marca tu avance hasta lograrla.',
    'icon' => 'piggy-bank',
    'duration' => 10,

    'steps' => [
        [
            'title' => 'Elige tu meta',
            'blocks' => [
                ['type' => 'text', 'body' => ['Toda meta de ahorro empieza con una decisión: ¿para qué vas a ahorrar? Elige una sugerencia o escribe la tuya, y define tu aportación.']],
                ['type' => 'tool', 'name' => 'savings-plan'],
                ['type' => 'callout', 'tone' => 'tip', 'body' => 'Si es tu primer ahorro, una meta pequeña y alcanzable (por ejemplo, $3,000 para tu fondo de emergencia) te ayuda a crear el hábito.'],
            ],
        ],
        [
            'title' => 'Decide cómo ahorrarás',
            'blocks' => [
                ['type' => 'choice', 'id' => 'donde', 'title' => 'Situación', 'icon' => 'piggy-bank', 'scenario' => 'Ya tienes tu plan. ¿Dónde guardarás tu dinero?', 'options' => [
                    ['label' => 'En la misma cuenta que uso para todo.', 'feedback' => 'Es fácil gastarlo sin darte cuenta. Mejor sepáralo.'],
                    ['label' => 'En un apartado o cuenta de ahorro en una institución regulada.', 'feedback' => 'Excelente: lo separas de tu gasto diario y está protegido.', 'best' => true],
                    ['label' => 'Con alguien que me prometió duplicarlo.', 'feedback' => 'Promesas de duplicar tu dinero son una señal clásica de fraude.'],
                ]],
                ['type' => 'choice', 'id' => 'cuando', 'title' => 'Situación', 'icon' => 'calendar', 'scenario' => '¿En qué momento harás cada depósito?', 'options' => [
                    ['label' => 'Al final del mes, con lo que sobre.', 'feedback' => 'Casi nunca sobra. El ahorro debe ir primero.'],
                    ['label' => 'El mismo día que recibo mi dinero.', 'feedback' => '¡Eso es "págate primero"! Separas tu ahorro antes de gastar.', 'best' => true],
                    ['label' => 'Cuando me acuerde.', 'feedback' => 'Sin una fecha fija, el hábito no se forma. Ponte un recordatorio.'],
                ]],
            ],
        ],
        [
            'title' => 'Reflexiona',
            'blocks' => [
                ['type' => 'checklist', 'id' => 'compromiso', 'title' => 'Mi compromiso', 'items' => [
                    'Tengo una meta con monto y fecha.',
                    'Sé cuánto voy a depositar y con qué frecuencia.',
                    'Separaré mi ahorro de mi dinero de gasto diario.',
                    'Marcaré cada depósito en mi plan.',
                ]],
                ['type' => 'note', 'id' => 'motivo', 'label' => '¿Por qué es importante para ti esta meta?', 'placeholder' => 'Escríbelo para recordarlo cuando te den ganas de gastar.'],
            ],
        ],
    ],

    'summary_points' => [
        'Una meta con monto y fecha es más fácil de cumplir.',
        'Separa tu ahorro y deposítalo en cuanto recibas tu dinero.',
        'Marcar cada depósito te mantiene motivado.',
    ],
];
