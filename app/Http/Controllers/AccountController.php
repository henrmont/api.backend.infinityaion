<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function createAccount(Request $request) {

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
        ]);

    }

    public function checkEmailExist($email): JsonResponse {

        $user = User::where('email', $email)->get();

        return response()->json([
            "data" => $user
        ]);

    }

    public function checkUsernameExist($username): JsonResponse {

        $user = User::where('username', $username)->get();

        return response()->json([
            "data" => $user
        ]);

    }
}
