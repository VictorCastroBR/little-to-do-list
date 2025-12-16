@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold mb-0" style="color: #1e293b;">Minhas Tarefas</h2>
                    <p class="text-muted mb-0">Organize o seu dia com calma.</p>
                </div>
                <a class="btn btn-primary px-4 rounded-pill shadow-sm fw-bold" href="{{ route('tasks.create') }}">
                    + Nova Tarefa
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success border-0 shadow-sm mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="task-container">
                @forelse($tasks as $task)
                    <div class="card border-0 shadow-sm mb-3 task-card {{ $task->completed ? 'task-completed' : '' }}">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center justify-content-between">

                                <div class="d-flex align-items-center flex-grow-1">
                                    <form action="{{ route('tasks.complete', $task) }}" method="POST" class="me-3 d-flex align-items-center">
                                        @csrf
                                        @method('PUT')
                                        <input class="form-check-input task-checkbox custom-check"
                                               type="checkbox"
                                               name="completed"
                                               value="1"
                                               onchange="this.form.submit()"
                                               {{ $task->completed ? 'checked' : '' }}>
                                    </form>

                                    <div class="task-info">
                                        <h6 class="mb-0 fw-semibold {{ $task->completed ? 'text-decoration-line-through text-muted' : '' }}" style="color: #334155;">
                                            {{ $task->title }}
                                        </h6>
                                        @if($task->description)
                                            <small class="text-muted d-block">{{ $task->description }}</small>
                                        @endif
                                    </div>
                                </div>

                                <div class="task-actions d-flex gap-2">
                                    <a class="btn btn-light btn-sm rounded-circle action-btn" href="{{ route('tasks.edit', $task->id) }}" title="Editar">
                                        ✏️
                                    </a>

                                    <form action="{{ route('tasks.delete', $task) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-light btn-sm rounded-circle action-btn text-danger" title="Excluir" onclick="return confirm('Tem certeza?')">
                                            🗑️
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-5">
                        <div class="mb-3" style="font-size: 3rem;">📝</div>
                        <h5 class="text-muted">Você ainda não possui tarefas!</h5>
                        <p class="text-muted small">Clique em "Nova Tarefa" para começar.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</div>
@endsection
