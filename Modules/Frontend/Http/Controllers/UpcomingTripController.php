<?php

namespace Modules\Frontend\Http\Controllers;

use App\Models\City;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UpcomingTripController extends Controller
{
    /**
     * Display a listing of cities.
     *
     * @return Renderable
     */
    public function index()
    {
        $cities = City::get();
        return view('frontend::upcomingTrip.index', compact('cities'));
    }
}
