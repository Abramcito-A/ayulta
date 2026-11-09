@props(['levels' => config('ayulta.levels')])

<section {{ $attributes->class('level-card') }} data-level-card data-levels='@json($levels)'>
    <div class="level-card__head">
        <span class="icon-bubble icon-bubble--light"><x-ui.icon name="award" size="22" /></span>
        <div>
            <span class="level-card__eyebrow">Tu nivel de aprendizaje</span>
            <p class="level-card__level" data-level-name>{{ $levels[0]['name'] }}</p>
        </div>
        <span class="level-card__points"><strong data-level-points>0</strong> pts</span>
    </div>
    <div class="level-card__track" role="progressbar" aria-label="Avance hacia el siguiente nivel" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" data-level-bar>
        <span class="level-card__fill" data-level-fill style="width: 0%"></span>
    </div>
    <p class="level-card__caption" data-level-caption>Completa guías y actividades para sumar puntos de aprendizaje.</p>
    <ol class="level-card__steps">
        @foreach ($levels as $level)
            <li data-level-step="{{ $level['name'] }}">{{ $level['name'] }} <small>{{ $level['min'] }}+</small></li>
        @endforeach
    </ol>
    <p class="level-card__note">Los puntos miden lo que aprendes, nunca cuánto dinero tienes.</p>
</section>
