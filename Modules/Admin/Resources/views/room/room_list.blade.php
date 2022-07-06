<table class="table align-middle table-nowrap mb-0 ">
    <thead>
        <tr>
            <th scope="col">NO</th>
            <th scope="col">Room</th>
            <th scope="col">Room Type</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody class="tbody">
        @foreach ($roomLists as $key => $room)    
        <tr class="tr_{{$room->id}}">
            <th scope="row"><a href="#" class="fw-medium">{{$key+1}}</a></th>
            <td>{{$room->room_name}}</td>
            <td>{{$room->room_type->room_type}}</td>
            <td>
                <div class="form-check form-switch">
                    <input class="form-check-input roomStatus" data-value="{{$room}}" type="checkbox" role="switch"
                        id="SwitchCheck1" {{ $room->status == 1 ? 'checked': ''}} >
                </div>
            </td>
            <td>
                <a href="javascript:void(0);" class="link-success fs-17 pe-3 edit-room" data-value="{{$room}}"><i class="ri-edit-2-line"></i></a>
                <a href="javascript:void(0);" class="link-danger fs-17 delete-room" data-value="{{$room->id}}"><i class="ri-delete-bin-line"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>