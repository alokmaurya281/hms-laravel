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

class AdminController extends Controller
{

    public function AdminView(){
        return view('admin/index');
    }

    public function Adminlogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if(Auth::user()->type==1){

            
            return redirect()->intended('admin/dashboard')
                        ->withSuccess('Signed in');
            }
            else{
                return redirect("admin/login")->withSuccess('You are not allowed');

            }
        }
  
        return redirect("admin/login")->withSuccess('Login details are not valid');
    }


    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('admin/login');
    }


    public function dashboard()
    {
        if(Auth::check()){
            return view('admin/dashboard');
        }
  
        return redirect("admin/login")->withSuccess('You are not allowed to access');
    }

    public function managedoctors()
    {
        if(Auth::check()){
            $doctors = DB::table('doctors')->get();
            $departments = DB::table('departments')->get();
            return view('admin/managedoctors' , ['doctors'=>$doctors],['departments'=>$departments]);
        }
  
        return redirect("admin/login")->withSuccess('You are not allowed to access');
    }

    public function appointment()
    {
        if(Auth::check()){
            return view('admin/appointment');
        }
  
        return redirect("admin/login")->withSuccess('You are not allowed to access');
    }

    public function contactus()
    {
        if(Auth::check()){
            return view('admin/contactus');
        }
  
        return redirect("admin/login")->withSuccess('You are not allowed to access');
    }

    public function manageservices()
    {
        if(Auth::check()){
            $departments = DB::table('departments')->get();
            return view('admin/manageservices' , ['departments'=>$departments]);
        }
  
        return redirect("admin/login")->withSuccess('You are not allowed to access');
    }

    public function doctorfulldetails()
    {
        if(Auth::check()){
            return view('admin/doctorfulldetail');
        }
  
        return redirect("admin/login")->withSuccess('You are not allowed to access');
    }


    public function EdituserView()
    {
        if(Auth::check()){
            return view('admin/edit_users');
        }
  
        return redirect("admin/login")->withSuccess('You are not allowed to access');
    }

    public function EditDepartmentView()
    {
        if(Auth::check()){
            return view('admin/edit_department');
        }
  
        return redirect("admin/login")->withSuccess('You are not allowed to access');
    }
    public function EditDoctorView()
    {
        if(Auth::check()){
            
            return view('admin/edit_doctor');
        }
  
        return redirect("admin/login")->withSuccess('You are not allowed to access');
    }


    public function AllUsers(){
        if(Auth::check()){
            $users = User::all();
            return view('admin/allusers')->with('users', $users);
        }
  
        return redirect("admin/login")->withSuccess('You are not allowed to access');
        
    }

    public function Addnewuser(Request $request){
        if(Auth::check()){
            $request->validate([
                'name'=>'required',
                'email'=>'required|email',
                'mobile'=>'required|numeric|min:11',
                'password'=>'required|min:6',
                'password'=>'required',
                'type'=>'required',
            ]);
    
            if(User::where('email',$request->email)->first()){
                return Redirect::back()->withErrors(['message' => 'Email Exists']);
        
    
            }
            
    
            $randomstr= Str::random(10);
    
            $user = User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'type'=>$request->type,
                'mobile'=>$request->mobile,
                'remember_token' => $randomstr,
    
            ]);
           
            if($user==true){
                $getuserid =  DB::table('users')->where('email', $request->email)->value('id');

                return redirect('admin/allusers')->withSuccess('User Created SuccessFully');
    
    
            }
            
        }
  
        return redirect("admin/login")->withSuccess('You are not allowed to access');
        
    }


    public function Edituser(Request $request, $id){
        User::where('id', $id)->update(['name'=>$request->name, 'mobile'=>$request->mobile, 'email'=>$request->email]);
        return redirect("admin/allusers")->withSuccess('Updated Successfully');

    }

    public function AddDoctor(Request $request){
        if(Auth::check()){
            $request->validate([
                'department'=>'required',
                'full_name'=>'required',
                'email'=>'required|email',
                'mobile'=>'required|numeric',
                'password'=>'required|min:6',
                'gender'=>'required',
                'full_address'=>'required',
                'city'=>'required',
                'pincode'=>'required|numeric',
                'govt_id_type'=>'required',
                'id_number'=>'required',
                'profile_image'=>'required',
            ]);
    
            if(DB::table('doctors')->where('email',$request->email)->first()){
                return Redirect::back()->withErrors(['message' => 'Email Exists']);
        
    
            }

            if ($file = $request->file('profile_image')) {
                $path = $file->store('files/doctors_images');
                $name = $file->getClientOriginalName();
                
     
               
            }


    
            $doctor = DB::table('doctors')->insert([
                'department'=>$request->department,
                'name'=>$request->full_name,
                'email'=>$request->email,
                'mobile'=>$request->mobile,
                'password'=>Hash::make($request->password),
                'gender'=>$request->gender,
                'address'=>$request->full_address,
                'city'=>$request->city,
                'pincode'=>$request->pincode,
                'govt_id_type'=>$request->govt_id_type,
                'id_number'=>$request->id_number,
                'profile_image'=>$path,
            ]);
            
           
            if($doctor==true){
                $getuserid =  DB::table('doctors')->where('email', $request->email)->value('id');

                return redirect('admin/managedoctors')->withSuccess('Doctor Created SuccessFully');
    
    
            }
            else{
                return redirect('admin/managedoctors#collapseOne')->withSuccess(' Doctor Not Created SuccessFully');

            }
            
        }
  
        return redirect("admin/login")->withSuccess('You are not allowed to access');
        
    }


    public function doctorfulldetail(Request $request){
        $id = $request->id;
        $details = DB::table('doctors')->where('id', $id)->get();
            return view('admin/doctorfulldetail' , ['details'=>$details]);

    }

    public function updateprofessionalimagedoctor(Request $request){
        $id = $request->id;
        $details = DB::table('doctors')->where('id', $id)->get();
        if ($file = $request->file('professional_image')) {
            $path = $file->store('files/doctors_images');
            $name = $file->getClientOriginalName();

        }

        $update = DB::table('doctors')->where('id', $id)->update(['professional_image'=>$path]);
        if($update==true){
            return Redirect::back()->withSuccess('Image Updated',['details'=>$details]);

        }
        else{
            return Redirect::back()->withSuccess('Image not  Updated',['details'=>$details]);

        }
            

    }


    public function deletedoctor(Request $request){
        $id = $request->id;

        $delete = DB::table('doctors')->where('id', $id)->delete();
        if($delete==true){
            return redirect('admin/managedoctors')->withSuccess('Deleted Successfully');

        }
        else{
            return redirect('admin/managedoctors')->withSuccess(' not  deleted');

        }
            

    }


    public function deletedepartment(Request $request){
        $id = $request->id;

        $delete = DB::table('departments')->where('id', $id)->delete();
        if($delete==true){
            return redirect('admin/manageservices')->withSuccess('Deleted Successfully');

        }
        else{
            return redirect('admin/manageservices')->withSuccess(' not  deleted');

        }
            

    }


    public function EditDepartment(Request $request){
        $id = $request->id;
        

        $update = DB::table('departments')->where('id', $id)->update([
            'department'=>$request->department,
            'date'=>$request->date
        ]);
        if($update==true){
            return redirect('admin/manageservices')->withSuccess('details Updated');

        }
        else{
            return Redirect::back()->withSuccess('Details not  Updated');

        }
            

    }


    public function EditDoctor(Request $request, $id){
        if(Auth::check()){

            // if ($file = $request->file('profile_image')) {
            //     $path = $file->store('files/doctors_images');
            //     $name = $file->getClientOriginalName();
               
            // }
            

            $doctor = DB::table('doctors')->where('id', $id)->update([
                'department'=>$request->department,
                'name'=>$request->full_name,
                'email'=>$request->email,
                'mobile'=>$request->mobile,
                'password'=>Hash::make($request->password),
                'gender'=>$request->gender,
                'address'=>$request->full_address,
                'city'=>$request->city,
                'pincode'=>$request->pincode,
                'govt_id_type'=>$request->govt_id_type,
                'id_number'=>$request->id_number,
                // 'profile_image'=>$path,
            ]);
            
           
            if($doctor==true){
                // $getuserid =  DB::table('doctors')->where('email', $request->email)->value('id');

                return redirect("admin/doctorfulldetail?id=".$id)->withSuccess('Doctor Updated SuccessFully');
    
    
            }
            else{
                return Redirect::back()->withSuccess(' Doctor Not updated SuccessFully');

            }
            
        }
  
        return redirect("admin/login")->withSuccess('You are not allowed to access');
        
    }


    public function AddDepartment(Request $request){
        if(Auth::check()){
            $request->validate([
                'department'=>'required',
                'date'=>'required',
            ]);
    

            $dept = DB::table('departments')->insert([
                'department'=>$request->department,
                'date'=>$request->date,
                
            ]);
            
           
            if($dept==true){
                
                return redirect('admin/manageservices')->withSuccess('Department Created SuccessFully');
    
    
            }
            else{
                return redirect('admin/manageservices')->withSuccess(' Department Not Created SuccessFully');

            }
            
        }
  
        return redirect("admin/login")->withSuccess('You are not allowed to access');
        
    }


    public function ContactMessage()
    {
        if(Auth::check()){
            $contacts = DB::table('contact')->get();
            return view('admin/contactus' , ['contacts'=>$contacts]);
        }
  
        return redirect("admin/login")->withSuccess('You are not allowed to access');
    }


}