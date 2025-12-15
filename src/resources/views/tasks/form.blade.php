@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12 mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <h4 class="mb-3 text-start">
                            @if(empty($task))
                                Nova Tarefa
                            @else
                                Editar tarefa
                            @endif
                        </h4>
                    </div>
                </div>

                <form
                    method="POST"
                    action="{{ empty($task) ? route('tasks.store') : route('tasks.update', $task->id) }}"
                >
                    @csrf
                    @if(isset($task))
                        @method('PUT')
                    @endif

                    <div class="mb-3">
                        <label class="form-label">Título</label>
                        <input
                            @if(isset($task)) value="{{ $task->title }}" @endif
                            type="text"
                            name="title"
                            class="form-control"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Descrição</label>
                        <input
                            @if(isset($task)) value="{{ $task->description }}" @endif
                            type="text"
                            name="description"
                            class="form-control"
                        >
                    </div>

                    @if(session('error'))
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endif

                    <button class="btn btn-primary w-100">
                        @if(empty($task))
                            Criar Tarefa
                        @else
                            Atualizar Tarefa
                        @endif
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
