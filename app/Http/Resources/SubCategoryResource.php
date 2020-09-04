<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubCategoryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'identify'      => $this->uuid,
            'name'          => $this->name,
            'category'      => new CategoryResource($this->category),
            'products'      => count($this->products)
        ];
    }
}
