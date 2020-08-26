<?php

namespace App\Repositories;

use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use App\Models\Order;

class OrderRepository implements OrderRepositoryInterface
{
    protected $repository;

    public function __construct(Order $order)
    {
        $this->repository = $order;
    }

    public function index()
    {
        return $this->repository->all();
    }

    public function paginate($per_page, $search)
    {
        return $this->repository->where('status', 'LIKE', "%{$search}%")->latest()->paginate($per_page);
    }
    public function show($uuid)
    {
        if($order = $this->repository->where('uuid', $uuid)->first()){
            return $order;
        } 
    }

    public function update($uuid, $request)
    {
        if($order = $this->repository->where('uuid', $uuid)->first()){
            return $order->update($request->all());
        }
    }
}