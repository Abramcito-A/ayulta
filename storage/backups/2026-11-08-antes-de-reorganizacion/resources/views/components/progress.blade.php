@props(['value' => 0, 'label' => 'Progreso'])

<div class="progress-component">
    <div class="progress-heading">
        <span>{{ $label }}</span>
        <span>{{ $value }}%</span>
    </div>
    <div class="progress-track" role="progressbar" aria-label="{{ $label }}" aria-valuemin="0" aria-valuemax="100" aria-valuenow="{{ $value }}">
        <span class="progress-fill" style="width: {{ $value }}%"></span>
    </div>
</div>
