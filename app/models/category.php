<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = ['name'];

    public function SubCategories(){
        return $this->hasMany(SubCategory::class);
    }  
}
