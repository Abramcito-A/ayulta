@props(['name', 'label', 'value' => '1', 'checked' => false, 'id' => null])

@php($inputId = $id ?? $name)

<label {{ $attributes->class('check') }} for="{{ $inputId }}">
    <input id="{{ $inputId }}" name="{{ $name }}" type="checkbox" value="{{ $value }}" class="check__input" @checked(old($name, $checked))>
    <span class="check__box" aria-hidden="true"><x-ui.icon name="check" size="14" /></span>
    <span class="check__label">{{ $label }}</span>
</label>
