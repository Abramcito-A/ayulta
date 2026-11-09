<?php

/*
|--------------------------------------------------------------------------
| Educational reminders
|--------------------------------------------------------------------------
|
| Demonstration reminders shown in the notifications screen.
|
*/

return [
    [
        'icon' => 'piggy-bank',
        'title' => 'Ahorrar también es un hábito',
        'body' => 'Aunque sean $50 por semana, ahorrar con constancia es más importante que el monto. Haz tu plan en "Mi primer ahorro".',
        'action' => 'Abrir Mi primer ahorro',
        'route' => 'finance.experiences.show',
        'params' => ['mi-primer-ahorro'],
    ],
    [
        'icon' => 'shield-check',
        'title' => 'Tu banco nunca te pedirá tu NIP',
        'body' => 'Ninguna institución te pedirá por llamada, SMS o WhatsApp tu NIP, contraseña o códigos de seguridad.',
        'action' => 'Repasar cómo evitar fraudes',
        'route' => 'finance.guides.show',
        'params' => ['evita-fraudes'],
    ],
    [
        'icon' => 'id-card',
        'title' => 'Revisa la vigencia de tu INE',
        'body' => 'Tu credencial para votar tiene una vigencia impresa. Si está por vencer, agenda tu cita con anticipación.',
        'action' => 'Ver guía del INE',
        'route' => 'procedures.guides.show',
        'params' => ['ine'],
    ],
    [
        'icon' => 'calendar',
        'title' => 'Presupuesto del mes',
        'body' => 'El inicio de mes es buen momento para revisar en qué se fue tu dinero y planear el siguiente.',
        'action' => 'Hacer mi presupuesto',
        'route' => 'finance.guides.show',
        'params' => ['presupuesto-mensual'],
    ],
    [
        'icon' => 'key-round',
        'title' => 'Antes de rentar, revisa el contrato',
        'body' => 'Nunca entregues dinero sin haber visto la vivienda y sin un contrato por escrito.',
        'action' => 'Ver qué revisar',
        'route' => 'housing.guides.show',
        'params' => ['contrato-de-renta'],
    ],
];
