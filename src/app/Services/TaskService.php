<?php

namespace App\Services;

use Illuminate\Database\Eloquent\COllection;
use App\Contracts\TaskRepositoryInterface;
use App\Models\Task;
use App\Models\User;

class TaskService
{

    public function __construct(
        protected TaskRepositoryInterface $repository
    ) {}

    public function getAllTasks(int $perPage = 10): Collection
    {
        return $this->repository->getAllTasks($perPage);
    }

    public function getTask(int $taskId): Task
    {
        return $this->repository->getTask($taskId);
    }

    public function updateTask(int $taskId, array $data): Task
    {
        return $this->repository->updateTask($taskId, $data);
    }

    public function createTask(array $data, int $userId): Task
    {
        $data['user_id'] = $userId;
        return $this->repository->createTask($data, $userId);
    }

    public function completeTask(Task $task, bool $completed = true): Task
    {
        $data = [
            'completed' => $completed,
            'completed_at' => $completed ? now() : null
        ];

        return $this->repository->updateTask($task->id, $data);
    }
}
