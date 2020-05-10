<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;
use YummiPizza\Payloads\Account\EditProfilePayload;

class EditProfileRequest extends FormRequest implements EditProfilePayload
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->user()->id,
        ];
    }

    public function getCurrentUser()
    {
        return $this->user();
    }

    public function getName(): string
    {
        return $this->input('name');
    }

    public function getEmail(): string
    {
        return $this->input('email');
    }
}
