<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\ProfileService;
use App\Http\Requests\ProfileRequest;
use App\Http\Resources\ProfileResource;


class profileController extends Controller
{
    protected $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    public function index()
    {
        if(!$profiles = $this->profileService->index()){
            return response()->json(['message' => 'the profiles could not be found'], 404); 
        }
        return ProfileResource::collection($profiles); 
    }

    public function paginate($per_page = 10, $search = '')
    {
        if(!$profiles = $this->profileService->paginate($per_page, $search)){
            return response()->json(['message' => 'the profile could not be found'], 404); 
        }
        return ProfileResource::collection($profiles); 
    }
    
    public function store(ProfileRequest $request)
    {
        if(!$profile = $this->profileService->store($request)){
            return response()->json(['message' => 'it was not possible to register the profile'], 404); 
        }
        return response()->json(['message' => 'profile successfully registered'], 200);  
    }

    public function show($uuid)
    {
        if(!$profile = $this->profileService->show($uuid)){
            return response()->json(['message' => 'profile not found'], 404); 
        }
        return new ProfileResource($profile);   
    }

    public function update(ProfileRequest $request, $uuid)
    {
        if(!$profile = $this->profileService->update($request, $uuid)){
            return response()->json(['message' => 'failed to update profile'], 404); 
        }
        return response()->json(['message' => 'profile updated successfully'], 200);  
    }

    public function destroy($uuid)
    {
        if(!$profile = $this->profileService->destroy($uuid)){
            return response()->json(['message' => 'it was not possible to delete the profile '], 404); 
        }
        return response()->json(['message' => 'profile successfully deleted'], 200);
    }
}
