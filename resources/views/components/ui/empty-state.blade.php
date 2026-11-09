@props(['icon' => 'sparkles', 'title', 'description', 'href' => null, 'action' => null])

<section {{ $attributes->class('empty-state') }}>
    <span class="empty-state__icon"><x-ui.icon :name="$icon" size="30" /></span>
    <h2 class="empty-state__title">{{ $title }}</h2>
    <p class="empty-state__text">{{ $description }}</p>
    @if ($href && $action)
        <x-ui.button :href="$href" variant="secondary" icon-right="arrow-right">{{ $action }}</x-ui.button>
    @endif
</section>
