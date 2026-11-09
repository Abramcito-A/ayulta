@props(['block', 'activity'])

@php
    $needs = [
        'vivienda' => ['Vivienda (renta o aportación al hogar)', 2500],
        'comida' => ['Alimentación', 2400],
        'transporte' => ['Transporte', 800],
        'servicios' => ['Servicios (luz, agua, internet, teléfono)', 700],
        'salud' => ['Salud e higiene', 400],
        'deudas' => ['Pago de deudas', 500],
    ];
    $wants = [
        'salidas' => ['Salidas y comida fuera', 900],
        'suscripciones' => ['Suscripciones y apps', 300],
        'compras' => ['Ropa, gustos y compras personales', 600],
    ];
@endphp

<div class="tool" data-tool="budget">
    <header class="tool__head">
        <span class="icon-bubble icon-bubble--solid"><x-ui.icon name="calculator" size="20" /></span>
        <div>
            <h4 class="tool__title">Simulador de presupuesto mensual</h4>
            <p class="tool__text">Cambia los montos con tus números reales o aproximados. Todo se calcula en automático.</p>
        </div>
    </header>

    <h5 class="tool__section"><x-ui.icon name="banknote" size="16" /> 1. Registra tus ingresos del mes</h5>
    <div class="tool__grid">
        <div class="field">
            <label class="field__label" for="t-budget-income-fixed">Ingresos fijos (sueldo, beca)</label>
            <input id="t-budget-income-fixed" name="t-budget-income-fixed" class="field__input" type="number" min="0" step="50" inputmode="decimal" value="9000" data-budget-income>
        </div>
        <div class="field">
            <label class="field__label" for="t-budget-income-variable">Ingresos variables (propinas, ventas, extras)</label>
            <input id="t-budget-income-variable" name="t-budget-income-variable" class="field__input" type="number" min="0" step="50" inputmode="decimal" value="1000" data-budget-income>
        </div>
    </div>

    <h5 class="tool__section"><x-ui.icon name="house" size="16" /> 2. Necesidades</h5>
    <div class="tool__grid">
        @foreach ($needs as $key => [$label, $amount])
            <div class="field">
                <label class="field__label" for="t-budget-{{ $key }}">{{ $label }}</label>
                <input id="t-budget-{{ $key }}" name="t-budget-{{ $key }}" class="field__input" type="number" min="0" step="50" inputmode="decimal" value="{{ $amount }}" data-budget-expense="need">
            </div>
        @endforeach
    </div>

    <h5 class="tool__section"><x-ui.icon name="sparkles" size="16" /> 3. Gastos no necesarios</h5>
    <div class="tool__grid">
        @foreach ($wants as $key => [$label, $amount])
            <div class="field">
                <label class="field__label" for="t-budget-{{ $key }}">{{ $label }}</label>
                <input id="t-budget-{{ $key }}" name="t-budget-{{ $key }}" class="field__input" type="number" min="0" step="50" inputmode="decimal" value="{{ $amount }}" data-budget-expense="want">
            </div>
        @endforeach
    </div>

    <h5 class="tool__section"><x-ui.icon name="piggy-bank" size="16" /> 4. Ahorro</h5>
    <div class="field">
        <label class="field__label" for="t-budget-ahorro">Ahorro planeado del mes</label>
        <input id="t-budget-ahorro" name="t-budget-ahorro" class="field__input" type="number" min="0" step="50" inputmode="decimal" value="1000" data-budget-expense="saving">
    </div>

    <div class="tool__result" aria-live="polite">
        <p class="tool__result-title">Resumen de tu presupuesto</p>
        <dl class="result-grid">
            <div><dt>Ingresos totales</dt><dd data-budget-income-total>—</dd></div>
            <div><dt>Gastos y ahorro</dt><dd data-budget-expense-total>—</dd></div>
            <div><dt>Disponible</dt><dd data-budget-balance>—</dd></div>
            <div><dt>Ahorro</dt><dd data-budget-saving-rate>—</dd></div>
        </dl>
        <div class="distribution" data-budget-distribution>
            <div class="distribution__bar" aria-hidden="true">
                <span class="distribution__seg distribution__seg--need" data-budget-seg="need"></span>
                <span class="distribution__seg distribution__seg--want" data-budget-seg="want"></span>
                <span class="distribution__seg distribution__seg--saving" data-budget-seg="saving"></span>
            </div>
            <ul class="distribution__legend">
                <li><span class="dot dot--need"></span> Necesidades <strong data-budget-pct="need">0%</strong></li>
                <li><span class="dot dot--want"></span> No necesarios <strong data-budget-pct="want">0%</strong></li>
                <li><span class="dot dot--saving"></span> Ahorro <strong data-budget-pct="saving">0%</strong></li>
            </ul>
        </div>
        <p class="block-note">Referencia de apoyo (regla 50/30/20): alrededor de 50% necesidades, 30% gustos y 20% ahorro. No es obligatoria: adáptala a tu realidad.</p>
        <x-ui.notice tone="info" title="Diagnóstico" data-budget-message>Ajusta tus montos para ver el diagnóstico.</x-ui.notice>
    </div>
</div>
