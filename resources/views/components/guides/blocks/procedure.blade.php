@props(['block', 'activity'])

@isset($block['title'])
    <h4 class="block-title"><x-ui.icon name="list-ordered" size="18" /> {{ $block['title'] }}</h4>
@endisset
<ol class="procedure">
    @foreach ($block['items'] as $item)
        <li class="procedure__item">
            <span class="procedure__number" aria-hidden="true">{{ $loop->iteration }}</span>
            <div class="procedure__body">
                <h5 class="procedure__title">{{ $item['title'] }}</h5>
                <p class="procedure__text">{{ $item['body'] }}</p>
            </div>
        </li>
    @endforeach
</ol>
