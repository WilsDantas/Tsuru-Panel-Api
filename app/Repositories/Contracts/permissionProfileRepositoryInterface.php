<?php

namespace App\Repositories\Contracts;

interface permissionProfileRepositoryInterface
{
    public function AttachPermissions($uuid, $request);
}