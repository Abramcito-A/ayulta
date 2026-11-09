/**
 * Global AYULTA interactions shared by every screen.
 */
import { completedCount, levelInfo } from './lib/progress';
import { getState, subscribe, toggleFavorite, unreadCount } from './lib/store';

const formatter = new Intl.NumberFormat('es-MX');

/* ---------- Toast ---------- */

let toastTimer = null;

export function showToast(message) {
    const toast = document.querySelector('[data-toast]');

    if (!toast) {
        return;
    }

    toast.textContent = message;
    toast.hidden = false;
    toast.classList.add('is-visible');
    window.clearTimeout(toastTimer);
    toastTimer = window.setTimeout(() => {
        toast.classList.remove('is-visible');
        window.setTimeout(() => {
            toast.hidden = true;
        }, 250);
    }, 3200);
}

/* ---------- Demo account ---------- */

function fillDemoAccount() {
    const form = document.querySelector('form[action$="/login"]');
    const email = form?.querySelector('[name="email"]');
    const password = form?.querySelector('[name="password"]');

    if (!email || !password) {
        return false;
    }

    email.value = 'demo@ayulta.mx';
    password.value = 'ayulta123';
    password.focus();
    showToast('Listo: escribimos los datos de la cuenta demostrativa.');

    return true;
}

if (new URLSearchParams(window.location.search).has('demo')) {
    fillDemoAccount();
}

/* ---------- Clicks (delegated) ---------- */

document.addEventListener('click', (event) => {
    const passwordToggle = event.target.closest('[data-password-toggle]');

    if (passwordToggle) {
        const input = document.getElementById(passwordToggle.dataset.passwordToggle);

        if (input) {
            const reveal = input.type === 'password';

            input.type = reveal ? 'text' : 'password';
            passwordToggle.classList.toggle('is-visible', reveal);
            passwordToggle.setAttribute('aria-pressed', String(reveal));
            passwordToggle.setAttribute('aria-label', reveal ? 'Ocultar contraseña' : 'Mostrar contraseña');
        }
    }

    const opener = event.target.closest('[data-modal-open]');

    if (opener) {
        document.getElementById(opener.dataset.modalOpen)?.showModal();
    }

    const closer = event.target.closest('[data-modal-close]');

    if (closer) {
        closer.closest('dialog')?.close();
    }

    const flashClose = event.target.closest('[data-flash-close]');

    if (flashClose) {
        flashClose.closest('[data-flash]')?.remove();
    }

    const fillDemo = event.target.closest('[data-fill-demo]');

    if (fillDemo && fillDemoAccount()) {
        event.preventDefault();
        fillDemo.closest('dialog')?.close();
    }

    const favoriteButton = event.target.closest('[data-favorite]');

    if (favoriteButton) {
        event.preventDefault();
        const added = toggleFavorite(favoriteButton.dataset.favorite);

        showToast(added ? 'Guardada en tus favoritos.' : 'Quitada de tus favoritos.');
    }
});

document.querySelectorAll('dialog.modal').forEach((modal) => {
    modal.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.close();
        }
    });
});

/* ---------- Client-side validation (server validation remains the source of truth) ---------- */

const EMAIL_PATTERN = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

function fieldMessage(input) {
    const value = input.value.trim();
    const label = input.closest('.field')?.querySelector('.field__label')?.textContent?.trim() ?? 'Este campo';

    if (input.required && value === '') {
        return `${label}: este campo es obligatorio.`;
    }

    if (input.type === 'email' && value !== '' && !EMAIL_PATTERN.test(value)) {
        return 'Escribe un correo electrónico válido.';
    }

    if (input.minLength > 0 && value !== '' && value.length < input.minLength) {
        return `Debe tener al menos ${input.minLength} caracteres.`;
    }

    if (input.dataset.match) {
        const other = input.form?.querySelector(`[name="${input.dataset.match}"]`);

        if (other && other.value !== input.value) {
            return 'Las contraseñas no coinciden.';
        }
    }

    return '';
}

function setFieldError(input, message) {
    const field = input.closest('.field');

    if (!field) {
        return;
    }

    let error = field.querySelector('.field__error');

    if (message) {
        if (!error) {
            error = document.createElement('p');
            error.className = 'field__error';
            error.id = `${input.id}-error`;
            field.append(error);
        }

        error.textContent = message;
        field.classList.add('field--invalid');
        input.setAttribute('aria-invalid', 'true');
        input.setAttribute('aria-describedby', error.id);
    } else {
        error?.remove();
        field.classList.remove('field--invalid');
        input.removeAttribute('aria-invalid');
    }
}

document.querySelectorAll('form[data-validate]').forEach((form) => {
    form.addEventListener('submit', (event) => {
        let firstInvalid = null;

        form.querySelectorAll('.field__input').forEach((input) => {
            const message = fieldMessage(input);

            setFieldError(input, message);
            firstInvalid ??= message ? input : null;
        });

        if (firstInvalid) {
            event.preventDefault();
            firstInvalid.focus();
        } else {
            form.querySelector('[type="submit"]')?.setAttribute('aria-busy', 'true');
        }
    });

    form.addEventListener('input', (event) => {
        if (event.target.closest('.field--invalid')) {
            setFieldError(event.target, fieldMessage(event.target));
        }
    });
});

/* ---------- Flash messages fade out ---------- */

document.querySelectorAll('[data-flash]').forEach((flash) => {
    window.setTimeout(() => flash.classList.add('is-leaving'), 6500);
    window.setTimeout(() => flash.remove(), 7000);
});

/* ---------- State driven UI ---------- */

function activityStatusLabel(record) {
    if (record?.status === 'completed') {
        return 'Completada';
    }

    return record?.status === 'started' ? 'En progreso' : '';
}

function renderFavorites(state) {
    document.querySelectorAll('[data-favorite]').forEach((button) => {
        const saved = state.favorites.includes(button.dataset.favorite);
        const label = button.querySelector('[data-favorite-label]');

        button.classList.toggle('is-saved', saved);
        button.setAttribute('aria-pressed', String(saved));

        if (label) {
            label.textContent = saved ? 'Guardada' : 'Guardar';
        }
    });
}

function renderActivityCards(state) {
    document.querySelectorAll('[data-activity-card]').forEach((card) => {
        const record = state.activities[card.dataset.activityCard];
        const status = card.querySelector('[data-activity-status]');
        const label = activityStatusLabel(record);

        card.classList.toggle('is-completed', record?.status === 'completed');
        card.classList.toggle('is-started', record?.status === 'started');

        if (status && label) {
            status.textContent = label;
        }
    });

    document.querySelectorAll('[data-favorite-item] [data-activity-status]').forEach((status) => {
        status.textContent = activityStatusLabel(state.activities[status.closest('[data-favorite-item]').dataset.favoriteItem]) || 'Sin iniciar';
    });
}

function setProgress(element, percent, caption) {
    const value = element.querySelector('[data-progress-value]');
    const fill = element.querySelector('[data-progress-fill]');
    const track = element.querySelector('[role="progressbar"]');
    const captionElement = element.querySelector('[data-progress-caption]');

    if (value) {
        value.textContent = `${percent}%`;
    }

    if (fill) {
        fill.style.width = `${percent}%`;
    }

    track?.setAttribute('aria-valuenow', String(percent));

    if (captionElement && caption) {
        captionElement.textContent = caption;
    }
}

export { setProgress };

function renderModuleProgress(state) {
    const completedByModule = {};

    Object.entries(state.activities).forEach(([id, record]) => {
        if (record.status === 'completed') {
            const moduleKey = id.split('/')[0];

            completedByModule[moduleKey] = (completedByModule[moduleKey] ?? 0) + 1;
        }
    });

    document.querySelectorAll('[data-progress^="module-"]').forEach((element) => {
        const moduleKey = element.dataset.progress.replace('module-', '');
        const total = Number(element.dataset.total) || 1;
        const done = Math.min(completedByModule[moduleKey] ?? 0, total);

        setProgress(element, Math.round((done / total) * 100), `${done} de ${total} completadas`);
    });

    document.querySelectorAll('[data-module-progress]').forEach((element) => {
        const done = completedByModule[element.dataset.moduleProgress] ?? 0;

        if (done > 0) {
            element.textContent = `${done} completada${done === 1 ? '' : 's'}`;
        }
    });
}

function renderLevelCards(state) {
    const info = levelInfo(state.points);

    document.querySelectorAll('[data-level-card]').forEach((card) => {
        card.querySelector('[data-level-name]').textContent = info.current.name;
        card.querySelector('[data-level-points]').textContent = formatter.format(state.points);
        card.querySelector('[data-level-fill]').style.width = `${info.percent}%`;
        card.querySelector('[data-level-bar]').setAttribute('aria-valuenow', String(info.percent));
        card.querySelector('[data-level-caption]').textContent = info.next
            ? `Te faltan ${info.next.min - state.points} puntos para llegar a ${info.next.name}.`
            : '¡Llegaste al nivel más alto! Sigue repasando para mantenerte preparado.';
        card.querySelectorAll('[data-level-step]').forEach((step) => {
            const level = info.current.name === step.dataset.levelStep;

            step.classList.toggle('is-current', level);
        });
    });
}

function renderStats(state) {
    const values = {
        completed: completedCount(state),
        started: Object.entries(state.activities).filter(([, record]) => record.status !== 'new').length,
        favorites: state.favorites.length,
        points: state.points,
    };

    document.querySelectorAll('[data-stat]').forEach((stat) => {
        stat.textContent = formatter.format(values[stat.dataset.stat] ?? 0);
    });
}

function renderContinueCard(state) {
    const card = document.querySelector('[data-continue-card]');

    if (!card) {
        return;
    }

    const pending = Object.entries(state.activities)
        .filter(([, record]) => record.status === 'started' && record.url)
        .sort(([, a], [, b]) => (b.updatedAt ?? 0) - (a.updatedAt ?? 0))[0];

    card.hidden = !pending;

    if (pending) {
        card.href = pending[1].url;
        card.querySelector('[data-continue-title]').textContent = pending[1].title;
    }
}

function renderNotificationDots() {
    const unread = unreadCount();

    document.querySelectorAll('[data-notification-dot]').forEach((dot) => {
        dot.hidden = unread === 0;
    });
}

function render(state) {
    renderFavorites(state);
    renderActivityCards(state);
    renderModuleProgress(state);
    renderLevelCards(state);
    renderStats(state);
    renderContinueCard(state);
    renderNotificationDots();
}

subscribe(render);
render(getState());

