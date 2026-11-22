<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = $request->user()->tasks()
            ->when($request->query('status') === 'active', fn($query) => $query->active())
            ->when($request->query('status') === 'completed', fn($query) => $query->completed())
            ->when($request->query('search'), fn($query, $search) => $query->search($search))
            ->latest()
            ->get();

        return view('tasks.index', [
            'tasks' => $tasks
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'due_date' => 'nullable|date|after_or_equal:today',

        ]);

        $request->user()->tasks()->create($validated);

        return redirect()->route('tasks.index')->with('success', 'Task added successfully');
    }

    public function toggle(Task $task)
    {
        Gate::authorize('update', $task);
        $task->is_completed = !$task->is_completed;
        $task->save();
        return redirect()->route('tasks.index');
    }

    public function update(Request $request, Task $task)
    {
        Gate::authorize('update', $task);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'due_date' => 'nullable|date|after_or_equal:today',
        ]);

        $task->update($validated);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
    }

    public function edit(Task $task)
    {
        Gate::authorize('update', $task);
        return view('tasks.edit', compact('task'));
    }

    public function destroy(Task $task)
    {
        Gate::authorize('delete', $task);
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
    }
}
