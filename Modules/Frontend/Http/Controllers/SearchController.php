<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Hotel;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        // dd(request()->all());
        $search = explode(', ' , request()->search);
        $checkIn = request()->checkIn;
        $checkOut = request()->checkOut;
        $guest = explode(',' , request()->guest);
        $room = explode(',' , request()->room);
        $bed = explode(',' , request()->bed);

        if($search){
            // $hotels = Hotel::WhereIn('country','like', '%'.$search.'%')->orWhereIn('city','like', '%'.$search.'%')->get();
            $hotels = Hotel::where(function($query) use($search){
                foreach($search as $s) {
                    $query->orWhere('country', 'LIKE', "%$s%")
                          ->orWhere('city', 'LIKE', "%$s%");
                }
            })->get();
        }else{
            $hotels = Hotel::get();
        }
        return view('frontend::search.index', compact('hotels'));
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
    public function destroy($id)
    {
        //
    }
}
