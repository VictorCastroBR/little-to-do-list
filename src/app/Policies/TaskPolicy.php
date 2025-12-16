<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TaskPolicy
{
    private function userOwnsTask(
            User $user,
            Task $task,
            string $denyMessage = 'Você não tem autorização para esse recurso.'
    ) {
        return $user->id === $task->user_id
            ? Response::allow()
            : Response::deny($denyMessage);
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function view(User $user, Task $task): Response
    {
        return $this->userOwnsTask($user, $task, 'Você só pode visualizar tarefas criadas por você mesmo.');
    }

    public function update(User $user, Task $task): Response
    {
        return $this->userOwnsTask($user, $task, 'Você só pode editar tarefas que você mesmo criou.');
    }

    public function delete(User $user, Task $task): Response
    {
        return $this->userOwnsTask($user, $task, 'Você só pode excluir tarefas que você mesmo criou.');
    }
}
