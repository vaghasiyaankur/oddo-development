<?php

namespace Modules\Frontend\Http\Controllers;

use App\Models\City;
use App\Models\Hotel;
use App\Models\LogoFavicon;
use App\Models\Partner;
use App\Models\PropertyType;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Helper\hotelListRating;

class HomeController extends Controller
{
    /**
     * Display a listing of hotels or search for hotels based on the provided criteria.
     *
     * @param Request $request
     * @return string $html|Renderable
     */
    public function index(Request $request)
    {
        $search = request()->search;
        $checkIn = request()->checkIn;
        $checkOut = request()->checkOut;
        $guest = request()->guest;
        $room = request()->room;
        request()->bed ? $bed = explode(',', request()->bed) : $bed = array('');

        if ($search) {
            $search = str_replace(',', ',', $search);

            $checkInDate = Carbon::createFromFormat('d/m/Y', request()->checkIn);
            $checkOutDate = Carbon::createFromFormat('d/m/Y', request()->checkOut);
            $hotels = Hotel::with('country', 'city', 'room', 'amenities');
            
            if (!empty($search)) {
                // Fetch hotels based on search criteria
                $hotels = $hotels
                    ->whereRelation('city', 'name', 'like', '%' . $search[0] . '%')
                    ->whereRelation('room', 'guest_stay_room', $guest)
                    ->whereRelation('room', 'number_of_room', $room)
                    ->whereDoesntHave('hotelBooking', function ($query) use ($checkInDate, $checkOutDate) {
                        return $query->where(function ($q) use ($checkInDate, $checkOutDate) {
                            return $q->whereBetween('start_date', [$checkInDate, $checkOutDate])
                                ->orWhereBetween('end_date', [$checkInDate, $checkOutDate]);
                        });
                    });
            }
            if (!empty($request['bed'])) {
                $hotels = $hotels
                    ->whereHas('hotelBed.bedType', function ($query) use ($bed) {
                        $query->whereIn('bed_type', $bed);
                    });
            }

            $hotels = $hotels->get();
            
            // Get hotel details and calculate hotel amounts
            $hotelAmounts = [];
            foreach ($hotels as $hotel) {
                $price = exchange_rate($hotel->room->price_room);
                $amount = $price * $room;
                $hotel_amount = number_format($amount);
                $hotelAmounts[] = array($hotel->id => $hotel_amount);
            }

            if ($request->ajax()) {
                $html = view('frontend::hotel.hotelResult', compact('hotels', 'hotelAmounts'))->render();
                return $html;
            }

        } else {
            $hotels = Hotel::active()->latest()->paginate(2);
            if ($request->ajax()) {
                $html = view('frontend::hotel.hotelResult', compact('hotels'))->render();
                return $html;

            }
        }

        // Fetch data for the home page, including cities, property types, and popular/recommended hotels
        $cities = City::whereFeatured(1)->active()->get();
        $propertyTypes = PropertyType::active()->get();
        $partners = Partner::get();
        
        $recommended_hotels = Hotel::whereHas('reviews')
        ->withCount('reviews')
        ->withAvg('reviews', 'total_rating')
        ->orderByDesc('reviews_avg_total_rating')
        ->where('status', 1)
        ->get();

        $popular_hotels = Hotel::whereHas('hotelBooking')->withCount('hotelBooking')
        ->with('country', function($q){
            $q->where('status', 1)->select('id', 'country_name', 'status');
        })
        ->with('city', function($q){
            $q->where('status', 1)->select('id', 'name', 'status');
        })
        ->with('room')
        ->withAvg('reviews', 'total_rating')
        ->orderByDesc('hotel_booking_count')
        ->where('status', 1)
        ->limit(3)
        ->get();
        
        return view('frontend::home.index', compact('cities', 'partners', 'propertyTypes', 'popular_hotels', 'recommended_hotels'));
    }

    /**
     * Get the first record from the "LogoFavicon" table.
     *
     * @return object $LogoFavicon.
     */
    public static function logoFavicon()
    {
        $LogoFavicon = LogoFavicon::first();
        return $LogoFavicon;
    }
}
