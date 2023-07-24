<?php

namespace Modules\UserSite\Http\Controllers;

use App\Models\Hotel;
use App\Models\HotelPhoto;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $userId = auth()->user()->id;
        $hotels = Hotel::where('user_id', $userId)
        ->withCount('review')
        ->withAvg('review', 'total_rating')->get();
        return view('usersite::home.index', compact('hotels'));
    }

    /**
     * Property List function
     * @return Renderable
     */
    public function propertyList()
    {
        $userId = auth()->user()->id;
        $data['hotels'] = Hotel::where('user_id', $userId)->get();
        return view('usersite::home.property', $data);
    }

    /**
     * Image Show Function
     * @param Request $request
     *
     * @return Renderable
     */
    public function imageShow(Request $request)
    {
        $userId = auth()->user()->id;
        $hotel = Hotel::whereUuid($request->id)->select('id')->first();
        $data['hotelPhotos'] = HotelPhoto::whereHotel_id($hotel->id)->get();
        return view('usersite::home.popup-image', $data);
    }
}
