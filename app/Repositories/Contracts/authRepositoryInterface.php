<?php

namespace App\Repositories\Contracts;

interface AuthRepositoryInterface
{
    public function register($request);
    public function auth($request);
    public function me();
    public function logout();
    public function authUpdate($request);
}