<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Cache;
use App\Contracts\TaskRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CacheTaskRepository implements TaskRepositoryInterface
{
    public function __construct(
        protected TaskRepositoryInterface $repository
    ) {}

    private function forgetTasksUser(int $userId, int $perPage = 10)
    {
        $cacheKey = 'tasks_user_' . $userId . '_' . $perPage;
        Cache::forget($cacheKey);
    }

    private function forgetTask(int $taskId, int $userId)
    {
        $cacheKey = 'task_' . $taskId . '_user_' . $userId;
        Cache::forget($cacheKey);
    }

    public function getAllTasks(int $perPage = 10): Collection
    {
        $cacheKey = 'tasks_user_' . Auth::id() . '_' . $perPage;

        return Cache::remember($cacheKey, 3600, function () use ($perPage) {
            return $this->repository->getAllTasks($perPage);
        });
    }

    public function getTask(int $taskId): Task
    {
        $cacheKey = 'task_' . $taskId . '_user_' . Auth::id();

        return Cache::remember($cacheKey, 3600, function () use ($taskId) {
            return $this->repository->getTask($taskId);
        });
    }

    public function updateTask(int $taskId, array $data): Task
    {
        $task = $this->repository->updateTask($taskId, $data);

        $userId = Auth::id();
        $this->forgetTasksUser($userId);
        $this->forgetTask($taskId, $userId);

        return $task;
    }

    public function createTask(array $data, int $userId): Task
    {
        $task = $this->repository->createTask($data, $userId);

        $this->forgetTasksUser(Auth::id());

        return $task;
    }
}
