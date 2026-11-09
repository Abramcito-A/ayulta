@props(['block', 'activity'])

<div class="example">
    <span class="example__tag"><x-ui.icon name="lightbulb" size="15" /> Ejemplo</span>
    @isset($block['title'])
        <h4 class="example__title">{{ $block['title'] }}</h4>
    @endisset
    @foreach ((array) ($block['body'] ?? []) as $paragraph)
        <p class="prose">{{ $paragraph }}</p>
    @endforeach
    @isset($block['rows'])
        <dl class="example__rows">
            @foreach ($block['rows'] as $row)
                <div @class(['example__row', 'example__row--total' => $row['total'] ?? false])>
                    <dt>{{ $row['label'] }}</dt>
                    <dd>{{ $row['value'] }}</dd>
                </div>
            @endforeach
        </dl>
    @endisset
    @isset($block['note'])
        <p class="example__note">{{ $block['note'] }}</p>
    @endisset
</div>
