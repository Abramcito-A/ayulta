@props([
    'name',
    'label',
    'type' => 'text',
    'icon' => null,
    'placeholder' => '',
    'hint' => null,
    'value' => null,
    'toggle' => false,
    'hideLabel' => false,
])

@php
    $id = $attributes->get('id', $name);
    $hasError = isset($errors) && $errors->has($name);
    $describedBy = collect([$hint ? $id.'-hint' : null, $hasError ? $id.'-error' : null])->filter()->implode(' ');
@endphp

<div @class(['field', 'field--invalid' => $hasError])>
    <label @class(['field__label', 'sr-only' => $hideLabel]) for="{{ $id }}">{{ $label }}</label>
    <div @class(['field__control', 'field__control--icon' => $icon, 'field__control--toggle' => $toggle])>
        @if ($icon)
            <x-ui.icon :name="$icon" size="20" class="field__icon" />
        @endif
        <input
            id="{{ $id }}"
            name="{{ $name }}"
            type="{{ $type }}"
            placeholder="{{ $placeholder }}"
            @if ($type !== 'password') value="{{ old($name, $value) }}" @endif
            @if ($hasError) aria-invalid="true" @endif
            @if ($describedBy) aria-describedby="{{ $describedBy }}" @endif
            {{ $attributes->except('id')->class('field__input') }}
        >
        @if ($toggle && $type === 'password')
            <button type="button" class="field__toggle" data-password-toggle="{{ $id }}" aria-label="Mostrar contraseña" aria-pressed="false">
                <x-ui.icon name="eye" size="20" class="field__toggle-show" />
                <x-ui.icon name="eye-off" size="20" class="field__toggle-hide" />
            </button>
        @endif
    </div>
    @if ($hint)
        <p id="{{ $id }}-hint" class="field__hint">{{ $hint }}</p>
    @endif
    @if ($hasError)
        <p id="{{ $id }}-error" class="field__error">{{ $errors->first($name) }}</p>
    @endif
</div>
