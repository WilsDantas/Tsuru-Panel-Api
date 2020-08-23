<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\Tenant\Traits\TenantTrait;

class details extends Model
{
    use TenantTrait;
}
