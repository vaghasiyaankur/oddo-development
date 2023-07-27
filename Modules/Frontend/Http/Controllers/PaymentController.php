<?php

namespace Modules\Frontend\Http\Controllers;

use App\Mail\PaymentSuccess;
use App\Models\BookingNotification;
use App\Models\HotelBooking;
use App\Models\Payment;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Mail;
use Razorpay\Api\Api;
use Slim\Http\Response;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{
    /**
     * Store Razorpay data after payment completion.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function razorpayStore(Request $request)
    {
        $input = $request->all();
        $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));

        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        $start_date = Carbon::createFromFormat('d/m/Y', $input['start_date'])->format('Y-m-d');
        $end_date = Carbon::createFromFormat('d/m/Y', $input['end_date'])->format('Y-m-d');

        $shift_difference = Carbon::parse($end_date)->diffInDays($start_date);

        if (count($input) && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
                $Payment = new Payment();
                $Payment->amount = $payment['amount'] / 100;
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
                $hotel_booking->rent = $payment['amount'] / 100;
                $hotel_booking->payment_method_id = $input['payment_id'];
                $hotel_booking->start_date = $start_date;
                $hotel_booking->end_date = $end_date;
                $hotel_booking->day_diff = $shift_difference;
                $hotel_booking->save();

            } catch (Exception $e) {
                Session::put('error', $e->getMessage());
                return response()->json(['error' => 'error']);
            }
        }

        $id = '';
        $notification = BookingNotification::updateOrCreate(['id' => $id], [
            'hotel_id' => $input['hotel_id'],
            'user_id' => auth()->user()->id,
        ]);

        Mail::to(auth()->user()->email)->send(new PaymentSuccess);
        $bookingId = HotelBooking::select('UUID')->latest()->first();
        return response()->json(['bookingId' => $bookingId]);
    }

    /**
     * Show the Stripe payment page.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function showStripe(Request $request)
    {

        $paymentData = [
            'hotel_id' => $request->hotel_id,
            'payment_id' => $request->payment_id,
            'room_id' => $request->room_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
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
            'success_url' => route('succeed.stripe'),
            'cancel_url' => route('cancel.stripe'),
        ]);

        Session::put('paymentStripe', $session);
        return response()->json(['session' => $session], 200);
    }

    /**
     * Handle the cancellation of a Stripe payment and redirect back.
     *
     * @return Illuminate\Http\RedirectResponse
     */
    public function cancelStripe()
    {
        return redirect()->back();
    }

    /**
     * Handle the successful payment from Stripe and save the payment details.
     *
     * @param Request $request
     * @return Illuminate\Http\RedirectResponse
     */
    public function StripeSucceed(Request $request)
    {
        $paymentStripe = Session::get('paymentStripe');
        $paymentData = Session::get('paymentData');

        $start_date = Carbon::createFromFormat('d/m/Y', $paymentData['start_date'])->format('Y-m-d');
        $end_date = Carbon::createFromFormat('d/m/Y', $paymentData['end_date'])->format('Y-m-d');

        $shift_difference = Carbon::parse($end_date)->diffInDays($start_date);

        $Payment = new Payment();
        $Payment->amount = $paymentStripe->amount_total / 100;
        $Payment->description = 'test mode';
        $Payment->user_id = auth()->user()->id;
        $Payment->payment_method_id = $paymentData['payment_id'];
        $Payment->payment_id = $paymentStripe->payment_intent;
        $Payment->hotel_id = $paymentData['hotel_id'];
        $Payment->save();

        $hotel_booking = new HotelBooking;
        $hotel_booking->user_id = auth()->user()->id;
        $hotel_booking->hotel_id = $paymentData['hotel_id'];
        $hotel_booking->room_id = $paymentData['room_id'];
        $hotel_booking->rent = $paymentStripe->amount_total / 100;
        $hotel_booking->payment_method_id = $paymentData['payment_id'];
        $hotel_booking->start_date = $start_date;
        $hotel_booking->end_date = $end_date;
        $hotel_booking->day_diff = $shift_difference;
        $hotel_booking->save();

        $id = '';
        $notification = BookingNotification::updateOrCreate(['id' => $id], [
            'hotel_id' => $paymentData['hotel_id'],
            'user_id' => auth()->user()->id,
        ]);

        Mail::to(auth()->user()->email)->send(new PaymentSuccess);
        $bookingId = HotelBooking::select('UUID')->latest()->first();
        return redirect()->route('hotel.index')->with(['booking' => $bookingId]);
    }

    /**
     * Redirect to the hotel index page after creating a PayPal payment.
     *
     * @return Illuminate\Http\RedirectResponse
     */
    public function createpaypal()
    {
        return redirect()->route('hotel.index');
    }

    /**
     * Process PayPal payment.
     *
     * @param Request $request
     * @return Illuminate\Http\RedirectResponse
     */
    public function processPaypal(Request $request)
    {
        $paymentPayPal = [
            'hotel_id' => $request->hotel_id,
            'payment_id' => $request->payment_id,
            'room_id' => $request->room_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ];
        Session::put('paymentPayPal', $paymentPayPal);

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "status" => "COMPLETED",
            "application_context" => [
                "return_url" => route('processSuccess'),
                "cancel_url" => route('processCancel'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $request->amount,
                    ],
                ],
            ],
        ]);
        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->back()
                ->with('error', 'Something went wrong.');

        } else {
            return redirect()
                ->back()
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    /**
     * Handle the successful payment response from PayPal.
     *
     * @param Request $request
     * @return Illuminate\Http\RedirectResponse
     */
    public function processSuccess(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        $paymentPayPal = Session::get('paymentPayPal');
        $start_date = Carbon::createFromFormat('d/m/Y', $paymentPayPal['start_date'])->format('Y-m-d');
        $end_date = Carbon::createFromFormat('d/m/Y', $paymentPayPal['end_date'])->format('Y-m-d');
        $shift_difference = Carbon::parse($end_date)->diffInDays($start_date);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $result = $response;
            $amount = $result['purchase_units'][0]['payments']['captures'][0]['amount']['value'];

            $Payment = new Payment();
            $Payment->amount = $amount;
            $Payment->description = 'test mode';
            $Payment->user_id = auth()->user()->id;
            $Payment->payment_method_id = $paymentPayPal['payment_id'];
            $Payment->payment_id = '123';
            $Payment->hotel_id = $paymentPayPal['hotel_id'];
            $Payment->save();

            $hotel_booking = new HotelBooking;
            $hotel_booking->user_id = auth()->user()->id;
            $hotel_booking->hotel_id = $paymentPayPal['hotel_id'];
            $hotel_booking->room_id = $paymentPayPal['room_id'];
            $hotel_booking->rent = $amount;
            $hotel_booking->payment_method_id = $paymentPayPal['payment_id'];
            $hotel_booking->start_date = $start_date;
            $hotel_booking->end_date = $end_date;
            $hotel_booking->day_diff = $shift_difference;
            $hotel_booking->save();

            $id = '';
            $notification = BookingNotification::updateOrCreate(['id' => $id], [
                'hotel_id' => $paymentPayPal['hotel_id'],
                'user_id' => auth()->user()->id,
            ]);

            Mail::to(auth()->user()->email)->send(new PaymentSuccess);
            $bookingId = HotelBooking::select('UUID')->latest()->first();
            return redirect()->route('hotel.index')->with(['booking' => $bookingId]);
        } else {
            return redirect()
                ->route('hotel.index')
                ->with(['error' => $bookingId]);
        }
    }

    /**
     * Handle the cancellation of the PayPal payment.
     *
     * @param Request $request
     * @return Illuminate\Http\RedirectResponse
     */
    public function processCancel(Request $request)
    {
        return redirect()
            ->route('createpaypal')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }
}
