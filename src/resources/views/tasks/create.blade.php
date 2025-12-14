@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12 mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <h4 class="mb-3 text-start">Nova Tarefa</h4>
                    </div>
                </div>

                <form method="POST" action="{{ route('tasks.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Título</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Descrição</label>
                        <input type="text" name="description" class="form-control">
                    </div>

                    @if(session('error'))
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endif

                    <button class="btn btn-primary w-100">Criar Tarefa</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
