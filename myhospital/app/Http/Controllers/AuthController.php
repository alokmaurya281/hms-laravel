<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'mobile'=>'required|numeric|min:11',
            'password'=>'required|min:6|confirmed',
            'password'=>'required',
        ]);

        if(User::where('email',$request->email)->first()){
            return Redirect::back()->withErrors(['message' => 'Email Exists']);
    

        }
        $type = 3;

        $randomstr= Str::random(10);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'type'=>$type,
            'mobile'=>$request->mobile,
            'remember_token' => $randomstr,

        ]);
       
        if($user==true){
            $getuserid =  DB::table('users')->where('email', $request->email)->value('id');

            // $create = DB::table('user_profile')->insert([
            //     'email'=>$request->email,
            //     'userid'=>$getuserid,
            //     'name'=>$request->name,
            //     'mobile'=>$request->mobile,
            // ]);

        }
        // $token = $user->createToken('Token')->accessToken;
    //     return response([
    //         'token'=>$token,
    //         'message' => 'Account Created successfully',
    //         'status' =>'success',
    //     ], 200
    // );

    return redirect('login');
    
      }


      public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
        }
  
        return redirect("login")->withSuccess('Login details are not valid');
    }


    // public function logout (Request $request) {
    //     $token = $request->user()->token();
    //     $token->revoke();
    //     $response = ['message' => 'You have been successfully logged out!'];
    //     return response($response, 200);
    // }
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
   
}
