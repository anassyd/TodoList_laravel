<div {{ $attributes->merge(['class' => 'flex items-start gap-3 rounded-lg border border-zinc-200 bg-white px-4 py-3 text-sm text-zinc-900']) }}>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
        stroke-linecap="round" stroke-linejoin="round" class="mt-0.5 size-4 shrink-0 text-emerald-600">
        <circle cx="12" cy="12" r="10" />
        <path d="m9 12 2 2 4-4" />
    </svg>
    <span>{{ $slot }}</span>
</div>
