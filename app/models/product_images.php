<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class product_images extends Model
{

    protected $fillable = ['image', 'product_id'];

    public function product(){
        return $this->hasOne(Product::class);
    }
}
