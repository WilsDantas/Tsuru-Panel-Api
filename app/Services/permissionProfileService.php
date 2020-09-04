<?php

namespace App\Services;

use App\Repositories\Contracts\PermissionProfileRepositoryInterface;

class permissionProfileService{

    private $repository;

    public function __construct(PermissionProfileRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function AttachPermissions($uuid, $request)
    {
        return $this->repository->AttachPermissions($uuid, $request);
    }
}