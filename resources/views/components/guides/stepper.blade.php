@props(['steps', 'total'])

<div class="stepper" data-stepper>
    <div class="stepper__head">
        <span class="stepper__count">Paso <strong data-stepper-current>1</strong> de <strong data-stepper-total>{{ $total }}</strong></span>
        <span class="stepper__name" data-stepper-name>{{ $steps[0]['title'] ?? '' }}</span>
    </div>
    <div class="stepper__track" role="progressbar" aria-label="Avance de la guía" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" data-stepper-bar>
        <span class="stepper__fill" data-stepper-fill></span>
    </div>
    <details class="stepper__index">
        <summary>Ver todos los pasos</summary>
        <ol>
            @foreach ($steps as $index => $step)
                <li data-stepper-link-item="{{ $index }}" @isset($step['paths']) data-paths="{{ implode(',', $step['paths']) }}" @endisset>
                    <a href="#paso-{{ $index + 1 }}" data-stepper-link="{{ $index }}">{{ $step['title'] }}</a>
                </li>
            @endforeach
            <li data-stepper-link-item="{{ count($steps) }}"><a href="#paso-{{ count($steps) + 1 }}" data-stepper-link="{{ count($steps) }}">Resumen y cierre</a></li>
        </ol>
    </details>
</div>
