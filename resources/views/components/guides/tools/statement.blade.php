@props(['block', 'activity'])

<div class="statement" data-tool="statement">
    <div class="statement__card">
        <div class="statement__brand">
            <span>Banco Ejemplo</span>
            <x-ui.badge tone="muted">Estado de cuenta de demostración</x-ui.badge>
        </div>
        <dl class="statement__grid">
            <div><dt>Periodo</dt><dd>1 al 30 de septiembre</dd></div>
            <div><dt>Fecha de corte</dt><dd data-statement-term="corte">30 de septiembre</dd></div>
            <div><dt>Fecha límite de pago</dt><dd data-statement-term="limite">20 de octubre</dd></div>
            <div><dt>Límite de crédito</dt><dd>$8,000.00</dd></div>
            <div><dt>Saldo al corte</dt><dd>$3,200.00</dd></div>
            <div><dt>Crédito disponible</dt><dd>$4,800.00</dd></div>
        </dl>
        <div class="statement__payments">
            <div class="statement__pay">
                <span>Pago mínimo</span>
                <strong>$320.00</strong>
            </div>
            <div class="statement__pay statement__pay--best">
                <span>Pago para no generar intereses</span>
                <strong>$3,200.00</strong>
            </div>
        </div>
        <p class="statement__cat">CAT promedio informativo: <strong>ejemplo ficticio</strong> · Sin IVA · Para fines informativos y de comparación</p>
    </div>
    <ul class="statement__legend">
        <li><strong>Fecha de corte:</strong> día en que el banco "cierra" tus compras del periodo y calcula cuánto debes.</li>
        <li><strong>Fecha límite de pago:</strong> último día para pagar sin recargos. Paga antes para evitar retrasos.</li>
        <li><strong>Pago mínimo:</strong> lo menos que puedes pagar para no caer en atraso, pero el resto genera intereses.</li>
        <li><strong>Pago para no generar intereses:</strong> si pagas esta cantidad completa, no pagas intereses por tus compras del periodo.</li>
    </ul>
    <p class="block-note">Todos los datos de este estado de cuenta son ficticios y solo sirven para aprender a leerlo.</p>
</div>
