<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PermissionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'identify'      => $this->uuid,
            'name'          => $this->name,
        ];
    }
}
