<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;
use Socialite;

class LoginController extends Controller
{
    public function login(Request $request)
    {        
        $result = app('App\Http\Controllers\AuthController')->login($request); 
        if($result->original['message'] == "Success")
        {
            $user = Session::get('email');
            return redirect('/home');
        }
        else
        {
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
    
            $user = Socialite::driver('google')->user();
     
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
        return view('register');
    }
    public function registered(Request $request)
    {
        $result = app('App\Http\Controllers\AuthController')->register($request); 
        if($result->original['message'] == "Success")
        {
            return view('auth.login');
        } 
    }
}
