<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'identify'      => $this->uuid,
            'image'         => $this->image ? url("storage/{$this->image}") : url("storage/user.png"),
            'name'          => $this->name,
            'email'         => $this->email,
            'phone'         => $this->phone ? $this->phone : '',
            'orders'        => OrderResource::collection($this->orders),
        ];
    }
}
