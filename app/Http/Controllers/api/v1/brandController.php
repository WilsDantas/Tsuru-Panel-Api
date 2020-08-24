<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\BrandService;
use App\Http\Requests\BrandRequest;
use App\Http\Resources\BrandResource;


class brandController extends Controller
{
    protected $brandService;

    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
    }

    public function index()
    {
        if(!$brands = $this->brandService->index()){
            return response()->json(['message' => 'the brands could not be found'], 404); 
        }
        return BrandResource::collection($brands); 
    }

    public function paginate($per_page = 10, $search = '')
    {
        if(!$brands = $this->brandService->paginate($per_page, $search)){
            return response()->json(['message' => 'the brands could not be found'], 404); 
        }
        return BrandResource::collection($brands); 
    }
    
    public function store(BrandRequest $request)
    {
        if(!$brand = $this->brandService->store($request)){
            return response()->json(['message' => 'it was not possible to register the brand'], 404); 
        }
        return response()->json(['message' => 'brand successfully registered'], 200);  
    }

    public function show($uuid)
    {
        if(!$brand = $this->brandService->show($uuid)){
            return response()->json(['message' => 'the brand could not be found'], 404); 
        }
        return new BrandResource($brand);   
    }

    public function update(BrandRequest $request, $uuid)
    {
        if(!$brand = $this->brandService->update($request, $uuid)){
            return response()->json(['message' => 'failed to update brand'], 404); 
        }
        return response()->json(['message' => 'brand updated successfully'], 200);  
    }

    public function destroy($uuid)
    {
        if(!$brand = $this->brandService->destroy($uuid)){
            return response()->json(['message' => 'it was not possible to delete the brand '], 404); 
        }
        return response()->json(['message' => 'brand successfully deleted'], 200);
    }
}
