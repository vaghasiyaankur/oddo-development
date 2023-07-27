<?php

namespace Modules\Frontend\Http\Controllers;

use App\Models\Hotel;
use App\Models\User;
use App\Models\Wishlistable;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SavedController extends Controller
{
    /**
     * Display a listing of user's saved wishlists.
     *
     * @return Renderable
     */
    public function index()
    {
        $id = auth()->user()->id;
        $user = User::find($id);
        $wish = Wishlistable::where('user_id', $id)->count();
        $wishlists = [];
        if ($wish) {
            $wishlists = $user->wishlists();
        }
        return view('frontend::saved.index', compact('wishlists'));
    }

    /**
     * Remove the specified wishlist from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        try {
            $id = auth()->user()->id;
            $user = User::find($id);
            $hotel = Hotel::where('UUID', $request->hotelId)->select('id', 'UUID')->first();
            $user->unwish($hotel);
        } catch (\Exception$e) {
            return response()->json(["message" => "Something Went Wrong", "error" => $e->getMessage()], 503);
        }
        return response()->json(["success" => "wishlist remove Successfully"], 200);
    }

    /**
     * Show the user's wishlist.
     *
     * @return Renderable
     */
    public function wishlistList()
    {
        $id = auth()->user()->id;
        $user = User::find($id);
        $wish = Wishlistable::where('user_id', $id)->count();
        if ($wish) {
            $data['wishlists'] = $user->wishlists();
            return view('frontend::saved.wishlist', $data);
        }
        $data['wishlists'] = [];
        return view('frontend::saved.wishlist', $data);
    }
}
