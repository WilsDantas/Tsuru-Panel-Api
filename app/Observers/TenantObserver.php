<?php

namespace App\Observers;

use App\Models\Tenant;
use Illuminate\Support\Str;

class TenantObserver
{
    public function creating(Tenant $tenant)
    {
        $tenant->uuid = Str::uuid();
    }
}
