@props(['block', 'activity'])

<div class="tool" data-tool="savings">
    <header class="tool__head">
        <span class="icon-bubble icon-bubble--solid"><x-ui.icon name="piggy-bank" size="20" /></span>
        <div>
            <h4 class="tool__title">Simulador de ahorro</h4>
            <p class="tool__text">Define una meta y descubre cuánto tiempo te tomará alcanzarla.</p>
        </div>
    </header>

    <div class="tool__grid">
        <div class="field">
            <label class="field__label" for="t-savings-goal">¿Para qué quieres ahorrar?</label>
            <input id="t-savings-goal" name="t-savings-goal" class="field__input" type="text" maxlength="60" placeholder="Ej. Fondo de emergencia" value="Fondo de emergencia">
        </div>
        <div class="field">
            <label class="field__label" for="t-savings-target">Meta (MXN)</label>
            <input id="t-savings-target" name="t-savings-target" class="field__input" type="number" min="100" step="50" inputmode="decimal" value="6000">
        </div>
        <div class="field">
            <label class="field__label" for="t-savings-mode">¿Cómo vas a aportar?</label>
            <select id="t-savings-mode" name="t-savings-mode" class="field__input">
                <option value="fixed">Monto fijo</option>
                <option value="percent">Porcentaje de lo que recibo (ingresos variables)</option>
            </select>
        </div>
        <div class="field" data-savings-fixed>
            <label class="field__label" for="t-savings-amount">Aportación (MXN)</label>
            <input id="t-savings-amount" name="t-savings-amount" class="field__input" type="number" min="10" step="10" inputmode="decimal" value="250">
        </div>
        <div class="field" data-savings-percent hidden>
            <label class="field__label" for="t-savings-income">Ingreso promedio por periodo (MXN)</label>
            <input id="t-savings-income" name="t-savings-income" class="field__input" type="number" min="0" step="50" inputmode="decimal" value="2500">
        </div>
        <div class="field" data-savings-percent hidden>
            <label class="field__label" for="t-savings-percent">Porcentaje a ahorrar: <strong data-savings-percent-label>10%</strong></label>
            <input id="t-savings-percent" name="t-savings-percent" class="range" type="range" min="1" max="50" value="10">
        </div>
        <div class="field">
            <label class="field__label" for="t-savings-frequency">Frecuencia</label>
            <select id="t-savings-frequency" name="t-savings-frequency" class="field__input">
                <option value="weekly">Semanal</option>
                <option value="biweekly" selected>Quincenal</option>
                <option value="monthly">Mensual</option>
            </select>
        </div>
        <div class="field">
            <label class="field__label" for="t-savings-saved">¿Cuánto llevas ahorrado? (MXN)</label>
            <input id="t-savings-saved" name="t-savings-saved" class="field__input" type="number" min="0" step="50" inputmode="decimal" value="0">
        </div>
    </div>

    <div class="tool__result" aria-live="polite">
        <p class="tool__result-title" data-savings-headline>Calculando…</p>
        <dl class="result-grid">
            <div><dt>Aportación por periodo</dt><dd data-savings-contribution>—</dd></div>
            <div><dt>Periodos necesarios</dt><dd data-savings-periods>—</dd></div>
            <div><dt>Tiempo aproximado</dt><dd data-savings-time>—</dd></div>
            <div><dt>Te falta</dt><dd data-savings-remaining>—</dd></div>
        </dl>
        <x-ui.progress label="Avance hacia tu meta" hook="savings" />
        <p class="block-note" data-savings-tip></p>
    </div>
</div>
