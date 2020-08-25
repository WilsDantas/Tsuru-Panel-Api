<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\Tenant\Traits\TenantTrait;

class detail extends Model
{
    use TenantTrait;

    protected $fillable = ['pet', 'size', 'age', 'material', 'dimension', 'description', 'weight'];

    public function product(){
        return $this->hasOne(Product::class);
    }
}
