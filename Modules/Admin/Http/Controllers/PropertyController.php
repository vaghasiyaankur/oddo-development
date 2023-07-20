<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PropertyController extends Controller
{
    /**
     * Display a listing of the hotels.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $properties = Hotel::with('propertytype')
            ->select('property_name', 'status', 'star_rating', 'property_id', 'slug', 'id', 'reject_reason')
            ->paginate(10);

        return view('admin::Properties.index', compact('properties'));
    }

    /**
     * Display a listing of the hotels based on search criteria.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function propertyList(Request $request)
    {
        $search = $request->input('search');
        $status = $request->input('status');

        $query = Hotel::with('propertytype')
            ->where('property_name', 'like', '%' . $search . '%');

        if ($status != '') {
            $query->where('status', $status);
        }

        $data['properties'] = $query->select('property_name', 'status', 'star_rating', 'property_id', 'slug', 'id', 'reject_reason')
            ->paginate(10);

        return view('admin::Properties.PropertyList', $data);
    }

    /**
     * Update the status of the specified hotel in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function PropertyStatus(Request $request)
    {
        $status = $request->status;
        $id = $request->id;

        $newStatus = $status == '1' ? '0' : '1';

        Hotel::where('UUID', $id)->update(['status' => $newStatus]);

        return response()->json(["success" => "facility status updated Successfully"], 200);
    }

    /**
     * Show the specified hotel.
     *
     * @param string $slug
     * @return \Illuminate\View\View
     */
    public function SingleProperty($slug)
    {
        $hotel = Hotel::where('slug', $slug)->first();
        return view('admin::Properties.single-property', compact('hotel'));
    }

     /**
     * Update the status of the property hotel in the database to approve it.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function approveProperty(Request $request)
    {
        $property = Hotel::find($request->id);

        if ($property && $property->status == 0) {
            $property->update(['status' => 1]);
            return response()->json(['success' => 'Property Approved Successfully!!!'], 200);
        }

        return response()->json(['error' => 'Property not found or already approved.'], 404);
    }

    /**
     * Update the reject reason and status of the property hotel in the database to reject it.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function propertyReject(Request $request)
    {
        $property = Hotel::find($request->id);

        if ($property) {
            $property->update(['reject_reason' => $request->reject_reason, 'status' => 0]);
            return response()->json(['success' => 'Property Rejected Successfully!!!'], 200);
        }

        return response()->json(['error' => 'Property not found.'], 404);
    }
}
