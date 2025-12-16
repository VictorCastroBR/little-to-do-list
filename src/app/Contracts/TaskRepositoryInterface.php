<?php

namespace App\Contracts;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

interface TaskRepositoryInterface
{
    public function getAllTasks(int $perPage = 10): Collection;

    public function getTask(int $taskId): ?Task;

    public function updateTask(int $taskId, array $data): ?Task;

    public function createTask(array $data, int $userId): Task;

    public function deleteTask(int $taskId): bool;
}
