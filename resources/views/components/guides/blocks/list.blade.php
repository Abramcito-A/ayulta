@props(['block', 'activity'])

@php
    $style = $block['style'] ?? 'bullet';
    $icons = ['check' => 'circle-check', 'cross' => 'circle-x', 'bullet' => 'dot', 'warning' => 'triangle-alert'];
@endphp

@isset($block['title'])
    <h4 class="block-title">{{ $block['title'] }}</h4>
@endisset
@isset($block['intro'])
    <p class="prose">{{ $block['intro'] }}</p>
@endisset
<ul class="list list--{{ $style }}">
    @foreach ($block['items'] as $item)
        <li><x-ui.icon :name="$icons[$style] ?? 'dot'" size="18" /> <span>{{ $item }}</span></li>
    @endforeach
</ul>
