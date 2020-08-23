<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class permission extends Model
{
    protected $fillable = ['name'];

    public function profiles(){
        return $this->belongsToMany(Profile::class);
    }
}
