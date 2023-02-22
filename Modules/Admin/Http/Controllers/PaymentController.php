<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Payment;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the payment.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $payments = Payment::paginate(10);
        return view('admin::payment.index', compact('payments'));
    }

    /**
     * Display a listing of the payment in search.
     * @param Request $request
     *
     * @return Renderable
     */
    public function paymentList(Request $request)
    {
        $search = $request->input('search');
        $data['payments'] = Payment::with('hotel')
            ->whereHas('hotel', function ($q) use ($search) {
                $q->where('property_name', 'like', '%' . $search . '%');
            })->paginate(10);

        return view('admin::payment.paymentList', $data);
    }
}
