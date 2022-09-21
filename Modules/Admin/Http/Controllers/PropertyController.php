<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Hotel;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $properties = Hotel::with('propertytype')->select('property_name', 'status', 'star_rating', 'property_id', 'slug', 'id')->paginate(10);
        return view('admin::Properties.index', compact('properties'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    public function propertyList(Request $request){
        $search = $request->input('search');
        $status = $request->input('status');
        if ($status != '') {
            $data['properties'] = Hotel::with('propertytype')->where('property_name','like','%'.$search.'%')
                                    ->where('status' ,$status)
                                    ->select('property_name', 'status', 'star_rating', 'property_id', 'slug', 'id')
                                    ->paginate(10);
        }else{
            $data['properties'] = Hotel::with('propertytype')->where('property_name','like','%'.$search.'%')
                                    ->select('property_name', 'status', 'star_rating', 'property_id', 'slug', 'id')
                                    ->paginate(10);
        }
        // dd($data);
        return view('admin::Properties.PropertyList', $data);
    }

    public function PropertyStatus(Request $request){
        $status = $request->status;
        $id     = $request->id;
        if($status == '1'){
            $property = Hotel::where('UUID', $id)->update([ 'status' => 0 ]);
            return response()->json(["success" => "facility status updated Successfully"], 200);
        }else{
            $property = Hotel::where('UUID', $id)->update([ 'status' => 1 ]);
            return response()->json(["success" => "facility status updated Successfully"], 200);
        }
    }

    public function SingleProperty($slug)
    {
       $hotel = Hotel::where('slug', $slug)->first();
       return view('admin::Properties.single-property', compact('hotel'));
    }
}
