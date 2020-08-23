<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class tenant extends Model
{
    protected $fillable = [
        'cnpj', 'name', 'email', 'logo', 'active',
    ];

    public function users(){
        return $this->hasMany(User::class);
    }

}
