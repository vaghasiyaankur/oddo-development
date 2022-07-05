<table class="table align-middle table-nowrap mb-0 ">
    <thead>
        <tr>
            <th scope="col">NO</th>
            <th scope="col">Room Type</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody class="tbody">
        @foreach ($roomTypes as $key => $roomtype)    
        <tr class="tr_{{$roomtype->id}}">
            <th scope="row"><a href="#" class="fw-medium">{{$key+1}}</a></th>
            <td>{{$roomtype->room_type}}</td>
            <td>
                <div class="form-check form-switch">
                    <input class="form-check-input roomTypeStatus" data-value="{{$roomtype}}" type="checkbox" role="switch"
                        id="SwitchCheck1" {{ $roomtype->status == 1 ? 'checked': ''}} >
                </div>
            </td>
            <td>
                <a href="javascript:void(0);" class="link-success fs-17 pe-3 edit-roomType" data-value="{{$roomtype}}"><i class="ri-edit-2-line"></i></a>
                <a href="javascript:void(0);" class="link-danger fs-17 delete-roomType" data-value="{{$roomtype->id}}"><i class="ri-delete-bin-line"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>