<div class="divider"><span>o continúa con</span></div>

<button type="button" class="btn btn--outline btn--lg btn--full auth-google" data-modal-open="google-modal">
    <svg width="24" height="24" viewBox="0 0 24 24" aria-hidden="true">
        <path d="M21.8 12.2c0-.7-.1-1.4-.2-2H12v3.8h5.5a4.7 4.7 0 0 1-2 3.1v2.5h3.2c1.9-1.8 3.1-4.4 3.1-7.4Z" fill="#4285F4"/>
        <path d="M12 22c2.7 0 5-.9 6.7-2.4l-3.2-2.5c-.9.6-2 1-3.5 1-2.7 0-5-1.8-5.8-4.3H2.9v2.6A10 10 0 0 0 12 22Z" fill="#34A853"/>
        <path d="M6.2 13.8a6 6 0 0 1 0-3.6V7.6H2.9a10 10 0 0 0 0 8.8l3.3-2.6Z" fill="#FBBC05"/>
        <path d="M12 6c1.5 0 2.8.5 3.8 1.5l2.9-2.9A9.5 9.5 0 0 0 12 2a10 10 0 0 0-9.1 5.6l3.3 2.6C7 7.8 9.3 6 12 6Z" fill="#EA4335"/>
    </svg>
    <span>Continuar con Google</span>
</button>

<x-ui.modal id="google-modal" title="Continuar con Google" icon="info">
    <p class="prose">Este botón es solo una demostración visual. AYULTA no se conecta con Google ni con ningún servicio externo de autenticación.</p>
    <p class="prose">Para explorar la aplicación usa la cuenta demostrativa o crea una cuenta de prueba.</p>
    <div class="modal__actions">
        <a href="{{ route('login') }}?demo=1" class="btn btn--primary btn--md btn--full" data-fill-demo>Usar la cuenta demostrativa</a>
        <a href="{{ route('register') }}" class="btn btn--ghost btn--md btn--full">Crear una cuenta de prueba</a>
    </div>
</x-ui.modal>
