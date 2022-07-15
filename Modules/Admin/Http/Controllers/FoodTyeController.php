<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\FoodType;

class FoodTyeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $foodTypes = FoodType::latest()->paginate(10);
        return view('admin::food.index', compact('foodTypes'));
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
        $validated   = $request->validate([
            'food'  => 'required|unique:food_types,food_type',
        ], [ 
            'food.unique' => 'this food already exists.' 
        ]);

        try {
            $food = new FoodType();
            $food->food_type = $request->food;
            $food->save();

            return response()->json(["success" => "food inserted Successfully"], 200);
        }catch(\Exception $e){
            return response()->json(["message" => "Something Went Wrong"], 503);
        } 
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
        $validated   = $request->validate([
            'editFood'  => 'required|unique:food_types,food_type,'.$id.',UUID',
        ], [ 
            'editFood.unique' => 'this food already exists.' 
        ]);

        try {
            $food = FoodType::updateOrCreate([ 'UUID' => $id ], [
                'food_type' => $request->editFood
            ]);
            return response()->json(["success" => "food updated Successfully"], 200);
        } catch (\Exception $e) {
            return response()->json(["message" => "Something Went Wrong", "error" => $e->getMessage()], 503);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        try {
            $result = FoodType::where('UUID',$id)->delete();
            return response()->json(["danger" => "Food Deleted Successfully"], 200);  
        } catch (\Exception $e) {
            return response()->json(["message" => "Something Went Wrong", "error" => $e->getMessage()], 503);
        }
    }

    public function statusFood(Request $request)
    {
        $status = $request->status;
        $id     = $request->id;
        if($status == '1'){
            $amenityCategories   =  FoodType::updateOrCreate([ 'UUID' => $id ], [
                'status' => 0
            ]);
            return response()->json(["message" => "food updated Successfully"], 200);
        }else{
            $amenityCategories   =  FoodType::updateOrCreate([ 'UUID' => $id ], [
                'status' => 1
            ]);
            return response()->json(["message" => "food updated Successfully"], 200);
        }
    }

    public function foodList()
    {
        $data['foodTypes'] = FoodType::latest()->paginate(10);
        return view('admin::food.foodList', $data);
    }
}
