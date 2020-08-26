<?php

namespace App\Services;

use App\Repositories\Contracts\ClientRepositoryInterface;

class ClientService{

    private $repository;

    public function __construct(ClientRepositoryInterface $repository)
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
}