<?php

namespace App\Services;

use App\Repositories\Contracts\permissionProfileRepositoryInterface;

class permissionProfileService{

    private $repository;

    public function __construct(permissionProfileRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function AttachPermissions($uuid, $request)
    {
        return $this->repository->AttachPermissions($uuid, $request);
    }
}