<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

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

        if(Auth::attempt($data)){
            return response()->json([
                'code' => 200,
                'success' => true,
                'message' => 'Welcome ' . Auth::user()->name . '!',
                'redirect' => url('admin-cms')
            ], 200)
            ->withHeaders([
                'Content-Type' => 'application/json'
            ]);
        }else{
            return response()->json([
                'code' => 401,
                'success' => false,
                'message' => 'Wrong Password!'
            ], 401)
            ->withHeaders([
                'Content-Type' => 'application/json'
            ]);
        }
    }
}
