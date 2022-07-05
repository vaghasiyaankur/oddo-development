<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Facilities;

class FacilitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $facilities = Facilities::get();
        return view('admin::facilities.index', compact('facilities'));
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
        $faclity = new Facilities();
        $faclity->facilities_name = $request->faclityName;
        $faclity->icon = $request->faclityIcon;
        $faclity->color = $request->facilityColor;
        $faclity->description = $request->facilityDescription;
        $faclity->save();
        return response()->json(["message" => "Facility created Successfully"]);
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
        try{
            $amenity = Facilities::where('id', $id)->update([
                'facilities_name' => $request->editFaclityName,
                'color' => $request->editFacilityColor,
                'icon' => $request->editFaclityIcon,
                'description' => $request->editFacilityDescription
            ]);
            return response()->json(["message" => "facility updated Successfully"], 200);
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
            $result = Facilities::where('id',$id)->delete();
            return response()->json(["message" => "facility deleted Successfully"], 200);
        } catch (\Exception $e) {
            return response()->json(["message" => "Something Went Wrong", "error" => $e->getMessage()], 503);
        }
    }

    public function facilitiesList(){
        $data['facilities'] = Facilities::get();
        return view('admin::facilities.facilities_list', $data);
    }

    public function statusFacility(Request $request){
        $status = $request->status;
        $id     = $request->id;

        if($status == '1'){
            $facility = Facilities::where('id', $id)->update([ 'status' => 0 ]);
            return response()->json(["message" => "facility status updated Successfully"], 200);
        }else{
            $facility = Facilities::where('id', $id)->update([ 'status' => 1 ]);
            return response()->json(["message" => "facility status updated Successfully"], 200);
        }
    }
}
