<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CheckoutController extends Controller
{
    /**
     * Display the checkout page.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('frontend::checkout.index');
    }
}
