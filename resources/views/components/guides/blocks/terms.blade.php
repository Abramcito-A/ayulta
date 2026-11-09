@props(['block', 'activity'])

<h4 class="block-title"><x-ui.icon name="book-open" size="18" /> {{ $block['title'] ?? 'Conceptos clave' }}</h4>
<div class="terms">
    @foreach ($block['items'] as $item)
        <details class="terms__item" @if ($loop->first) open @endif>
            <summary class="terms__term"><span>{{ $item['term'] }}</span> <x-ui.icon name="chevron-down" size="18" /></summary>
            <p class="terms__definition">{{ $item['definition'] }}</p>
        </details>
    @endforeach
</div>
