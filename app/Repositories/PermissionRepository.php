<?php

namespace App\Repositories;

use App\Repositories\Contracts\PermissionRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use App\Models\Permission;

class PermissionRepository implements PermissionRepositoryInterface
{
    protected $repository;

    public function __construct(permission $permission)
    {
        $this->repository = $permission;
    }

    public function index()
    {
        return $this->repository->all();
    }

    public function paginate($per_page, $search)
    {
        return $this->repository->where('name', 'LIKE', "%{$search}%")->latest()->paginate($per_page);
    }
    
    public function store($request)
    {
        return $this->repository->create($request->all()); 
    }

    public function show($uuid)
    {
        if($permission = $this->repository->where('uuid', $uuid)->first()){
            return $permission;
        } 
    }

    public function update($request, $uuid)
    {
        if($permission = $this->repository->where('uuid', $uuid)->first()){
            return $permission->update($request->all());
        }
    }

    public function destroy($uuid)
    {
        if($permission = $this->repository->where('uuid', $uuid)->first()){
            return $permission->delete();
        }
    }
}