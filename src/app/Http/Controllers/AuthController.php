<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthService;

class AuthController extends Controller
{
    public function __construct(
        protected AuthService $authService
    ) {}

    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        $loginSuccess = $this->authService->loginUser($validated);

        if (!$loginSuccess) {
            return redirect()->back()->with('error', 'E-mail ou senha inválidos!');
        }

        $request->session()->regenerate();

        return redirect()->route('tasks.index')->with('success', 'Usuário autenticado com sucesso!');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        $user = $this->authService->registerUser($validated);

        if (!$user) {
            return redirect()->back()->with('error', 'Não foi possível criar a conta!');
        }

        return redirect('/auth/login')->with('success', 'Conta criada com sucesso!');
    }
}
