<?php

/*
|--------------------------------------------------------------------------
| Office locators
|--------------------------------------------------------------------------
|
| AYULTA does not publish addresses or schedules because they change and we
| cannot verify them. Each entry points to the institution's official locator
| and explains how to search for Torreón, Coahuila.
|
*/

return [
    [
        'institution' => 'INE',
        'service' => 'Credencial para votar',
        'icon' => 'id-card',
        'url' => 'https://www.ine.mx/credencial/',
        'action' => 'Ir a la sección de credencial del INE',
        'how' => 'En el sitio del INE entra a la sección de credencial y busca la opción para ubicar tu módulo. Selecciona Coahuila y después Torreón, o escribe tu código postal. También puedes llamar a INETEL al 800 433 2000.',
        'tip' => 'Agenda tu cita antes de ir: así reduces el tiempo de espera.',
    ],
    [
        'institution' => 'SAT',
        'service' => 'RFC, Constancia de Situación Fiscal y e.firma',
        'icon' => 'landmark',
        'url' => 'https://citas.sat.gob.mx',
        'action' => 'Abrir el sistema de citas del SAT',
        'how' => 'En el sistema de citas elige el servicio que necesitas y la entidad Coahuila. El sistema te mostrará las oficinas disponibles, entre ellas la de Torreón cuando haya disponibilidad.',
        'tip' => 'Muchos trámites del SAT (como la constancia) se pueden hacer en línea sin cita.',
    ],
    [
        'institution' => 'SRE',
        'service' => 'Pasaporte mexicano',
        'icon' => 'plane',
        'url' => 'https://citas.sre.gob.mx',
        'action' => 'Abrir el sistema de citas de la SRE',
        'how' => 'En el sistema de citas de la SRE selecciona Coahuila y revisa las oficinas disponibles para Torreón. Paga los derechos antes de tu cita y lleva tu comprobante.',
        'tip' => 'Revisa en el portal oficial la lista de oficinas, ya que puede cambiar.',
    ],
    [
        'institution' => 'RENAPO',
        'service' => 'CURP',
        'icon' => 'fingerprint',
        'url' => 'https://www.gob.mx/curp',
        'action' => 'Consultar CURP en gob.mx',
        'how' => 'La consulta y descarga de la CURP es en línea. Si tu CURP tiene errores, el portal te indica a dónde acudir; en muchos casos es el Registro Civil o un módulo de atención de tu entidad.',
        'tip' => 'Ten a la mano tu acta de nacimiento para comparar tus datos.',
    ],
    [
        'institution' => 'IMSS',
        'service' => 'NSS, clínica (UMF) y vigencia de derechos',
        'icon' => 'heart-pulse',
        'url' => 'https://www.imss.gob.mx/directorio',
        'action' => 'Abrir el directorio del IMSS',
        'how' => 'En el directorio del IMSS filtra por Coahuila y Torreón para encontrar Unidades de Medicina Familiar y subdelegaciones. Muchos trámites también están en IMSS Digital.',
        'tip' => 'Tu clínica se asigna según tu domicilio: ten a la mano tu código postal.',
    ],
    [
        'institution' => 'Infonavit',
        'service' => 'Mi Cuenta Infonavit, ahorro y crédito',
        'icon' => 'building-2',
        'url' => 'https://www.gob.mx/infonavit',
        'action' => 'Ir al sitio de Infonavit en gob.mx',
        'how' => 'La mayoría de los servicios se realizan en Mi Cuenta Infonavit. Si necesitas atención presencial, consulta en el portal oficial los Centros de Servicio Infonavit (CESI) disponibles en Coahuila.',
        'tip' => 'Infonavit no cobra por sus trámites ni pide intermediarios.',
    ],
];
