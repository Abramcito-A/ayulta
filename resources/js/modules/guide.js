/**
 * Universal guide & experience engine.
 *
 * Content is fully rendered by Blade. This script turns it into a step by
 * step experience, keeps answers in localStorage and restores them when the
 * user comes back. Without JavaScript every step stays visible.
 */
import { showToast } from '../ayulta';
import { award, POINTS } from '../lib/progress';
import { activityRecord, addEvent, update } from '../lib/store';

/* ---------- Answer persistence ---------- */

export function restoreInputs(container, answers) {
    container.querySelectorAll('input[name], select[name], textarea[name]').forEach((input) => {
        if (!(input.name in answers) || input.name === 'path') {
            return;
        }

        const stored = answers[input.name];

        if (input.type === 'radio') {
            input.checked = String(stored) === input.value;
        } else if (input.type === 'checkbox') {
            input.checked = Boolean(stored);
        } else {
            input.value = stored;
        }
    });
}

export function recordFor(element) {
    const root = element.closest('[data-activity]');

    return root ? activityRecord(root.dataset.activity) : null;
}

function storeInput(activityId, input) {
    update(() => {
        const record = activityRecord(activityId);

        if (input.name === 'path') {
            record.path = input.value;
        } else if (input.type === 'checkbox') {
            record.answers[input.name] = input.checked;
        } else if (input.type !== 'radio' || input.checked) {
            record.answers[input.name] = input.value;
        }

        record.updatedAt = Date.now();
    });
}

/* ---------- Interactive blocks ---------- */

function renderQuizQuestion(question, activityId) {
    const checked = question.querySelector('input:checked');
    const feedback = question.querySelector('[data-quiz-feedback]');

    question.querySelectorAll('.quiz__option').forEach((option) => option.classList.remove('is-correct', 'is-wrong'));

    if (!checked) {
        feedback.hidden = true;

        return;
    }

    const correctIndex = question.dataset.answer;
    const isCorrect = checked.value === correctIndex;

    question.querySelector(`input[value="${correctIndex}"]`)?.closest('.quiz__option').classList.add('is-correct');

    if (!isCorrect) {
        checked.closest('.quiz__option').classList.add('is-wrong');
    }

    feedback.hidden = false;
    feedback.classList.toggle('feedback--success', isCorrect);
    feedback.classList.toggle('feedback--warning', !isCorrect);
    feedback.querySelector('[data-quiz-result]').textContent = isCorrect ? '¡Correcto!' : 'No exactamente. La respuesta correcta está marcada.';

    if (isCorrect) {
        award(`quiz:${activityId}:${question.dataset.quizQuestion}`, POINTS.correct_answer);
    }
}

function renderQuizScore(quiz) {
    const questions = [...quiz.querySelectorAll('[data-quiz-question]')];
    const answered = questions.filter((question) => question.querySelector('input:checked'));
    const correct = answered.filter((question) => question.querySelector('input:checked').value === question.dataset.answer);
    const score = quiz.querySelector('[data-quiz-score]');

    score.textContent = answered.length === questions.length
        ? `Resultado: ${correct.length} de ${questions.length} respuestas correctas.${correct.length === questions.length ? ' ¡Excelente!' : ' Repasa los pasos anteriores si lo necesitas.'}`
        : answered.length > 0 ? `Llevas ${answered.length} de ${questions.length} preguntas.` : '';
}

function renderChoice(choice, activityId) {
    const checked = choice.querySelector('input:checked');
    const feedback = choice.querySelector('[data-choice-feedback]');

    choice.querySelectorAll('[data-choice-option]').forEach((option) => option.classList.remove('is-best', 'is-picked'));

    if (!checked) {
        feedback.hidden = true;

        return;
    }

    const picked = checked.closest('[data-choice-option]');
    const isBest = picked.hasAttribute('data-best');

    choice.querySelector('[data-choice-option][data-best]')?.classList.add('is-best');
    picked.classList.add('is-picked');
    feedback.hidden = false;
    feedback.classList.toggle('feedback--success', isBest);
    feedback.classList.toggle('feedback--warning', !isBest);
    feedback.querySelector('[data-choice-result]').textContent = isBest
        ? '¡Buena decisión! Es la opción más recomendable.'
        : 'Hay una opción más recomendable (está marcada).';
    feedback.querySelectorAll('[data-choice-explanation]').forEach((text) => {
        text.hidden = text.dataset.choiceExplanation !== checked.value;
    });

    if (isBest) {
        award(`choice:${activityId}:${choice.dataset.choice}`, POINTS.correct_answer);
    }
}

function renderChecklist(checklist) {
    checklist.querySelector('[data-checklist-done]').textContent = String(checklist.querySelectorAll('input:checked').length);
}

/* ---------- Activity (stepper) ---------- */

function initActivity(root) {
    const id = root.dataset.activity;
    const kind = root.dataset.activityKind;
    const title = root.dataset.activityTitle;
    const steps = [...root.querySelectorAll('[data-step]')];
    const nav = root.querySelector('[data-step-nav]');
    const prev = nav.querySelector('[data-step-prev]');
    const next = nav.querySelector('[data-step-next]');
    const stepper = root.querySelector('[data-stepper]');

    update(() => {
        const record = activityRecord(id);

        record.title = title;
        record.url = root.dataset.activityUrl;
        record.updatedAt = Date.now();

        if (record.status === 'new') {
            record.status = 'started';
            record.startedAt = Date.now();
            addEvent('started', { id, title, url: record.url });
        }
    });

    const record = () => activityRecord(id);

    restoreInputs(root, record().answers);

    if (record().path) {
        const pathInput = root.querySelector(`input[name="path"][value="${CSS.escape(record().path)}"]`);

        if (pathInput) {
            pathInput.checked = true;
        }
    }

    root.classList.add('is-enhanced');
    nav.hidden = false;

    const visibleSteps = () => steps.filter((step) => {
        const path = record().path;

        return !step.dataset.paths || !path || step.dataset.paths.split(',').includes(path);
    });

    let current = Number(record().step ?? 0);

    function show(stepIndex, { scroll = true } = {}) {
        const visible = visibleSteps();
        let position = visible.findIndex((step) => Number(step.dataset.step) === stepIndex);

        if (position === -1) {
            position = 0;
        }

        const active = visible[position];

        current = Number(active.dataset.step);
        steps.forEach((step) => step.classList.toggle('is-current', step === active));

        const percent = Math.round(((position + 1) / visible.length) * 100);

        stepper.querySelector('[data-stepper-current]').textContent = String(position + 1);
        stepper.querySelector('[data-stepper-total]').textContent = String(visible.length);
        stepper.querySelector('[data-stepper-name]').textContent = active.dataset.stepTitle;
        stepper.querySelector('[data-stepper-fill]').style.width = `${percent}%`;
        stepper.querySelector('[data-stepper-bar]').setAttribute('aria-valuenow', String(percent));
        stepper.querySelectorAll('[data-stepper-link-item]').forEach((item) => {
            const step = steps[Number(item.dataset.stepperLinkItem)];

            item.hidden = !visible.includes(step);
            item.classList.toggle('is-current', step === active);
        });

        prev.disabled = position === 0;
        next.hidden = position === visible.length - 1;

        update(() => {
            record().step = current;
        });

        root.dispatchEvent(new CustomEvent('ayulta:step', { detail: { step: active } }));

        if (scroll) {
            stepper.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }

    function move(offset) {
        const visible = visibleSteps();
        const position = visible.findIndex((step) => Number(step.dataset.step) === current);
        const target = visible[Math.max(0, Math.min(visible.length - 1, position + offset))];

        show(Number(target.dataset.step));
    }

    prev.addEventListener('click', () => move(-1));
    next.addEventListener('click', () => move(1));

    stepper.addEventListener('click', (event) => {
        const link = event.target.closest('[data-stepper-link]');

        if (link) {
            event.preventDefault();
            link.closest('details').open = false;
            show(Number(link.dataset.stepperLink));
        }
    });

    root.addEventListener('change', (event) => {
        const input = event.target;

        if (!input.name) {
            return;
        }

        storeInput(id, input);

        const question = input.closest('[data-quiz-question]');

        if (question) {
            renderQuizQuestion(question, id);
            renderQuizScore(question.closest('[data-quiz]'));
        }

        const choice = input.closest('[data-choice]');

        if (choice) {
            renderChoice(choice, id);
        }

        const checklist = input.closest('[data-checklist]');

        if (checklist) {
            renderChecklist(checklist);
        }

        if (input.name === 'path') {
            showToast('Ajustamos los pasos a tu camino.');
            renderStepper();
        }
    });

    root.addEventListener('input', (event) => {
        const input = event.target;

        if (input.name && (input.tagName === 'TEXTAREA' || ['text', 'number', 'range'].includes(input.type))) {
            storeInput(id, input);
        }
    });

    function renderStepper() {
        show(current, { scroll: false });
    }

    /* Completion */

    const completion = root.querySelector('[data-completion]');

    function renderCompletion() {
        const done = record().status === 'completed';
        const status = root.querySelector('[data-activity-status]');

        completion.querySelector('[data-completion-pending]').hidden = done;
        completion.querySelector('[data-completion-done]').hidden = !done;

        if (status) {
            status.hidden = false;
            status.textContent = done ? 'Completada' : 'En progreso';
            status.classList.toggle('is-done', done);
        }
    }

    completion.querySelector('[data-complete-activity]').addEventListener('click', () => {
        const points = kind === 'guide' ? POINTS.guide_completed : POINTS.experience_completed;

        update(() => {
            const draft = record();

            draft.status = 'completed';
            draft.completedAt = Date.now();
        });

        const awarded = award(`complete:${id}`, points);

        update(() => addEvent('completed', { id, title, url: record().url, points: awarded ? points : 0 }));
        renderCompletion();
        showToast(awarded ? `¡Completada! Sumaste ${points} puntos de aprendizaje.` : '¡Completada de nuevo! Repasar también cuenta.');
    });

    completion.querySelector('[data-restart-activity]').addEventListener('click', () => {
        update((state) => {
            state.activities[id] = { ...record(), status: 'started', step: null, path: null, answers: {} };
        });
        window.location.reload();
    });

    /* Initial render */

    root.querySelectorAll('[data-quiz-question]').forEach((question) => renderQuizQuestion(question, id));
    root.querySelectorAll('[data-quiz]').forEach(renderQuizScore);
    root.querySelectorAll('[data-choice]').forEach((choice) => renderChoice(choice, id));
    root.querySelectorAll('[data-checklist]').forEach(renderChecklist);
    renderCompletion();
    show(current, { scroll: false });

    document.dispatchEvent(new CustomEvent('ayulta:restored', { detail: { root } }));
}

document.querySelectorAll('[data-activity]').forEach(initActivity);

