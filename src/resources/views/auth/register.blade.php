@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="mb-3 text-center">Registrar-se</h4>

                <form method="POST" action="{{ route('auth.register') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nome</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Senha</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    @if(session('error'))
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endif

                    <button class="btn btn-primary w-100">Criar conta</button>

                    <p class="text-center mt-3">Já possui uma conta? <a href="{{ route('auth.view-login') }}">Clique aqui</a></p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
