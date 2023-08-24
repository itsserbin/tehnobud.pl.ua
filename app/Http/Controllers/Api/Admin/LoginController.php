<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Services\Login\LoginService;
use Illuminate\Http\JsonResponse;

/**
 * Class LoginController
 *
 * @package App\Http\Controllers\Api\Admin
 */
class LoginController extends Controller
{

    /**
     * @var \App\Services\Login\LoginService
     */
    private LoginService $loginService;

    /**
     * LoginController constructor.
     *
     * @param  \App\Services\Login\LoginService  $loginService
     */
    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }


    /**
     * @param  \App\Http\Requests\Api\LoginRequest  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(
        LoginRequest $request
    ): JsonResponse {
        return response()->json($this->loginService->login($request->getDto()));
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(): JsonResponse
    {
        /* @var \App\Models\User $user */
        $user = auth()->user();

        return response()->json($this->loginService->logout($user));
    }

}
