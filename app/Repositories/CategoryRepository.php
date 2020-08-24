<?php

namespace App\Repositories;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    protected $repository;

    public function __construct(Category $category)
    {
        $this->repository = $category;
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
        if($category = $this->repository->where('uuid', $uuid)->first()){
            return $category;
        } 
    }

    public function update($request, $uuid)
    {
        if($category = $this->repository->where('uuid', $uuid)->first()){
            return $category->update($request->all());
        }
    }

    public function destroy($uuid)
    {
        if($category = $this->repository->where('uuid', $uuid)->first()){
            return $category->delete();
        }
    }
}