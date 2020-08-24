<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\ProductService;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;


class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        if(!$products = $this->productService->index()){
            return response()->json(['message' => 'the products could not be found'], 404); 
        }
        return ProductResource::collection($products); 
    }

    public function paginate($per_page = 10, $search = '')
    {
        if(!$products = $this->productService->paginate($per_page, $search)){
            return response()->json(['message' => 'the products could not be found'], 404); 
        }
        return ProductResource::collection($products); 
    }
    
    public function store(ProductRequest $request)
    {
        if(!$product = $this->productService->store($request)){
            return response()->json(['message' => 'it was not possible to register the product'], 404); 
        }
        return response()->json(['message' => 'product successfully registered'], 200);  
    }

    public function show($uuid)
    {
        if(!$product = $this->productService->show($uuid)){
            return response()->json(['message' => 'the product could not be found'], 404); 
        }
        return new ProductResource($product);   
    }

    public function update(ProductRequest $request, $uuid)
    {
        if(!$product = $this->productService->update($request, $uuid)){
            return response()->json(['message' => 'failed to update product'], 404); 
        }
        return response()->json(['message' => 'product updated successfully'], 200);  
    }

    public function destroy($uuid)
    {
        if(!$product = $this->productService->destroy($uuid)){
            return response()->json(['message' => 'it was not possible to delete the product '], 404); 
        }
        return response()->json(['message' => 'product successfully deleted'], 200);
    }
}
