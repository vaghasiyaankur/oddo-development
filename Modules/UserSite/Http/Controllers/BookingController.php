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
        $currentDate = Carbon::now()->format('d-m-Y');
        $total_booking = HotelBooking::with('hotel')->count();
        $bookings = HotelBooking::with('hotel');
        $upcomingBooking = HotelBooking::with('hotel')->where('end_date','>', $currentDate)->count();
        $pastBooking = HotelBooking::with('hotel')->where('end_date','<', $currentDate)->count();

        $start_date = Carbon::parse($request->start_date)
                             ->format('d-m-Y');

        $end_date = Carbon::parse($request->end_date)
                             ->format('d-m-Y');

        // return HotelBooking::whereBetween('hotel_id', [
        //     $start_date, $end_date
        // ])->get();



        if($request->filter == 'upcomingBooking'){
            $bookings = $bookings->where('end_date','>=', $currentDate);
        } else if($request->filter == 'pastBooking') {
            $bookings = $bookings->where('end_date','<=', $currentDate);
        }else if($request->start_date && $request->end_date){
            $bookings = $bookings
            ->whereBetween('end_date', [
                $start_date, $end_date
            ]);
        }
        $bookings = $bookings->paginate(2);
        return view('usersite::user.booking.booking',compact('bookings','upcomingBooking','pastBooking','total_booking'));
    }

   public function bookingFilter(Request $request)
   {
        $currentDate = Carbon::now()->format('d/m/Y');

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
