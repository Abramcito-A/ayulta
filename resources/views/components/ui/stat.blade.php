@props(['icon', 'label', 'value' => '0', 'hook' => null])

<div {{ $attributes->class('stat') }}>
    <span class="icon-bubble"><x-ui.icon :name="$icon" size="18" /></span>
    <span class="stat__value" @if ($hook) data-stat="{{ $hook }}" @endif>{{ $value }}</span>
    <span class="stat__label">{{ $label }}</span>
</div>
