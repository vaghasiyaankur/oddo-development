<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Hotel;
use App\Models\LogoFavicon;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{

    /**
     * This is Static function  logoFavicon
     *
     * @return object $LogoFavicon
     */
    public static function logoFavicon()
    {
        $LogoFavicon = LogoFavicon::first();
        return $LogoFavicon;
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function notification(Request $request)
    {
        $hotelCount = Notification::count();
        return response()->json(["hotelCount" => $hotelCount], 200);
    }

    /**
     * show Notification
     *
     * @param Request $request
     * @return \Illuminate\View\View.
     */
    public function showNotification(Request $request)
    {
        $notifications = Notification::select('hotel_id')->get();
        $hotels = array();

        foreach ($notifications as $key => $notification) {
            $hotels[] = Hotel::where('id', $notification->hotel_id)->select('id', 'property_name', 'UUID', 'created_at')->get();
        }

        $data['hotels'] = $hotels;
        return view('layout::admin.includes.notification', $data);
    }

    /**
     * This functin is Delete Notification
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteNotification(Request $request)
    {
        $hotel = Notification::where('hotel_id', $request->hotel_id)->delete();
        return response()->json(["message" => 'notification delete successfully.'], 200);
    }
}
