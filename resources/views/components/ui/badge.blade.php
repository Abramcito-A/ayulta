@props(['tone' => 'primary', 'icon' => null])

<span {{ $attributes->class(['badge', 'badge--'.$tone]) }}>
    @if ($icon) <x-ui.icon :name="$icon" size="13" /> @endif
    {{ $slot }}
</span>
