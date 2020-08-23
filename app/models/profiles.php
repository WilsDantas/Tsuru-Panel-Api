<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\Tenant\Traits\TenantTrait;

class profiles extends Model
{
    use TenantTrait;
}
