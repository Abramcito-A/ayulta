@props(['block', 'activity'])

<div class="quiz" data-quiz="{{ $block['id'] }}">
    <h4 class="block-title"><x-ui.icon name="circle-help" size="18" /> {{ $block['title'] ?? 'Pon a prueba lo que aprendiste' }}</h4>
    @foreach ($block['questions'] as $question)
        @php($questionKey = 'b-'.$block['id'].'-'.$loop->index)
        <fieldset class="quiz__question" data-quiz-question="{{ $questionKey }}" data-answer="{{ $question['answer'] }}">
            <legend class="quiz__prompt"><span class="quiz__index">{{ $loop->iteration }}</span> {{ $question['question'] }}</legend>
            <div class="quiz__options">
                @foreach ($question['options'] as $option)
                    <label class="quiz__option">
                        <input type="radio" name="{{ $questionKey }}" value="{{ $loop->index }}" class="quiz__input">
                        <span class="quiz__marker" aria-hidden="true"></span>
                        <span>{{ $option }}</span>
                    </label>
                @endforeach
            </div>
            <div class="feedback" data-quiz-feedback hidden>
                <p class="feedback__title" data-quiz-result></p>
                <p class="feedback__text">{{ $question['explanation'] }}</p>
            </div>
        </fieldset>
    @endforeach
    <p class="quiz__score" data-quiz-score aria-live="polite"></p>
</div>
