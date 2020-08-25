<?php

namespace App\Observers;

use App\Models\Product_Images;
use Illuminate\Support\Str;

class ProductImageObserver
{
    public function creating(Product_Images $product_image)
    {
        $product_image->uuid = Str::uuid();
    }
}
