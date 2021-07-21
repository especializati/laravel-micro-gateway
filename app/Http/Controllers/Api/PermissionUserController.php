<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;

class PermissionUserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function addPermissionUser(Request $request)
    {
        return $this->userService->addNewPermissionForUser($request->all());
    }

    public function removePermissionUser(Request $request)
    {
        return $this->userService->removePermissionForUser($request->all());
    }

    public function getPermissionsUser($identity)
    {
        return $this->userService->getPermissionsUser($identity);
    }
}
