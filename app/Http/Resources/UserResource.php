<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'identify'      => $this->uuid,
            'image'         => $this->image ? url("storage/{$this->image}") : url("storage/user.png"),
            'name'          => $this->name,
            'email'         => $this->email,
            'active'        => $this->active,
            'salary'        => $this->salary ? $this->salary : '',
            'phone'         => $this->phone ? $this->phone : '',
            'tenant'        => new TenantResource($this->tenant),
            'profile'       => new ProfileResource($this->profile),
        ];
    }
}
