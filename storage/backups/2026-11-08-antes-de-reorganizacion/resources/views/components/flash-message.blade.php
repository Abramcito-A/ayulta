<div class="flash-stack" aria-live="polite" aria-atomic="true">
    @if(session('success'))
        <div class="flash-message flash-success" role="status">
            <x-icon name="check" size="18" />
            <span>{{ session('success') }}</span>
        </div>
    @endif

    @if($errors->any())
        <div class="flash-message flash-error" role="alert">
            <span>{{ $errors->first() }}</span>
        </div>
    @endif
</div>
