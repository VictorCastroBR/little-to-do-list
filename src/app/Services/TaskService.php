<?php

namespace App\Services;

use Illuminate\Database\Eloquent\COllection;
use App\Models\Task;
use App\Models\User;

class TaskService
{
    public function getAllTasks(int $perPage = 10): Collection
    {
        return Task::all();
    }

    public function createTask(array $data, int $userId): Task
    {
        $data['user_id'] = $userId;
        return Task::create($data);
    }

    public function completeTask(Task $task, bool $completed = true): bool
    {
        return $task->update([
            'completed' => $completed,
            'completed_at' => $completed ? now() : null
        ]);
    }
}
