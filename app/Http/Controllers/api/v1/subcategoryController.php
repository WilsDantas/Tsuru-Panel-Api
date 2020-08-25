<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\SubCategoryService;
use App\Http\Requests\SubCategoryRequest;
use App\Http\Resources\SubCategoryResource;


class subcategoryController extends Controller
{
    protected $subcategoryService;

    public function __construct(SubCategoryService $subcategoryService)
    {
        $this->subcategoryService = $subcategoryService;
    }

    public function index()
    {
        if(!$subcategories = $this->subcategoryService->index()){
            return response()->json(['message' => 'the sub categories could not be found'], 404); 
        }
        return SubCategoryResource::collection($subcategories); 
    }

    public function paginate($per_page = 10, $search = '')
    {
        if(!$subcategories = $this->subcategoryService->paginate($per_page, $search)){
            return response()->json(['message' => 'the sub categories could not be found'], 404); 
        }
        return SubCategoryResource::collection($subcategories); 
    }
    
    public function store(SubCategoryRequest $request)
    {
        if(!$subcategory = $this->subcategoryService->store($request)){
            return response()->json(['message' => 'it was not possible to register the sub category'], 404); 
        }
        return response()->json(['message' => 'sub category successfully registered'], 200);  
    }

    public function show($uuid)
    {
        if(!$subcategory = $this->subcategoryService->show($uuid)){
            return response()->json(['message' => 'the sub category could not be found'], 404); 
        }
        return new SubCategoryResource($subcategory);   
    }

    public function update(SubCategoryRequest $request, $uuid)
    {
        if(!$subcategory = $this->subcategoryService->update($request, $uuid)){
            return response()->json(['message' => 'failed to update sub category'], 404); 
        }
        return response()->json(['message' => 'sub category updated successfully'], 200);  
    }

    public function destroy($uuid)
    {
        if(!$subcategory = $this->subcategoryService->destroy($uuid)){
            return response()->json(['message' => 'it was not possible to delete the sub category '], 404); 
        }
        return response()->json(['message' => 'sub category successfully deleted'], 200);
    }
}
