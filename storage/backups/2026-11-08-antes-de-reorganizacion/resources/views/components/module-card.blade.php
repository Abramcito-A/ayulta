@props(['module', 'slug'])

<a class="module-card" href="{{ route('modules.'.$slug) }}" style="--module-accent: {{ $module['accent'] }}">
    <span class="module-card-icon">
        <x-icon :name="$module['icon']" size="26" />
    </span>
    <span class="module-card-content">
        <span class="module-card-title">{{ $module['title'] }}</span>
        <span class="module-card-description">{{ $module['description'] }}</span>
        <span class="module-card-link">Explorar <x-icon name="arrow-right" size="16" /></span>
    </span>
</a>
