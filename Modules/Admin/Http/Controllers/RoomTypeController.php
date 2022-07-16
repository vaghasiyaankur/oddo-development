<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\RoomType;
use App\Models\RoomList;

class RoomTypeController extends Controller
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
        $roomTypes = RoomType::paginate(10);
        return view('admin::roomType.index', compact('roomTypes'));
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
            'roomtype'  => 'required|unique:room_types,room_type',
        ], [ 
            'roomtype.unique' => 'This room type already exists.' 
        ]);

        try {
            $roomtype   =  new RoomType();
            $roomtype->room_type = $request->roomtype;
            $roomtype->save();
            return response()->json(["success" => "room-type inserted Successfully"], 200);
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
            'roomtype'  => 'required|unique:room_types,room_type,'.$id.',id',
        ], [ 
            'roomtype.unique' => 'This roomList already exists.' 
        ]);
        
        try{
            $roomType   =  RoomType::updateOrCreate([ 'id' => $id ], [
                'room_type' => $request->roomtype
            ]);
            return response()->json(["message" => "Room Type updated Successfully"], 200);
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
            $roomListCount = RoomList::where('room_type_id',$id)->count();
            if($roomListCount != 0){
                return response()->json(["warning" => "room type not deleted"], 200);
            }else{
                $roomType = RoomType::where('id',$id)->delete();
                return response()->json(["danger" => "room type deleted Successfully"], 200);
            }
        }catch(\Exception $e){
            return response()->json(["message" => "Something Went Wrong"], 503);
        } 
    }

    public function roomTypeList() {
        $data['roomTypes'] = RoomType::paginate(10);
        return view('admin::roomType.roomType_list', $data);
    }

    public function statusRoomType(Request $request){
        $status = $request->status;
        $id     = $request->id;
        if($status == '1') {
            $facility = RoomType::where('id', $id)->update([ 'status' => 0 ]);
            return response()->json(["message" => "room type status updated Successfully"], 200);
        }else {
            $facility = RoomType::where('id', $id)->update([ 'status' => 1 ]);
            return response()->json(["message" => "room type status updated Successfully"], 200);
        }
    }


}
