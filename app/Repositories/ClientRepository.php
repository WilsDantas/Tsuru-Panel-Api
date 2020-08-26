<?php

namespace App\Repositories;

use App\Repositories\Contracts\ClientRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use App\Models\Client;

class ClientRepository implements ClientRepositoryInterface
{
    protected $repository;

    public function __construct(Client $client)
    {
        $this->repository = $client;
    }

    public function index()
    {
        return $this->repository->all();
    }

    public function paginate($per_page, $search)
    {
        return $this->repository->where('name', 'LIKE', "%{$search}%")->latest()->paginate($per_page);
    }
    public function show($uuid)
    {
        if($client = $this->repository->with('orders')->where('uuid', $uuid)->first()){
            return $client;
        } 
    }
}