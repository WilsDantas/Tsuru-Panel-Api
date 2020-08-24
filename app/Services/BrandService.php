<?php

namespace App\Services;

use App\Repositories\Contracts\BrandRepositoryInterface;

class BrandService{

    private $repository;

    public function __construct(BrandRepositoryInterface $repository)
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
    
    public function store($request)
    {
        return $this->repository->store($request); 
    }

    public function show($uuid)
    {
        return $this->repository->show($uuid);  
    }

    public function update($request, $uuid)
    {
        return $this->repository->update($request, $uuid);  
    }

    public function destroy($uuid)
    {
        return $this->repository->destroy($uuid);
    }
}