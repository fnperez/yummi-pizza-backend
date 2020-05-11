<?php

declare(strict_types=1);

namespace App\Http\Requests\Invoice;

use Illuminate\Foundation\Http\FormRequest;
use YummiPizza\Contracts\IInvoice;
use YummiPizza\Payloads\Invoice\PayPayload;
use YummiPizza\Repositories\InvoiceRepository;

class PayRequest extends FormRequest implements PayPayload
{
    public function rules()
    {
        return [
            'invoice_id' => 'required|exists:invoices,id',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'invoice_id' => $this->route('id'),
        ]);
    }

    public function getInvoice(): IInvoice
    {
        return app(InvoiceRepository::class)->get($this->input('invoice_id'));
    }
}
