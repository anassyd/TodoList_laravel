@props(['name' => null])

@php
    $hasError = $name && $errors->has($name);

    $classes = 'h-9 w-full min-w-0 rounded-md border bg-white px-3 py-1 text-sm shadow-xs transition-[color,box-shadow] outline-none placeholder:text-zinc-400 focus-visible:ring-[3px] '
        . ($hasError
            ? 'border-red-500 focus-visible:ring-red-500/20'
            : 'border-zinc-200 focus-visible:border-zinc-400 focus-visible:ring-zinc-400/50');
@endphp

<input name="{{ $name }}" {{ $attributes->merge(['type' => 'text', 'class' => $classes]) }}>
