<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Amenities;
use App\Models\AmenitiesCategory;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AmenityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $amenityCategories = AmenitiesCategory::active()->get();
        $amenities = Amenities::get();
        return view('admin::Amenity.index', compact('amenityCategories', 'amenities'));
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'amenityName' => 'required|unique:amenities,amenities',
        ], [
            'amenityName.unique' => 'This Amenity already exists.',
        ]);

        try {
            $amenity = new Amenities();
            $amenity->amenities = $request->amenityName;
            $amenity->icon = $request->amenityIcon;
            $amenity->status = $request->status;
            $amenity->amenities_category_id = $request->amenityCategory;
            $amenity->save();

            return response()->json(["success" => "Amenity Inserted Successfully"], 200);
        } catch (\Exception$e) {
            return response()->json(["message" => "Something Went Wrong"], 503);
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'amenityName' => 'required|unique:amenities,amenities,' . $id . ',id',
        ], [
            'amenityName.unique' => 'This Amenity already exists.',
        ]);

        try {
            $amenity = Amenities::updateOrCreate(['id' => $id], [
                'amenities' => $request->amenityName,
                'icon' => $request->amenityIcon,
                'status' => $request->status,
                'amenities_category_id' => $request->amenityCategory,
            ]);
            return response()->json(["success" => "Amenity updated Successfully"], 200);
        } catch (\Exception$e) {
            return response()->json(["message" => "Something Went Wrong"], 503);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            $result = Amenities::where('id', $id)->delete();
            return response()->json(["danger" => "Amenity deleted Successfully"], 200);
        } catch (\Exception$e) {
            return response()->json(["message" => "Something Went Wrong", "error" => $e->getMessage()], 503);
        }
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\View\View.
     */
    public function amenityList(Request $request)
    {
        $search = $request->input('search');
        $data['amenities'] = Amenities::where('amenities', 'LIKE', "%{$search}%")->get();
        return view('admin::Amenity.amenity_list', $data);
    }

    /**
     * Remove the specified resource from storage.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function featureAmenity(Request $request)
    {
        $featured = $request->featured;
        $id = $request->id;
        if ($featured == '1') {
            $amenity = Amenities::updateOrCreate(['id' => $id], [
                'featured' => 0,
            ]);
            return response()->json(["message" => "Units updated Successfully"], 200);
        } else {
            $amenity = Amenities::updateOrCreate(['id' => $id], [
                'featured' => 1,
            ]);
            return response()->json(["message" => "Units updated Successfully"], 200);
        }
    }
}
