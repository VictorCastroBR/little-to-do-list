@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">

            <div class="mb-4">
                <a href="{{ route('tasks.index') }}" class="text-decoration-none text-muted small fw-bold">
                    ← Voltar para a lista
                </a>
            </div>

            <div class="card border-0 shadow-sm custom-form-card">
                <div class="card-body p-4 p-md-5">

                    <div class="text-center mb-4">
                        <div class="display-6 mb-2">
                            {{ empty($task) ? '📝' : '✏️' }}
                        </div>
                        <h3 class="fw-bold" style="color: #1e293b;">
                            {{ empty($task) ? 'Nova Tarefa' : 'Editar Tarefa' }}
                        </h3>
                        <p class="text-muted small">
                            {{ empty($task) ? 'Preencha os detalhes abaixo para criar sua tarefa.' : 'Altere as informações necessárias da sua tarefa.' }}
                        </p>
                    </div>

                    <form
                        method="POST"
                        action="{{ empty($task) ? route('tasks.store') : route('tasks.update', $task) }}"
                    >
                        @csrf
                        @if(isset($task))
                            @method('PUT')
                        @endif

                        <div class="mb-4">
                            <label class="form-label fw-semibold small text-uppercase tracking-wider" style="color: #64748b;">Título</label>
                            <input
                                value="{{ isset($task) ? $task->title : old('title') }}"
                                type="text"
                                name="title"
                                class="form-control custom-input"
                                placeholder="O que precisa ser feito?"
                                required
                                autofocus
                            >
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold small text-uppercase tracking-wider" style="color: #64748b;">Descrição (Opcional)</label>
                            <textarea
                                name="description"
                                class="form-control custom-input"
                                rows="3"
                                placeholder="Adicione mais detalhes sobre esta tarefa..."
                            >{{ isset($task) ? $task->description : old('description') }}</textarea>
                        </div>

                        @if(session('error') || $errors->any())
                            <div class="alert alert-danger border-0 small shadow-sm mb-4">
                                {{ session('error') ?? 'Verifique os campos abaixo.' }}
                            </div>
                        @endif

                        <button class="btn btn-primary w-100 py-3 rounded-pill fw-bold shadow-sm">
                            {{ empty($task) ? 'Criar Tarefa' : 'Salvar Alterações' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
