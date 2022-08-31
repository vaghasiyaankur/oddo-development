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
use Mail;
use App\Mail\PaymentSuccess;

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
                $hotel_booking->user_id = auth()->user()->id;
                $hotel_booking->hotel_id = $input['hotel_id'];
                $hotel_booking->room_id = $input['room_id'];
                $hotel_booking->rent = $payment['amount']/100;
                $hotel_booking->payment_method_id = $input['payment_id'];
                $hotel_booking->save();

            } catch (Exception $e) {
                Session::put('error',$e->getMessage());
                return response()->json(['error' =>'error']);
            }
        }

        Mail::to(auth()->user()->email)->send(new PaymentSuccess);
        $bookingId = HotelBooking::select('UUID')->latest()->first();
        return response()->json(['bookingId' => $bookingId]);
    }

    public function showStripe(Request $request)
    {

        $paymentData = [
            'hotel_id' => $request->hotel_id,
            'payment_id' => $request->payment_id,
            'room_id' => $request->room_id
        ];

        Session::put('paymentData', $paymentData);
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
            'success_url' => 'http://127.0.0.1:8000/payment/succeeded',
            'cancel_url' => 'http://127.0.0.1:8000/cancel',
        ]);


        Session::put('paymentStripe', $session);
        return response()->json(['session' => $session], 200);
    }

    public function StripeSucceed(Request $request){
        $paymentStripe = Session::get('paymentStripe');
        $paymentData = Session::get('paymentData');
        $Payment = new Payment();
        $Payment->amount =  $paymentStripe->amount_total/100;
        $Payment->description = 'test mode';
        $Payment->user_id = auth()->user()->id;
        $Payment->payment_method_id = $paymentData['payment_id'];
        $Payment->payment_id = $paymentStripe->payment_intent;
        $Payment->hotel_id = $paymentData['hotel_id'];
        $Payment->save();
        // dd($paymentStripe->toarray());

        $hotel_booking = new HotelBooking;
        $hotel_booking->user_id = auth()->user()->id;
        $hotel_booking->hotel_id = $paymentData['hotel_id'];
        $hotel_booking->room_id = $paymentData['room_id'];
        $hotel_booking->rent = $paymentStripe->amount_total/100;
        $hotel_booking->payment_method_id = $paymentData['payment_id'];
        $hotel_booking->save();

        Mail::to(auth()->user()->email)->send(new PaymentSuccess);
        $bookingId = HotelBooking::select('UUID')->latest()->first();
        return redirect()->route('hotel.index')->with(['booking'=> $bookingId]);
    }

}
