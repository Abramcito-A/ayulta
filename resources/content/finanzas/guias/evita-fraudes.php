<?php

return [
    'title' => 'Evita fraudes y protege tu dinero',
    'summary' => 'Reconoce fraudes por teléfono, SMS, WhatsApp y redes sociales, y aprende qué hacer si te ocurre.',
    'icon' => 'shield-check',
    'duration' => 20,

    'steps' => [
        [
            'title' => 'Introducción',
            'blocks' => [
                ['type' => 'text', 'body' => [
                    'Los fraudes financieros buscan que entregues tu dinero, tus datos o tus códigos de seguridad. Casi siempre usan la urgencia, el miedo o una oferta demasiado buena para que actúes sin pensar.',
                ]],
                ['type' => 'objectives', 'items' => [
                    'Reconocer fraudes por llamada, SMS, WhatsApp y redes sociales.',
                    'Identificar compras falsas y transferencias sospechosas.',
                    'Entender qué es la suplantación de identidad.',
                    'Proteger tus contraseñas y códigos.',
                    'Saber qué hacer si eres víctima.',
                ]],
                ['type' => 'callout', 'tone' => 'warning', 'title' => 'La regla de oro', 'body' => 'Ninguna institución financiera te pedirá tu NIP, tu contraseña completa, el código de seguridad de tu tarjeta (CVV) ni los códigos que te llegan por SMS.'],
            ],
        ],
        [
            'title' => 'Fraudes más comunes',
            'blocks' => [
                ['type' => 'cards', 'items' => [
                    ['title' => 'Llamadas telefónicas', 'body' => 'Alguien dice ser de tu banco y te alerta de un "cargo sospechoso". Te pide datos o un código "para cancelarlo".', 'icon' => 'phone'],
                    ['title' => 'SMS (smishing)', 'body' => 'Mensajes con enlaces: "Tu cuenta fue bloqueada, ingresa aquí". El enlace lleva a una página falsa.', 'icon' => 'message-square'],
                    ['title' => 'WhatsApp', 'body' => 'Un contacto conocido "cambió de número" y te pide dinero urgente, o te piden un código de verificación para robar tu cuenta.', 'icon' => 'message-circle'],
                    ['title' => 'Redes sociales', 'body' => 'Perfiles falsos de bancos, sorteos, préstamos inmediatos o inversiones con ganancias garantizadas.', 'icon' => 'users'],
                    ['title' => 'Compras falsas', 'body' => 'Tiendas o vendedores con precios demasiado bajos que piden pago por transferencia y nunca envían el producto.', 'icon' => 'shopping-bag'],
                    ['title' => 'Transferencias sospechosas', 'body' => 'Te piden "regresar" un depósito que llegó por error o pagar por adelantado un premio o préstamo.', 'icon' => 'banknote'],
                ]],
            ],
        ],
        [
            'title' => 'Suplantación de identidad',
            'blocks' => [
                ['type' => 'text', 'body' => [
                    'La suplantación o robo de identidad ocurre cuando alguien usa tus datos personales (nombre, INE, CURP, datos bancarios) para contratar créditos, abrir cuentas o hacer compras a tu nombre.',
                ]],
                ['type' => 'list', 'title' => 'Señales de alerta', 'style' => 'warning', 'items' => [
                    'Recibes llamadas de cobranza por deudas que no reconoces.',
                    'Aparecen créditos desconocidos en tu reporte de crédito.',
                    'Dejas de recibir estados de cuenta o te llegan de productos que no contrataste.',
                ]],
                ['type' => 'list', 'title' => 'Cómo prevenirla', 'style' => 'check', 'items' => [
                    'No compartas fotos de tu INE por mensajes; si es necesario, agrega una marca de agua con el propósito y la fecha.',
                    'Destruye documentos con datos personales antes de tirarlos.',
                    'Revisa tu reporte de crédito al menos una vez al año.',
                ]],
            ],
        ],
        [
            'title' => 'Protege tus contraseñas',
            'blocks' => [
                ['type' => 'procedure', 'items' => [
                    ['title' => 'Usa contraseñas largas y únicas', 'body' => 'Una frase de varias palabras es más segura que una palabra corta. No repitas la contraseña de tu banco en otros sitios.'],
                    ['title' => 'Activa la verificación en dos pasos', 'body' => 'En tu correo, redes sociales y WhatsApp.'],
                    ['title' => 'Nunca compartas códigos', 'body' => 'Los códigos que llegan por SMS son solo para ti, aunque te los pida "el banco".'],
                    ['title' => 'Bloquea tu celular', 'body' => 'Con PIN, huella o rostro. Tu celular es la llave de tus cuentas.'],
                    ['title' => 'Entra siempre por la app o escribiendo la dirección', 'body' => 'No uses enlaces recibidos por mensaje o correo.'],
                ]],
            ],
        ],
        [
            'title' => 'Escenarios: ¿qué harías?',
            'blocks' => [
                ['type' => 'choice', 'id' => 'llamada', 'title' => 'Llamada', 'icon' => 'phone', 'scenario' => 'Te llaman "del banco": detectaron un cargo sospechoso y para cancelarlo necesitan el código que te acaba de llegar por SMS.', 'options' => [
                    ['label' => 'Les doy el código para que cancelen el cargo.', 'feedback' => 'Ese código autoriza operaciones. Con él pueden vaciar tu cuenta.'],
                    ['label' => 'Cuelgo y llamo yo al número que viene en mi tarjeta.', 'feedback' => 'Correcto. Así verificas si la alerta es real hablando con tu banco por un canal oficial.', 'best' => true],
                    ['label' => 'Les pido que me lo expliquen y luego decido.', 'feedback' => 'Los estafadores son muy convincentes. Lo más seguro es cortar la llamada y comunicarte tú.'],
                ], 'tip' => 'Tu banco nunca te pedirá códigos, NIP ni contraseñas.'],
                ['type' => 'choice', 'id' => 'sms', 'title' => 'SMS', 'icon' => 'message-square', 'scenario' => 'Recibes un SMS: "Tu cuenta fue suspendida. Reactívala aquí: bit.ly/…".', 'options' => [
                    ['label' => 'Abro el enlace para revisar.', 'feedback' => 'El enlace puede llevarte a una página falsa que roba tus datos.'],
                    ['label' => 'Ignoro el enlace y reviso mi cuenta desde la app oficial.', 'feedback' => 'Exacto. Si hay un problema real, lo verás en la app o tu banco te lo confirmará.', 'best' => true],
                    ['label' => 'Respondo el mensaje con mis datos.', 'feedback' => 'Nunca respondas con datos personales o bancarios.'],
                ]],
                ['type' => 'choice', 'id' => 'whatsapp', 'title' => 'WhatsApp', 'icon' => 'message-circle', 'scenario' => 'Un número desconocido con la foto de tu tía dice: "Cambié de número, ¿me prestas $2,000? Es urgente".', 'options' => [
                    ['label' => 'Le transfiero, es mi tía.', 'feedback' => 'Es un fraude muy común: usan fotos y nombres de familiares.'],
                    ['label' => 'Le llamo a su número de siempre para confirmar.', 'feedback' => 'Muy bien. Verificar por otro medio es la mejor defensa.', 'best' => true],
                    ['label' => 'Le pido que me mande una foto para comprobar.', 'feedback' => 'Pueden enviar fotos robadas. Confirma con una llamada al número que ya conoces.'],
                ]],
                ['type' => 'choice', 'id' => 'compra', 'title' => 'Compra en línea', 'icon' => 'shopping-bag', 'scenario' => 'En redes sociales ves un celular nuevo a mitad de precio. Solo aceptan transferencia a una cuenta personal.', 'options' => [
                    ['label' => 'Transfiero rápido antes de que se agote.', 'feedback' => 'La prisa y el precio irreal son señales de fraude. Si transfieres, es muy difícil recuperar tu dinero.'],
                    ['label' => 'Desconfío y compro solo en tiendas o plataformas con protección al comprador.', 'feedback' => 'Correcto. Las plataformas formales ofrecen formas de reclamo si algo sale mal.', 'best' => true],
                    ['label' => 'Pago la mitad y la otra al recibirlo.', 'feedback' => 'Igual perderías el anticipo. El riesgo sigue siendo alto.'],
                ]],
            ],
        ],
        [
            'title' => 'Qué hacer si eres víctima',
            'blocks' => [
                ['type' => 'procedure', 'items' => [
                    ['title' => 'Llama a tu banco de inmediato', 'body' => 'Usa el número oficial de tu tarjeta o de la app. Pide bloquear tus tarjetas y cuentas.'],
                    ['title' => 'Cambia tus contraseñas', 'body' => 'De tu banca en línea, correo y redes, desde un dispositivo seguro.'],
                    ['title' => 'Presenta una aclaración', 'body' => 'Solicita a tu banco la aclaración de los cargos que no reconoces y guarda tu número de folio.'],
                    ['title' => 'Acude a CONDUSEF si no te resuelven', 'body' => 'Puedes pedir orientación o presentar una queja contra la institución.'],
                    ['title' => 'Denuncia', 'body' => 'Puedes reportar fraudes digitales a la Guardia Nacional (088) y presentar una denuncia ante el Ministerio Público.'],
                ]],
                ['type' => 'callout', 'tone' => 'tip', 'body' => 'Guarda capturas de pantalla, números de teléfono, mensajes y comprobantes. Te servirán como evidencia.'],
                ['type' => 'links', 'items' => [
                    ['label' => 'CONDUSEF', 'url' => 'https://www.condusef.gob.mx', 'description' => 'Orientación, quejas y alertas de fraude.', 'icon' => 'shield-check'],
                    ['label' => 'Guardia Nacional', 'url' => 'https://www.gob.mx/guardianacional', 'description' => 'Reporte de incidentes cibernéticos (088).', 'icon' => 'shield-alert'],
                ]],
            ],
        ],
        [
            'title' => 'Pon a prueba lo que aprendiste',
            'blocks' => [
                ['type' => 'quiz', 'id' => 'evaluacion', 'questions' => [
                    ['question' => '¿Qué datos puede pedirte tu banco por teléfono?', 'options' => ['Tu NIP.', 'El código que te llegó por SMS.', 'Ninguno de los anteriores.'], 'answer' => 2, 'explanation' => 'Tu banco nunca te pedirá NIP, contraseñas ni códigos de seguridad.'],
                    ['question' => '¿Qué es lo primero que haces si detectas un cargo que no reconoces?', 'options' => ['Esperar al siguiente mes.', 'Llamar a tu banco por su número oficial y bloquear la tarjeta.', 'Publicarlo en redes.'], 'answer' => 1, 'explanation' => 'Actuar rápido limita el daño. Después presenta tu aclaración.'],
                    ['question' => '¿Cuál es una señal típica de fraude?', 'options' => ['Urgencia y presión para actuar ya.', 'Que te den tiempo para pensarlo.', 'Que te pidan acudir a sucursal.'], 'answer' => 0, 'explanation' => 'La urgencia busca que no te detengas a verificar.'],
                ]],
            ],
        ],
    ],

    'summary_points' => [
        'Nadie legítimo te pedirá NIP, contraseñas, CVV ni códigos SMS.',
        'Desconfía de la urgencia, los premios y los precios demasiado buenos.',
        'Verifica siempre por un canal que tú conoces.',
        'Usa contraseñas únicas y verificación en dos pasos.',
        'Si eres víctima: bloquea, aclara con tu banco, acude a CONDUSEF y denuncia.',
    ],

    'sources' => [
        ['name' => 'CONDUSEF', 'url' => 'https://www.condusef.gob.mx', 'description' => 'Alertas, orientación y quejas.'],
        ['name' => 'Guardia Nacional', 'url' => 'https://www.gob.mx/guardianacional', 'description' => 'Atención a incidentes cibernéticos.'],
        ['name' => 'Banco de México', 'url' => 'https://www.banxico.org.mx', 'description' => 'Información sobre seguridad en pagos.'],
    ],
];
