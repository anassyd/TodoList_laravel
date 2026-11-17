@props(['href', 'active' => false])

<a href="{{ $href }}" @class([
    'flex items-center gap-2 rounded-md px-2 py-1.5 text-sm transition-colors',
    'bg-zinc-200/60 font-medium text-zinc-900' => $active,
    'text-zinc-600 hover:bg-zinc-100 hover:text-zinc-900' => !$active,
])>
    {{ $slot }}
</a>
