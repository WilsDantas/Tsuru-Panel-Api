<?php

namespace App\Repositories;

use App\Repositories\Contracts\permissionProfileRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use App\Models\Profile;

class PermissionProfileRepository implements permissionProfileRepositoryInterface
{
    protected $repository;

    public function __construct(Profile $profile)
    {
        $this->repository = $profile;
    }

    public function AttachPermissions($uuid, $request)
    {
        $profile = $this->repository->where('uuid', $uuid)->first();

        $profile->permissions()->detach();

        $profile->AttachPermissions($request->permissions);

        return $profile;
    }

}