<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Room;
use App\Models\RoomList;
use App\Models\RoomType;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the roomtype & roomlist.
     * @return Renderable
     */
    public function index()
    {
        $roomTypes = RoomType::get();
        $roomLists = RoomList::paginate(10);
        return view('admin::room.index', compact('roomLists', 'roomTypes'));
    }

    /**
     * Store a newly created roomlist in storage.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'roomName' => 'required|unique:room_lists,room_name',
        ], [
            'roomName.unique' => 'This roomList already exists.',
        ]);

        try {
            $roomList = new RoomList();
            $roomList->room_name = $request->roomName;
            $roomList->room_type_id = $request->roomType;
            $roomList->save();
            return response()->json(["success" => "roomList created Successfully"]);
        } catch (\Exception$e) {
            return response()->json(["message" => "Something Went Wrong"], 503);
        }
    }

    /**
     * Update the specified roomlist in storage.
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'editRoomName' => 'required|unique:room_lists,room_name,' . $id . ',id',
        ], [
            'editRoomName.unique' => 'This roomList already exists.',
        ]);

        try {
            $roomType = RoomList::updateOrCreate(['id' => $id], [
                'room_name' => $request->editRoomName,
                'room_type_id' => $request->edtiRoomType,
            ]);
            return response()->json(["success" => "Room updated Successfully"], 200);
        } catch (\Exception$e) {
            return response()->json(["message" => "Something Went Wrong"], 503);
        }
    }

    /**
     * Remove the specified roomlist from storage.
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            $room = Room::where('room_list_id', $id)->count();
            if ($room != 0) {
                return response()->json(["warning" => "room not deleted"], 200);
            } else {
                $room = RoomList::where('id', $id)->delete();
                return response()->json(["danger" => "room deleted Successfully"], 200);
            }
        } catch (\Exception$e) {
            return response()->json(["message" => "Something Went Wrong", "error" => $e->getMessage()], 503);
        }
    }

    /**
     * Display a listing of the roomlist.
     *
     * @return \Illuminate\View\View.
     */
    public function roomList()
    {
        $data['roomLists'] = RoomList::paginate(10);
        return view('admin::room.room_list', $data);
    }

    /**
     * Update the status of the specified roomlist in storage.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function statusRoom(Request $request)
    {
        $status = $request->status;
        $id = $request->id;
        if ($status == '1') {
            $facility = RoomList::where('id', $id)->update(['status' => 0]);
            return response()->json(["message" => "room status updated Successfully"], 200);
        } else {
            $facility = RoomList::where('id', $id)->update(['status' => 1]);
            return response()->json(["message" => "room status updated Successfully"], 200);
        }
    }
}
