<?php

declare(strict_types=1);

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use YummiPizza\Payloads\Auth\RegisterPayload;

class RegisterRequest extends FormRequest implements RegisterPayload
{
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    public function getEmail(): string
    {
        return $this->input('email');
    }

    public function getName(): string
    {
        return $this->input('name');
    }

    public function getNewPassword(): string
    {
        return $this->input('password');
    }
}
