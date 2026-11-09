@props(['block', 'activity'])

<div class="tool" data-tool="small-expenses">
    <header class="tool__head">
        <span class="icon-bubble icon-bubble--solid"><x-ui.icon name="coffee" size="20" /></span>
        <div>
            <h4 class="tool__title">Calculadora de gastos hormiga</h4>
            <p class="tool__text">Pequeños gastos frecuentes que, sumados, se vuelven grandes.</p>
        </div>
    </header>
    <div class="tool__grid">
        <div class="field">
            <label class="field__label" for="t-ant-amount">¿Cuánto gastas cada vez? (MXN)</label>
            <input id="t-ant-amount" name="t-ant-amount" class="field__input" type="number" min="0" step="5" inputmode="decimal" value="45">
        </div>
        <div class="field">
            <label class="field__label" for="t-ant-days">¿Cuántas veces por semana?</label>
            <input id="t-ant-days" name="t-ant-days" class="field__input" type="number" min="0" max="21" step="1" inputmode="numeric" value="5">
        </div>
    </div>
    <div class="tool__result" aria-live="polite">
        <dl class="result-grid">
            <div><dt>Al mes (aprox.)</dt><dd data-ant-month>—</dd></div>
            <div><dt>Al año (aprox.)</dt><dd data-ant-year>—</dd></div>
        </dl>
        <p class="block-note" data-ant-tip></p>
    </div>
</div>
