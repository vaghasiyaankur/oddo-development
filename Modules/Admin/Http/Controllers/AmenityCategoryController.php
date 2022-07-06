<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\AmenitiesCategory;
use Modules\UserActivityLog\Traits\LogActivity;

class AmenityCategoryController extends Controller
{
    public function amenityCategory()
    {   
        try {
            $amenityCategories = AmenitiesCategory::paginate(10);
            $amenityCategories->setPath('amenity-category');
            return view('admin::amenityCategory.index', compact('amenityCategories'));
        }catch(\Exception $e){
            return response()->json(["message" => "Something Went Wrong"], 503);
        } 
    }

    public function addAmenityCategory(Request $request) {
        $validated   = $request->validate([
            'amenityCategory'  => 'required|unique:amenities_categories,category',
        ], [ 
            'amenityCategory.unique' => 'this Amenity category already exists.' 
        ]);

        try {
            $amenityCategories   =  new AmenitiesCategory();
            $amenityCategories->category = $request->amenityCategory;
            $amenityCategories->save();

            return response()->json(["success" => "Amenity-Category inserted Successfully"], 200);
        }catch(\Exception $e){
            return response()->json(["message" => "Something Went Wrong"], 503);
        } 
    }

    public function getList(){
        $data['amenityCategories'] = AmenitiesCategory::paginate(10);
        return view('admin::amenityCategory.category_list', $data);
    }

    public function updateAmenityCategory(Request $request, $id)
    {       
        $validated   = $request->validate([
            'category'  => 'required|unique:amenities_categories,category,'.$id.',id',
        ], [ 
            'category.unique' => 'this Amenity category already exists.' 
        ]);

        try {
            $amenityCategories = AmenitiesCategory::updateOrCreate([ 'id' => $id ], [
                'category' => $request->category
            ]);
            return response()->json(["success" => "Amenity-Category updated Successfully"], 200);
        } catch (\Exception $e) {
            return response()->json(["message" => "Something Went Wrong", "error" => $e->getMessage()], 503);
        }
    }

    public function amenityCategoryStatus(Request $request){
        $status = $request->status;
        $id     = $request->id;
        if($status == '1'){
            $amenityCategories   =  AmenitiesCategory::updateOrCreate([ 'id' => $id ], [
                'status' => 0
            ]);
            return response()->json(["message" => "Units updated Successfully"], 200);
        }else{
            $amenityCategories   =  AmenitiesCategory::updateOrCreate([ 'id' => $id ], [
                'status' => 1
            ]);
            return response()->json(["message" => "Units updated Successfully"], 200);
        }
    }

    public function deleteAmenityCategory($id) {
        try {
            $result = AmenitiesCategory::where('id',$id)->delete();
            return response()->json(["danger" => "Amenity Deleted Successfully"], 200);  
        } catch (\Exception $e) {
            return response()->json(["message" => "Something Went Wrong", "error" => $e->getMessage()], 503);
        }
    }
}
