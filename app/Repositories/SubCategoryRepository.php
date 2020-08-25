<?php

namespace App\Repositories;

use App\Repositories\Contracts\SubCategoryRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryRepository implements SubCategoryRepositoryInterface
{
    protected $repository;

    public function __construct(SubCategory $Subcategory)
    {
        $this->repository = $Subcategory;
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
        if(!$category = Category::where('uuid', $request->category)->first()){
            return false;
        }
        return $category->subcategories()->create($request->all());
    }

    public function show($uuid)
    {
        if($subcategory = $this->repository->where('uuid', $uuid)->first()){
            return $subcategory;
        } 
    }

    public function update($request, $uuid)
    {
        if(!$category = Category::where('uuid', $request->category)->first()){
            return false;
        }
        $data = $request->all();
        $data['category_id'] = $category->id;

        if($category = $this->repository->where('uuid', $uuid)->first()){
            return $category->update($data);
        }
    }

    public function destroy($uuid)
    {
        if($category = $this->repository->where('uuid', $uuid)->first()){
            return $category->delete();
        }
    }
}