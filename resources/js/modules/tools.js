/**
 * Interactive learning tools used inside guides and experiences:
 * simulators, calculators, classifiers and the housing journey.
 * They run after guide.js has restored stored answers.
 */
import { setProgress, showToast } from '../ayulta';
import { award, POINTS } from '../lib/progress';
import { recordFor, restoreInputs } from './guide';

const money = new Intl.NumberFormat('es-MX', { style: 'currency', currency: 'MXN', maximumFractionDigits: 0 });
const PERIODS_PER_MONTH = { weekly: 52 / 12, biweekly: 2, monthly: 1 };
const PERIOD_NAMES = { weekly: ['semana', 'semanas'], biweekly: ['quincena', 'quincenas'], monthly: ['mes', 'meses'] };

const number = (input) => Math.max(0, Number.parseFloat(input?.value ?? '0') || 0);
const plural = (count, [one, many]) => `${count} ${count === 1 ? one : many}`;

function bind(tool, render) {
    tool.addEventListener('input', render);
    tool.addEventListener('change', render);
    render();
}

function setNotice(notice, tone, text) {
    if (!notice) {
        return;
    }

    notice.className = notice.className.replace(/notice--\w+/g, '').trim();
    notice.classList.add(`notice--${tone}`);
    notice.querySelector('.notice__text').textContent = text;
}

function monthsText(months) {
    if (months < 1) {
        return 'menos de 1 mes';
    }

    if (months < 12) {
        return plural(Math.ceil(months), ['mes', 'meses']);
    }

    const years = Math.floor(months / 12);
    const rest = Math.ceil(months % 12);

    return `${plural(years, ['año', 'años'])}${rest > 0 ? ` y ${plural(rest, ['mes', 'meses'])}` : ''}`;
}

/* ---------- Savings simulator ---------- */

function initSavings(tool) {
    const field = (name) => tool.querySelector(`[name="t-savings-${name}"]`);

    bind(tool, () => {
        const mode = field('mode').value;
        const frequency = field('frequency').value;
        const target = number(field('target'));
        const saved = number(field('saved'));
        const percent = number(field('percent'));
        const contribution = mode === 'percent' ? (number(field('income')) * percent) / 100 : number(field('amount'));
        const remaining = Math.max(target - saved, 0);
        const goal = field('goal').value.trim() || 'tu meta';

        tool.querySelectorAll('[data-savings-fixed]').forEach((element) => {
            element.hidden = mode !== 'fixed';
        });
        tool.querySelectorAll('[data-savings-percent]').forEach((element) => {
            element.hidden = mode !== 'percent';
        });
        tool.querySelector('[data-savings-percent-label]').textContent = `${percent}%`;

        tool.querySelector('[data-savings-contribution]').textContent = money.format(contribution);
        tool.querySelector('[data-savings-remaining]').textContent = money.format(remaining);

        const headline = tool.querySelector('[data-savings-headline]');
        const tip = tool.querySelector('[data-savings-tip]');

        if (target <= 0) {
            headline.textContent = 'Escribe el monto de tu meta para calcular.';
        } else if (remaining === 0) {
            headline.textContent = `¡Ya alcanzaste «${goal}»!`;
            tool.querySelector('[data-savings-periods]').textContent = '0';
            tool.querySelector('[data-savings-time]').textContent = 'Meta cumplida';
        } else if (contribution <= 0) {
            headline.textContent = 'Agrega una aportación mayor a cero para calcular el tiempo.';
            tool.querySelector('[data-savings-periods]').textContent = '—';
            tool.querySelector('[data-savings-time]').textContent = '—';
        } else {
            const periods = Math.ceil(remaining / contribution);
            const months = periods / PERIODS_PER_MONTH[frequency];

            headline.textContent = `Alcanzarías «${goal}» en aproximadamente ${monthsText(months)}.`;
            tool.querySelector('[data-savings-periods]').textContent = plural(periods, PERIOD_NAMES[frequency]);
            tool.querySelector('[data-savings-time]').textContent = monthsText(months);
        }

        tip.textContent = mode === 'percent'
            ? 'Con ingresos variables, ahorrar un porcentaje fijo de cada ingreso te ayuda a aportar más cuando ganas más y menos cuando ganas menos, sin dejar de ahorrar.'
            : 'Programa tu aportación el mismo día que recibes tu ingreso: "págate primero" a ti.';

        setProgress(tool.querySelector('[data-progress="savings"]'), target > 0 ? Math.min(100, Math.round((saved / target) * 100)) : 0);
    });
}

/* ---------- Monthly budget ---------- */

function initBudget(tool) {
    bind(tool, () => {
        const income = [...tool.querySelectorAll('[data-budget-income]')].reduce((sum, input) => sum + number(input), 0);
        const totals = { need: 0, want: 0, saving: 0 };

        tool.querySelectorAll('[data-budget-expense]').forEach((input) => {
            totals[input.dataset.budgetExpense] += number(input);
        });

        const spent = totals.need + totals.want + totals.saving;
        const balance = income - spent;
        const pct = (value) => (income > 0 ? Math.round((value / income) * 100) : 0);

        tool.querySelector('[data-budget-income-total]').textContent = money.format(income);
        tool.querySelector('[data-budget-expense-total]').textContent = money.format(spent);
        tool.querySelector('[data-budget-balance]').textContent = money.format(balance);
        tool.querySelector('[data-budget-balance]').classList.toggle('is-negative', balance < 0);
        tool.querySelector('[data-budget-saving-rate]').textContent = `${pct(totals.saving)}% de tu ingreso`;

        const base = Math.max(income, spent, 1);

        Object.entries(totals).forEach(([key, value]) => {
            tool.querySelector(`[data-budget-seg="${key}"]`).style.width = `${(value / base) * 100}%`;
            tool.querySelector(`[data-budget-pct="${key}"]`).textContent = `${pct(value)}%`;
        });

        const notice = tool.querySelector('[data-budget-message]');

        if (income === 0) {
            setNotice(notice, 'info', 'Escribe tus ingresos para empezar.');
        } else if (balance < 0) {
            setNotice(notice, 'warning', `Estás asignando ${money.format(Math.abs(balance))} más de lo que recibes. Reduce primero los gastos no necesarios antes de tocar necesidades o endeudarte.`);
        } else if (pct(totals.need) > 60) {
            setNotice(notice, 'warning', `Tus necesidades ocupan ${pct(totals.need)}% de tu ingreso. Revisa si algún gasto fijo (renta, plan de celular, transporte) se puede ajustar.`);
        } else if (pct(totals.saving) < 10) {
            setNotice(notice, 'tip', `Tu presupuesto cuadra, pero ahorras ${pct(totals.saving)}%. Intenta llegar al menos a 10% para construir tu fondo de emergencia.`);
        } else if (balance > 0) {
            setNotice(notice, 'success', `¡Buen presupuesto! Te sobran ${money.format(balance)}: asígnalos a una meta o a tu ahorro para que no se "pierdan" en gastos pequeños.`);
        } else {
            setNotice(notice, 'success', 'Cada peso tiene un destino. ¡Presupuesto equilibrado!');
        }
    });
}

/* ---------- Savings plan (Mi primer ahorro) ---------- */

const MAX_DEPOSITS = 24;

function initSavingsPlan(tool) {
    const field = (name) => tool.querySelector(`[name="t-plan-${name}"]`);
    const container = tool.querySelector('[data-plan-deposits]');
    let lastCount = -1;

    tool.addEventListener('click', (event) => {
        const preset = event.target.closest('[data-plan-preset]');

        if (preset) {
            field('goal').value = preset.dataset.goal;
            field('target').value = preset.dataset.amount;
            field('goal').dispatchEvent(new Event('input', { bubbles: true }));
            field('target').dispatchEvent(new Event('change', { bubbles: true }));
        }
    });

    bind(tool, () => {
        const target = number(field('target'));
        const amount = number(field('amount'));
        const frequency = field('frequency').value;
        const count = amount > 0 ? Math.min(Math.ceil(target / amount), MAX_DEPOSITS) : 0;
        const totalNeeded = amount > 0 ? Math.ceil(target / amount) : 0;

        if (count !== lastCount) {
            container.replaceChildren(...Array.from({ length: count }, (_, index) => {
                const label = document.createElement('label');

                label.className = 'deposit';
                label.innerHTML = `<input type="checkbox" name="t-plan-dep-${index}" class="deposit__input"><span class="deposit__box">${index + 1}</span>`;
                label.title = `Depósito ${index + 1}`;

                return label;
            }));
            restoreInputs(container, recordFor(tool)?.answers ?? {});
            lastCount = count;
        }

        const done = container.querySelectorAll('input:checked').length;
        const savedAmount = Math.min(done * amount, target);

        tool.querySelector('[data-plan-headline]').textContent = `${field('goal').value.trim() || 'Mi meta'}: ${money.format(target)}`;
        tool.querySelector('[data-plan-summary]').textContent = amount > 0
            ? `Necesitas ${plural(totalNeeded, ['depósito', 'depósitos'])} de ${money.format(amount)} (${plural(totalNeeded, PERIOD_NAMES[frequency])}, ≈ ${monthsText(totalNeeded / PERIODS_PER_MONTH[frequency])}).${totalNeeded > MAX_DEPOSITS ? ` Mostramos los primeros ${MAX_DEPOSITS}.` : ''} Marca cada depósito que hagas.`
            : 'Escribe una aportación mayor a cero.';

        const percent = target > 0 ? Math.round((savedAmount / target) * 100) : 0;

        setProgress(tool.querySelector('[data-progress="plan"]'), percent, null);

        if (percent === 100 && count > 0) {
            if (award(`plan:${field('goal').value.trim()}:${target}`, POINTS.stage_completed)) {
                showToast('¡Meta de ahorro cumplida! Sumaste puntos de aprendizaje.');
            }
        }
    });
}

/* ---------- Expense classification ---------- */

function initExpenseSort(tool) {
    const activityId = tool.closest('[data-activity]')?.dataset.activity ?? 'tool';

    bind(tool, () => {
        const items = [...tool.querySelectorAll('[data-sort-item]')];
        let answered = 0;
        let correct = 0;

        items.forEach((item, index) => {
            const checked = item.querySelector('input:checked');
            const feedback = item.querySelector('[data-sort-feedback]');

            item.classList.remove('is-correct', 'is-wrong');
            feedback.hidden = !checked;

            if (checked) {
                const isCorrect = checked.value === item.dataset.answer;

                answered += 1;
                correct += isCorrect ? 1 : 0;
                item.classList.add(isCorrect ? 'is-correct' : 'is-wrong');

                if (isCorrect) {
                    award(`sort:${activityId}:${index}`, POINTS.correct_answer);
                }
            }
        });

        tool.querySelector('[data-sort-score]').textContent = answered === 0
            ? ''
            : `Clasificaste ${answered} de ${items.length} · ${correct} coinciden con la clasificación más común.`;
    });
}

/* ---------- Small expenses ---------- */

function initSmallExpenses(tool) {
    bind(tool, () => {
        const amount = number(tool.querySelector('[name="t-ant-amount"]'));
        const times = number(tool.querySelector('[name="t-ant-days"]'));
        const year = amount * times * 52;

        tool.querySelector('[data-ant-month]').textContent = money.format(year / 12);
        tool.querySelector('[data-ant-year]').textContent = money.format(year);
        tool.querySelector('[data-ant-tip]').textContent = year > 0
            ? `Si redujeras este gasto a la mitad, podrías ahorrar alrededor de ${money.format(year / 2)} al año.`
            : 'Escribe un gasto pequeño que hagas con frecuencia (café, botanas, envíos, apps).';
    });
}

/* ---------- Paycheck distribution ---------- */

function initPaycheck(tool) {
    bind(tool, () => {
        const net = number(tool.querySelector('[name="t-pay-net"]'));
        let total = 0;

        tool.querySelectorAll('[data-pay-slider]').forEach((slider) => {
            const value = number(slider);
            const key = slider.dataset.paySlider;

            total += value;
            tool.querySelector(`[data-pay-pct="${key}"]`).textContent = String(value);
            tool.querySelector(`[data-pay-amount="${key}"]`).textContent = money.format((net * value) / 100);
        });

        const savings = number(tool.querySelector('[data-pay-slider="savings"]'));
        const notice = tool.querySelector('[data-pay-message]');

        tool.querySelector('[data-pay-total]').textContent = `${total}%`;

        if (total < 100) {
            setNotice(notice, 'info', `Te falta asignar ${100 - total}% (${money.format((net * (100 - total)) / 100)}). El dinero sin destino suele gastarse sin darte cuenta.`);
        } else if (total > 100) {
            setNotice(notice, 'warning', `Te pasaste por ${total - 100}%. Reduce alguna categoría: no puedes repartir más de lo que recibes.`);
        } else if (savings < 10) {
            setNotice(notice, 'tip', 'Tu sueldo está distribuido. Considera subir tu ahorro a 10% o más para empezar tu fondo de emergencia.');
        } else {
            setNotice(notice, 'success', '¡Tu primer sueldo tiene un plan! Cada peso tiene un destino y estás ahorrando.');
        }
    });
}

/* ---------- Housing journey ---------- */

function initHousingPath(tool) {
    const activityId = tool.closest('[data-activity]')?.dataset.activity ?? 'housing';
    const stages = [...tool.querySelectorAll('[data-stage]')];

    bind(tool, (event) => {
        const done = stages.filter((stage) => stage.querySelector('[data-stage-toggle]').checked);
        const pending = stages.filter((stage) => !done.includes(stage));
        const name = (stage) => stage.querySelector('.journey-stage__title').textContent;

        stages.forEach((stage) => {
            const isDone = done.includes(stage);
            const badge = stage.querySelector('[data-stage-badge]');

            stage.classList.toggle('is-done', isDone);
            badge.textContent = isDone ? 'Completada' : 'Pendiente';
            badge.className = `badge ${isDone ? 'badge--success' : 'badge--muted'}`;

            if (isDone && award(`stage:${activityId}:${stage.dataset.stage}`, POINTS.stage_completed) && event) {
                showToast(`Etapa completada: ${name(stage)}. +${POINTS.stage_completed} puntos.`);
            }
        });

        const percent = Math.round((done.length / stages.length) * 100);

        setProgress(tool.querySelector('[data-progress="journey"]'), percent, `${done.length} de ${stages.length} etapas completadas · ${percent}%`);

        const doneList = tool.querySelector('[data-journey-done]');
        const pendingList = tool.querySelector('[data-journey-pending]');
        const item = (text) => {
            const li = document.createElement('li');

            li.textContent = text;

            return li;
        };

        doneList.replaceChildren(...(done.length ? done.map((stage) => item(name(stage))) : [item('Aún ninguna.')]));
        pendingList.replaceChildren(...(pending.length ? pending.map((stage) => item(name(stage))) : [item('¡Ninguna! Completaste el camino.')]));
    });
}

/* ---------- Choice results (game) ---------- */

function initChoiceResults(tool) {
    const root = tool.closest('[data-activity]');

    const render = () => {
        const choices = [...root.querySelectorAll('[data-choice]')];
        const list = tool.querySelector('[data-results-list]');
        let best = 0;
        let answered = 0;

        list.replaceChildren(...choices.map((choice, index) => {
            const checked = choice.querySelector('input:checked');
            const isBest = checked?.closest('[data-choice-option]')?.hasAttribute('data-best') ?? false;
            const li = document.createElement('li');

            answered += checked ? 1 : 0;
            best += isBest ? 1 : 0;
            li.className = `results__item ${checked ? (isBest ? 'is-best' : 'is-other') : 'is-pending'}`;
            li.textContent = `Situación ${index + 1}: ${checked ? (isBest ? 'elegiste la opción más recomendable' : 'había una opción más recomendable') : 'sin responder'}`;

            return li;
        }));

        tool.querySelector('[data-results-best]').textContent = String(best);
        tool.querySelector('[data-results-total]').textContent = String(choices.length);
        tool.querySelector('[data-results-message]').textContent = answered < choices.length
            ? `Respondiste ${answered} de ${choices.length} situaciones. Regresa a las que faltan para completar tu resultado.`
            : best === choices.length
                ? '¡Excelente! Tomaste decisiones informadas en todas las situaciones. Estás listo para independizarte con más seguridad.'
                : best >= choices.length / 2
                    ? '¡Buen trabajo! Repasa las explicaciones de las situaciones donde había una opción más recomendable.'
                    : 'Vas empezando. Repasa las explicaciones y la guía de contrato de renta antes de tomar decisiones reales.';
    };

    root.addEventListener('change', render);
    root.addEventListener('ayulta:step', render);
    render();
}

const TOOLS = {
    savings: initSavings,
    budget: initBudget,
    'savings-plan': initSavingsPlan,
    'expense-sort': initExpenseSort,
    'small-expenses': initSmallExpenses,
    paycheck: initPaycheck,
    'housing-path': initHousingPath,
    'choice-results': initChoiceResults,
};

document.querySelectorAll('[data-tool]').forEach((tool) => {
    TOOLS[tool.dataset.tool]?.(tool);
});

