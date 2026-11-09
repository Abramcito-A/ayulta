/**
 * Mobility tools: illustrative routes, demonstrative trip planner and
 * illustrative traffic map. None of them use real-time data.
 */
import { getState, update } from '../lib/store';

/* ---------- Routes tabs ---------- */

const routeTabs = document.querySelector('[data-route-tabs]');

if (routeTabs) {
    const map = document.querySelector('[data-route-map]');

    routeTabs.addEventListener('click', (event) => {
        const tab = event.target.closest('[data-route-tab]');

        if (!tab) {
            return;
        }

        const key = tab.dataset.routeTab;

        routeTabs.querySelectorAll('[data-route-tab]').forEach((item) => {
            const active = item === tab;

            item.classList.toggle('is-active', active);
            item.setAttribute('aria-selected', String(active));
        });
        document.querySelectorAll('[data-route-panel]').forEach((panel) => {
            panel.hidden = panel.dataset.routePanel !== key;
        });
        map?.querySelectorAll('[data-map-route]').forEach((group) => {
            group.setAttribute('opacity', group.dataset.mapRoute === key ? '1' : '.25');
        });
    });
}

/* ---------- Trip planner (demonstrative) ---------- */

const planner = document.querySelector('[data-planner]');

function hash(text) {
    return [...text].reduce((value, char) => (value * 31 + char.charCodeAt(0)) >>> 0, 7);
}

function timelineItem(index, title, text) {
    const li = document.createElement('li');

    li.className = 'timeline__item';
    li.innerHTML = '<span class="timeline__dot" aria-hidden="true"></span><div><p class="timeline__title"></p><p class="timeline__text"></p></div>';
    li.querySelector('.timeline__dot').textContent = String(index);
    li.querySelector('.timeline__title').textContent = title;
    li.querySelector('.timeline__text').textContent = text;

    return li;
}

function alternativeCard(title, time, text) {
    const article = document.createElement('article');

    article.className = 'alt-card';
    article.innerHTML = '<div class="alt-card__head"><p class="alt-card__title"></p><span class="badge badge--muted"></span></div><p class="alt-card__text"></p>';
    article.querySelector('.alt-card__title').textContent = title;
    article.querySelector('.badge').textContent = time;
    article.querySelector('.alt-card__text').textContent = text;

    return article;
}

if (planner) {
    const origin = planner.querySelector('[name="origin"]');
    const destination = planner.querySelector('[name="destination"]');
    const error = planner.querySelector('[data-planner-error]');
    const result = document.querySelector('[data-planner-result]');

    const saved = getState().planner;

    if (saved) {
        origin.value = saved.origin ?? '';
        destination.value = saved.destination ?? '';
    }

    planner.querySelector('[data-planner-swap]').addEventListener('click', () => {
        [origin.value, destination.value] = [destination.value, origin.value];
    });

    planner.addEventListener('submit', (event) => {
        event.preventDefault();

        const from = origin.value.trim();
        const to = destination.value.trim();

        if (from === '' || to === '' || from.toLowerCase() === to.toLowerCase()) {
            error.hidden = false;
            (from === '' ? origin : destination).focus();

            return;
        }

        error.hidden = true;
        update((state) => {
            state.planner = { origin: from, destination: to };
        });

        const time = planner.querySelector('[name="time"]:checked').value;
        const seed = hash(`${from}|${to}`);
        const factor = time === 'peak' ? 1.35 : 1;
        const walkStart = 4 + (seed % 6);
        const ride = Math.round((14 + (seed % 18)) * factor);
        const walkEnd = 3 + ((seed >> 3) % 6);
        const wait = time === 'night' ? 15 + (seed % 10) : 5 + (seed % 8);
        const total = walkStart + wait + ride + walkEnd;
        const stops = 4 + (seed % 7);
        const route = seed % 2 === 0 ? 'Ruta Demo A' : 'Ruta Demo B';

        result.querySelector('[data-planner-summary]').textContent = `De «${from}» a «${to}»: recorrido ilustrativo de aproximadamente ${total} minutos usando la ${route}.${time === 'peak' ? ' En hora pico agregamos tiempo extra por tráfico.' : ''}${time === 'night' ? ' De noche hay menos unidades: considera una alternativa segura.' : ''}`;

        result.querySelector('[data-planner-steps]').replaceChildren(
            timelineItem(1, `Camina a la parada (≈ ${walkStart} min)`, 'Ubica la parada más cercana y verifica que la ruta pase por ahí.'),
            timelineItem(2, `Espera la unidad (≈ ${wait} min)`, 'Revisa el letrero de la unidad: número, color y destino.'),
            timelineItem(3, `Viaja en la ${route} (≈ ${ride} min · ${stops} paradas)`, 'Cuenta las paradas o sigue tu ubicación en el mapa para saber cuándo bajar.'),
            timelineItem(4, `Baja y camina a tu destino (≈ ${walkEnd} min)`, 'Pide la parada con anticipación y baja con cuidado.'),
        );

        result.querySelector('[data-planner-alternatives]').replaceChildren(
            alternativeCard('Con transbordo', `≈ ${total + 8 + (seed % 7)} min`, 'Combina la Ruta Demo A y la Ruta Demo B en la avenida principal. Útil si no hay una ruta directa.'),
            alternativeCard('Taxi o aplicación', `≈ ${Math.round((ride + walkEnd) * 0.7)} min`, 'Más rápido y directo, pero más caro. De noche, usa servicios con registro del viaje y comparte tu ubicación.'),
            alternativeCard('Bicicleta o caminando', `≈ ${Math.round(total * 1.6)} min`, 'Opción económica para distancias cortas. Usa ciclovías cuando existan y evita calles sin iluminación.'),
        );

        const maps = result.querySelector('[data-planner-maps]');

        maps.href = `https://www.google.com/maps/dir/?api=1&origin=${encodeURIComponent(from)}&destination=${encodeURIComponent(to)}&travelmode=transit`;

        result.hidden = false;
        result.scrollIntoView({ behavior: 'smooth', block: 'start' });
    });
}

/* ---------- Illustrative traffic ---------- */

const trafficTimes = document.querySelector('[data-traffic-times]');

if (trafficTimes) {
    const SCENARIOS = {
        morning: {
            levels: { 'av-principal': 'high', 'calle-norte': 'mid', 'calle-sur': 'high', periferico: 'mid', 'calle-centro': 'low' },
            text: 'A las 7:30 a. m. hay entradas a escuelas y trabajos: las avenidas principales suelen cargarse más.',
        },
        noon: {
            levels: { 'av-principal': 'mid', 'calle-norte': 'low', 'calle-sur': 'low', periferico: 'low', 'calle-centro': 'mid' },
            text: 'Al mediodía el tráfico suele ser más fluido, aunque las zonas comerciales pueden tener tráfico moderado.',
        },
        evening: {
            levels: { 'av-principal': 'high', 'calle-norte': 'high', 'calle-sur': 'mid', periferico: 'high', 'calle-centro': 'mid' },
            text: 'A las 6:30 p. m. coinciden salidas de trabajo y escuela: es común encontrar tráfico intenso en vías principales.',
        },
    };

    const render = () => {
        const scenario = SCENARIOS[trafficTimes.querySelector('input:checked').value];

        document.querySelectorAll('[data-street]').forEach((street) => {
            street.setAttribute('class', `traffic-street traffic-street--${scenario.levels[street.dataset.street]}`);
        });
        document.querySelector('[data-traffic-text]').textContent = scenario.text;
    };

    trafficTimes.addEventListener('change', render);
    render();
}
