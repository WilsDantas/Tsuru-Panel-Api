<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\permissionProfileService;
use App\Http\Resources\ProfileResource;

class PermissionProfileController extends Controller
{
    protected $permissionProfileService;

    public function __construct(PermissionProfileService $permissionProfileService)
    {
        $this->permissionProfileService = $permissionProfileService;
    }

    public function AttachPermissions($uuid, Request $request)
    {
        if(!$profile = $this->permissionProfileService->AttachPermissions($uuid, $request)){
            return response()->json(['message' => 'the profiles could not be found'], 404); 
        }

        return new ProfileResource($profile);  
    }
}
