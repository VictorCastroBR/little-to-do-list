@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 85vh;">
        <div class="col-md-6 col-lg-5">

            <div class="text-center mb-4">
                <div class="bg-primary text-white d-inline-block rounded-circle shadow-sm mb-3" style="width: 60px; height: 60px; line-height: 60px; font-size: 1.5rem;">
                    🚀
                </div>
                <h3 class="fw-bold" style="color: #1e293b;">Criar sua conta</h3>
                <p class="text-muted small">Junte-se ao SimpleTasks e organize sua rotina hoje mesmo.</p>
            </div>

            <div class="card border-0 shadow-lg custom-register-card">
                <div class="card-body p-4 p-md-5">

                    <form method="POST" action="{{ route('auth.register') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold small text-muted text-uppercase">Nome Completo</label>
                            <input type="text"
                                   name="name"
                                   class="form-control custom-input"
                                   placeholder="Como deseja ser chamado?"
                                   required
                                   autofocus>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold small text-muted text-uppercase">E-mail</label>
                            <input type="email"
                                   name="email"
                                   class="form-control custom-input"
                                   placeholder="exemplo@email.com"
                                   required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold small text-muted text-uppercase">Senha</label>
                            <input type="password"
                                   name="password"
                                   class="form-control custom-input"
                                   placeholder="Crie uma senha forte"
                                   required>
                            <div class="form-text mt-2" style="font-size: 0.75rem;">
                                Use pelo menos 5 caracteres.
                            </div>
                        </div>

                        @if(session('error') || $errors->any())
                            <div class="alert alert-danger border-0 small shadow-sm mb-4">
                                {{ session('error') ?? 'Ops! Verifique os dados e tente novamente.' }}
                            </div>
                        @endif

                        <button class="btn btn-primary w-100 py-3 rounded-pill fw-bold shadow-sm mb-3">
                            Começar agora
                        </button>

                        <p class="text-center mb-0 small text-muted">
                            Já possui uma conta?
                            <a href="{{ route('auth.view-login') }}" class="text-primary fw-bold text-decoration-none">
                                Fazer Login
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
