@props(['block', 'activity'])

<fieldset class="checklist" data-checklist="{{ $block['id'] }}">
    <legend class="block-title"><x-ui.icon name="list-checks" size="18" /> {{ $block['title'] ?? 'Checklist' }}</legend>
    @isset($block['intro'])
        <p class="prose">{{ $block['intro'] }}</p>
    @endisset
    <div class="checklist__items">
        @foreach ($block['items'] as $item)
            <x-ui.checkbox :name="'b-'.$block['id'].'-'.$loop->index" :id="'b-'.$block['id'].'-'.$loop->index" :label="$item" class="check--card" />
        @endforeach
    </div>
    <p class="checklist__count" aria-live="polite"><span data-checklist-done>0</span> de {{ count($block['items']) }} listos</p>
</fieldset>
