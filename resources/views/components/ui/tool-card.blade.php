@props(['href', 'icon', 'title', 'description', 'tag' => null])

<a href="{{ $href }}" {{ $attributes->class('tool-card') }}>
    <span class="icon-bubble icon-bubble--solid"><x-ui.icon :name="$icon" size="22" /></span>
    <span class="tool-card__body">
        <span class="tool-card__title">{{ $title }}</span>
        <span class="tool-card__text">{{ $description }}</span>
        @if ($tag)
            <x-ui.badge tone="muted" class="tool-card__tag">{{ $tag }}</x-ui.badge>
        @endif
    </span>
    <x-ui.icon name="chevron-right" size="20" class="tool-card__chevron" />
</a>
