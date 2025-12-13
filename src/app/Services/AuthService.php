<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function registerUser(array $data): User
    {
        $data = Arr::except($data, ['password_confirmation']);
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        return $user;
    }

    public function loginUser(array $data): bool
    {
        if (Auth::attempt($data))
            return true;

        return false;
    }
}
