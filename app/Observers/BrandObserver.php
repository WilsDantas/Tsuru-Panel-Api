<?php

namespace App\Observers;

use App\Models\Brand;
use Illuminate\Support\Str;

class BrandObserver
{
    public function creating(Brand $brand)
    {
        $brand->uuid = Str::uuid();
    }
}
