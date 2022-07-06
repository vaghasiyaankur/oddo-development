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
        @if(count($roomTypes))
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
        @endif
    </tbody>
</table>

@if(count($roomTypes))
    <div class="table-footer align-items-center pt-2 justify-content-between d-flex">
        {{$roomTypes->withPath('/admin/room-type')->links('admin::layouts.pagination')}}
    </div>
@else
     {{-- FOR EMPTY TABLE --}}
     <div class="empty-table w-100 text-center py-5">
        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c" style="width:75px;height:75px">
        </lord-icon>
        <h4>No records has been added yet.</h4>
        {{-- <h6>Add a new record by simpley clicking the button on top right side.</h6> --}}
    </div>
@endif