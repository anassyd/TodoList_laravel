@props([
    'variant' => 'default',
    'size' => 'default',
    'href' => null,
])

@php
    $base = 'inline-flex shrink-0 items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all cursor-pointer outline-none focus-visible:ring-[3px] focus-visible:ring-zinc-400/50 disabled:pointer-events-none disabled:opacity-50';

    $variants = [
        'default' => 'bg-zinc-900 text-white shadow-xs hover:bg-zinc-900/90',
        'secondary' => 'bg-zinc-100 text-zinc-900 shadow-xs hover:bg-zinc-200/80',
        'outline' => 'border border-zinc-200 bg-white shadow-xs hover:bg-zinc-100',
        'ghost' => 'text-zinc-700 hover:bg-zinc-100 hover:text-zinc-900',
        'destructive' => 'text-red-600 hover:bg-red-50',
    ];

    $sizes = [
        'default' => 'h-9 px-4 py-2',
        'sm' => 'h-8 px-3',
        'lg' => 'h-10 px-6',
    ];

    $classes = $base . ' ' . $variants[$variant] . ' ' . $sizes[$size];
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</a>
@else
    <button {{ $attributes->merge(['type' => 'submit', 'class' => $classes]) }}>{{ $slot }}</button>
@endif
