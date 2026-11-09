@props(['module', 'title' => null, 'text' => null])

<section {{ $attributes->class('hero') }}>
    <div class="hero__copy">
        <span class="hero__eyebrow"><x-ui.icon :name="$module['icon']" size="16" /> {{ $module['eyebrow'] }}</span>
        <h2 class="hero__title">{{ $title ?? $module['title'] }}</h2>
        <p class="hero__text">{{ $text ?? $module['description'] }}</p>
        {{ $slot }}
    </div>
    <x-ui.illustration :name="$module['illustration']" class="hero__art" />
</section>
