<?php

declare(strict_types=1);

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;
use YummiPizza\Payloads\Account\EditPasswordPayload;

class EditPasswordRequest extends FormRequest implements EditPasswordPayload
{
    public function rules()
    {
        return [
            'password' => 'required|confirmed|min:8',
        ];
    }

    public function getCurrentUser()
    {
        return $this->user();
    }

    public function getNewPassword(): string
    {
        return $this->input('password');
    }
}
