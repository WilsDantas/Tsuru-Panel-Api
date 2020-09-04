<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    protected $fillable = ['name'];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
