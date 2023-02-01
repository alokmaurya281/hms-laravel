<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Razorpay\Api\Api;
use Session;
use Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function razorpay()
    {    
        if(Auth::check()){    
        return view('payment');
        }
        return redirect()->back();
    }

    public function BookAppointmentForm(Request $request)
    {    
        if(Auth::check()){    
            $doctors = DB::table('doctors')->where('id', $request->doctor_id)->get();
        return view('bookappointment',['doctors'=>$doctors]);
        }
        return redirect()->back();
    }




    public function BookAppointment(Request $request){
        if(Auth::check()){
            $totalslot = DB::table('appointments')->where('doctor_id', $request->doctor_id)->where('appointment_date',$request->appointment_date)->count();
            // $noslots = count($totalslot);
            if($totalslot<=20){
                $appointment = DB::table('appointments')->insertGetId([
                    'doctor_id'=>$request->doctor_id,
                    'user_id'=>$request->user_id,
                    'patient_name'=>$request->patient_name,
                    'doctor_name'=>$request->doctor_name,
                    'department'=>$request->department,
                    'appointment_date'=>$request->appointment_date,
                    'mobile'=>$request->mobile,
                    'email'=>$request->email,
                    'gender'=>$request->gender,
                    'prescription'=>$request->prescription,
                    'status'=>'Pending',
                    'payment_status'=>'Pending',
                    
                ]);

            }
            else{
                return redirect('doctor')->withSuccess(' Appointment  booking failed Slots Full for the following date');

            }


           
            if(!empty($appointment)){
                $appointments=DB::table('appointments')->where('id', $appointment)->get();

                return redirect('razorpay')->with(['appointments'=>$appointments]);
    
    
            }
            else{
                return redirect('doctor')->withSuccess(' Appointment  booking failed');

            }
            
        }
       else{ 
        return redirect("login")->withSuccess('You are not allowed to access');

       }
  
       
        
    }

    public function payment(Request $request)
    {    
        if(Auth::check()){    
                $input = $request->all();        
                $api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));
                $payment = $api->payment->fetch($input['razorpay_payment_id']);

                if(count($input)  && !empty($input['razorpay_payment_id'])) 
                {
                    try 
                    {
                        $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 

                    } 
                    catch (\Exception $e) 
                    {
                        return  $e->getMessage();
                        \Session::put('error',$e->getMessage());
                        return redirect()->back();
                    }     
                    $a=$payment['amount']/100;


                $appointments = DB::table('appointments')->where('id', $request->id)->update([
                    'razorpay_payment_id'=>$input['razorpay_payment_id'],
                    'amount'=>$a,
                    'payment_status'=>'Confirmed',
                    'status'=>'Confirmed'

                    
                ]);
                // if($appointments==true){
                   return redirect('dashboard')->withSuccess('Payment successful, your appointment will be booked.');

                // }
                // else{
                //     return redirect()->back()->withSuccess('Appointment Booking Failed Payment failed');

                // }       
                }
                
                
                
                // \Session::put('success', 'Payment successful, your appointment will be booked.');
                
            }
            else{
                return redirect('login')->withSuccess('Not allowed');

            }
        }

}
