<?php

declare(strict_types=1);

namespace App\Http\Requests\Address;

use Illuminate\Foundation\Http\FormRequest;
use YummiPizza\Payloads\Address\AddPayload;

class AddRequest extends FormRequest implements AddPayload
{
    public function rules()
    {
        return [
            'street_name' => 'required',
            'street_number' => 'required',
            'state' => 'required',
            'city' => 'required',
            'floor' => 'alpha_num',
            'phone_number' => 'required'
        ];
    }

    public function getStreetName(): string
    {
        return $this->input('street_name');
    }

    public function getStreetNumber(): string
    {
        return $this->input('street_number');
    }

    public function getFloor(): ?string
    {
        return $this->input('floor');
    }

    public function getState(): string
    {
        return $this->input('state');
    }

    public function getCity(): string
    {
        return $this->input('city');
    }

    public function getPhoneNumber(): string
    {
        return $this->input('phone_number');
    }
}
