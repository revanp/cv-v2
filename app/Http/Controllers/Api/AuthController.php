<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Exception;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->all();

        unset($data['_token']);

        $rules = [
            'email' => ['required'],
            'password' => ['required'],
        ];

        $messages = [];

        $attributes = [
            'email' => 'Email',
            'password' => 'Password',
        ];

        $validator = Validator::make($data, $rules, $messages, $attributes);

        if($validator->fails()){
            return response()->json([
                'code' => 422,
                'success' => false,
                'message' => 'Validation error!',
                'data' => $validator->errors()
            ], 422)
            ->withHeaders([
                'Content-Type' => 'application/json'
            ]);
        }

        $credentials = $request->only('email', 'password');

        $token = Auth::guard('api')->attempt($credentials);
        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = Auth::guard('api')->user();
        return response()->json([
            'status' => 'success',
            'user' => $user,
            'authorization' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }

    public function logout()
    {
        Auth::guard('api')->logout();

        return response()->json([
            'status' =>'success',
            'message' => 'Successfully logged out'
        ]);
    }

    public function user()
    {
        return Auth::guard('api')->user();
    }
}
