<?php

namespace App\Repositories;

use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Profile;

class UserRepository implements UserRepositoryInterface
{
    protected $repository;

    public function __construct(User $user)
    {
        $this->repository = $user;
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
        if(!$profile = Profile::where('uuid', $request->profile)->first()){
            return false;
        }
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $data['tenant_id'] = Auth()->user()->tenant_id;
        $data['profile_id'] = $profile->id;
        return $this->repository->create($data); 
    }

    public function show($uuid)
    {
        if($user = $this->repository->where('uuid', $uuid)->first()){
            return $user;
        } 
    }

    public function update($request, $uuid)
    {
        if($user = $this->repository->where('uuid', $uuid)->first()){
            if(!$profile = Profile::where('uuid', $request->profile)->first()){
                return false;
            }
            $data = $request->all();
            $data['profile_id'] = $profile->id;
            return $user->update($data);
        }
    }

    public function destroy($uuid)
    {
        if($user = $this->repository->where('uuid', $uuid)->first()){
            return $user->delete();
        }
    }
}