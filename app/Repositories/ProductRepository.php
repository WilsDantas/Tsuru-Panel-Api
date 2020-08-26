<?php

namespace App\Repositories;

use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use App\Models\{
    Product,
    SubCategory,
    Brand,
};
use Illuminate\Support\Facades\Storage;

class ProductRepository implements ProductRepositoryInterface
{
    protected $repository, $SubCategory, $Brand;

    public function __construct(Product $product, SubCategory $subCategory, Brand $brand)
    {
        $this->repository = $product;
        $this->subCategory = $subCategory;
        $this->brand = $brand;
    }

    public function index()
    {
        return $this->repository->orderBy('id')->get();
    }

    public function paginate($per_page, $search)
    {
        return $this->repository->orderBy('id')->where('name', 'LIKE', "%{$search}%")->latest()->paginate($per_page);
    }
    
    public function store($request)
    {
        if(!$subCategory = $this->subCategory->where('uuid', $request->sub_category)->first()){
            return false;
        }
        if(!$brand = $this->brand->where('uuid', $request->brand)->first()){
            return false;
        }

        $data = $request->all();
        $data['sub_category_id'] = $subCategory->id;
        $data['brand_id'] = $brand->id;

        $product = $this->repository->create($data); 
        foreach($request->images as $image){
            if($image->isValid()){
                $data['image'] = $image->store("products");
            }
            $product->product_images()->create($data);
        };

        $product->detail()->create($request->all());
        return $product;
    }

    public function show($uuid)
    {
        if($product = $this->repository->where('uuid', $uuid)->first()){
            return $product;
        } 
    }

    public function update($request, $uuid)
    {
        if($product = $this->repository->where('uuid', $uuid)->first()){
            if(!$subCategory = $this->subCategory->where('uuid', $request->sub_category)->first()){
                return false;
            }
            if(!$brand = $this->brand->where('uuid', $request->brand)->first()){
                return false;
            }
    
            $data = $request->all();

            $data['sub_category_id'] = $subCategory->id;
            $data['brand_id'] = $brand->id;
            if(count($product->product_images) > 0){
                foreach($product->product_images as $image){
                    if(Storage::exists($image->image)) {
                        Storage::delete($image->image);
                    }
                }
                $product->product_images()->delete();
            }
            
            $product->detail->update($request->all());

            $product = $product->update($data); 

            if($request->images){
                foreach($request->images as $image){
                    if($image->isValid()){
                        $data['image'] = $image->store("products");
                    }
                    $product->product_images()->create($data);
                };
            }

            return $product;
        }
    }

    public function destroy($uuid)
    {
        
        if($product = $this->repository->where('uuid', $uuid)->first()){
            if(count($product->product_images) > 0){
                foreach($product->product_images as $image){
                    if(Storage::exists($image->image)) {
                        Storage::delete($image->image);
                    }
                }
                $product->product_images()->delete();
            }
            return $product->delete();
        }
    }
}