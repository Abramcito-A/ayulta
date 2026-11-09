@props(['tone' => 'blue'])

<span {{ $attributes->class(['badge', 'badge-'.$tone]) }}>{{ $slot }}</span>
