<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\PermissionService;
use App\Http\Requests\PermissionRequest;
use App\Http\Resources\PermissionResource;

class permissionController extends Controller
{
    protected $permissionService;

    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
    }

    public function index()
    {
        if(!$permissions = $this->permissionService->index()){
            return response()->json(['message' => 'the permissions could not be found'], 404); 
        }
        return PermissionResource::collection($permissions); 
    }

    public function paginate($per_page = 10, $search = '')
    {
        if(!$permissions = $this->permissionService->paginate($per_page, $search)){
            return response()->json(['message' => 'the permissions could not be found'], 404); 
        }
        return PermissionResource::collection($permissions); 
    }
    
    public function store(PermissionRequest $request)
    {
        if(!$permission = $this->permissionService->store($request)){
            return response()->json(['message' => 'it was not possible to register the permission'], 404); 
        }
        return response()->json(['message' => 'permission successfully registered'], 200);  
    }

    public function show($uuid)
    {
        if(!$permission = $this->permissionService->show($uuid)){
            return response()->json(['message' => 'permission not found'], 404); 
        }
        return new PermissionResource($permission);   
    }

    public function update(PermissionRequest $request, $uuid)
    {
        if(!$permission = $this->permissionService->update($request, $uuid)){
            return response()->json(['message' => 'failed to update permission'], 404); 
        }
        return response()->json(['message' => 'permission updated successfully'], 200);  
    }

    public function destroy($uuid)
    {
        if(!$permission = $this->permissionService->destroy($uuid)){
            return response()->json(['message' => 'it was not possible to delete the permission '], 404); 
        }
        return response()->json(['message' => 'permission successfully deleted'], 200);
    }
}
