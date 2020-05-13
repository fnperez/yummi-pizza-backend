<?php

declare(strict_types=1);

namespace YummiPizza\Payloads\Product;

use Illuminate\Http\UploadedFile;
use Money\Money;

interface AddPayload
{
    public function getName(): string;
    public function getDescription(): string;
    public function getPrice(): Money;
    public function getImage():? UploadedFile;
    public function getImageUrl():? string;
}
