@props(['id', 'title'])

<dialog id="{{ $id }}" class="modal">
    <div class="modal-content">
        <div class="modal-heading">
            <h2>{{ $title }}</h2>
            <button type="button" class="icon-button" data-modal-close aria-label="Cerrar">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        {{ $slot }}
    </div>
</dialog>
