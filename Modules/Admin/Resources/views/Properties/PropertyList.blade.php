<table class="table align-middle mb-0 ">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Image</th>
            <th scope="col">Property Name</th>
            <th scope="col">Poperty Type</th>
            <th scope="col">Rating</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody class="table__body">
        {{-- @dd($Properties->toarray()) --}}
        {{-- @dd($properties->propertytype) --}}
        @if(count($properties))
        @foreach($properties as $key=> $property)
            <tr>
                <th scope="row">
                    <div class="loadingShow td-2">
                        <span></span>
                    </div>
                    <div class="loadingHide">{{$properties->firstItem()+$key}}</div>
                </th>
                <td>
                    <div class="loadingShow td-3">
                        <span></span>
                    </div>
                    <div class="loadingHide"><img src="{{asset('storage/'.@$property->mainPhoto->first()->photos)}}" width="70px" height="70px"></div>
                </td>
                <td>
                    <div class="loadingShow td-3">
                        <span></span>
                    </div>
                    <div class="loadingHide">{{$property->property_name}}</div>
                </td>
                <td>
                    <div class="loadingShow td-3">
                        <span></span>
                    </div>
                    <div class="loadingHide">{{ $property->propertytype->type }}</div>
                </td>
                <td>
                    <div class="loadingShow td-3">
                        <span></span>
                    </div>
                    <div class="loadingHide">{{$property->star_rating}}</div>
                </td>
                <td>
                    <div class="loadingShow td-3">
                        <span></span>
                    </div>
                    <div class="form-check form-switch loadingHide">
                        <input class="form-check-input amenityCategoryStatus" data-id="{{ $property->UUID }}"  data-value="{{$property->status}}" type="checkbox" role="switch" id="SwitchCheck1" {{ $property->status == 1 ? 'checked':
                        ''}}>
                    </div>
                </td>
            </tr>
        @endforeach
        @endif
    </tbody>
</table>
{{-- {{ $properties->links() }} --}}


@if(count($properties))
    <div class="table-footer align-items-center pt-2 justify-content-between d-flex">
        {{$properties->withPath('/admin/property')->links('admin::layouts.pagination')}}
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

    {{-- <div class="table-footer align-items-center pt-2 justify-content-between d-flex">
        {{$properties->withPath('/admin/facilities')->links('admin::layouts.pagination')}}
    </div> --}}

    {{-- FOR EMPTY TABLE --}}
    {{-- <div class="empty-table w-100 text-center py-5">
        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c" style="width:75px;height:75px">
        </lord-icon>
        <h4>No records has been added yet.</h4>
        <h6>Add a new record by simpley clicking the button on top right side.</h6>
    </div> --}}



