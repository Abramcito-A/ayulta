@props(['id', 'title', 'icon' => null])

<dialog id="{{ $id }}" class="modal" aria-labelledby="{{ $id }}-title">
    <div class="modal__panel">
        <div class="modal__head">
            @if ($icon)
                <span class="icon-bubble"><x-ui.icon :name="$icon" size="20" /></span>
            @endif
            <h2 id="{{ $id }}-title" class="modal__title">{{ $title }}</h2>
            <button type="button" class="icon-btn" data-modal-close aria-label="Cerrar">
                <x-ui.icon name="x" size="20" />
            </button>
        </div>
        <div class="modal__body">
            {{ $slot }}
        </div>
    </div>
</dialog>
