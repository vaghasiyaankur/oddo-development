<table class="table align-middle table-nowrap mb-0 ">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Item</th>
            <th scope="col">Icon</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody class="tbody table__body">
        @if(count($items))

            @foreach ($items as $key => $item)
            <tr class="tr_{{$item->id}}">
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
                    <div class="loadingHide">{{$item->item}}</div>
                </td>
                <td>
                    <div class="loadingShow td-3">
                        <span></span>
                    </div>
                    <div class="loadingHide"><i class="{{$item->icon}}"></i></div>
                </td>
                <td>
                    <div class="loadingShow td-3">
                        <span></span>
                    </div>
                    <div class="form-check form-switch loadingHide">
                        <input class="form-check-input bathroomStatus" data-value="{{$item->status}}" data-id="{{$item->UUID}}"
                            type="checkbox" role="switch" id="SwitchCheck1" {{ $item->status == 1 ? 'checked':
                        ''}} >
                    </div>    
                </td>
                <td>
                    <div class="loadingShow td-3">
                        <span></span>
                    </div>
                    <div class="loadingHide">
                        <a href="javascript:void(0);" class="link-success fs-17 pe-3 edit-item"
                            data-value="{{$item}}"><i class="ri-edit-2-line"></i></a>
                        <a href="javascript:void(0);" class="link-danger fs-17 bathroomDetele"
                            data-value="{{$item->UUID}}"><i class="ri-delete-bin-line"></i></a>
                    </div>
                </td>
            </tr>
            @endforeach
        @endif
    </tbody>
</table>

@if(count($items))
    <div class="table-footer align-items-center pt-2 justify-content-between d-flex">
        {{$items->withPath('/admin/bathroom')->links('admin::layouts.pagination')}}
    </div>
@else
    {{-- FOR EMPTY TABLE --}}
    <div class="empty-table w-100 text-center py-5">
        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c"
            style="width:75px;height:75px">
        </lord-icon>
        <h4>No records has been added yet.</h4>
    </div>
@endif
