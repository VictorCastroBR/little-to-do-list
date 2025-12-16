@extends('layouts.app')

@section('content')
    <div class="container text-center py-5">
        <h1 class="display-1 text-danger">403</h1>
        <h2>Acesso Negado (Forbidden)</h2>

        <p class="lead">
            {{ $exception->getMessage() ?: 'Você não tem permissão para acessar este recurso.' }}
        </p>

        <a href="{{ route('tasks.index') }}" class="btn btn-primary mt-3">Voltar para o Início</a>
    </div>
@endsection
