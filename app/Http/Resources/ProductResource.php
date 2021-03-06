<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'identify'      => $this->uuid,
            'name'          => $this->name,
            'quantity'      => $this->quantity,
            'price'         => $this->price,
            'brand'         => new BrandResource($this->brand),
            'subCategory'   => new SubCategoryResource($this->SubCategory),
            'detail'        => new DetailResource($this->detail),
            'images'        => $this->product_images ? ProductImageResource::collection($this->product_images) : '',
        ];
    }
}
