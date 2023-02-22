<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\BathroomItem;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BathroomItemController extends Controller
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
        $items = BathroomItem::latest()->paginate(10);
        return view('admin::bathroom.index', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'item' => 'required|unique:bathroom_items,item',
        ], [
            'item.unique' => 'This item already exists.',
        ]);

        try {
            $bathroom = new BathroomItem();
            $bathroom->item = $request->item;
            $bathroom->icon = $request->bathroomIcon;
            $bathroom->save();

            return response()->json(["success" => "Item inserted Successfully"], 200);
        } catch (\Exception$e) {
            return response()->json(["message" => "Something Went Wrong"], 503);
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'item' => 'required|unique:bathroom_items,item,' . $id . ',UUID',
        ], [
            'item.unique' => 'This Item already exists.',
        ]);

        try {
            $items = BathroomItem::updateOrCreate(['UUID' => $id], [
                'item' => $request->item,
                'icon' => $request->bathroomIcon,
            ]);
            return response()->json(["success" => "item updated Successfully"], 200);
        } catch (\Exception$e) {
            return response()->json(["message" => "Something Went Wrong"], 503);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            $result = BathroomItem::where('UUID', $id)->delete();
            return response()->json(["danger" => "bathroom deleted Successfully"], 200);
        } catch (\Exception$e) {
            return response()->json(["message" => "Something Went Wrong", "error" => $e->getMessage()], 503);
        }
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function statusBathRoom(Request $request)
    {
        $status = $request->status;
        $id = $request->id;
        if ($status == '1') {
            $item = BathroomItem::updateOrCreate(['UUID' => $id], [
                'status' => 0,
            ]);
            return response()->json(["message" => "item updated Successfully"], 200);
        } else {
            $item = BathroomItem::updateOrCreate(['UUID' => $id], [
                'status' => 1,
            ]);
            return response()->json(["message" => "item updated Successfully"], 200);
        }
    }

    /**
     * @return \Illuminate\View\View.
     */
    public function bathroomList()
    {
        $data['items'] = BathroomItem::latest()->paginate(10);
        return view('admin::bathroom.bathroomList', $data);
    }
}
