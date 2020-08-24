<?php

namespace App\Repositories\Contracts;

interface PermissionProfileRepositoryInterface
{
    public function AttachPermissions($uuid, $request);
}