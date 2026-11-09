@props(['title', 'icon', 'description' => null, 'href'])

<a href="{{ $href }}" {{ $attributes->class('flex flex-row items-center p-4 mb-3 bg-white rounded-2xl border border-gray-200 shadow-sm transition-colors hover:border-[#00A8E8]') }}>
    <x-dynamic-component :component="'lucide-'.$icon" class="w-8 h-8 shrink-0 text-[#0F172A]" />

    <div class="flex flex-col grow ml-4 min-w-0">
        <span class="font-bold text-lg">{{ $title }}</span>
        @if ($description)
            <span class="text-xs text-gray-500">{{ $description }}</span>
        @endif
    </div>

    <x-lucide-chevron-right class="w-5 h-5 shrink-0 text-gray-400" />
</a>
