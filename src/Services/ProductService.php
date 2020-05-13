<?php

declare(strict_types=1);

namespace YummiPizza\Services;

use Ramsey\Uuid\Uuid;
use YummiPizza\Contracts\IProduct;
use YummiPizza\Entities\Product;
use YummiPizza\Payloads\Product\AddPayload;
use YummiPizza\Repositories\PersistRepository;

class ProductService
{
    /**
     * @var PersistRepository
     */
    protected $repository;

    public function __construct(PersistRepository $repository)
    {
        $this->repository = $repository;
    }

    public function add(AddPayload $payload): IProduct
    {
        $product = new Product;

        if ($payload->getImage()) {
            $folder = config('images.product.folder');

            $path = $payload->getImage()->store("public/$folder");

            $filename = pathinfo($path, PATHINFO_BASENAME);

            $product->setImageUrl(asset($folder . $filename));
        }

        $payload->getImageUrl() && $product->setImageUrl($payload->getImageUrl());

        $product->setName($payload->getName());
        $product->setDescription($payload->getDescription());
        $product->setPrice($payload->getPrice());

        return $this->repository->save($product);
    }
}
