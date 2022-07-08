<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Hotel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $cities = City::latest()->get();
        $countries = Country::get();
        return view('admin::location.index', compact('cities', 'countries'));
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
            'name'  => 'required|unique:cities,name',
            'file' => 'required'
        ], [ 
            'name.unique' => 'This city already exists.',
            'file.required' => 'This image field required'
        ]);

        $image_64 = $request->file;
        $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
        $replace = substr($image_64, 0, strpos($image_64, ',')+1); 
        $image = str_replace($replace, '', $image_64);     
        $image = str_replace(' ', '+', $image); 
        $imageName = 'Img_'.Str::random(10).'.'.$extension;
        $img =base64_decode($image);
        Storage::disk('public')->put('city'.'/'.$imageName, base64_decode($image));

        $city = new City();
        $city->name = $request->name;
        $city->background_image = 'city/'.$imageName;
        $city->country_id  = $request->country;
        $city->status = $request->status;
        $city->save();

        return response()->json(["success" => "Location inserted Successfully"], 200);
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
    public function destroy($uuid)
    {
        try {
            $id =  City::where('UUID',$uuid)->first('id');
            $hotel = Hotel::where('city_id',$id->id)->count();
            if($hotel != 0){
                return response()->json(["warning" => "Location not deleted"], 200);
            }else{
                $location = City::where('UUID',$uuid)->delete();
                return response()->json(["danger" => "location deleted Successfully"], 200);
            }
        } catch (\Exception $e) {
            return response()->json(["message" => "Something Went Wrong", "error" => $e->getMessage()], 503);
        }
    }

    public function locationList(){
        $data['cities'] = City::latest()->get();
        return view('admin::location.locationList', $data);
    }

    public function featuredLocation(Request $request)
    {
        $featured = $request->featured;
        $uuId     = $request->uuId;
         if($featured == '1'){
             $city   =  city::updateOrCreate([ 'UUID' => $uuId ], [
                 'featured' => 0
             ]);
             return response()->json(["message" => "city featured updated Successfully"], 200);
         }else{
             $city   =  city::updateOrCreate([ 'UUID' => $uuId ], [
                 'featured' => 1
             ]);
             return response()->json(["message" => "city featured updated Successfully"], 200);
         }
    }
}
