@props(['block', 'activity'])

<div class="block block--{{ $block['type'] }}">
    <x-dynamic-component :component="'guides.blocks.'.$block['type']" :block="$block" :activity="$activity" />
</div>
