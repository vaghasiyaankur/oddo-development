<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Facilities;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FacilitiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the facilities.
     * @return Renderable
     */
    public function index()
    {
        $facilities = Facilities::paginate(10);
        return view('admin::facilities.index', compact('facilities'));
    }

    /**
     * Store a newly created facilities in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'faclityName' => 'required|unique:facilities,facilities_name',
        ], [
            'faclityName.unique' => 'This facilitey already exists.',
        ]);

        try {
            $faclity = new Facilities();
            $faclity->facilities_name = $request->faclityName;
            $faclity->icon = $request->faclityIcon;
            $faclity->color = $request->facilityColor;
            $faclity->description = $request->facilityDescription;
            $faclity->save();

            return response()->json(["success" => "Facility created Successfully"], 200);
        } catch (\Exception$e) {
            return response()->json(["message" => "Something Went Wrong"], 503);
        }
    }

    /**
     * Update the specified resource facilities in storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'editFaclityName' => 'required|unique:facilities,facilities_name,' . $id . ',id',
        ], [
            'editFaclityName.unique' => 'This facilitey already exists.',
        ]);

        try {
            $facility = Facilities::updateOrCreate(['id' => $id], [
                'facilities_name' => $request->editFaclityName,
                'color' => $request->editFacilityColor,
                'icon' => $request->editFaclityIcon,
                'description' => $request->editFacilityDescription,
            ]);

            return response()->json(["success" => "facility updated Successfully"], 200);
        } catch (\Exception$e) {
            return response()->json(["message" => "Something Went Wrong"], 503);
        }
    }

    /**
     * Remove the specified facilities from storage.
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            $result = Facilities::where('id', $id)->delete();
            return response()->json(["danger" => "facility deleted Successfully"], 200);
        } catch (\Exception$e) {
            return response()->json(["message" => "Something Went Wrong", "error" => $e->getMessage()], 503);
        }
    }

    /**
     * Display a listing of the facilities in search.
     *
     * @param Request $request
     *
     * @return \Illuminate\View\View
     */
    public function facilitiesList(Request $request)
    {
        $search = $request->input('search');
        $data['facilities'] = Facilities::where('facilities_name', 'LIKE', "%{$search}%")->paginate(10);
        return view('admin::facilities.facilities_list', $data);
    }

    /**
     * Update the status of the specified facilities in storage.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function statusFacility(Request $request)
    {
        $status = $request->status;
        $id = $request->id;

        if ($status == '1') {
            $facility = Facilities::where('id', $id)->update(['status' => 0]);
            return response()->json(["message" => "facility status updated Successfully"], 200);
        } else {
            $facility = Facilities::where('id', $id)->update(['status' => 1]);
            return response()->json(["message" => "facility status updated Successfully"], 200);
        }
    }

}
