@props([
    'type' => 'text',
    'placeholder' => '',
    'icon',
    'rightIcon' => null,
])

@php
    $name = $attributes->get('name');
    $id = $attributes->get('id', $name);
    $hasError = $name && isset($errors) && $errors->has($name);
    $isPasswordToggle = $rightIcon && $type === 'password' && $id;
@endphp

<div class="mb-4">
    <div class="relative flex items-center w-full">
        <x-dynamic-component :component="'lucide-'.$icon" class="absolute left-4 w-5 h-5 text-[#0F172A] pointer-events-none" />

        <input
            type="{{ $type }}"
            placeholder="{{ $placeholder }}"
            aria-label="{{ $placeholder }}"
            @if ($id) id="{{ $id }}" @endif
            @if ($name && $type !== 'password') value="{{ old($name) }}" @endif
            @if ($hasError) aria-invalid="true" aria-describedby="{{ $id }}-error" @endif
            {{ $attributes->except('id')->class([
                'w-full bg-white border rounded-2xl py-3 pl-12 text-[#0F172A] placeholder:text-gray-400 outline-none transition-colors focus:border-[#00A8E8] focus:ring-2 focus:ring-[#00A8E8]/20',
                'pr-12' => $rightIcon,
                'pr-4' => ! $rightIcon,
                'border-gray-300' => ! $hasError,
                'border-red-500' => $hasError,
            ]) }}
        >

        @if ($isPasswordToggle)
            <button type="button" class="absolute right-4 text-[#0F172A]" data-password-toggle="{{ $id }}" aria-label="Mostrar contraseña" aria-pressed="false">
                <x-dynamic-component :component="'lucide-'.$rightIcon" class="w-5 h-5" />
            </button>
        @elseif ($rightIcon)
            <x-dynamic-component :component="'lucide-'.$rightIcon" class="absolute right-4 w-5 h-5 text-[#0F172A] pointer-events-none" />
        @endif
    </div>

    @if ($hasError)
        <p id="{{ $id }}-error" class="mt-1 ml-2 text-xs font-medium text-red-600">{{ $errors->first($name) }}</p>
    @endif
</div>
