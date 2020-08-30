<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\AuthUpdateRequest;
use App\Http\Resources\UserResource;

class authController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(RegisterRequest $request)
    {
        if(!$user = $this->authService->register($request)){
            return response()->json(['message' => 'it was not possible to register the company'], 404); 
        }
        return new UserResource($user); 
    }

    public function auth(AuthRequest $request)
    {
        if(!$auth = $this->authService->auth($request)){
            return response()->json(['errors' => ['invalid' => ["the given data was invalid. try again"]]], 422); 
        }
        $data = [
            'token' => $auth['token'],
            'user' => new UserResource($auth['user'])
        ];
        return response()->json($data); 
    }

    public function authUpdate(AuthUpdateRequest $request){
        if(!$user = $this->authService->authUpdate($request)){
            return response()->json(['message' => 'User Not Found'], 404); 
        }
        return new UserResource($user); 
    }

    public function me()
    {
        if(!$user = $this->authService->me()){
            return response()->json(['message' => 'User Not Found'], 404); 
        }
        return new UserResource($user); 
    }

    public function logout()
    {
        if(!$user = $this->authService->logout()){
            return response()->json(['message' => 'User Not Found'], 404); 
        }
        return response()->json(['message' => 'User Successfully Logged Out'], 204); 
    }
}
