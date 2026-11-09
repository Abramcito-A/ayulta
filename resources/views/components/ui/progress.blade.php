@props(['value' => 0, 'label' => 'Progreso', 'hook' => null, 'caption' => null])

<div {{ $attributes->class('progress') }} @if ($hook) data-progress="{{ $hook }}" @endif>
    <div class="progress__head">
        <span class="progress__label">{{ $label }}</span>
        <span class="progress__value" data-progress-value>{{ $value }}%</span>
    </div>
    <div class="progress__track" role="progressbar" aria-label="{{ $label }}" aria-valuemin="0" aria-valuemax="100" aria-valuenow="{{ $value }}">
        <span class="progress__fill" data-progress-fill style="width: {{ $value }}%"></span>
    </div>
    @if ($caption)
        <p class="progress__caption" data-progress-caption>{{ $caption }}</p>
    @endif
</div>
