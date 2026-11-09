/**
 * Favorites, notifications and profile screens.
 */
import { showToast } from './ayulta';
import { getState, markNotificationsRead, reset, subscribe, toggleFavorite } from './lib/store';

/* ---------- Favorites ---------- */

function renderFavoritesPage(state) {
    const page = document.querySelector('[data-favorites-page]');

    if (!page) {
        return;
    }

    const list = page.querySelector('[data-favorites-list]');
    let visible = 0;

    state.favorites.forEach((id) => {
        const item = list.querySelector(`[data-favorite-item="${CSS.escape(id)}"]`);

        if (item) {
            item.hidden = false;
            list.append(item);
            visible += 1;
        }
    });

    list.querySelectorAll('[data-favorite-item]').forEach((item) => {
        if (!state.favorites.includes(item.dataset.favoriteItem)) {
            item.hidden = true;
        }
    });

    page.querySelector('[data-favorites-empty]').hidden = visible > 0;
}

document.addEventListener('click', (event) => {
    const remove = event.target.closest('[data-favorite-remove]');

    if (remove) {
        toggleFavorite(remove.dataset.favoriteRemove);
        showToast('Quitada de tus favoritos.');
    }

    if (event.target.closest('[data-reset-progress]')) {
        reset();
        showToast('Tu avance en este dispositivo se reinició.');
    }

    if (event.target.closest('[data-notifications-read]')) {
        markNotificationsRead();
        document.querySelectorAll('[data-n-new]').forEach((badge) => {
            badge.hidden = true;
        });
        showToast('Notificaciones marcadas como leídas.');
    }
});

/* ---------- Notifications ---------- */

const EVENT_PRESETS = {
    started: { icon: 'play', title: (event) => `Iniciaste «${event.title}»`, text: () => 'Tu avance se guarda automáticamente. Puedes continuar cuando quieras.' },
    completed: { icon: 'circle-check', title: (event) => `Completaste «${event.title}»`, text: (event) => `¡Bien hecho! Sumaste ${event.points ?? 0} puntos de aprendizaje.` },
    level: { icon: 'award', title: (event) => event.title, text: (event) => event.text },
    progress: { icon: 'trending-up', title: (event) => event.title, text: (event) => event.text },
};

function relativeTime(timestamp) {
    const minutes = Math.round((Date.now() - timestamp) / 60000);

    if (minutes < 1) {
        return 'Justo ahora';
    }

    if (minutes < 60) {
        return `Hace ${minutes} min`;
    }

    const hours = Math.round(minutes / 60);

    if (hours < 24) {
        return `Hace ${hours} h`;
    }

    const days = Math.round(hours / 24);

    return days === 1 ? 'Ayer' : `Hace ${days} días`;
}

function renderNotifications(state) {
    const list = document.querySelector('[data-notification-list]');
    const template = document.querySelector('[data-notification-template]');

    if (!list || !template) {
        return;
    }

    list.replaceChildren();

    state.events.forEach((event) => {
        const preset = EVENT_PRESETS[event.type];

        if (!preset) {
            return;
        }

        const node = template.content.firstElementChild.cloneNode(true);
        const sprite = document.querySelector(`[data-icon-sprite="${preset.icon}"] svg`);

        if (sprite) {
            node.querySelector('[data-n-icon]').append(sprite.cloneNode(true));
        }

        node.querySelector('[data-n-title]').textContent = preset.title(event);
        node.querySelector('[data-n-text]').textContent = preset.text(event);
        node.querySelector('[data-n-time]').textContent = relativeTime(event.at);
        node.querySelector('[data-n-new]').hidden = event.at <= state.readAt;

        if (event.url) {
            const link = node.querySelector('[data-n-link]');

            link.href = event.url;
            link.hidden = false;
        }

        list.append(node);
    });

    document.querySelector('[data-notifications-empty]').hidden = list.children.length > 0;
}

if (document.querySelector('[data-notification-list]')) {
    renderNotifications(getState());
    window.setTimeout(markNotificationsRead, 1500);
}

subscribe((state) => {
    renderFavoritesPage(state);
});

renderFavoritesPage(getState());
