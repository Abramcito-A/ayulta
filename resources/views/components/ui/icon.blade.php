@props(['name', 'size' => 20])

{!! svg('lucide-'.$name, trim('icon '.$attributes->get('class')), [
    'width' => $size,
    'height' => $size,
    'aria-hidden' => 'true',
    'focusable' => 'false',
])->toHtml() !!}
