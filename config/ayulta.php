<?php

return [

    'name' => 'AYULTA',

    'tagline' => 'La vida adulta, más fácil.',

    /*
    |--------------------------------------------------------------------------
    | Demonstration account
    |--------------------------------------------------------------------------
    |
    | AYULTA uses a simulated sign-in. This account always exists and is not a
    | real security mechanism. Registered demo users are stored in a private
    | JSON file (see App\Support\DemoUserStore) with hashed passwords.
    |
    */

    'demo_account' => [
        'name' => 'Alex',
        'email' => 'demo@ayulta.mx',
        'password' => 'ayulta123',
    ],

    'demo_users_path' => 'demo/users.json',

    /*
    |--------------------------------------------------------------------------
    | Content
    |--------------------------------------------------------------------------
    |
    | Educational content lives in PHP files that return arrays inside
    | resources/content. "sources_checked_at" is the date the official links
    | were last verified to respond.
    |
    */

    'content_path' => resource_path('content'),

    'sources_checked_at' => '2026-11-08',

    /*
    |--------------------------------------------------------------------------
    | Learning levels
    |--------------------------------------------------------------------------
    |
    | Points represent learning activity only, never money. Levels are used by
    | the front-end progress system (resources/js/lib/progress.js).
    |
    */

    'levels' => [
        ['name' => 'Principiante', 'min' => 0],
        ['name' => 'Organizado', 'min' => 120],
        ['name' => 'Preparado', 'min' => 300],
    ],

    'points' => [
        'guide_completed' => 20,
        'experience_completed' => 30,
        'correct_answer' => 5,
        'stage_completed' => 10,
    ],

];
