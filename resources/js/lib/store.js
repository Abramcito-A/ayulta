/**
 * AYULTA local persistence.
 *
 * Everything is stored in localStorage under a key scoped to the signed-in
 * demo user. If storage is empty, blocked or corrupted the app falls back to
 * defaults, so educational content never depends on it.
 */

const userKey = document.body?.dataset.userKey || 'guest';
const STORAGE_KEY = `ayulta:v1:${userKey}`;
const MAX_EVENTS = 40;
const listeners = new Set();

function defaults() {
    return {
        favorites: [],
        activities: {},
        awards: {},
        points: 0,
        events: [],
        readAt: 0,
        planner: null,
    };
}

function read() {
    try {
        const raw = window.localStorage.getItem(STORAGE_KEY);

        if (!raw) {
            return defaults();
        }

        const parsed = JSON.parse(raw);

        return parsed && typeof parsed === 'object' ? { ...defaults(), ...parsed } : defaults();
    } catch {
        return defaults();
    }
}

let state = read();

function persist() {
    try {
        window.localStorage.setItem(STORAGE_KEY, JSON.stringify(state));
    } catch {
        // Storage may be full or disabled: the app keeps working in memory.
    }

    listeners.forEach((listener) => listener(state));
}

export function getState() {
    return state;
}

export function update(mutator) {
    mutator(state);
    persist();
}

export function subscribe(listener) {
    listeners.add(listener);

    return () => listeners.delete(listener);
}

export function reset() {
    state = defaults();
    persist();
}

/**
 * Returns the stored record of a guide or experience, creating it if needed.
 * Callers must use update() to persist changes.
 */
export function activityRecord(id) {
    if (!state.activities[id]) {
        state.activities[id] = { status: 'new', step: null, path: null, answers: {} };
    }

    state.activities[id].answers ??= {};

    return state.activities[id];
}

export function addEvent(type, data = {}) {
    state.events.unshift({ type, at: Date.now(), ...data });
    state.events = state.events.slice(0, MAX_EVENTS);
}

export function isFavorite(id) {
    return state.favorites.includes(id);
}

export function toggleFavorite(id) {
    let added = false;

    update((draft) => {
        if (draft.favorites.includes(id)) {
            draft.favorites = draft.favorites.filter((favorite) => favorite !== id);
        } else {
            draft.favorites = [id, ...draft.favorites];
            added = true;
        }
    });

    return added;
}

export function unreadCount() {
    return state.events.filter((event) => event.at > state.readAt).length;
}

export function markNotificationsRead() {
    update((draft) => {
        draft.readAt = Date.now();
    });
}
