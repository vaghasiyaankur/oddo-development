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

    public function updatePaypal($UUID, Request $request)
    {
        $paymentGetways = paymentGetways::updateOrCreate([ 'UUID' => $UUID ], [
            'client_id' => $request->paypal_id,
            'client_secret_key' => $request->paypal_key,
            'api_secret_key' => $request->paypal_api_key
        ]);

        return response()->json(["success" => "paypal updated Successfully"], 200);
    }
}
