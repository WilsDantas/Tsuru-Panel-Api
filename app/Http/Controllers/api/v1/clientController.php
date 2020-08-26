<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\ClientService;
use App\Http\Requests\ClientRequest;
use App\Http\Resources\ClientResource;


class clientController extends Controller
{

    protected $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    public function index()
    {
        if(!$clients = $this->clientService->index()){
            return response()->json(['message' => 'the clients could not be found'], 404); 
        }
        return ClientResource::collection($clients); 
    }

    public function paginate($per_page = 10, $search = '')
    {
        if(!$clients = $this->clientService->paginate($per_page, $search)){
            return response()->json(['message' => 'the clients could not be found'], 404); 
        }
        return ClientResource::collection($clients); 
    }

    public function show($uuid)
    {
        if(!$client = $this->clientService->show($uuid)){
            return response()->json(['message' => 'the client could not be found'], 404); 
        }
        return new ClientResource($client);   
    }
}
