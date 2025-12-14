<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TaskService;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class TaskController
{
    public function __construct(
        protected TaskService $taskService
    ) {}

    public function index()
    {
        $tasks = $this->taskService->getAllTasks();
        return view('tasks.index', [
            'tasks' => $tasks
        ]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);

        $task = $this->taskService->createTask($validated, Auth::id());

        if (!$task) {
            return back()->with('error', 'Não foi possível criar uma nova tarefa.');
        }

        return redirect()->route('tasks.index')->with('success', 'Tarefa criada com sucesso');
    }

    public function completeTask(Request $request, Task $task)
    {
        $taskCompleted = $this->taskService->completeTask($task, $request->boolean('completed'));

        if (!$taskCompleted)
            return redirect()
            ->route('tasks.index')
            ->with('error', 'Não foi possível concluir está tarefa');

        return redirect()
            ->route('tasks.index')
            ->with(
                'success',
                $request->boolean('completed') ? "A tarefa '$task->title' foi concluída"
                : "A tarefa '$task->title' foi desfeita"
            );
    }
}
