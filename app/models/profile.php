<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\Tenant\Traits\TenantTrait;

class profile extends Model
{
    use TenantTrait;

    protected $fillable = ['name'];

    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }

    public function AttachPermissions($permissions){
        foreach($permissions as $permission){
            $permissionId = Permission::where('uuid', $permission['identify'])->first();
            $this->permissions()->attach($permissionId->id);
        }
    }
}
