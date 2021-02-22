<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    public function login(Request $request, UserService $userService)
    {
        return $userService->login($request->input('username'), $request->input('password'));
    }
    public function register(Request $request, UserService $userService)
    {
        return $userService->register($request->input('email'), $request->input('username'), $request->input('password'));
    }
}
