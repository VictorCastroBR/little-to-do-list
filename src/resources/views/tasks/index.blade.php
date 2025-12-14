@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12 mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <h4 class="mb-3 text-start">Tarefas</h4>
                    </div>
                    <div class="col-12 col-md-9 text-end">
                        <a class="btn btn-primary" href="{{ route('tasks.create') }}">
                            Nova Tarefa
                        </a>
                    </div>
                    <div class="col-12">
                        @if(session('success'))
                          <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    @if(empty($tasks))
                        <div class="alert alert-secondary text-center mt-3">Você ainda não possui tarefas!</div>
                    @else
                        <ul class="list-group">
                        @foreach($tasks as $task)
                            <li class="list-group-item">
                                <form class="complete-task-form"
                                    action="{{ route('tasks.complete', $task) }}"
                                    method="POST">

                                    @csrf
                                    @method('PUT') <input
                                        @if($task->completed) checked @endif
                                        class="form-check-input me-1 task-checkbox"
                                        type="checkbox"
                                        name="completed"
                                        value="1"
                                        id="task-{{ $task->id }}">

                                    <label class="form-check-label" for="task-{{ $task->id }}">{{ $task->title }}</label>

                                    <small class="d-block text-muted">
                                        {{ $task->description }}
                                    </small>
                                </form>
                            </li>
                        @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const checkboxes = document.querySelectorAll('.task-checkbox');

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                const form = this.closest('form');
                form.submit();
            });
        });
    });
</script>
@endsection
