<?php

namespace Modules\Frontend\Http\Controllers;

use App\Models\Hotel;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class WishlistController extends Controller
{
    /**
     * Display the frontend index view.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('frontend::index');
    }

    /**
     * Add a hotel to the user's wishlist.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addWishlist(Request $request)
    {
        try {
            $id = auth()->user()->id;
            $user = User::find($id);
            $hotel = Hotel::where('UUID', $request->hotelId)->first();
            $user->wish($hotel);
        } catch (\Exception$e) {
            return response()->json(["message" => "Something Went Wrong", "error" => $e->getMessage()], 503);
        }
        return response()->json(["success" => "wishlist add Successfully"], 200);
    }

    /**
     * Remove a hotel from the user's wishlist.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeWishlist(Request $request)
    {
        try {
            $id = auth()->user()->id;
            $user = User::find($id);
            $hotel = Hotel::where('UUID', $request->hotelId)->first();
            $user->unwish($hotel);
        } catch (\Exception$e) {
            return response()->json(["message" => "Something Went Wrong", "error" => $e->getMessage()], 503);
        }
        return response()->json(["success" => "wishlist remove Successfully"], 200);
    }
}
