<?php

namespace App\Repositories;

use App\Repositories\Contracts\BrandRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use App\Models\Brand;

class BrandRepository implements BrandRepositoryInterface
{
    protected $repository;

    public function __construct(Brand $brand)
    {
        $this->repository = $brand;
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
        if($brand = $this->repository->where('uuid', $uuid)->first()){
            return $brand;
        } 
    }

    public function update($request, $uuid)
    {
        if($brand = $this->repository->where('uuid', $uuid)->first()){
            return $brand->update($request->all());
        }
    }

    public function destroy($uuid)
    {
        if($brand = $this->repository->where('uuid', $uuid)->first()){
            return $brand->delete();
        }
    }
}