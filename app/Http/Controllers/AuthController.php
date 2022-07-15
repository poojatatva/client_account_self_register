<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try
        {
            if(Auth::attempt($request->only(['email','password']))){
                $user = Auth::user();
                $token = $user->createToken('app')->accessToken;
                //$request->header('Authorization',"Bearer ".$token);
                Session::put('email',Auth::user()->email);
                return response([
                    'message' => "Success",
                    'token' =>$token,
                    'user' => $user
                ]);                
            }           
        }
        catch (\Exception $exception){
            return response(['message' => $exception->getMessage()],400);
        }
        return response(['message' => 'Invalid Username/Password'],401);
    }
    
    public function logout(Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message'=>'You have succefuully logout'];
        return response($response,200);
    }
    
    public function user()
    {       
        return Auth::user();
    }

   // public function register(RegisterRequest $request)
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), ['name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required',
        'password_confirm' => 'required|same:password']);

        if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
        }
        try
        {
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);
            return response([
                'message' => "Success",
                'user' => $user
            ]);
        }
        catch (\Exception $exception){
            return response(['message' => $exception->getMessage()],400);
        }
    }
}