<?php

namespace App\Observers;

use App\Models\Profile;
use Illuminate\Support\Str;

class ProfileObserver
{
    public function creating(Profile $profile)
    {
        $profile->uuid = Str::uuid();
    }
}
