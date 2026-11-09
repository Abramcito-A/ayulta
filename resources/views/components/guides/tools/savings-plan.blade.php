@props(['block', 'activity'])

<div class="tool" data-tool="savings-plan">
    <header class="tool__head">
        <span class="icon-bubble icon-bubble--solid"><x-ui.icon name="target" size="20" /></span>
        <div>
            <h4 class="tool__title">Mi plan de ahorro</h4>
            <p class="tool__text">Elige una meta, define tu aportación y marca cada depósito que hagas.</p>
        </div>
    </header>

    <fieldset class="chips" aria-label="Metas sugeridas">
        @foreach (['Fondo de emergencia' => 3000, 'Celular nuevo' => 5000, 'Curso o certificación' => 2500, 'Viaje' => 6000] as $goal => $amount)
            <button type="button" class="chip" data-plan-preset data-goal="{{ $goal }}" data-amount="{{ $amount }}">{{ $goal }}</button>
        @endforeach
    </fieldset>

    <div class="tool__grid">
        <div class="field">
            <label class="field__label" for="t-plan-goal">Mi meta</label>
            <input id="t-plan-goal" name="t-plan-goal" class="field__input" type="text" maxlength="60" value="Fondo de emergencia">
        </div>
        <div class="field">
            <label class="field__label" for="t-plan-target">Monto de la meta (MXN)</label>
            <input id="t-plan-target" name="t-plan-target" class="field__input" type="number" min="100" step="50" inputmode="decimal" value="3000">
        </div>
        <div class="field">
            <label class="field__label" for="t-plan-amount">Aportación por depósito (MXN)</label>
            <input id="t-plan-amount" name="t-plan-amount" class="field__input" type="number" min="10" step="10" inputmode="decimal" value="250">
        </div>
        <div class="field">
            <label class="field__label" for="t-plan-frequency">Frecuencia</label>
            <select id="t-plan-frequency" name="t-plan-frequency" class="field__input">
                <option value="weekly">Semanal</option>
                <option value="biweekly" selected>Quincenal</option>
                <option value="monthly">Mensual</option>
            </select>
        </div>
    </div>

    <div class="tool__result" aria-live="polite">
        <p class="tool__result-title" data-plan-headline>Tu plan</p>
        <p class="block-note" data-plan-summary></p>
        <div class="deposits" data-plan-deposits></div>
        <x-ui.progress label="Ahorrado en tu plan" hook="plan" />
    </div>
</div>
