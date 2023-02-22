<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Hotel;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LocationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the city.
     * @return Renderable
     */
    public function index()
    {
        $cities = City::latest()->get();
        $countries = Country::get();
        return view('admin::location.index', compact('cities', 'countries'));
    }

    /**
     * Store a newly created city in storage.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:cities,name',
            'file' => 'required',
        ], [
            'name.unique' => 'This city already exists.',
            'file.required' => 'This image field required',
        ]);

        $image_64 = $request->file;

        $image_parts = explode(';base64,', $image_64);
        $image_type_aux = explode("image/", $image_parts[0]);
        $extension = $image_type_aux[1];
        $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
        $image = str_replace($replace, '', $image_64);
        $image = str_replace(' ', '+', $image);
        $imageName = 'Img_' . Str::random(10) . '.' . $extension;
        $img = '';
        if (is_string($image)) {
            $img = base64_decode($image);
        }
        Storage::disk('public')->put('city' . '/' . $imageName, $img);

        $city = new City();
        $city->name = $request->name;
        $city->background_image = 'city/' . $imageName;
        $city->country_id = $request->country;
        $city->status = $request->status;
        $city->save();

        return response()->json(["success" => "Location inserted Successfully"], 200);
    }

    /**
     * Show the form for editing the specified city.
     * @param int $id
     * @return \Illuminate\View\View
     */
    // public function edit($id)
    // {
    //     // $city = City::where('UUID', $id)->first();
    //     // $countries = Country::get();
    //     // return view('admin::location.edit', compact('city', 'countries'));
    // }

    /**
     * Update the specified city in storage.
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|unique:cities,name,' . $id . ',UUID',
            'image' => 'required',
            'file' => 'required_if:image,==,1',
        ], [
            'name.unique' => 'This city already exists.',
            'file.required_if' => 'This image field required',
        ]);
        $city = City::where('UUID', $id)->first();
        $imageName = $city->background_image;
        if ($request->file) {
            $image_64 = $request->file;
            $image_parts = explode(';base64,', $image_64);
            $image_type_aux = explode("image/", $image_parts[0]);
            $extension = $image_type_aux[1];
            $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
            $image = str_replace($replace, '', $image_64);
            $image = str_replace(' ', '+', $image);
            $imageName = 'city/Img_' . Str::random(10) . '.' . $extension;
            $img = '';
            if (is_string($image)) {
                $img = base64_decode($image);
            }
            Storage::disk('public')->put($imageName, $img);

            $image_path = public_path('storage/' . $city->background_image);
            if (File::exists($image_path)) {
                unlink($image_path);
            }
        }

        $city->name = $request->name;
        $city->country_id = $request->country;
        $city->status = $request->status;
        $city->background_image = $imageName;
        $city->update();

        return response()->json(["success" => "city updated Successfully"], 200);
    }

    /**
     * Remove the specified city from storage.
     * @param int $uuid
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($uuid)
    {
        try {
            $city = City::where('UUID', $uuid)->first();
            $hotel = Hotel::where('city_id', $city->id)->count();
            if ($hotel != 0) {
                return response()->json(["warning" => "Location not deleted"], 200);
            } else {

                $location = City::where('UUID', $uuid)->first();
                $image_path = public_path('storage/' . $location->background_image);
                if (File::exists($image_path)) {
                    unlink($image_path);
                }
                $location->delete();

                return response()->json(["danger" => "location deleted Successfully"], 200);

            }
        } catch (\Exception$e) {
            return response()->json(["message" => "Something Went Wrong", "error" => $e->getMessage()], 503);
        }
    }

    /**
     * Display a listing of the facilities in search.
     * @param Request $request
     *
     * @return \Illuminate\View\View
     */
    public function locationList(Request $request)
    {
        $search = $request->input('search');
        $data['cities'] = City::latest()->where('name', 'LIKE', "%{$search}%")->get();
        return view('admin::location.locationList', $data);
    }

    /**
     * Update the feature of the specified city in storage.
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function featuredLocation(Request $request)
    {
        $featured = $request->featured;
        $uuId = $request->uuId;
        if ($featured == '1') {
            $city = city::updateOrCreate(['UUID' => $uuId], [
                'featured' => 0,
            ]);
            return response()->json(["message" => "city featured updated Successfully"], 200);
        } else {
            $city = city::updateOrCreate(['UUID' => $uuId], [
                'featured' => 1,
            ]);
            return response()->json(["message" => "city featured updated Successfully"], 200);
        }
    }
}
