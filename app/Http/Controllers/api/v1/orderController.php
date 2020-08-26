<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\OrderService;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;


class OrderController extends Controller
{

    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index()
    {
        if(!$orders = $this->orderService->index()){
            return response()->json(['message' => 'the orders could not be found'], 404); 
        }
        return OrderResource::collection($orders); 
    }

    public function paginate($per_page = 10, $search = '')
    {
        if(!$orders = $this->orderService->paginate($per_page, $search)){
            return response()->json(['message' => 'the orders could not be found'], 404); 
        }
        return OrderResource::collection($orders); 
    }

    public function show($uuid)
    {
        if(!$order = $this->orderService->show($uuid)){
            return response()->json(['message' => 'the order could not be found'], 404); 
        }
        return new OrderResource($order);   
    }

    public function update($uuid, OrderRequest $request)
    {
        if(!$order = $this->orderService->update($uuid, $request)){
            return response()->json(['message' => 'the order could not be found'], 404); 
        }
        return response()->json(['message' => 'order updated successfully'], 200);  
    }
}
