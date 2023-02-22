<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\HotelBooking;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $bookings = HotelBooking::paginate(10);
        return view('admin::Booking.index', compact('bookings'));
    }

    /**
     *
     * Display a Booking List
     * @param Request $request
     *
     * @return \Illuminate\View\View
     */
    public function bookingList(Request $request)
    {
        $search = $request->input('search');
        $data['bookings'] = HotelBooking::with('hotel')
            ->whereHas('hotel', function ($q) use ($search) {
                $q->where('property_name', 'like', '%' . $search . '%');
            })->paginate(10);

        return view('admin::Booking.bookingList', $data);
    }

    // /**
    //  * @param Request $request
    //  *
    //  * @return [type]
    //  */
    // public function statusBooking(Request $request)
    // {
    // $status = $request->status;
    // $id     = $request->id;

    // if($status == '1'){
    //     $facility = HotelBooking::where('id', $id)->update([ 'status' => 0 ]);
    //     return response()->json(["message" => "Booking status updated Successfully"], 200);
    // }elseif($status == '2'){
    //     $facility = HotelBooking::where('id', $id)->update([ 'status' => 2 ]);
    //         return response()->json(["message" => "Booking status updated Successfully"], 200);
    // }else{
    //     $facility = HotelBooking::where('id', $id)->update([ 'status' => 1 ]);
    //     return response()->json(["message" => "Booking status updated Successfully"], 200);
    // }
    // }
}
