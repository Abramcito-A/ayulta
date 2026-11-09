@props(['name', 'size' => 24])

<svg
    width="{{ $size }}"
    height="{{ $size }}"
    viewBox="0 0 24 24"
    fill="none"
    stroke="currentColor"
    stroke-width="1.8"
    stroke-linecap="round"
    stroke-linejoin="round"
    aria-hidden="true"
    focusable="false"
>
    @switch($name)
        @case('home')
            <path d="m3 10 9-7 9 7v10a1 1 0 0 1-1 1h-5v-7H9v7H4a1 1 0 0 1-1-1V10Z"/>
            @break
        @case('heart')
            <path d="M20.8 8.6c0 4.1-8.8 10-8.8 10s-8.8-5.9-8.8-10a4.4 4.4 0 0 1 8.8-1 4.4 4.4 0 0 1 8.8 1Z"/>
            @break
        @case('bell')
            <path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9ZM10 21h4"/>
            @break
        @case('user')
            <circle cx="12" cy="8" r="4"/>
            <path d="M4 21a8 8 0 0 1 16 0"/>
            @break
        @case('wallet')
            <rect x="3" y="6" width="18" height="14" rx="3"/>
            <path d="M3 10h18M16 15h.01M7 6V4a1 1 0 0 1 1-1h10"/>
            @break
        @case('document')
            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8Z"/>
            <path d="M14 2v6h6M8 13h8M8 17h8"/>
            @break
        @case('mobility')
            <rect x="3" y="3" width="18" height="16" rx="3"/>
            <path d="M7 19v2m10-2v2M3 12h18M8 7h.01M16 7h.01M8 16h.01M16 16h.01"/>
            @break
        @case('arrow-left')
            <path d="m15 18-6-6 6-6M9 12h12"/>
            @break
        @case('arrow-right')
            <path d="M4 12h16m-7-7 7 7-7 7"/>
            @break
        @case('eye')
            <path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7-10-7-10-7Z"/>
            <circle cx="12" cy="12" r="3"/>
            @break
        @case('eye-off')
            <path d="m3 3 18 18M10.6 10.6a2 2 0 0 0 2.8 2.8"/>
            <path d="M9.9 5.2A10.4 10.4 0 0 1 12 5c6.4 0 10 7 10 7a16 16 0 0 1-3 3.8M6.2 6.2A17 17 0 0 0 2 12s3.6 7 10 7a10 10 0 0 0 4-.8"/>
            @break
        @case('sparkles')
            <path d="m12 3 1.8 5.2L19 10l-5.2 1.8L12 17l-1.8-5.2L5 10l5.2-1.8L12 3ZM19 15l1 2.5 2.5 1-2.5 1L19 22l-1-2.5-2.5-1 2.5-1L19 15ZM5 2l.8 2.2L8 5l-2.2.8L5 8l-.8-2.2L2 5l2.2-.8L5 2Z"/>
            @break
        @case('check')
            <path d="m5 12 4 4L19 6"/>
            @break
        @case('clock')
            <circle cx="12" cy="12" r="9"/>
            <path d="M12 7v5l3 2"/>
            @break
        @case('google')
            <path d="M21.8 12.2c0-.7-.1-1.4-.2-2H12v3.8h5.5a4.7 4.7 0 0 1-2 3.1v2.5h3.2c1.9-1.8 3.1-4.4 3.1-7.4Z" fill="#4285F4" stroke="none"/>
            <path d="M12 22c2.7 0 5-.9 6.7-2.4l-3.2-2.5c-.9.6-2 1-3.5 1-2.7 0-5-1.8-5.8-4.3H2.9v2.6A10 10 0 0 0 12 22Z" fill="#34A853" stroke="none"/>
            <path d="M6.2 13.8a6 6 0 0 1 0-3.6V7.6H2.9a10 10 0 0 0 0 8.8l3.3-2.6Z" fill="#FBBC05" stroke="none"/>
            <path d="M12 6c1.5 0 2.8.5 3.8 1.5l2.9-2.9A9.5 9.5 0 0 0 12 2a10 10 0 0 0-9.1 5.6l3.3 2.6C7 7.8 9.3 6 12 6Z" fill="#EA4335" stroke="none"/>
            @break
    @endswitch
</svg>
