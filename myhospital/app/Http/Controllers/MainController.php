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
        return view('index');
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
            return view('dashboard');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
}
