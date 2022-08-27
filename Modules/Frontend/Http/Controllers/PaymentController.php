<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Razorpay\Api\Api;
use Exception;
use App\Models\HotelBooking;
use Illuminate\Support\Facades\Session;
use App\Models\Payment;
use Slim\Http\Response;
use Stripe\Stripe;

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
                $hotel_booking->room = $input['hotel_id'];
                $hotel_booking->rent = $payment['amount']/100;
                $hotel_booking->paid_via = $input['payment_id'];
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

    public function showStripe(Request $request)
    {

        // require_once __DIR__.'/../../../vendor/autoload.php';
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        $session = \Stripe\Checkout\Session::create([
        'line_items' => [[
            'price_data' => [
            'currency' => 'usd',
            'product_data' => [
                'name' => $request->property_name,
            ],
            'unit_amount' => $request->total_amount,
            ],
            'quantity' => 1,
        ]],
            'mode' => 'payment',
            'success_url' => 'http://127.0.0.1:8003/payment/succeeded',
            'cancel_url' => 'http://127.0.0.1:8003/cancel',
        ]);


        Session::put('paymentStripe', $session);
        return response()->json(['session' => $session], 200);
    }

    public function StripeSucceed(Request $request){
        $paymentStripe = Session::get('paymentStripe');
        dd($paymentStripe);
        if($request->type === "charge.succeeded"){
            try{

            Payment::create([
                'id' => $request->data['object']['id'],
                'amount' => $request->data['object']['amount'],
                'description' => $request->data['object']['description'],
                'user_id' => $request->data['object']['billing_details']['name']
            ]);
            } catch (\Exception $e) {
                    return $e->getMessage();
            }
        }
    }

    public function showPaypal(Request $request)
    {
        dd($request->toarray());
    }



}
