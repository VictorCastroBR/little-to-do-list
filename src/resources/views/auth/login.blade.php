@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-md-5 col-lg-4">

            <div class="text-center mb-4">
                <div class="bg-primary text-white d-inline-block rounded-circle shadow-sm mb-3" style="width: 60px; height: 60px; line-height: 60px; font-size: 1.5rem;">
                    ✅
                </div>
                <h3 class="fw-bold" style="color: #1e293b;">Bem-vindo de volta</h3>
                <p class="text-muted small">Acesse sua conta para gerenciar suas tarefas.</p>
            </div>

            <div class="card border-0 shadow-lg custom-login-card">
                <div class="card-body p-4 p-md-5">

                    <form method="POST" action="{{ route('auth.login') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold small text-muted text-uppercase">E-mail</label>
                            <input type="email"
                                   name="email"
                                   class="form-control custom-input"
                                   placeholder="seu@email.com"
                                   required
                                   autofocus>
                        </div>

                        <div class="mb-4">
                            <div class="d-flex justify-content-between">
                                <label class="form-label fw-semibold small text-muted text-uppercase">Senha</label>
                            </div>
                            <input type="password"
                                   name="password"
                                   class="form-control custom-input"
                                   placeholder="••••••••"
                                   required>
                        </div>

                        @if(session('error'))
                            <div class="alert alert-danger border-0 small shadow-sm mb-4">
                                {{ session('error') }}
                            </div>
                        @endif

                        <button class="btn btn-primary w-100 py-3 rounded-pill fw-bold shadow-sm mb-3">
                            Entrar na conta
                        </button>

                        <p class="text-center mb-0 small text-muted">
                            Não possui uma conta ainda?
                            <a href="{{ route('auth.view-register') }}" class="text-primary fw-bold text-decoration-none">
                                Cadastre-se
                            </a>
                        </p>
                    </form>
                </div>
            </div>

            <div class="text-center mt-4">
                <p class="text-muted small">&copy; {{ date('Y') }} SimpleTasks. Feito para organizar.</p>
            </div>
        </div>
    </div>
</div>
@endsection
