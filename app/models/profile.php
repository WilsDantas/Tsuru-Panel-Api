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
}
