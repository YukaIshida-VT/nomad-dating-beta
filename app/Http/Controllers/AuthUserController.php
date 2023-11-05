<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class AuthUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $authUser = auth()->user();
        session_start();
        $token = $_SESSION['token'];
        return response([
            'user' => $authUser,
            'token' => $token
        ]);
    }
}