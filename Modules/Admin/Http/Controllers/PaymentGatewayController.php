<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\paymentGetways;

class PaymentGatewayController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $paymentGateways = paymentGetways::get();
        return view('admin::paymentGateway.index', compact('paymentGateways'));
    }

    public function showPaypal(Request $request)
    {
        $mode = $request->mode;
        $type = $request->type; 
        $paymentGateways = paymentGetways::where('payment_type', $type)->first();
        return response()->json(['paymentGateways' => $paymentGateways, 'mode' => $mode]);
    }

    public function updatePaypal($UUID, Request $request)
    {
        if($request->paypal_mode == 'live') {
            $data = array('live_client_id' => $request->paypal_id,
                'live_client_secret_key' => $request->paypal_key,
                'live_api_secret_key' => $request->paypal_api_key,
                'mode' => $request->paypal_mode);
        }else{
            $data = array('test_client_id' => $request->paypal_id,
                'test_client_secret_key' => $request->paypal_key,
                'test_api_secret_key' => $request->paypal_api_key,
                'mode' => $request->paypal_mode);
        }

        $paymentGetways = paymentGetways::updateOrCreate([ 'UUID' => $UUID ], $data);
        
        return response()->json(["success" => "paypal updated Successfully"], 200);
    }

    public function updateStripe($UUID, Request $request)
    { 
        if($request->stripe_mode == 'live') {
            $data = array('live_client_id' => $request->stripe_client_id,
                    'live_client_secret_key' => $request->stripe_secret_key,
                    'mode' => $request->stripe_mode);
        }else{
            $data = array('test_client_id' => $request->stripe_client_id,
                    'test_client_secret_key' => $request->stripe_secret_key,
                    'mode' => $request->stripe_mode);
        }
          
        $paymentGetways = paymentGetways::updateOrCreate([ 'UUID' => $UUID ], $data);

        return response()->json(["success" => "stripe updated Successfully"], 200);
    }

    public function showStripe(Request $request)
    {
        $mode = $request->mode;
        $type = $request->type; 
        $paymentGateways = paymentGetways::where('payment_type', $type)->first();
        return response()->json(['paymentGateways' => $paymentGateways, 'mode' => $mode]);
    }

    public function updateRazorpay($UUID, Request $request)
    {
        if($request->razorpay_mode == 'live') {
            $data = array('live_client_id' => $request->razor_client_id,
                    'live_client_secret_key' => $request->razor_client_secret_key,
                    'mode' => $request->razorpay_mode);
        }else{
            $data = array('test_client_id' => $request->razor_client_id,
                    'test_client_secret_key' => $request->razor_client_secret_key,
                    'mode' => $request->razorpay_mode);
        }
        
        $paymentGetways = paymentGetways::updateOrCreate([ 'UUID' => $UUID ], $data );

        return response()->json(["success" => "razorpay updated Successfully"], 200);
    }

    public function showRazorpay(Request $request)
    {
        $mode = $request->mode;
        $type = $request->type; 
        $paymentGateways = paymentGetways::where('payment_type', $type)->first();
        return response()->json(['paymentGateways' => $paymentGateways, 'mode' => $mode]);
    }
}
