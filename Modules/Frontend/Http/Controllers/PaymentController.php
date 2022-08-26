<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Razorpay\Api\Api;
use Session;
use Exception;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function razorpayStore(Request $request)
    {
        $input = $request->all();
  
        $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));
  
        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {

                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 

                $Payment = new Payment();
                $Payment->amount = $payment['amount'];
                $Payment->description = 'test mode';
                $Payment->user_id = auth()->user()->id;
                $Payment->payment_method_id = $input['payment_id'];
                $Payment->payment_id = $input['razorpay_payment_id'];
                $Payment->hotel_id = $input['hotel_id'];
                $Payment->save();
                
            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }
          
        Session::put('success', 'Payment successful');
        return redirect()->back();
    }
}
