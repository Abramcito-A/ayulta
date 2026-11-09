@props(['block', 'activity'])

<x-dynamic-component :component="'guides.tools.'.$block['name']" :block="$block" :activity="$activity" />
