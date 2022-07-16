<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\BedType;
use App\Models\HotelBed;

class BedtypesController extends Controller
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
        $bedTypes = BedType::latest()->paginate(10); 
        return view('admin::bedType.index', compact('bedTypes'));
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
        'bedtype'  => 'required|unique:bed_types,bed_type',
        ], [ 
            'bedtype.unique' => 'This bed type already exists.' 
        ]);

        try {
            $bedtype   =  new BedType();
            $bedtype->bed_type = $request->bedtype;
            $bedtype->bed_size = $request->bedsize;
            $bedtype->save();

            return response()->json(["success" => "bedtype inserted Successfully"], 200);
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
            'editBedtype'  => 'required|unique:bed_types,bed_type,'.$id.',UUID',
        ], [ 
            'editBedtype.unique' => 'this bed type already exists.' 
        ]);

        try {
            $bedtype = BedType::updateOrCreate([ 'UUID' => $id ], [
                'bed_type' => $request->editBedtype,
                'bed_size' => $request->editBedSize
            ]);
            return response()->json(["success" => "bed type updated Successfully"], 200);
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
            $bedType = BedType::where('UUID',$id)->first();
            $hotelBed = HotelBed::where('bed_id',$bedType->id)->count();
            if($hotelBed != 0){
                return response()->json(["warning" => "bed not deleted"], 200);
            }else{
                $result = BedType::where('UUID',$id)->delete();
                return response()->json(["danger" => "bed Deleted Successfully"], 200);  
            }

        } catch (\Exception $e) {
            return response()->json(["message" => "Something Went Wrong", "error" => $e->getMessage()], 503);
        }
    }

    public function bedtypeList()
    {
        $data['bedTypes'] = BedType::latest()->paginate(10); 
        return view('admin::bedType.bedTypeList', $data);
    }

    public function statusBedType(Request $request)
    {
        $status = $request->status;
        $id     = $request->id;
        if($status == '1'){
            $bed = BedType::updateOrCreate([ 'UUID' => $id ], [
                'status' => 0
            ]);
            return response()->json(["message" => "bed updated Successfully"], 200);
        }else{
            $bed = BedType::updateOrCreate([ 'UUID' => $id ], [
                'status' => 1
            ]);
            return response()->json(["message" => "bed updated Successfully"], 200);
        }
    }
}
