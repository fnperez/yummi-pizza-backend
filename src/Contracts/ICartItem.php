<?php

declare(strict_types=1);

namespace YummiPizza\Contracts;

use Money\Money;

interface ICartItem extends IEntity, IHasTimestamps
{
    public function getName(): string;
    public function getPrice(): Money;
    public function getQuantity(): int;
    public function getDescription(): string;
    public function getTotalPrice(): Money;
    public function getCart(): ICart;
    public function getProduct(): IProduct;

    public function setName(string $name): void;
    public function setPrice(Money $price): void;
    public function setDescription(string $description): void;
    public function setQuantity(int $quantity): void;
    public function setCart(ICart $cart): void;
    public function setProduct(IProduct $product): void;

    public function addQuantity(int $getQuantity): void;

    public static function  make(IProduct $product, ICart $cart, int $quantity = 1): self;

}
