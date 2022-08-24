<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Razorpay\Api\Api;
use Session;
use Exception;

class PaymentController extends Controller
{
    public function razorpayStore(Request $request)
    {
        // dd('hello');
        // $input = $request->all();
  
        // $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
  
        // $payment = $api->payment->fetch($input['razorpay_payment_id']);
  
        // if(count($input)  && !empty($input['razorpay_payment_id'])) {
        //     try {
        //         $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 
  
        //     } catch (Exception $e) {
        //         return  $e->getMessage();
        //         Session::put('error',$e->getMessage());
        //         return redirect()->back();
        //     }
        // }
          
        // Session::put('success', 'Payment successful');
        // return redirect()->back();
    }
}
