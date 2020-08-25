<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DetailResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'pet'           => $this->pet,
            'size'          => $this->size,
            'age'           => $this->age,
            'material'      => $this->material,
            'dimension'     => $this->dimension,
            'description'   => $this->description,
            'weight'        => $this->weight,
        ];
    }
}
