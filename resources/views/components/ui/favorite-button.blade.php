@props(['activity', 'compact' => false])

<button
    type="button"
    {{ $attributes->class(['favorite-btn', 'favorite-btn--compact' => $compact]) }}
    data-favorite="{{ $activity['id'] }}"
    aria-pressed="false"
    aria-label="Guardar «{{ $activity['title'] }}» en favoritos"
>
    <x-ui.icon name="bookmark" size="20" class="favorite-btn__off" />
    <x-ui.icon name="bookmark-check" size="20" class="favorite-btn__on" />
    @unless ($compact)
        <span data-favorite-label>Guardar</span>
    @endunless
</button>
