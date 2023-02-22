<?php

namespace Modules\UserSite\Http\Controllers;

use App\Models\BookingNotification;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class UserSiteController extends Controller
{
    /**
     * Notification function
     * @return \Illuminate\Http\JsonResponse
     */
    public function notification()
    {
        $userId = auth()->user()->id;
        $hotelCount = BookingNotification::where('user_id', $userId)->count();
        return response()->json(["hotelCount" => $hotelCount], 200);
    }

    /**
     * show Notification function
     *
     * @param Request $request
     *
     * @return \Illuminate\View\View
     */
    public function showNotifications(Request $request)
    {
        $userId = auth()->user()->id;
        $notifications = BookingNotification::select('hotel_id', 'user_id', 'created_at')->where('user_id', $userId)->get();
        $demos = array();
        foreach ($notifications as $key => $notification) {
            $demos[] = Hotel::with('notification', 'mainPhoto')->where('id', $notification->hotel_id)->select('id', 'user_id', 'property_name', 'UUID')->get();
        }

        $data['demos'] = $demos;
        return view('layout::user.includes.notification', $data);

    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteNotification(Request $request)
    {
        $hotel = BookingNotification::where('hotel_id', $request->hotel_id)->delete();
        return response()->json(["message" => 'notification delete successfully.'], 200);
    }
}
