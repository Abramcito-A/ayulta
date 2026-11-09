@props([
    'label',
    'name',
    'type' => 'text',
    'placeholder' => '',
    'autocomplete' => null,
    'required' => false,
])

<div class="form-field">
    <label for="{{ $name }}">{{ $label }}</label>
    <input
        id="{{ $name }}"
        name="{{ $name }}"
        type="{{ $type }}"
        value="{{ $type === 'password' ? '' : old($name) }}"
        placeholder="{{ $placeholder }}"
        @if($autocomplete) autocomplete="{{ $autocomplete }}" @endif
        @required($required)
        @class(['form-input', 'input-invalid' => $errors->has($name)])
        aria-invalid="{{ $errors->has($name) ? 'true' : 'false' }}"
        aria-describedby="{{ $errors->has($name) ? $name.'-error' : '' }}"
        {{ $attributes }}
    >
    @error($name)
        <span id="{{ $name }}-error" class="field-error">{{ $message }}</span>
    @enderror
</div>
