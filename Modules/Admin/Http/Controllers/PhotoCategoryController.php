<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\HotelPhoto;
use App\Models\Photocategory;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PhotoCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the Phpto Category.
     * @return Renderable
     */
    public function index()
    {
        $photoCategories = Photocategory::latest()->paginate(10);
        return view('admin::photoCategory.index', compact('photoCategories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'photoCategory' => 'required|unique:photocategories,name',
        ], [
            'photoCategory.unique' => 'This photo category already exists.',
        ]);

        try {
            $Photocategory = new Photocategory();
            $Photocategory->name = $request->photoCategory;
            $Photocategory->save();
            return response()->json(["success" => "Photo Category inserted Successfully"], 200);
        } catch (\Exception$e) {
            return response()->json(["message" => "Something Went Wrong"], 503);
        }
    }

    /**
     * Update the specified photo catgory in storage.
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'photoCategory' => 'required|unique:photocategories,name,' . $id . ',id',
        ], [
            'photoCategory.unique' => 'This photo Category already exists.',
        ]);

        try {
            $Photocategory = Photocategory::updateOrCreate(['id' => $id], [
                'name' => $request->photoCategory,
            ]);
            return response()->json(["success" => "Photo Category updated Successfully"], 200);
        } catch (\Exception$e) {
            return response()->json(["error" => "Something Went Wrong"], 503);
        }
    }

    /**
     * Remove the specified photo category from storage.
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            $count = HotelPhoto::where('category_id', $id)->count();
            if ($count != 0) {
                return response()->json(["warning" => "Photo Category not deleted"], 200);
            } else {
                $roomType = Photocategory::where('id', $id)->delete();
                return response()->json(["danger" => "Photo Category deleted Successfully"], 200);
            }
        } catch (\Exception$e) {
            return response()->json(["message" => "Something Went Wrong"], 503);
        }
    }

    /**
     *Display a listing of the photo.
     * @return \Illuminate\View\View.
     */
    public function photoList()
    {
        $data['photoCategories'] = Photocategory::latest()->paginate(10);
        return view('admin::photoCategory.photoCategory_list', $data);
    }

    /**
     * Update the status of the specified photo category in storage.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function photoCategoryStatus(Request $request)
    {
        $status = $request->status;
        $id = $request->id;
        if ($status == '1') {
            $facility = Photocategory::where('id', $id)->update(['status' => 0]);
            return response()->json(["message" => "room type status updated Successfully"], 200);
        } else {
            $facility = Photocategory::where('id', $id)->update(['status' => 1]);
            return response()->json(["message" => "room type status updated Successfully"], 200);
        }
    }
}
