<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Hotel;
use App\Models\Wishlistable;

class SavedController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index() {
        $id = auth()->user()->id;
        $user = User::find($id);
        $wish = Wishlistable::where('user_id', $id)->count();
        $wishlists = [];
        if($wish){
            $wishlists = $user->wishlists();
        }
        return view('frontend::saved.index', compact('wishlists'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('testing::create');
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
        return view('testing::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('testing::edit');
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
    public function destroy(Request $request)
    {
        try {
            $id = auth()->user()->id;
            $user = User::find($id);
            $hotel = Hotel::where('UUID',$request->hotelId)->first();
            $user->unwish($hotel);
        } catch (\Exception $e) {
            return response()->json(["message" => "Something Went Wrong", "error" => $e->getMessage()], 503);
        }
        return response()->json(["success" => "wishlist remove Successfully"], 200);
    }

    public function wishlistList()
    {
        $id = auth()->user()->id;
        $user = User::find($id);
        $wish = Wishlistable::where('user_id', $id)->count();
        if($wish){
            $data['wishlists'] = $user->wishlists();
            return view('frontend::saved.wishlist', $data);
        }
        $data['wishlists'] = [];
        return view('frontend::saved.wishlist', $data);
    }
}
