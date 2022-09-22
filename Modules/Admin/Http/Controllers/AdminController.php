<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\LogoFavicon;
use App\Models\Hotel;
use App\Models\Notification;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('admin::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::create');
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
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin::edit');
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

    public static function logoFavicon()
    {
        $LogoFavicon = LogoFavicon::first();
        return $LogoFavicon;
    }

    public function notification(Request $request)
    {
        $hotelCount = Notification::count();
        return response()->json(["hotelCount" => $hotelCount], 200);
    }

    public function showNotification(Request $request)
    {
        $notifications =  Notification::select('hotel_id')->get();
        $hotels = array();
        foreach ($notifications as $key => $notification) {
            $hotels[] = Hotel::where('id', $notification->hotel_id)->select('id', 'property_name', 'UUID', 'created_at')->get();
        }

        $data['hotels'] = $hotels;
        return view('layout::admin.includes.notification', $data);
    }

    public function deleteNotification(Request $request)
    {
        $hotel = Notification::where('hotel_id',$request->hotel_id)->delete();
        return response()->json(["message" => 'notification delete successfully.'], 200);
    }
}
