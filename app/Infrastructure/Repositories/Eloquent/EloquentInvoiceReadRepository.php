<?php

declare(strict_types=1);

namespace App\Infrastructure\Repositories\Eloquent;

use YummiPizza\Contracts\IAddress;
use YummiPizza\Contracts\ICart;
use YummiPizza\Contracts\ICriteria;
use YummiPizza\Contracts\IInvoice;
use YummiPizza\Entities\Invoice;
use YummiPizza\Repositories\Criteria\Invoice\InvoiceFilter;
use YummiPizza\Repositories\InvoiceRepository;

class EloquentInvoiceReadRepository extends EloquentReadRepository implements InvoiceRepository
{
    protected function getEntity(): string
    {
        return Invoice::class;
    }

    public function browse(ICriteria $criteria)
    {
        $query = $this->query();

        foreach ($criteria->getFilter()->values() as $key => $value) {
            switch ($key) {
                case InvoiceFilter::CUSTOMER_ID:
                    $query->where('customer_id', $value);
                break;
                case InvoiceFilter::STATUS:
                    $query->where('status', $value);
                break;
            }
        }

        foreach ($criteria->getSorting()->getRaw() as $column => $direction) {
            $query->orderBy($column, $direction);
        }

        $query->setPerPage($criteria->getPaginationData()->getLimit());
        $query->offset($criteria->getPaginationData()->getOffset());

        return $query->paginate();
    }

    public function findByCart(ICart $cart): ?IInvoice
    {
        $query = $this->query();

        $query = $query->where('cart_id', $cart->getId());

        logger($query->toSql());

        return $query->first();
    }
}
