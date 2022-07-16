<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\AmenitiesCategory;
use App\Models\Amenities;
use Modules\UserActivityLog\Traits\LogActivity;

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
            'amenityName'  => 'required|unique:amenities,amenities',
        ], [ 
            'amenityName.unique' => 'This Amenity already exists.' 
        ]);

        try{   
            $amenity = new Amenities();
            $amenity->amenities = $request->amenityName;
            $amenity->icon = $request->amenityIcon;
            $amenity->status = $request->status;
            $amenity->amenities_category_id = $request->amenityCategory;
            $amenity->save();

            return response()->json(["success" => "Amenity Inserted Successfully"], 200);
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
            'amenityName'  => 'required|unique:amenities,amenities,'.$id.',id',
        ], [ 
            'amenityName.unique' => 'This Amenity already exists.' 
        ]);
        
        try{
            $amenity = Amenities::updateOrCreate([ 'id' => $id ], [
                'amenities' => $request->amenityName,
                'icon' => $request->amenityIcon,
                'status' => $request->status,
                'amenities_category_id' => $request->amenityCategory
            ]);
            return response()->json(["success" => "Amenity updated Successfully"], 200);
        }catch(\Exception $e){
            return response()->json(["message" => "Something Went Wrong"], 503);
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
            $result = Amenities::where('id',$id)->delete();
            return response()->json(["danger" => "Amenity deleted Successfully"], 200);
        } catch (\Exception $e) {
            return response()->json(["message" => "Something Went Wrong", "error" => $e->getMessage()], 503);
        }
    }

    public function amenityList()
    {
        $data['amenities'] = Amenities::get();
        return view('admin::Amenity.amenity_list', $data);
    }

    public function featureAmenity(Request $request) {
       $featured = $request->featured;
       $id     = $request->id;
        if($featured == '1'){
            $amenity   =  Amenities::updateOrCreate([ 'id' => $id ], [
                'featured' => 0
            ]);
            return response()->json(["message" => "Units updated Successfully"], 200);
        }else{
            $amenity   =  Amenities::updateOrCreate([ 'id' => $id ], [
                'featured' => 1
            ]);
            return response()->json(["message" => "Units updated Successfully"], 200);
        }
    }

}
