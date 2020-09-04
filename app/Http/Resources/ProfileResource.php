<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'identify'      => $this->uuid,
            'name'          => $this->name,
            'users'         => count($this->users),
            'permissions'   => PermissionResource::collection($this->permissions),
        ];
    }
}
