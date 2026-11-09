@props(['icon' => 'sparkles', 'title', 'description', 'href' => null, 'linkText' => null])

<section class="empty-state">
    <span class="empty-state-icon"><x-icon :name="$icon" size="28" /></span>
    <h2>{{ $title }}</h2>
    <p>{{ $description }}</p>
    @if($href && $linkText)
        <a class="text-link" href="{{ $href }}">{{ $linkText }} <x-icon name="arrow-right" size="16" /></a>
    @endif
</section>
