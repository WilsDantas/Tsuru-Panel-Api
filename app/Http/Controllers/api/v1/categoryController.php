<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\CategoryService;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;


class categoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        if(!$categories = $this->categoryService->index()){
            return response()->json(['message' => 'the categories could not be found'], 404); 
        }
        return CategoryResource::collection($categories); 
    }

    public function paginate($per_page = 10, $search = '')
    {
        if(!$categories = $this->categoryService->paginate($per_page, $search)){
            return response()->json(['message' => 'the categories could not be found'], 404); 
        }
        return CategoryResource::collection($categories); 
    }
    
    public function store(CategoryRequest $request)
    {
        if(!$category = $this->categoryService->store($request)){
            return response()->json(['message' => 'it was not possible to register the category'], 404); 
        }
        return response()->json(['message' => 'category successfully registered'], 200);  
    }

    public function show($uuid)
    {
        if(!$category = $this->categoryService->show($uuid)){
            return response()->json(['message' => 'the category could not be found'], 404); 
        }
        return new CategoryResource($category);   
    }

    public function update(CategoryRequest $request, $uuid)
    {
        if(!$category = $this->categoryService->update($request, $uuid)){
            return response()->json(['message' => 'failed to update category'], 404); 
        }
        return response()->json(['message' => 'category updated successfully'], 200);  
    }

    public function destroy($uuid)
    {
        if(!$category = $this->categoryService->destroy($uuid)){
            return response()->json(['message' => 'it was not possible to delete the category '], 404); 
        }
        return response()->json(['message' => 'category successfully deleted'], 200);
    }
}
