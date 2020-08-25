<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\Tenant\Traits\TenantTrait;

class product extends Model
{
    use TenantTrait;

    protected $fillable = ['name', 'quantity', 'price', 'brand_id', 'detail_id', 'tenant_id', 'sub_category_id'];

    public function SubCategory(){
        return $this->belongsTo(SubCategory::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function tenant(){
        return $this->belongsTo(Tenant::class);
    }

    public function detail(){
        return $this->hasOne(Detail::class);
    }

    public function product_images(){
        return $this->hasMany(Product_Images::class);
    }
}
