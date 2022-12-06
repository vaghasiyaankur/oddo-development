<?php

namespace Modules\UserSite\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\BookingNotification;
use App\Models\Hotel;
use Illuminate\Support\Facades\Auth;

class UserSiteController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('usersite::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('usersite::create');
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
        return view('usersite::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('usersite::edit');
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
    public function notification(){
            $userId = auth()->user()->id;
            $hotelCount = BookingNotification::where('user_id',$userId)->count();
            return response()->json(["hotelCount" => $hotelCount], 200);
    }
    
    public function showNotifications(Request $request){
        $userId = auth()->user()->id;
        $notifications =  BookingNotification::select('hotel_id','user_id', 'created_at')->where('user_id',$userId)->get();
        $demos = array();
        foreach ($notifications as $key => $notification) {
            $demos[] = Hotel::with('notification','mainPhoto')->where('id', $notification->hotel_id)->select('id','user_id', 'property_name', 'UUID')->get();
        }

        $data['demos'] = $demos;
        return view('layout::user.includes.notification', $data);

    }

    public function deleteNotification(Request $request){
        $hotel = BookingNotification::where('hotel_id',$request->hotel_id)->delete();
        return response()->json(["message" => 'notification delete successfully.'], 200);
    }
}
