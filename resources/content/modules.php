<?php

/*
|--------------------------------------------------------------------------
| AYULTA modules
|--------------------------------------------------------------------------
|
| Order of guides and experiences inside each module. Every slug must have
| a matching file in resources/content/{module}/guias or /experiencias.
|
*/

return [
    'finanzas' => [
        'title' => 'Finanzas',
        'description' => 'Aprende a administrar tu dinero y tomar mejores decisiones económicas.',
        'eyebrow' => 'Cuida tu dinero',
        'icon' => 'wallet',
        'illustration' => 'finanzas',
        'route' => 'finance',
        'guides' => [
            'primera-tarjeta-de-credito',
            'ahorrar-desde-cero',
            'historial-crediticio',
            'presupuesto-mensual',
            'evita-fraudes',
        ],
        'experiences' => [
            'mi-primer-ahorro',
            'controla-tus-gastos',
            'mi-primer-sueldo',
        ],
    ],
    'tramites' => [
        'title' => 'Trámites',
        'description' => 'Conoce los documentos, requisitos y pasos de los principales trámites.',
        'eyebrow' => 'Todo en orden',
        'icon' => 'file-text',
        'illustration' => 'tramites',
        'route' => 'procedures',
        'guides' => [
            'ine',
            'rfc',
            'pasaporte',
            'curp',
            'imss',
            'infonavit',
        ],
        'experiences' => [],
    ],
    'movilidad' => [
        'title' => 'Movilidad',
        'description' => 'Aprende a desplazarte y conoce las opciones de transporte.',
        'eyebrow' => 'Muévete con confianza',
        'icon' => 'bus',
        'illustration' => 'movilidad',
        'route' => 'mobility',
        'guides' => [
            'transporte-publico',
            'identificar-ruta',
            'planear-recorrido',
            'perdiste-tu-transporte',
            'apps-de-navegacion',
            'seguridad-al-trasladarte',
        ],
        'experiences' => [],
    ],
    'vivienda' => [
        'title' => 'Vivienda',
        'description' => 'Prepárate para rentar, comprar o independizarte.',
        'eyebrow' => 'Tu espacio, tus reglas',
        'icon' => 'key-round',
        'illustration' => 'vivienda',
        'route' => 'housing',
        'guides' => [
            'rentar-primera-casa',
            'comprar-primera-vivienda',
            'como-funciona-infonavit',
            'credito-hipotecario',
            'gastos-de-independizarte',
            'contrato-de-renta',
            'fraudes-de-vivienda',
        ],
        'experiences' => [
            'camino-a-mi-primera-casa',
            'preparate-para-independizarte',
        ],
    ],
];
