@props(['block', 'activity'])

@isset($block['title'])
    <h4 class="block-title">{{ $block['title'] }}</h4>
@endisset
@foreach ((array) $block['body'] as $paragraph)
    <p class="prose">{{ $paragraph }}</p>
@endforeach
