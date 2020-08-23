<?php

namespace App\Models\Traits;
use App\Models\Tenant;

trait UserACLTrait
{
    public function permissions(): array
    {
        $permissions = [];

        foreach($this->profile->permissions as $permission){
            array_push($permissions , $permission->name);
        }
        return $permissions;
    }

    public function hasPermission(string $permissionName): bool
    {
        if($this->profile){
            return in_array($permissionName, $this->permissions());
        }
        return false;
    }

    public function isTenant(): bool{
        return $this->tenant->email == $this->email;
    }

}