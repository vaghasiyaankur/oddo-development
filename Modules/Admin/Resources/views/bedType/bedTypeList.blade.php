<table class="table align-middle table-nowrap mb-0 ">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">bed Type</th>
            <th scope="col">bed Size</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody class="tbody table__body">
        @if(count($bedTypes))

            @foreach ($bedTypes as $key => $bedtype)
            <tr class="tr_{{$bedtype->id}}">
                <th scope="row">
                    <div class="loadingShow td-2">
                        <span></span>
                    </div>
                    <div class="loadingHide">{{$key+1}}</div>
                </th>
                <td>
                    <div class="loadingShow td-3">
                        <span></span>
                    </div>
                    <div class="loadingHide">{{$bedtype->bed_type}}</div>
                </td>
                <td>
                    <div class="loadingShow td-3">
                        <span></span>
                    </div>
                    <div class="loadingHide">{{$bedtype->bed_size}}</div>
                </td>
                <td>
                    <div class="loadingShow td-3">
                        <span></span>
                    </div>
                    <div class="form-check form-switch loadingHide">
                        <input class="form-check-input Status-bedtype" data-value="{{$bedtype->status}}" data-id="{{$bedtype->UUID}}"
                            type="checkbox" role="switch" id="SwitchCheck1" {{ $bedtype->status == 1 ? 'checked':
                        ''}} >
                    </div>    
                </td>
                <td>
                    <div class="loadingShow td-3">
                        <span></span>
                    </div>
                    <div class="loadingHide">
                        <a href="javascript:void(0);" class="link-success fs-17 pe-3 edit-bedtype" data-value="{{$bedtype}}"><i class="ri-edit-2-line"></i></a>
                        <a href="javascript:void(0);" class="link-danger fs-17 delete-bedtype"
                            data-value="{{$bedtype->UUID}}"><i class="ri-delete-bin-line"></i></a>
                    </div>
                </td>
            </tr>
            @endforeach
        @endif
    </tbody>
</table>

@if(count($bedTypes))
    <div class="table-footer align-items-center pt-2 justify-content-between d-flex">
        {{$bedTypes->withPath('/admin/bed')->links('admin::layouts.pagination')}}
    </div>
@else
    {{-- FOR EMPTY TABLE --}}
    <div class="empty-table w-100 text-center py-5">
        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c"
            style="width:75px;height:75px">
        </lord-icon>
        <h4>No records has been added yet.</h4>
        {{-- <h6>Add a new record by simpley clicking the button on top right side.</h6> --}}
    </div>
@endif
