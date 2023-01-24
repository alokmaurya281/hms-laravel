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
class DoctorsController extends Controller
{

    public function DoctorLoginView(){
        return view('doctors/index');
    }
    public function DoctorLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if(Auth::user()->type==2){

            
            return redirect()->intended('doctors/dashboard')
                        ->withSuccess('Signed in');
            }
            else{
                return redirect("doctors/login")->withSuccess('You are not allowed');

            }
        }
  
        return redirect("doctors/login")->withSuccess('Login details are not valid');
    }


    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('doctors/login');
    }


    public function dashboard()
    {
        if(Auth::check()){
            $doctor_id = Auth::user()->id;
            $app_lists = DB::table('appointments')->where('doctor_id', $doctor_id)->get();
            return view('doctors/dashboard',['app_lists'=>$app_lists]);
        }
  
        return redirect("doctors/login")->withSuccess('You are not allowed to access');
    }


}
