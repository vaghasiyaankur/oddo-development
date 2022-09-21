<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\HotelBooking;

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
        return view('admin::Booking.index',compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
    public function bookingList(Request $request){
        $search = $request->input('search');
        $data['bookings'] = HotelBooking::with('hotel')
        ->whereHas('hotel',function($q) use ($search){  
            $q->where('property_name','like','%'.$search.'%');
        })->paginate(10);

        return view('admin::Booking.bookingList',$data);
    }

    public function statusBooking(Request $request){
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
    }
}
