@extends('layouts.app')

@section('title', 'My Tasks')

@section('content')
    <h1 class="text-2xl font-semibold tracking-tight">Tasks</h1>
    <p class="mt-1 mb-6 text-sm text-zinc-500">Manage your tasks</p>
    <x-input-error name="search" />

    @if (session('success'))
        <x-alert class="mb-4">{{ session('success') }}</x-alert>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST" class="flex gap-2">
        @csrf
        <x-input name="title" placeholder="Enter task title" :value="old('title')" />
        <x-input type="date" name="due_date" :value="old('due_date')" class="w-auto" />
        <x-button>Add Task</x-button>
    </form>
    <x-input-error name="title" />
    <x-input-error name="due_date" />
    <x-input-error name="search" />
    <form action="{{ route('tasks.index') }}" method="GET" class="mt-3">
        <x-input placeholder="Search tasks..." :value="request('search')" />
        <input type="hidden" name="status" value="{{ request('status') }}">
    </form>

    <div class="mt-6 flex gap-1">
        <x-button size="sm" :variant="request('status') === 'active' ? 'default' : 'ghost'" :href="route('tasks.index', ['status' => 'active', 'search' => request('search')])">
            Active
        </x-button>
        <x-button size="sm" :variant="request('status') === 'completed' ? 'default' : 'ghost'" :href="route('tasks.index', ['status' => 'completed', 'search' => request('search')])">
            Completed
        </x-button>
        <x-button size="sm" :variant="request('status') ? 'ghost' : 'default'" :href="route('tasks.index', ['search' => request('search')])">
            All
        </x-button>
    </div>


    <ul class="mt-6 divide-y divide-zinc-200 rounded-lg border border-zinc-200">
        @forelse ($tasks as $task)
            <li class="flex items-center gap-3 px-4 py-2.5">
                <form action="{{ route('tasks.toggle', $task) }}" method="POST" class="flex">
                    @csrf
                    @method('PATCH')
                    <input type="checkbox" name="is_completed" onchange="this.form.submit()"
                        class="size-4 cursor-pointer accent-zinc-900" @checked($task->is_completed)>
                </form>

                <div class="min-w-0 flex-1">
                    <span @class([
                        'text-sm',
                        'text-zinc-400 line-through' => $task->is_completed,
                    ])>
                        {{ $task->title }}
                    </span>

                    @if ($task->due_date)
                        <p @class([
                            'text-xs',
                            'font-medium text-red-600' => $task->isOverdue(),
                            'text-zinc-500' => !$task->isOverdue(),
                        ])>
                            {{ $task->due_date->format('d M Y') }}
                            ({{ $task->due_date->diffForHumans() }})
                        </p>
                    @endif
                </div>

                <x-button variant="ghost" size="sm" :href="route('tasks.edit', $task)">Edit</x-button>

                <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-button variant="destructive" size="sm" onclick="return confirm('Are you sure?')">
                        Delete
                    </x-button>
                </form>
            </li>
        @empty
            <li class="px-4 py-10 text-center text-sm text-zinc-500">
                @if (request('search') || request('status'))
                    No tasks match your filters.
                @else
                    No tasks yet. Add your first one above.
                @endif
            </li>
        @endforelse
    </ul>
@endsection
