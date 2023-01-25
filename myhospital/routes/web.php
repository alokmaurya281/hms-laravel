<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DoctorsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, 'index']);
Route::get('register', [MainController::class, 'register']);
Route::get('login', [MainController::class, 'login']);
Route::get('doctor', [MainController::class, 'doctors']);
Route::get('about', [MainController::class, 'about']);
Route::get('contact', [MainController::class, 'contact']);
Route::post('contact-us',[ContactController::class, 'contactStore']);



Route::post('register',[AuthController::class, 'register']);
Route::post('login',[AuthController::class, 'login']);

Route::group(['middleware' => 'web'], function () {
    
     Route::get('dashboard',[MainController::class,'dashboard']);
     Route::get('logout',[AuthController::class,'logout']);
     Route::post('bookappointment',[PaymentController::class,'BookAppointment']);
     Route::post('book',[PaymentController::class,'BookAppointmentForm']);
    //  Route::get('bookappointment',[PaymentController::class,'BookAppointmentForm']);
     Route::get('razorpay', [PaymentController::class, 'razorpay'])->name('razorpay');
    Route::post('razorpaypayment', [PaymentController::class, 'payment'])->name('payment');
  
   });


   Route::group(['prefix' => 'admin'], function () {
    
    Route::get('/login', [AdminController::class, 'AdminView']);
   Route::post('/login', [AdminController::class, 'Adminlogin']);

   Route::group(['middleware' => 'web'], function () {
    
    Route::get('dashboard',[AdminController::class,'dashboard']);
    Route::get('logout',[AdminController::class,'logout']);
    Route::get('allusers',[AdminController::class,'AllUsers']);
    Route::post('add_users',[AdminController::class,'Addnewuser']);
    Route::post('add_doctors',[AdminController::class,'AddDoctor']);
    Route::get('edit_user',[AdminController::class,'EdituserView']);
    Route::get('managedoctors',[AdminController::class,'managedoctors']);
    Route::get('appointment',[AdminController::class,'appointment']);
    Route::get('appointments',[AdminController::class,'AppointmentList']);
    Route::get('manageservices',[AdminController::class,'manageservices']);
    // Route::get('doctorfulldetails',[AdminController::class,'doctorfulldetails']);
    Route::get('contactus',[AdminController::class,'contactus']);
    Route::post('edit_user/{id}',[AdminController::class,'Edituser']);
    Route::post('doctorfulldetail/{id}',[AdminController::class,'doctorfulldetail']);
    Route::get('doctorfulldetail',[AdminController::class,'doctorfulldetail']);
    Route::post('userfulldetail/{id}',[AdminController::class,'userfulldetail']);
    Route::get('userfulldetail',[AdminController::class,'userfulldetail']);
    Route::post('updateprofessionalimage/{id}',[AdminController::class, 'updateprofessionalimagedoctor']);
    Route::post('deletedoctor/{id}',[AdminController::class, 'deletedoctor']);
    Route::post('add_department',[AdminController::class, 'AddDepartment']);

    Route::get('edit_department',[AdminController::class,'EditDepartmentView']);
    Route::post('edit_department/{id}',[AdminController::class,'EditDepartment']);
    Route::get('edit_doctor',[AdminController::class,'EditDoctorView']);
    Route::get('contactmessages',[AdminController::class,'ContactMessage']);
    Route::post('edit_doctor/{id}',[AdminController::class,'EditDoctor']);
    Route::post('deletedepartment/{id}',[AdminController::class, 'deletedepartment']);
    Route::get('updateappointmentstatus',[AdminController::class, 'UpdateappointmentStatusForm']);
    Route::post('updateappointmentstatus',[AdminController::class, 'UpdateappointmentStatus']);

    
 
  });


  
  });


  Route::group(['prefix' => 'doctors'], function () {
    
    Route::get('/login', [DoctorsController::class, 'DoctorLoginView']);
    Route::post('/login', [DoctorsController::class, 'DoctorLogin']);

    Route::group(['middleware' => 'web'], function () {
    
    Route::get('dashboard',[DoctorsController::class,'dashboard']);
    Route::get('logout',[DoctorsController::class,'logout']);
    Route::get('updateappointmentstatus',[DoctorsController::class, 'UpdateappointmentStatusForm']);
    Route::get('profile',[DoctorsController::class, 'profile']);
    Route::post('updateappointmentstatus',[DoctorsController::class, 'UpdateappointmentStatus']);
    
 
  });
});



   