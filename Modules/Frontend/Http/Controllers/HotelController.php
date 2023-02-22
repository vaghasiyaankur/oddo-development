<?php

namespace Modules\Frontend\Http\Controllers;

use AmrShawky\LaravelCurrency\Facade\Currency;
use App\Models\Amenities;
use App\Models\City;
use App\Models\GeneralSetting;
use App\Models\Hotel;
use App\Models\HotelBooking;
use App\Models\HotelPhoto;
use App\Models\PaymentGetways;
use App\Models\Photocategory;
use App\Models\Preference;
use App\Models\PropertyType;
use Carbon\Carbon;
use DB;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     * @mixin \Eloquent
     *
     * @return string $html|Renderable
     */
    public function index(Request $request)
    {
        $propertyType = $request->propertyType;
        $cityType = $request->City;

        $search = request()->search;
        $checkIn = request()->checkIn;
        $checkOut = request()->checkOut;
        $guest = request()->guest;
        $room = request()->room;
        $preference = request()->preference;
        request()->bed ? $bed = explode(',', request()->bed) : $bed = array('');
        request()->propertyTypeName ? $propertyTypeName = explode(',', request()->propertyTypeName) : $propertyTypeName = array('');

        $propertyName = request()->propertyName;
        $budgetMin = request()->budgetMin;
        $budgetMax = request()->budgetMax;
        $starRating = request()->starRating;
        $amenity = request()->amenities;
        $searchProperty = request()->searchProperty;

        $booking = HotelBooking::select('UUID')->latest()->first();

        $paymentGateways = PaymentGetways::active()->get();
        $hotelAmounts = array();

        $propertyTypes = '';
        $propertyTypeCounts = [];

        $sortby = request()->sortby;
        // $topFilter = request()->top_filter;

        if ($search) {

            $searchdata = str_replace(',', ',', $search);
            $search = preg_split("/[ ]/", $searchdata);
            // $checkInDate = Carbon::createFromFormat('d/m/Y', request()->checkIn)->format('Y-m-d');
            // $checkOutDate = Carbon::createFromFormat('d/m/Y', request()->checkOut)->format('Y-m-d');

            $checkInDate = Carbon::createFromFormat('d/m/Y', request()->checkIn);
            $checkOutDate = Carbon::createFromFormat('d/m/Y', request()->checkOut);
            $hotels = Hotel::with(array('country', 'city', 'room', 'amenities'));
            if (!empty($search)) {
                $hotels = $hotels
                // ->orwhere('property_name', 'like', '%'.$search.'%')
                // ->orWhereRelation('country', 'country_name', 'like', '%'.$search.'%')
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
            $amenity_data = explode(',', $amenity);
            $star = $starRating ? explode(',', $starRating) : '';

            if (!(empty($star))) {
                $hotels = $hotels->whereIn('star_rating', $star);
            }

            if (!empty($request['budgetMin']) && !empty($request['budgetMax'])) {

                $data = GeneralSetting::first();
                $currency = Currency::convert()->from('USD')
                    ->to($data->currency)
                    ->get();
                $con = round($currency, 2);

                $hotels = $hotels->whereHas('room', function ($query) use ($con, $budgetMin, $budgetMax) {
                    return $query->whereBetween(DB::raw('price_room *' . $con), [$budgetMin, $budgetMax]);
                });

                // ->with(['room' => function($query) use($con, $budgetMin, $budgetMax) {
                //     $query->select('id', 'hotel_id', 'smoking_policy', 'price_room', DB::raw('price_room *'.$con.' as price'))
                //     ;
                // }])
            }

            if (!empty($request['amenities'])) {
                $amenities_ids = Amenities::whereIn('slug', $amenity_data)->pluck('id')->toarray();
                $amenities_ids = implode(",", $amenities_ids);
                $hotels = $hotels->where('amenity_id', $amenities_ids);
            }

            if (!empty($request['sortby'])) {
                if ($sortby == 'low_to_high') {
                    $hotels = $hotels->join('rooms', 'hotels.id', '=', 'rooms.hotel_id')->orderBy('rooms.price_room', 'ASC');

                } elseif ($sortby == 'high_to_low') {
                    $hotels = $hotels->join('rooms', 'hotels.id', '=', 'rooms.hotel_id')->orderBy('rooms.price_room', 'DESC');

                } elseif ($sortby == 'top_review') {

                    $hotels = $hotels->join('reviews', 'hotels.id', '=', 'reviews.hotel_id')
                        ->select('hotels.*', DB::raw("count(reviews.total_rating) as review_count"))
                        ->groupBy('reviews.hotel_id')->orderBy('review_count', 'DESC');

                } else {

                }
            }

            $propertyTypeCounts = $hotels->withCount('propertytype')->active()->latest()->paginate(10);

            if ($request->has('propertyTypeName')) {
                $hotels = $hotels->whereHas('propertytype', function ($query) use ($propertyTypeName) {
                    $query->WhereIn('slug', $propertyTypeName);
                });
            }

            $hotels = $hotels->active()->latest()->paginate(10);

            $hotelAmounts = array();
            foreach ($hotels as $hotel) {
                $price = exchange_rate($hotel->room->price_room);
                $amount = $price * $room;
                $hotel_amount = number_format($amount);
                $hotelAmounts[] = array($hotel->id => $hotel_amount);
            }

            $propertyTypes = PropertyType::active()->get();
            if ($request->ajax()) {
                $html = view('frontend::hotel.hotelResult', compact('hotels', 'paymentGateways', 'booking', 'hotelAmounts', 'propertyTypes', 'propertyTypeCounts'))->render();
                return $html;
            }

        } elseif ($searchProperty) {
            $hotels = Hotel::with('room')->where('property_name', 'like', '%' . $searchProperty . '%')->active()->latest()->paginate(2);

            if ($request->ajax()) {
                $html = view('frontend::hotel.hotelResult', compact('hotels', 'paymentGateways', 'booking', 'hotelAmounts'))->render();
                return $html;
            }
        } elseif ($sortby != '' || $budgetMin != '' || $budgetMax != '' || $starRating != '' || $amenity != '' || $preference != '' || $search != '') {

            // $search = str_replace(',', ' ', $search);

            $hotels = Hotel::with('country', 'city', 'room', 'amenities');
            if (!(empty($search))) {
                $hotels = $hotels
                    ->whereRelation('city', 'name', 'like', '%' . $search . '%')
                    ->whereRelation('room', 'guest_stay_room', $guest)
                    ->whereRelation('room', 'number_of_room', $room)
                    ->whereHas('hotelBed.bedType', function ($query) use ($bed) {
                        $query->whereIn('bed_type', $bed);
                    });
                // ->orwhere('property_name', 'like', '%'.$search.'%')
                // ->orWhereRelation('country', 'country_name', 'like', '%'.$search.'%');
            }

            $amenity_data = explode(',', $amenity);
            $star = $starRating ? explode(',', $starRating) : '';

            if (!(empty($star))) {
                $hotels = $hotels->whereIn('star_rating', $star);
            }

            if (!empty($request['budgetMin']) && !empty($request['budgetMax'])) {

                $data = GeneralSetting::first();
                $currency = Currency::convert()->from('USD')
                    ->to($data->currency)
                    ->get();
                $con = round($currency, 2);

                $hotels = $hotels->whereHas('room', function ($query) use ($con, $budgetMin, $budgetMax) {
                    return $query->whereBetween(DB::raw('price_room *' . $con), [$budgetMin, $budgetMax]);
                });
                // ->with(['room' => function($query) use($con, $budgetMin, $budgetMax) {
                //     $query->select('id', 'hotel_id', 'smoking_policy', 'price_room', DB::raw('price_room *'.$con.' as price'))
                //     ;
                // }])
            }

            if (!empty($request['amenities'])) {
                $amenities_ids = Amenities::whereIn('slug', $amenity_data)->pluck('id')->toarray();
                $amenities_ids = implode(",", $amenities_ids);
                $hotels = $hotels->where('amenity_id', $amenities_ids);
            }

            if (!empty($request['sortby'])) {
                if ($sortby == 'low_to_high') {
                    $hotels = $hotels->join('rooms', 'hotels.id', '=', 'rooms.hotel_id')->orderBy('rooms.price_room', 'ASC');

                } elseif ($sortby == 'high_to_low') {
                    $hotels = $hotels->join('rooms', 'hotels.id', '=', 'rooms.hotel_id')->orderBy('rooms.price_room', 'DESC');

                } elseif ($sortby == 'top_review') {

                    $hotels = $hotels->join('reviews', 'hotels.id', '=', 'reviews.hotel_id')
                        ->select('hotels.*', DB::raw("count(reviews.total_rating) as review_count"))
                        ->groupBy('reviews.hotel_id')->orderBy('review_count', 'DESC');

                } else {

                }
            }
            $hotels = $hotels->active()->paginate(2);
            if ($request->ajax()) {
                $html = view('frontend::hotel.hotelResult', compact('hotels', 'paymentGateways', 'booking', 'hotelAmounts'))->render();
                return $html;
            }
        } else if ($propertyType) {

            $propertyType = PropertyType::whereUuid($propertyType)->select('id')->first();
            $hotels = Hotel::with('room')->whereProperty_id($propertyType->id)->paginate(2);
            if ($request->ajax()) {
                $html = view('frontend::hotel.hotelResult', compact('hotels', 'paymentGateways', 'booking', 'hotelAmounts'))->render();
                return $html;
            }

        } else if ($cityType) {
            $city = City::whereName($cityType)->select('id')->first();
            $hotels = Hotel::with('hotelBooking')->where('city_id', $city->id)->whereHas('hotelBooking')->paginate(2);
            if ($request->ajax()) {
                $html = view('frontend::hotel.hotelResult', compact('hotels', 'paymentGateways', 'booking', 'hotelAmounts'))->render();
                return $html;
            }

        } else {
            $hotels = Hotel::orderBy('id', 'DESC')->active()->paginate(2);
            if ($request->ajax()) {
                $html = view('frontend::hotel.hotelResult', compact('hotels', 'paymentGateways', 'booking', 'hotelAmounts'))->render();
                return $html;
            }
        }
        $amenities = Amenities::where('featured', 1)->active()->get();
        return view('frontend::hotel.index', compact('hotels', 'amenities', 'paymentGateways', 'booking', 'hotelAmounts', 'propertyTypes', 'propertyTypeCounts'));
    }

    /**
     * hotel Detail function
     *
     * @return Renderable
     */
    public function hotelDetail()
    {
        $slug = request()->slug;
        $hotel = Hotel::where('slug', $slug)->first();
        $hotelRating = listHotelRating($hotel->id);
        $photoCategories = Photocategory::get();
        $CategoryId = Photocategory::where('name', '!=', 'other')->pluck('id');
        $hotelPhotos = array();
        $hotelPictures = hotelPhoto::where('hotel_id', $hotel->id)->get();
        $checkImage = hotelPhoto::where('hotel_id', $hotel->id)->whereIn('category_id', $CategoryId)->exists();

        return view('frontend::hotel.hotelDetails', compact('hotel', 'hotelRating', 'photoCategories', 'hotelPhotos', 'hotelPictures', 'checkImage'));
    }

    /**
     * Hotel photo function
     *
     * @param Request $request
     *
     * @return Renderable
     */
    public function hotelPhoto(Request $request)
    {
        $Id = $request->id;
        $hotelId = $request->hotel_id;
        $categoryId = $request->category_id;
        $hotel = Hotel::where('UUID', $Id)->first();
        $hotelPhotos = HotelPhoto::where('hotel_id', $hotel->id)->where('category_id', $categoryId)->get();
        return view('frontend::hotel.photo', compact('hotel', 'hotelPhotos'));
    }

    /**
     * Hotel review function
     *
     * @param Request $request
     *
     * @return Renderable
     */
    public function hotelReview(Request $request)
    {
        $hotelId = $request->hotel_id;
        $hotel = Hotel::where('UUID', $hotelId)->first();
        if ($hotel == null) {
            $hotelRating = array(
                'review' => '',
                'rating' => '',
                'hotelData' => $hotel,
            );
        } else {
            $hotelRating = listHotelRating($hotel->id);
        }

        return view('frontend::hotel.review', compact('hotelRating'));
    }

    /**
     * Hotel payment function
     *
     * @param Request $request
     *
     * @return Renderable
     */
    public function hotelPayment(Request $request)
    {
        $paymentGateways = PaymentGetways::active()->get();
        $hotel = Hotel::whereUuid($request->hotelId)->first();
        $room = $hotel->room->number_of_room;
        // $hotel_amount = $amount * $room;
        // $amount = exchange_rate($hotel->room->price_room);
        $price = exchange_rate($hotel->room->price_room);
        $amount = $price * $room;
        $hotel_amount = number_format($amount);

        return view('frontend::hotel.payment', compact('paymentGateways', 'hotel', 'hotel_amount'));
    }

    /**
     * Hotel image function
     * @param Request $request
     *
     * @return Renderable
     */
    public function hotelImage(Request $request)
    {
        $hotel = Hotel::whereUuid($request->id)->select('id')->first();
        $data['hotelPhotos'] = HotelPhoto::whereHotel_id($hotel->id)->get();
        return view('frontend::hotel.popup-image', $data);
    }

    /**
     * Preferences function
     *
     * @return Renderable
     */
    public function preferences()
    {
        return view('frontend::hotel.preference');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function add_update_preference(Request $request)
    {
        if (Auth::user()) {
            $id = $request->preferenceId;
            // dd($id);
            $preference = Preference::updateOrCreate(['UUID' => $id], [
                'user_id' => auth()->user()->id,
                'sort_by' => $request->sort_by,
                // 'top_filter' =>$request->top_filter,
                // 'style' =>$request->style,
                'property_rating' => $request->property_class,
                'amenity_id' => $request->amenities,
                'budget_min' => $request->budgetMinimum,
                'budget_max' => $request->budgetMaximum,
            ]);

            return response()->json(['success' => 'Preference added successfully'], 200);
        }
        return response()->json(['error' => 'Something Went Wrong !!!'], 401);
    }
}
