<table class="table align-middle mb-0 propertyList" id="propertyList">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Image</th>
            <th scope="col">Property Name</th>
            <th scope="col">Poperty Type</th>
            <th scope="col">Rating</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody class="table__body">
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
                    <div class="loadingHide"><img src="{{ @$property->mainPhoto->first()->photos ? asset('storage/'.@$property->mainPhoto->first()->photos) : asset('assets/images/default.png') }}" onerror="this.src='{{asset('assets/images/default.png')}}'" width="70px" height="70px"></div>
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
                        @if($property->status == 1)
                        <a href="javascript:;">
                            <button class="btn btn-success fs-12 px-2 py-1">Active</button>
                        @else
                            <button class="btn btn-danger fs-12 px-2 py-1">Deactive</button>
                            <div class="loadingHide">
                                @isset($property->reject_reason)
                                    <button class="btn btn-soft-success waves-effect waves-light fs-12 px-2 py-1 mt-2" tabindex="0" data-bs-toggle="popover"
                                        data-bs-trigger="focus" title="" data-bs-content="{{ strip_tags($property->reject_reason) }}" data-bs-original-title="">Reject Message
                                    </button>
                                @endisset
                            </div>
                        </a>
                        @endif
                    </div>
                </td>
                <td>
                    <div class="loadingShow td-3">
                        <span></span>
                    </div>
                    <div class="form-check form-switch loadingHide">
                        <a href="{{route('property.single', ['slug' => $property->slug])}}">
                            <i class="ri-eye-fill align-bottom text-muted fs-4"></i>
                        </a>
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
        <h4>No record has been found.</h4>
    </div>
@endif



