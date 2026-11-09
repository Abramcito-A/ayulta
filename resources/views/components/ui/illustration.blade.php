@props(['name'])

{{-- Thematic SVG illustrations. They only use the official palette. --}}
<svg {{ $attributes->class(['illustration', 'illustration--'.$name]) }} viewBox="0 0 160 120" fill="none" aria-hidden="true" focusable="false">
    @switch($name)
        @case('finanzas')
            <circle cx="112" cy="40" r="30" fill="#E6F8FF"/>
            <rect x="26" y="40" width="82" height="54" rx="12" fill="#00A8E8"/>
            <rect x="26" y="52" width="82" height="10" fill="#0F172A" opacity=".85"/>
            <rect x="36" y="72" width="28" height="6" rx="3" fill="#fff" opacity=".9"/>
            <rect x="36" y="82" width="16" height="5" rx="2.5" fill="#fff" opacity=".6"/>
            <circle cx="92" cy="80" r="7" fill="#33C4F0"/>
            <circle cx="100" cy="80" r="7" fill="#fff" opacity=".7"/>
            <circle cx="122" cy="74" r="16" fill="#33C4F0"/>
            <circle cx="122" cy="74" r="11" fill="#fff"/>
            <path d="M122 67v14M118 70.5h6a2.5 2.5 0 0 1 0 5h-4a2.5 2.5 0 0 0 0 5h6" stroke="#00A8E8" stroke-width="2.2" stroke-linecap="round"/>
            <path d="M46 26l6-8 6 6 8-10" stroke="#00A8E8" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
            @break
        @case('tramites')
            <circle cx="44" cy="38" r="28" fill="#E6F8FF"/>
            <rect x="48" y="18" width="62" height="82" rx="10" fill="#fff" stroke="#0F172A" stroke-width="2.5"/>
            <rect x="58" y="30" width="22" height="22" rx="6" fill="#33C4F0"/>
            <circle cx="69" cy="38" r="4" fill="#fff"/>
            <path d="M62 49c1.5-4 4-5.5 7-5.5s5.5 1.5 7 5.5" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
            <rect x="86" y="32" width="16" height="4" rx="2" fill="#0F172A" opacity=".75"/>
            <rect x="86" y="42" width="12" height="4" rx="2" fill="#0F172A" opacity=".35"/>
            <rect x="58" y="62" width="44" height="4" rx="2" fill="#0F172A" opacity=".35"/>
            <rect x="58" y="72" width="36" height="4" rx="2" fill="#0F172A" opacity=".35"/>
            <circle cx="114" cy="86" r="18" fill="#00A8E8"/>
            <path d="m106 86 6 6 11-12" stroke="#fff" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"/>
            @break
        @case('movilidad')
            <circle cx="118" cy="36" r="26" fill="#E6F8FF"/>
            <path d="M8 104h144" stroke="#0F172A" stroke-width="2.5" stroke-linecap="round"/>
            <path d="M20 96h120" stroke="#33C4F0" stroke-width="2" stroke-dasharray="8 8" stroke-linecap="round"/>
            <rect x="30" y="40" width="96" height="48" rx="12" fill="#00A8E8"/>
            <rect x="38" y="48" width="22" height="18" rx="4" fill="#E6F8FF"/>
            <rect x="66" y="48" width="22" height="18" rx="4" fill="#E6F8FF"/>
            <rect x="94" y="48" width="24" height="18" rx="4" fill="#E6F8FF"/>
            <rect x="30" y="72" width="96" height="6" fill="#0F172A" opacity=".2"/>
            <circle cx="52" cy="90" r="9" fill="#0F172A"/>
            <circle cx="52" cy="90" r="3.5" fill="#fff"/>
            <circle cx="104" cy="90" r="9" fill="#0F172A"/>
            <circle cx="104" cy="90" r="3.5" fill="#fff"/>
            <path d="M136 30a10 10 0 0 0-10 10c0 7.5 10 18 10 18s10-10.5 10-18a10 10 0 0 0-10-10Z" fill="#33C4F0"/>
            <circle cx="136" cy="40" r="4" fill="#fff"/>
            @break
        @case('vivienda')
            <circle cx="40" cy="40" r="28" fill="#E6F8FF"/>
            <path d="M8 104h144" stroke="#0F172A" stroke-width="2.5" stroke-linecap="round"/>
            <path d="M34 58 80 22l46 36" fill="#33C4F0"/>
            <path d="M28 62 80 20l52 42" stroke="#0F172A" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
            <rect x="42" y="56" width="76" height="48" fill="#fff" stroke="#0F172A" stroke-width="2.5"/>
            <rect x="70" y="72" width="20" height="32" rx="3" fill="#00A8E8"/>
            <circle cx="85" cy="89" r="1.8" fill="#fff"/>
            <rect x="50" y="66" width="14" height="14" rx="3" fill="#E6F8FF" stroke="#00A8E8" stroke-width="2"/>
            <rect x="96" y="66" width="14" height="14" rx="3" fill="#E6F8FF" stroke="#00A8E8" stroke-width="2"/>
            <circle cx="132" cy="84" r="12" fill="#00A8E8"/>
            <circle cx="132" cy="84" r="4.5" fill="#fff"/>
            <path d="M132 96v8m0-4h4" stroke="#00A8E8" stroke-width="3" stroke-linecap="round"/>
            @break
        @case('ciudad')
            <path d="M0 104h160" stroke="#0F172A" stroke-width="2"/>
            <rect x="10" y="62" width="22" height="42" rx="3" fill="#fff" opacity=".9"/>
            <rect x="36" y="40" width="26" height="64" rx="3" fill="#fff"/>
            <rect x="66" y="54" width="20" height="50" rx="3" fill="#fff" opacity=".85"/>
            <rect x="90" y="30" width="28" height="74" rx="3" fill="#fff"/>
            <rect x="122" y="58" width="28" height="46" rx="3" fill="#fff" opacity=".9"/>
            <path d="M42 50h14M42 60h14M42 70h14M96 40h16M96 50h16M96 60h16M96 70h16" stroke="#33C4F0" stroke-width="3" stroke-linecap="round"/>
            <circle cx="132" cy="22" r="10" fill="#fff" opacity=".9"/>
            @break
        @case('logro')
            <circle cx="80" cy="58" r="44" fill="#E6F8FF"/>
            <path d="M58 28h44v18a22 22 0 0 1-44 0V28Z" fill="#00A8E8"/>
            <path d="M58 34H46a10 10 0 0 0 12 14M102 34h12a10 10 0 0 1-12 14" stroke="#00A8E8" stroke-width="4" stroke-linecap="round"/>
            <rect x="72" y="66" width="16" height="16" fill="#33C4F0"/>
            <rect x="60" y="82" width="40" height="10" rx="4" fill="#0F172A"/>
            <path d="m80 34 3 6.5 7 .8-5.2 4.8 1.4 7-6.2-3.6-6.2 3.6 1.4-7-5.2-4.8 7-.8L80 34Z" fill="#fff"/>
            <circle cx="36" cy="24" r="4" fill="#33C4F0"/>
            <circle cx="128" cy="86" r="5" fill="#33C4F0"/>
            <path d="M126 22l3 7M34 90l7-3" stroke="#00A8E8" stroke-width="3" stroke-linecap="round"/>
            @break
        @default
            <circle cx="80" cy="60" r="40" fill="#E6F8FF"/>
            <path d="m80 36 6 16 16 6-16 6-6 16-6-16-16-6 16-6 6-16Z" fill="#00A8E8"/>
    @endswitch
</svg>
