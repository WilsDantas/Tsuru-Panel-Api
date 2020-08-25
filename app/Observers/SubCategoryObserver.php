<?php

namespace App\Observers;

use App\Models\SubCategory;
use Illuminate\Support\Str;

class SubCategoryObserver
{
    public function creating(SubCategory $subcategory)
    {
        $subcategory->uuid = Str::uuid();
    }
}
