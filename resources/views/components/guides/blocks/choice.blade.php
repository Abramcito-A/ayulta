@props(['block', 'activity'])

@php($choiceKey = 'b-'.$block['id'])

<fieldset class="choice" data-choice="{{ $choiceKey }}">
    @isset($block['title'])
        <span class="choice__tag"><x-ui.icon name="{{ $block['icon'] ?? 'messages-square' }}" size="15" /> {{ $block['title'] }}</span>
    @endisset
    <legend class="choice__scenario">{{ $block['scenario'] }}</legend>
    @isset($block['question'])
        <p class="choice__question">{{ $block['question'] }}</p>
    @endisset
    <div class="choice__options">
        @foreach ($block['options'] as $option)
            <label class="choice__option" data-choice-option @if ($option['best'] ?? false) data-best @endif>
                <input type="radio" name="{{ $choiceKey }}" value="{{ $loop->index }}" class="choice__input">
                <span class="choice__letter" aria-hidden="true">{{ chr(65 + $loop->index) }}</span>
                <span class="choice__label">{{ $option['label'] }}</span>
            </label>
        @endforeach
    </div>
    <div class="feedback" data-choice-feedback hidden>
        <p class="feedback__title" data-choice-result></p>
        @foreach ($block['options'] as $option)
            <p class="feedback__text" data-choice-explanation="{{ $loop->index }}" hidden>{{ $option['feedback'] }}</p>
        @endforeach
        @isset($block['tip'])
            <p class="feedback__tip"><x-ui.icon name="lightbulb" size="16" /> <span>{{ $block['tip'] }}</span></p>
        @endisset
    </div>
</fieldset>
