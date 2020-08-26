<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    protected $fillable = [
        'name', 'email', 'password', 'tenant_id', 'profile_id', 'active', 'image'
    ];

    public function Orders(){
        return $this->hasMany(Order::class);
    }
}
