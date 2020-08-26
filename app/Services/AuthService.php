<?php

namespace App\Services;

use App\Repositories\Contracts\AuthRepositoryInterface;

class AuthService{

    private $repository;

    public function __construct(AuthRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function register($request)
    {
        return $this->repository->register($request);
    }

    public function auth($request)
    {
        return $this->repository->auth($request);
    }

    public function authUpdate($request){
        return $this->repository->authUpdate($request);
    }

    public function me()
    {
        return $this->repository->me();
    }

    public function logout()
    {
        return $this->repository->logout();
    }
}