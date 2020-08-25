<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class subCategory extends Model
{
    protected $fillable = ['name'];
 
    public function Category(){
        return $this->belongsTo(Category::class);
    }
}
