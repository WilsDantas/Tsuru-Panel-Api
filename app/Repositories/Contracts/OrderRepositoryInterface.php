<?php

namespace App\Repositories\Contracts;

interface OrderRepositoryInterface
{
    public function index();
    public function paginate($per_page, $search);
    public function show($uuid);
    public function update($uuid, $request);
}