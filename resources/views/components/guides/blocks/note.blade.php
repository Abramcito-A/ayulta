@props(['block', 'activity'])

<div class="field">
    <label class="field__label" for="b-{{ $block['id'] }}">{{ $block['label'] }}</label>
    <textarea id="b-{{ $block['id'] }}" name="b-{{ $block['id'] }}" class="field__input field__textarea" rows="3" maxlength="400" placeholder="{{ $block['placeholder'] ?? '' }}"></textarea>
    <p class="field__hint">Se guarda solo en este dispositivo.</p>
</div>
