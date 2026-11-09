@props(['block', 'activity'])

<h4 class="block-title"><x-ui.icon name="scale" size="18" /> {{ $block['title'] ?? 'Mitos y realidades' }}</h4>
<div class="myths">
    @foreach ($block['items'] as $item)
        <article class="myth">
            <p class="myth__myth"><x-ui.badge tone="warning">Mito</x-ui.badge> <span>{{ $item['myth'] }}</span></p>
            <p class="myth__fact"><x-ui.badge tone="success">Realidad</x-ui.badge> <span>{{ $item['fact'] }}</span></p>
        </article>
    @endforeach
</div>
