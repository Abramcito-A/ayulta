/**
 * Learning points and levels. Points measure learning, never money.
 */
import { addEvent, getState, update } from './store';

function readJson(value, fallback) {
    try {
        return JSON.parse(value) ?? fallback;
    } catch {
        return fallback;
    }
}

export const POINTS = readJson(document.body?.dataset.points, {
    guide_completed: 20,
    experience_completed: 30,
    correct_answer: 5,
    stage_completed: 10,
});

export const LEVELS = readJson(document.body?.dataset.levels, [
    { name: 'Principiante', min: 0 },
    { name: 'Organizado', min: 120 },
    { name: 'Preparado', min: 300 },
]);

export function levelInfo(points) {
    let currentIndex = 0;

    LEVELS.forEach((level, index) => {
        if (points >= level.min) {
            currentIndex = index;
        }
    });

    const current = LEVELS[currentIndex];
    const next = LEVELS[currentIndex + 1] ?? null;
    const percent = next
        ? Math.round(((points - current.min) / (next.min - current.min)) * 100)
        : 100;

    return { current, next, percent: Math.max(0, Math.min(100, percent)), points };
}

/**
 * Awards points once per unique key. Returns true when points were added.
 */
export function award(key, amount) {
    if (getState().awards[key] !== undefined) {
        return false;
    }

    update((draft) => {
        const before = levelInfo(draft.points).current.name;

        draft.awards[key] = amount;
        draft.points += amount;

        const after = levelInfo(draft.points).current.name;

        if (after !== before) {
            addEvent('level', { title: `¡Subiste a nivel ${after}!`, text: `Tienes ${draft.points} puntos de aprendizaje.` });
        }
    });

    return true;
}

export function completedCount(state = getState()) {
    return Object.values(state.activities).filter((record) => record.status === 'completed').length;
}

export function startedCount(state = getState()) {
    return Object.values(state.activities).filter((record) => record.status !== 'new').length;
}
