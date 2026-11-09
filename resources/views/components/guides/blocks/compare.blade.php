@props(['block', 'activity'])

@isset($block['title'])
    <h4 class="block-title">{{ $block['title'] }}</h4>
@endisset
@isset($block['intro'])
    <p class="prose">{{ $block['intro'] }}</p>
@endisset
<div class="options">
    @foreach ($block['items'] as $item)
        <article class="option-card">
            <header class="option-card__head">
                <span class="icon-bubble"><x-ui.icon :name="$item['icon'] ?? 'circle-dot'" size="18" /></span>
                <h5 class="option-card__title">{{ $item['title'] }}</h5>
            </header>
            <p class="option-card__text">{{ $item['body'] }}</p>
            @if (! empty($item['pros']))
                <p class="option-card__label">A favor</p>
                <ul class="list list--check list--compact">
                    @foreach ($item['pros'] as $pro)
                        <li><x-ui.icon name="circle-check" size="16" /> <span>{{ $pro }}</span></li>
                    @endforeach
                </ul>
            @endif
            @if (! empty($item['cons']))
                <p class="option-card__label">Considera</p>
                <ul class="list list--warning list--compact">
                    @foreach ($item['cons'] as $con)
                        <li><x-ui.icon name="triangle-alert" size="16" /> <span>{{ $con }}</span></li>
                    @endforeach
                </ul>
            @endif
        </article>
    @endforeach
</div>
