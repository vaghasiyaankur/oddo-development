<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PropertyController extends Controller
{
    /**
     * Display a listing of the hotel.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $properties = Hotel::with('propertytype')->select('property_name', 'status', 'star_rating', 'property_id', 'slug', 'id')->paginate(10);
        return view('admin::Properties.index', compact('properties'));
    }

    /**
     * Display a listing of the hotel in search.
     *
     * @param Request $request
     *
     * @return \Illuminate\View\View
     */
    public function propertyList(Request $request)
    {
        $search = $request->input('search');
        $status = $request->input('status');
        if ($status != '') {
            $data['properties'] = Hotel::with('propertytype')->where('property_name', 'like', '%' . $search . '%')
                ->where('status', $status)
                ->select('property_name', 'status', 'star_rating', 'property_id', 'slug', 'id')
                ->paginate(10);
        } else {
            $data['properties'] = Hotel::with('propertytype')->where('property_name', 'like', '%' . $search . '%')
                ->select('property_name', 'status', 'star_rating', 'property_id', 'slug', 'id')
                ->paginate(10);
        }
        // dd($data);
        return view('admin::Properties.PropertyList', $data);
    }

    /**
     * Update the status of the specified hotel in storage.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function PropertyStatus(Request $request)
    {
        $status = $request->status;
        $id = $request->id;
        if ($status == '1') {
            $property = Hotel::where('UUID', $id)->update(['status' => 0]);
            return response()->json(["success" => "facility status updated Successfully"], 200);
        } else {
            $property = Hotel::where('UUID', $id)->update(['status' => 1]);
            return response()->json(["success" => "facility status updated Successfully"], 200);
        }
    }

    /**
     * Show the specified hotel.
     *
     * @param string $slug
     *
     * @return \Illuminate\View\View.
     */
    public function SingleProperty($slug)
    {
        $hotel = Hotel::where('slug', $slug)->first();
        return view('admin::Properties.single-property', compact('hotel'));
    }
}
