<?php

declare(strict_types=1);

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;
use Money\Currency;
use Money\Money;
use Money\Parser\DecimalMoneyParser;
use YummiPizza\Entities\User;
use YummiPizza\Helpers;
use YummiPizza\Payloads\Product\AddPayload;

class AddRequest extends FormRequest implements AddPayload
{
    public function rules()
    {
        return [
            'name' => 'required|min:5',
            'description' => 'required|min:20',
            'price' => 'required|numeric|min:1',
            'image' => 'file|mimes:jpeg,bmp,png',
        ];
    }

    public function authorize()
    {
        return $this->user()->isRole(User::ADMIN);
    }

    public function getName(): string
    {
        return $this->input('name');
    }

    public function getDescription(): string
    {
        return $this->input('description');
    }

    public function getPrice(): Money
    {
        $price = $this->input('price');

        return Helpers::convertToMoney((float) $price);
    }

    public function getImage():? UploadedFile
    {
        return $this->file('image');
    }
}
