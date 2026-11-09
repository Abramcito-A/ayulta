@props(['block', 'activity'])

@php($paths = $activity['paths'])

<fieldset class="paths" data-path-selector>
    <legend class="block-title"><x-ui.icon name="route" size="18" /> {{ $paths['question'] }}</legend>
    <p class="prose">{{ $paths['intro'] ?? 'Elige la opción que mejor te describa. Ajustaremos los siguientes pasos a tu situación. Puedes cambiarla cuando quieras.' }}</p>
    <div class="paths__options">
        @foreach ($paths['options'] as $key => $option)
            <label class="path-option">
                <input type="radio" name="path" value="{{ $key }}" class="path-option__input">
                <span class="icon-bubble"><x-ui.icon :name="$option['icon'] ?? 'circle-dot'" size="20" /></span>
                <span class="path-option__body">
                    <span class="path-option__title">{{ $option['label'] }}</span>
                    <span class="path-option__text">{{ $option['description'] }}</span>
                </span>
                <span class="path-option__check" aria-hidden="true"><x-ui.icon name="check" size="16" /></span>
            </label>
        @endforeach
    </div>
    <p class="block-note" data-path-hint>Si no eliges un camino, verás todos los pasos.</p>
</fieldset>
