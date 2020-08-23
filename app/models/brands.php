<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\Tenant\Traits\TenantTrait;

class brands extends Model
{
    use TenantTrait;
}
