<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\PaymentGetways;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PaymentGatewayController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $paymentGateways = PaymentGetways::get();
        return view('admin::paymentGateway.index', compact('paymentGateways'));
    }

    /**
     * Show paypal.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function showPaypal(Request $request)
    {
        $mode = $request->mode;
        $type = $request->type;
        $paymentGateways = PaymentGetways::where('payment_type', $type)->first();
        return response()->json(['paymentGateways' => $paymentGateways, 'mode' => $mode]);
    }

    /**
     * Update the specified paypal in storage.
     *
     * @param int $UUID
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updatePaypal($UUID, Request $request)
    {
        if ($request->paypal_mode == 'live') {
            $data = array('live_client_id' => $request->paypal_id,
                'live_client_secret_key' => $request->paypal_key,
                'live_api_secret_key' => $request->paypal_api_key,
                'mode' => $request->paypal_mode);
        } else {
            $data = array('test_client_id' => $request->paypal_id,
                'test_client_secret_key' => $request->paypal_key,
                'test_api_secret_key' => $request->paypal_api_key,
                'mode' => $request->paypal_mode);
        }

        $paymentGetways = PaymentGetways::updateOrCreate(['UUID' => $UUID], $data);

        return response()->json(["success" => "paypal updated Successfully"], 200);
    }

    /**
     * Update the specified stripe in storage.
     *
     * @param int $UUID
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateStripe($UUID, Request $request)
    {
        if ($request->stripe_mode == 'live') {
            $data = array('live_client_id' => $request->stripe_client_id,
                'live_client_secret_key' => $request->stripe_secret_key,
                'mode' => $request->stripe_mode);
        } else {
            $data = array('test_client_id' => $request->stripe_client_id,
                'test_client_secret_key' => $request->stripe_secret_key,
                'mode' => $request->stripe_mode);
        }

        $paymentGetways = PaymentGetways::updateOrCreate(['UUID' => $UUID], $data);

        return response()->json(["success" => "stripe updated Successfully"], 200);
    }

    /**
     * Show stripe.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function showStripe(Request $request)
    {
        $mode = $request->mode;
        $type = $request->type;
        $paymentGateways = PaymentGetways::where('payment_type', $type)->first();
        return response()->json(['paymentGateways' => $paymentGateways, 'mode' => $mode]);
    }

    /**
     * Update the specified razorpay in storage.
     *
     * @param int $UUID
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateRazorpay($UUID, Request $request)
    {
        if ($request->razorpay_mode == 'live') {
            $data = array('live_client_id' => $request->razor_client_id,
                'live_client_secret_key' => $request->razor_client_secret_key,
                'mode' => $request->razorpay_mode);
        } else {
            $data = array('test_client_id' => $request->razor_client_id,
                'test_client_secret_key' => $request->razor_client_secret_key,
                'mode' => $request->razorpay_mode);
        }

        $paymentGetways = PaymentGetways::updateOrCreate(['UUID' => $UUID], $data);

        return response()->json(["success" => "razorpay updated Successfully"], 200);
    }

    /**
     * show razorpay.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function showRazorpay(Request $request)
    {
        $mode = $request->mode;
        $type = $request->type;
        $paymentGateways = PaymentGetways::where('payment_type', $type)->first();
        return response()->json(['paymentGateways' => $paymentGateways, 'mode' => $mode]);
    }

    /**
     * Update the status of the specified Payment Gatways in storage.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function paymentStatus(Request $request)
    {
        $status = $request->status;
        $type = $request->type;

        $paymentGetways = PaymentGetways::updateOrCreate(['payment_type' => $type], [
            'status' => $status,
        ]);

        return response()->json(["success" => "payment gateway Successfully"], 200);
    }
}
