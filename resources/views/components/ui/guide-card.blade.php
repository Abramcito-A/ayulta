@props(['activity', 'favorite' => true])

<article {{ $attributes->class('guide-card') }} data-activity-card="{{ $activity['id'] }}">
    <a href="{{ $activity['url'] }}" class="guide-card__link">
        <span class="guide-card__number" aria-hidden="true">{{ str_pad((string) $activity['number'], 2, '0', STR_PAD_LEFT) }}</span>
        <span class="guide-card__body">
            <span class="guide-card__title">{{ $activity['title'] }}</span>
            <span class="guide-card__text">{{ $activity['summary'] }}</span>
            <span class="guide-card__meta">
                <span><x-ui.icon name="clock" size="14" /> {{ $activity['duration'] }} min</span>
                <span class="guide-card__status" data-activity-status>{{ $activity['kind'] === 'guide' ? 'Guía' : 'Experiencia' }}</span>
            </span>
        </span>
    </a>
    @if ($favorite)
        <x-ui.favorite-button :activity="$activity" compact />
    @endif
</article>
