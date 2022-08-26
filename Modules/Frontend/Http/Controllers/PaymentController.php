<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Razorpay\Api\Api;
use Session;
use Exception;
use App\Models\Payment;
use App\Models\HotelBooking;

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
                $Payment->amount = $payment['amount']/100;
                $Payment->description = 'test mode';
                $Payment->user_id = auth()->user()->id;
                $Payment->payment_method_id = $input['payment_id'];
                $Payment->payment_id = $input['razorpay_payment_id'];
                $Payment->hotel_id = $input['hotel_id'];
                $Payment->save();

                $hotel_booking = new HotelBooking;
                $hotel_booking->user_name = auth()->user()->name;
                $hotel_booking->hotel_id = $input['hotel_id'];
                $hotel_booking->amount = $payment['amount']/100;
                $hotel_booking->payment_method_id = $input['payment_id'];
                $hotel_booking->save();
                
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
