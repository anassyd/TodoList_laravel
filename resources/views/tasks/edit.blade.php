@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
    <h1 class="text-2xl font-semibold tracking-tight">Edit Task</h1>
    <p class="mt-1 mb-6 text-sm text-zinc-500">Change the title or due date of your task</p>

    <form action="{{ route('tasks.update', $task) }}" method="POST" class="flex flex-col gap-6">
        @csrf
        @method('PUT')

        <div>
            <x-label for="title">Title</x-label>
            <x-input name="title" id="title" :value="old('title', $task->title)" required />
            <x-input-error name="title" />
        </div>

        <div>
            <x-label for="due_date">Due date</x-label>
            <x-input type="date" name="due_date" id="due_date"
                :value="old('due_date', $task->due_date?->format('Y-m-d'))" class="w-auto" />
            <x-input-error name="due_date" />
        </div>

        <div class="flex items-center gap-2">
            <x-button>Update Task</x-button>
            <x-button variant="outline" :href="route('tasks.index')">Cancel</x-button>
        </div>
    </form>
@endsection
