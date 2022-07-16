<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\RoomList;
use App\Models\RoomType;
use App\Models\Room;

class RoomController extends Controller
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
        $roomTypes = RoomType::get();
        $roomLists = RoomList::paginate(10);
        return view('admin::room.index', compact('roomLists', 'roomTypes'));
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
            'roomName'  => 'required|unique:room_lists,room_name',
        ], [ 
            'roomName.unique' => 'This roomList already exists.' 
        ]);

        try {
            $roomList = new RoomList();
            $roomList->room_name = $request->roomName;
            $roomList->room_type_id = $request->roomType;
            $roomList->save();
            return response()->json(["success" => "roomList created Successfully"]);
        } catch(\Exception $e) {
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
            'editRoomName'  => 'required|unique:room_lists,room_name,'.$id.',id',
        ], [ 
            'editRoomName.unique' => 'This roomList already exists.' 
        ]);

        try{
            $roomType   =  RoomList::updateOrCreate([ 'id' => $id ], [
                'room_name' => $request->editRoomName,
                'room_type_id' => $request->edtiRoomType
            ]);
            return response()->json(["success" => "Room updated Successfully"], 200);
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
            $room = Room::where('room_list_id',$id)->count();
            if($room != 0){
                return response()->json(["warning" => "room not deleted"], 200);
            }else{
                $room = RoomList::where('id',$id)->delete();
                return response()->json(["danger" => "room deleted Successfully"], 200);
            }
        } catch (\Exception $e) {
            return response()->json(["message" => "Something Went Wrong", "error" => $e->getMessage()], 503);
        }
    }

    public function roomList()
    {
        $data['roomLists'] = RoomList::paginate(10);
        return view('admin::room.room_list', $data);
    }

    public function statusRoom(Request $request)
    {
        $status = $request->status;
        $id     = $request->id;
        if($status == '1') {
            $facility = RoomList::where('id', $id)->update([ 'status' => 0 ]);
            return response()->json(["message" => "room status updated Successfully"], 200);
        }else {
            $facility = RoomList::where('id', $id)->update([ 'status' => 1 ]);
            return response()->json(["message" => "room status updated Successfully"], 200);
        }
    }
}
