<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\NewAccountRequest;
use App\Http\Resources\UserResource;
use App\Services\UsersService;
use Illuminate\Http\Request;

class AuthenticationsController extends Controller
{
    private UsersService $userService;
    public function __construct(UsersService $userService)
    {
        $this->userService = $userService;
        $this->resourceItem = UserResource::class;
    }

    public function login(LoginRequest $request)
    {
        $authData = $this->userService->login($request->validated());
        return $this->respondWithItem($authData['user'], [
            'message' => "Successfully logged in",
            'token' => $authData['token'],
            'expires_at' => $authData['expires_at']
        ]);
    }

    public function register(NewAccountRequest $request)
    {
        $registeredUser = $this->userService->register($request->validated());
        return $this->respondWithItem($registeredUser, [
            'message' => 'Account has been created successfully.'
        ]);
    }
}
