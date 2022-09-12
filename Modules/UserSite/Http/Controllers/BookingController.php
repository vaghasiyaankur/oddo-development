<?php

namespace Modules\UserSite\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\HotelBooking;
use Carbon\Carbon;

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
    public function index(Request $request)
    {

        $currentDate = today()->format('Y-m-d');
        $total_booking = HotelBooking::with('hotel')->count();
        $bookings = HotelBooking::with('hotel');
        $upcomingBooking = HotelBooking::with('hotel')->where('start_date','>=', $currentDate)->count();
        $pastBooking = HotelBooking::with('hotel')->where('start_date','<=', $currentDate)->count();

        $start_date = Carbon::parse($request->start_date)
                             ->format('Y-m-d');

        $end_date = Carbon::parse($request->end_date)
                             ->format('Y-m-d');

        // return HotelBooking::whereBetween('hotel_id', [
        //     $start_date, $end_date
        // ])->get();

        if($request->filter == 'upcomingBooking'){
            $bookings = $bookings->where('start_date','>=', $currentDate);
        } else if($request->filter == 'pastBooking') {
            $bookings = $bookings->where('start_date','<=', $currentDate);
        }else if($request->start_date && $request->end_date){
            $bookings = $bookings
            ->whereBetween('start_date', array($request->start_date, $request->end_date));
        }
        $bookings = $bookings->paginate(2);
        return view('usersite::user.booking.booking',compact('bookings','upcomingBooking','pastBooking','total_booking'));
    }

   public function bookingFilter(Request $request)
   {
        $currentDate = Carbon::now()->format('Y-m-d');

        if($request->filter == 'All'){
            $bookings = HotelBooking::with('hotel')->paginate(2);
            $html = view('usersite::user.booking.all', compact('bookings'))->render();

        } else if($request->filter == 'upcomingBooking'){
            $bookings = HotelBooking::with('hotel')->where('end_date','>', $currentDate)->paginate(1);
            $html = view('usersite::user.booking.upcomingBooking', compact('bookings'))->render();

        } else if($request->filter == 'pastBooking') {
            $bookings = HotelBooking::with('hotel')->where('end_date','<', $currentDate)->paginate(2);
            $html = view('usersite::user.booking.pastBooking', compact('bookings'))->render();

        } else {

        }
        return $html;
   }
}
