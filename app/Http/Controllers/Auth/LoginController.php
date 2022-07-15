<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Session;
use Socialite;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {     
        $result = app('App\Http\Controllers\AuthController')->login($request); 
        if($result->original['message'] == "Success")
        {
            $user = Session::get('email');
            Session::forget('login-error');
            return redirect('/home');
        }
        else
        {
            Session::put('login-error','The provided credentials do not match our records.');
            return redirect('/login');
        }
    } 
    
    public function logout()
    {
        if(session()->has('email'))
        {
            session()->pull('email');
        }
        return redirect('login');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
    
            $user = Socialite::driver('google')->stateless()->user();
     
            $finduser = User::where('google_id', $user->id)->first();
     
            if($finduser)
            {     
                Auth::login($finduser);
                Session::put('email',$finduser->email);
                return redirect('/home');
     
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('123456dummy')
                ]);
    
                Auth::login($newUser);
     
                return redirect('/home');
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function register()
    {
        $err_response = [];
        return view('register',compact('err_response'));
    }
    public function registered(Request $request)
    {
        $validator = Validator::make($request->all(), ['name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required',
        'password_confirm' => 'required|same:password']);
        $err_response = []; 
            
        if ($validator->fails()) {
            foreach ($validator->messages()->toArray() as $key => $value) { 
                $obj = new \stdClass(); 
                $err_response[$key] = $value[0];
            }
            return view('register',compact('err_response'));
        }
        $result = app('App\Http\Controllers\AuthController')->register($request); 
        if($result->original['message'] == "Success")
        {
            return view('auth.login');
        } 
    }
}
