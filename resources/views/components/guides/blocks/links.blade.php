@props(['block', 'activity'])

<h4 class="block-title"><x-ui.icon name="external-link" size="18" /> {{ $block['title'] ?? 'Sitios oficiales' }}</h4>
<div class="link-list">
    @foreach ($block['items'] as $item)
        <a class="link-card" href="{{ $item['url'] }}" target="_blank" rel="noopener noreferrer">
            <span class="icon-bubble"><x-ui.icon :name="$item['icon'] ?? 'landmark'" size="18" /></span>
            <span class="link-card__body">
                <span class="link-card__title">{{ $item['label'] }}</span>
                @isset($item['description'])
                    <span class="link-card__text">{{ $item['description'] }}</span>
                @endisset
            </span>
            <x-ui.icon name="external-link" size="16" class="link-card__icon" />
            <span class="sr-only">(sitio externo, se abre en una pestaña nueva)</span>
        </a>
    @endforeach
</div>
<p class="block-note">Al abrir un sitio oficial sales de AYULTA. Ningún trámite se realiza desde esta aplicación.</p>
