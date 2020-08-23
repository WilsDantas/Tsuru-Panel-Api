<?php

namespace App\Repositories;

use App\Repositories\Contracts\ProfileRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use App\Models\Profile;

class ProfileRepository implements ProfileRepositoryInterface
{
    protected $repository;

    public function __construct(Profile $profile)
    {
        $this->repository = $profile;
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
        if($profile = $this->repository->where('uuid', $uuid)->first()){
            return $profile;
        } 
    }

    public function update($request, $uuid)
    {
        if($profile = $this->repository->where('uuid', $uuid)->first()){
            return $profile->update($request->all());
        }
    }

    public function destroy($uuid)
    {
        if($profile = $this->repository->where('uuid', $uuid)->first()){
            return $profile->delete();
        }
    }
}