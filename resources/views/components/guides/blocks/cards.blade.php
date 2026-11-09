@props(['block', 'activity'])

@isset($block['title'])
    <h4 class="block-title">{{ $block['title'] }}</h4>
@endisset
@isset($block['intro'])
    <p class="prose">{{ $block['intro'] }}</p>
@endisset
<div class="info-cards">
    @foreach ($block['items'] as $item)
        <article class="info-card">
            <span class="icon-bubble"><x-ui.icon :name="$item['icon'] ?? 'info'" size="18" /></span>
            <div>
                <h5 class="info-card__title">{{ $item['title'] }}</h5>
                <p class="info-card__text">{{ $item['body'] }}</p>
            </div>
        </article>
    @endforeach
</div>
