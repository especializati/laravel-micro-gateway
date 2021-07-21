<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        return $this->userService->getAllUsers($request->all());
    }

    public function store(Request $request)
    {
        return $this->userService->newUser($request->all());
    }

    public function show($identify)
    {
        return $this->userService->getUserByIdentify($identify);
    }

    public function update(Request $request, $identify)
    {
        return $this->userService->updateUser($identify, $request->all());
    }

    public function destroy($identify)
    {
        return $this->userService->deleteUser($identify);
    }
}
