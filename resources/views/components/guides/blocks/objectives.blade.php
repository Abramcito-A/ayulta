@props(['block', 'activity'])

<div class="objectives">
    <h4 class="block-title"><x-ui.icon name="target" size="18" /> {{ $block['title'] ?? 'Qué aprenderás' }}</h4>
    <ul class="list list--check">
        @foreach ($block['items'] as $item)
            <li><x-ui.icon name="circle-check" size="18" /> <span>{{ $item }}</span></li>
        @endforeach
    </ul>
</div>
