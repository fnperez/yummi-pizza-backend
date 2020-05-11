<?php

declare(strict_types=1);

namespace App\Infrastructure\Repositories\Eloquent;

use YummiPizza\Contracts\IAddress;
use YummiPizza\Contracts\ICart;
use YummiPizza\Contracts\ICriteria;
use YummiPizza\Contracts\IInvoice;
use YummiPizza\Entities\Invoice;
use YummiPizza\Repositories\InvoiceRepository;

class EloquentInvoiceReadRepository extends EloquentReadRepository implements InvoiceRepository
{
    protected function getEntity(): string
    {
        return Invoice::class;
    }

    public function browse(ICriteria $criteria)
    {
        return $this->all();
    }

    public function findByCart(ICart $cart): ?IInvoice
    {
        $query = $this->query();

        $query->where('cart_id', $cart->getId());

        return $query->first();
    }
}
