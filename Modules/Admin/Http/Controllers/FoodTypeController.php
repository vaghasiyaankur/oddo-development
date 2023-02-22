<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\FoodType;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FoodTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the foodtype.
     * @return Renderable
     */
    public function index()
    {
        $foodTypes = FoodType::latest()->paginate(10);
        return view('admin::food.index', compact('foodTypes'));
    }

    /**
     * Store a newly created foodtype in storage.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'food' => 'required|unique:food_types,food_type',
        ], [
            'food.unique' => 'this food already exists.',
        ]);

        try {
            $food = new FoodType();
            $food->food_type = $request->food;
            $food->save();

            return response()->json(["success" => "food inserted Successfully"], 200);
        } catch (\Exception$e) {
            return response()->json(["message" => "Something Went Wrong"], 503);
        }
    }

    /**
     * Update the specified foodtype in storage.
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'editFood' => 'required|unique:food_types,food_type,' . $id . ',UUID',
        ], [
            'editFood.unique' => 'this food already exists.',
        ]);

        try {
            $food = FoodType::updateOrCreate(['UUID' => $id], [
                'food_type' => $request->editFood,
            ]);
            return response()->json(["success" => "food updated Successfully"], 200);
        } catch (\Exception$e) {
            return response()->json(["message" => "Something Went Wrong", "error" => $e->getMessage()], 503);
        }
    }

    /**
     * Remove the specified foodtype from storage.
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            $result = FoodType::where('UUID', $id)->delete();
            return response()->json(["danger" => "Food Deleted Successfully"], 200);
        } catch (\Exception$e) {
            return response()->json(["message" => "Something Went Wrong", "error" => $e->getMessage()], 503);
        }
    }

    /**
     * Update the status of the specified foodtype in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function statusFood(Request $request)
    {
        $status = $request->status;
        $id = $request->id;
        if ($status == '1') {
            $amenityCategories = FoodType::updateOrCreate(['UUID' => $id], [
                'status' => 0,
            ]);
            return response()->json(["message" => "food updated Successfully"], 200);
        } else {
            $amenityCategories = FoodType::updateOrCreate(['UUID' => $id], [
                'status' => 1,
            ]);
            return response()->json(["message" => "food updated Successfully"], 200);
        }
    }

    /**
     * Display a listing of the facilities in search.
     * @return \Illuminate\View\View
     */
    public function foodList()
    {
        $data['foodTypes'] = FoodType::latest()->paginate(10);
        return view('admin::food.foodList', $data);
    }
}
