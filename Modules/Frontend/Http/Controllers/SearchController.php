<?php

namespace Modules\Frontend\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     * @property Hotel $country
     *
     * @return Renderable
     */
    public function index()
    {
        $search = explode(',', request()->search);
        $checkIn = request()->checkIn;
        $checkOut = request()->checkOut;
        $guest = explode(',', request()->guest);
        $room = explode(',', request()->room);
        $bed = explode(',', request()->bed);
        if (count($search) != 1) {
            // $hotels = Hotel::WhereIn('country','like', '%'.$search.'%')->orWhereIn('city','like', '%'.$search.'%')->get();
            $hotels = Hotel::where(function ($query) use ($search) {
                foreach ($search as $s) {
                    $query->orWhereHas('country', function ($query2) use ($s) {
                        $query2->where('country_name', 'like', '%' . $s . '%');
                    });
                    $query->orWhereHas('city', function ($query2) use ($s) {
                        $query2->where('name', 'like', '%' . $s . '%');
                    });
                }
            })->get();
        } else {
            $hotels = Hotel::get();
        }

        return view('frontend::search.index', compact('hotels'));
    }
}
