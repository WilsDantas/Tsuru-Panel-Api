<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\UserService;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;


class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        if(!$users = $this->userService->index()){
            return response()->json(['message' => 'the users could not be found'], 404); 
        }
        return UserResource::collection($users); 
    }

    public function paginate($per_page = 10, $search = '')
    {
        if(!$users = $this->userService->paginate($per_page, $search)){
            return response()->json(['message' => 'the users could not be found'], 404); 
        }
        return UserResource::collection($users); 
    }
    
    public function store(UserRequest $request)
    {
        if(!$user = $this->userService->store($request)){
            return response()->json(['message' => 'it was not possible to register the user'], 404); 
        }
        return response()->json(['message' => 'user successfully registered'], 200);  
    }

    public function show($uuid)
    {
        if(!$user = $this->userService->show($uuid)){
            return response()->json(['message' => 'the user could not be found'], 404); 
        }
        return new UserResource($user);   
    }

    public function update(UserRequest $request, $uuid)
    {
        if(!$user = $this->userService->update($request, $uuid)){
            return response()->json(['message' => 'failed to update user'], 404); 
        }
        return response()->json(['message' => 'user updated successfully'], 200);  
    }

    public function destroy($uuid)
    {
        if(!$user = $this->userService->destroy($uuid)){
            return response()->json(['message' => 'it was not possible to delete the user '], 404); 
        }
        return response()->json(['message' => 'user successfully deleted'], 200);
    }
}
