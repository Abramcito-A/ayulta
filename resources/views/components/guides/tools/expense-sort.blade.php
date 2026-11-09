@props(['block', 'activity'])

<div class="tool" data-tool="expense-sort">
    <header class="tool__head">
        <span class="icon-bubble icon-bubble--solid"><x-ui.icon name="receipt" size="20" /></span>
        <div>
            <h4 class="tool__title">Clasifica estos gastos</h4>
            <p class="tool__text">Para cada gasto, decide si es una necesidad o un gasto no necesario.</p>
        </div>
    </header>

    <div class="sort-list">
        @foreach ($block['items'] as $item)
            @php($name = 't-sort-'.$loop->index)
            <fieldset class="sort-item" data-sort-item data-answer="{{ $item['answer'] }}">
                <legend class="sort-item__label">{{ $item['label'] }}</legend>
                <div class="segmented">
                    <label><input type="radio" name="{{ $name }}" value="need"><span>Necesidad</span></label>
                    <label><input type="radio" name="{{ $name }}" value="want"><span>No necesario</span></label>
                </div>
                <p class="sort-item__feedback" data-sort-feedback hidden>{{ $item['why'] }}</p>
            </fieldset>
        @endforeach
    </div>
    <p class="quiz__score" data-sort-score aria-live="polite"></p>
</div>
