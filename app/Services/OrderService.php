<?php

namespace App\Services;

use App\Repositories\Contracts\OrderRepositoryInterface;

class OrderService{

    private $repository;

    public function __construct(OrderRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->index();
    }

    public function paginate($per_page, $search)
    {
        return $this->repository->paginate($per_page, $search);
    }

    public function show($uuid)
    {
        return $this->repository->show($uuid);  
    }

    public function update($uuid, $request)
    {
        return $this->repository->update($uuid, $request);  
    }
}