<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductImageResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'identify'  => $this->uuid,
            'image'     => url("storage/{$this->image}"),
        ];
    }
}
