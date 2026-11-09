@if (session('success') || (isset($errors) && $errors->any()))
    <div class="flash-stack" aria-live="polite">
        @if (session('success'))
            <div class="flash flash--success" role="status" data-flash>
                <x-ui.icon name="circle-check" size="20" />
                <span>{{ session('success') }}</span>
                <button type="button" class="flash__close" data-flash-close aria-label="Cerrar mensaje"><x-ui.icon name="x" size="16" /></button>
            </div>
        @endif

        @if (isset($errors) && $errors->any())
            <div class="flash flash--error" role="alert" data-flash>
                <x-ui.icon name="circle-alert" size="20" />
                <span>{{ $errors->count() > 1 ? 'Revisa los campos marcados para continuar.' : $errors->first() }}</span>
                <button type="button" class="flash__close" data-flash-close aria-label="Cerrar mensaje"><x-ui.icon name="x" size="16" /></button>
            </div>
        @endif
    </div>
@endif
