<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\AmenitiesCategory;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AmenityCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\JsonResponse
     */
    public function amenityCategory()
    {
        try {
            $amenityCategories = AmenitiesCategory::latest()->paginate(10);
            return view('admin::amenityCategory.index', compact('amenityCategories'));
        } catch (\Exception$e) {
            return response()->json(["message" => "Something Went Wrong"], 503);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addAmenityCategory(Request $request)
    {
        $validated = $request->validate([
            'amenityCategory' => 'required|unique:amenities_categories,category',
        ], [
            'amenityCategory.unique' => 'this Amenity category already exists.',
        ]);

        try {
            $amenityCategories = new AmenitiesCategory();
            $amenityCategories->category = $request->amenityCategory;
            $amenityCategories->save();

            return response()->json(["success" => "Amenity-Category inserted Successfully"], 200);
        } catch (\Exception$e) {
            return response()->json(["message" => "Something Went Wrong"], 503);
        }
    }

    /**
     * Display a listing of the amenity category.
     * @return \Illuminate\View\View.
     */
    public function getList()
    {
        $data['amenityCategories'] = AmenitiesCategory::latest()->paginate(10);
        return view('admin::amenityCategory.category_list', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateAmenityCategory(Request $request, $id)
    {
        $validated = $request->validate([
            'category' => 'required|unique:amenities_categories,category,' . $id . ',id',
        ], [
            'category.unique' => 'this Amenity category already exists.',
        ]);

        try {
            $amenityCategories = AmenitiesCategory::updateOrCreate(['id' => $id], [
                'category' => $request->category,
            ]);
            return response()->json(["success" => "Amenity-Category updated Successfully"], 200);
        } catch (\Exception$e) {
            return response()->json(["message" => "Something Went Wrong", "error" => $e->getMessage()], 503);
        }
    }

    /**
     * Update the status of the specified amenity category in storage.
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function amenityCategoryStatus(Request $request)
    {
        $status = $request->status;
        $id = $request->id;
        if ($status == '1') {
            $amenityCategories = AmenitiesCategory::updateOrCreate(['id' => $id], [
                'status' => 0,
            ]);
            return response()->json(["message" => "Units updated Successfully"], 200);
        } else {
            $amenityCategories = AmenitiesCategory::updateOrCreate(['id' => $id], [
                'status' => 1,
            ]);
            return response()->json(["message" => "Units updated Successfully"], 200);
        }
    }

    /**
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAmenityCategory($id)
    {
        try {
            $result = AmenitiesCategory::where('id', $id)->delete();
            return response()->json(["danger" => "Amenity Deleted Successfully"], 200);
        } catch (\Exception$e) {
            return response()->json(["message" => "Something Went Wrong", "error" => $e->getMessage()], 503);
        }
    }
}
