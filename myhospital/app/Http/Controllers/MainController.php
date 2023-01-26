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

class MainController extends Controller
{
    public function index(){
        $doctors = DB::table('doctors')->get();
        return view('index', ['doctors'=>$doctors]);
    }

    public function register(){
        return view('register');
    }

    
    public function login(){
        return view('login');
    }
    

    public function doctors(){
        $doctors = DB::table('doctors')->get();
        return view('doctars', ['doctors'=>$doctors]);
    }

    


    public function about(){
        return view('about');
    }
    public function contact(){
        return view('contact');
    }

    public function dashboard()
    {
        if(Auth::check()){

            $appointments = DB::table('appointments')->where('user_id', Auth::user()->id)->get();
            
            return view('dashboard',['appointments'=>$appointments]);
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }


    public function userprofile()
    {
        if(Auth::check()){

            
            return view('userprofile');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
}
