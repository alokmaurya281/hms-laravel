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

    public function BookAppointment(Request $request){
        if(Auth::check()){

    
            $appointment = DB::table('appointments')->insertGetId([
                'doctor_id'=>$request->doctor_id,
                'user_id'=>$request->user_id,
                'appointment_time'=>$request->appointment_time,
                
            ]);
            
           
            if(!empty($appointment)){
                $appointments=DB::table('appointments')->where('id', $appointment)->get();

                return redirect('razorpay')->with(['appointments'=>$appointments]);
    
    
            }
            else{
                redirect('doctor')->withSuccess(' Appointment  booking failed');

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
                    'status'=>'Confirmed'

                    
                ]);
                // if($appointments==true){
                    redirect('dashboard')->withSuccess('Payment successful, your appointment will be booked.');

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
