@props(['activity'])

<header class="activity-header">
    <div class="activity-header__top">
        <span class="icon-bubble icon-bubble--solid"><x-ui.icon :name="$activity['icon']" size="24" /></span>
        <div class="activity-header__meta">
            <x-ui.badge :tone="$activity['kind'] === 'guide' ? 'primary' : 'secondary'" :icon="$activity['kind'] === 'guide' ? 'book-open' : 'sparkles'">
                {{ $activity['kind'] === 'guide' ? 'Guía paso a paso' : 'Experiencia' }}
            </x-ui.badge>
            <span class="activity-header__time"><x-ui.icon name="clock" size="14" /> {{ $activity['duration'] }} min</span>
            <span class="activity-header__status" data-activity-status hidden></span>
        </div>
    </div>
    <h2 class="activity-header__title">{{ $activity['title'] }}</h2>
    <p class="activity-header__text">{{ $activity['summary'] }}</p>
</header>
