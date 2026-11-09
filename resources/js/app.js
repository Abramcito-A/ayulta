/*
 * AYULTA front-end entry point. Order matters: guide.js restores saved
 * answers before tools.js computes simulators and calculators.
 */
import './ayulta.js';
import './navigation.js';
import './modules/guide.js';
import './modules/tools.js';
import './modules/mobility.js';
