@props(['block', 'activity'])

@php
    $categories = [
        'needs' => ['Necesidades (comida, transporte, servicios, aporte al hogar)', 50],
        'savings' => ['Ahorro y fondo de emergencia', 20],
        'wants' => ['Gustos y entretenimiento', 20],
        'goals' => ['Metas o deudas (curso, pagos pendientes)', 10],
    ];
@endphp

<div class="tool" data-tool="paycheck">
    <header class="tool__head">
        <span class="icon-bubble icon-bubble--solid"><x-ui.icon name="hand-coins" size="20" /></span>
        <div>
            <h4 class="tool__title">Distribuye tu primer sueldo</h4>
            <p class="tool__text">Asigna un porcentaje a cada categoría. La suma debe ser 100%.</p>
        </div>
    </header>
    <div class="field">
        <label class="field__label" for="t-pay-net">Sueldo neto mensual (lo que recibes en tu cuenta)</label>
        <input id="t-pay-net" name="t-pay-net" class="field__input" type="number" min="0" step="100" inputmode="decimal" value="9500">
    </div>
    <div class="sliders">
        @foreach ($categories as $key => [$label, $percent])
            <div class="slider">
                <label class="slider__label" for="t-pay-{{ $key }}">
                    <span>{{ $label }}</span>
                    <strong><span data-pay-pct="{{ $key }}">{{ $percent }}</span>% · <span data-pay-amount="{{ $key }}">—</span></strong>
                </label>
                <input id="t-pay-{{ $key }}" name="t-pay-{{ $key }}" class="range" type="range" min="0" max="100" step="5" value="{{ $percent }}" data-pay-slider="{{ $key }}">
            </div>
        @endforeach
    </div>
    <div class="tool__result" aria-live="polite">
        <p class="tool__result-title">Total asignado: <span data-pay-total>100%</span></p>
        <x-ui.notice tone="success" data-pay-message>¡Tu sueldo está distribuido!</x-ui.notice>
    </div>
</div>
