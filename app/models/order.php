<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable = ['client_id', 'tenant_id', 'total', 'status', 'comment'];
    
    public function Products(){
        return $this->belongsToMany(Product::class)->withPivot('price', 'quantity');
    }

    public function Client(){
        return $this->BelongsTo(Client::class);
    }
}
