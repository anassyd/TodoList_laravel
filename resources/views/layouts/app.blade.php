<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white font-sans text-zinc-950 antialiased">
    <div class="flex min-h-screen flex-col md:flex-row">
        {{-- Sidebar --}}
        <aside class="flex w-full shrink-0 flex-col border-b border-zinc-200 bg-zinc-50 p-3 md:w-64 md:border-r md:border-b-0">
            <a href="{{ route('tasks.index') }}" class="mb-2 flex items-center gap-2 px-2 py-1.5 md:mb-4">
                <span class="grid size-8 place-items-center rounded-lg bg-zinc-900 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-4">
                        <path d="M20 6 9 17l-5-5" />
                    </svg>
                </span>
                <span class="text-sm font-semibold">TodoList</span>
            </a>

            <nav class="flex flex-1 gap-1 md:flex-col">
                @guest
                    <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-4">
                            <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
                            <polyline points="10 17 15 12 10 7" />
                            <line x1="15" x2="3" y1="12" y2="12" />
                        </svg>
                        Login
                    </x-nav-link>
                    <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-4">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <line x1="19" x2="19" y1="8" y2="14" />
                            <line x1="22" x2="16" y1="11" y2="11" />
                        </svg>
                        Register
                    </x-nav-link>
                @endguest

                @auth
                    <p class="mb-1 hidden px-2 text-xs font-medium text-zinc-500 md:block">Application</p>

                    <x-nav-link :href="route('tasks.index')" :active="request()->routeIs('tasks.*')">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-4">
                            <path d="m3 17 2 2 4-4" />
                            <path d="m3 7 2 2 4-4" />
                            <path d="M13 6h8" />
                            <path d="M13 12h8" />
                            <path d="M13 18h8" />
                        </svg>
                        My Tasks
                    </x-nav-link>

                    {{-- User + logout at the bottom --}}
                    <div class="ml-auto flex items-center gap-2 md:mt-auto md:ml-0 md:border-t md:border-zinc-200 md:pt-3">
                        <span class="hidden size-8 shrink-0 place-items-center rounded-full bg-zinc-200 text-sm font-medium md:grid">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </span>
                        <div class="hidden min-w-0 flex-1 md:block">
                            <p class="truncate text-sm font-medium">{{ auth()->user()->name }}</p>
                            <p class="truncate text-xs text-zinc-500">{{ auth()->user()->email }}</p>
                        </div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <x-button variant="ghost" size="sm" title="Logout">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="size-4">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                                    <polyline points="16 17 21 12 16 7" />
                                    <line x1="21" x2="9" y1="12" y2="12" />
                                </svg>
                                <span class="md:hidden">Logout</span>
                            </x-button>
                        </form>
                    </div>
                @endauth
            </nav>
        </aside>

        {{-- Page content --}}
        <main class="flex-1 px-4 py-8 md:py-12">
            <div class="mx-auto max-w-xl rounded-xl border border-zinc-200 bg-white p-6 shadow-sm">
                @yield('content')
            </div>
        </main>
    </div>
</body>

</html>
