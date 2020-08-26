<?php

namespace App\Repositories;

use App\Repositories\Contracts\AuthRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Tenant;
use Illuminate\Support\Facades\Storage;

class AuthRepository implements AuthRepositoryInterface
{

    protected $repository, $tenant;

    public function __construct(User $user, Tenant $tenant)
    {
        $this->repository = $user;
        $this->tenant = $tenant;
    }

    public function register($request)
    {
        $dataTenant = [
            'name' => $request->tenant,
            'cnpj' => $request->cnpj,
            'email' => $request->email,
        ];
        $tenant = $this->tenant->create($dataTenant);

        $dataUser = [
            'tenant_id' => $tenant->id,
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ];

        return $this->repository->create($dataUser);
    }

    public function auth($request)
    {
        if($user = $this->repository->where('email', $request->email)->first()){
            if(Hash::check($request->password, $user->password)){
                $token = $user->createToken($request->device_name)->plainTextToken;
                return [
                    'token' => $token,
                    'user'  => $user,
                ];
            }
        }
    }

    public function authUpdate($request)
    {
        $user = Auth()->user();
        $data['phone'] = $request->phone;
        if($request->password){
            if(Hash::check($request->password, $user->password)){
                $data['password'] = Hash::make($request->new_password);
            }
        }

        if($request->image){
            if(Storage::exists($user->image)) {
                Storage::delete($user->image);
            }
            if($request->image->isValid()){
                $data['image'] = $request->image->store("users");
            }
        }
        $user->update($data);
        return $user;
    }

    public function me()
    {
        return Auth()->user();
    }

    public function logout()
    {
        $user = Auth()->user();
        // Revoque All Tokens User
        $user->tokens()->delete();
        return $user; 
    }
}