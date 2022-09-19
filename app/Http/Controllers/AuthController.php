<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Activity;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class AuthController extends BaseController
{
    public function loginForm(){
        return view('pages.auth.login');
    }

    public function registerForm(){
        return view('pages.auth.register');
    }

    public function login(LoginRequest $request){
        $email = trim($request->tbEmail);
        $pass = md5($request->tbPass);

        $user = User::where('email',$email)
            ->where('password',$pass)
            ->with("role")
            ->first();
        if(!$user){
            return redirect()->back()->with("error","Wrong username or password.");
        }
        Activity::create([
            'type'=>'Login',
            'user_name'=>$user->name
        ]);
        session()->put("user",$user);
        if($user->role->role_name == 'admin'){
            return redirect()->route('admin.home');
        }
        else{
            return redirect()->route("home");
        }
    }

    public function register(RegisterRequest $request){
        $name = $request->tbName;
        $email = $request->tbEmail;
        $password = md5($request->tbPass);

        $user = new User;

        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        try{
            $res = $user->save();
            if($res){
                Activity::create([
                    'type'=>'Registered',
                    'user_name'=>$user->name
                ]);
                return redirect()->back()->with('success','Registered successfully.');
            }
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return redirect()->back()->with('error','There was an error processing your request.');

        }
    }

    public function logout(){
        Activity::create([
            'type'=>'Logged out',
            'user_name'=>session()->get('user')->name
        ]);
        session()->forget('user');

        return redirect()->route('home');
    }
}
