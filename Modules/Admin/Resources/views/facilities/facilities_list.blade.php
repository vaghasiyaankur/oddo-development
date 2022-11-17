<table class="table align-middle mb-0 ">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Facilities-Name</th>
            <th scope="col">Icon</th>
            <th scope="col">Color</th>
            <th scope="col">Description</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody class="table__body">
        @if(count($facilities))
            @foreach ($facilities as $key => $facility)
                <tr>
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
                        <div class="loadingHide">{{$facility->facilities_name}}</div>
                    </td>
                    <td>
                        <div class="loadingShow td-3">
                            <span></span>
                        </div>
                        <div class="loadingHide"><i class=" {{$facility->icon}} fs-4"></i></div>
                    </td>
                    <td>
                        <div class="loadingShow td-3">
                            <span></span>
                        </div>
                        <div class="loadingHide" style="height: 30px; width: 30px; background-color:{{$facility->color}};"></div>
                    </td>
                    <td>
                        <div class="loadingShow td-3">
                            <span></span>
                        </div>
                        <div class="loadingHide">
                            <button tabindex="0" class="btn btn-soft-success waves-effect waves-light" data-bs-toggle="popover"
                                data-bs-trigger="focus" title=""
                                data-bs-content="{{ strip_tags($facility->description) }}"
                                data-bs-original-title="">View Description</button>
                        </div>
                    </td>
                    <td>
                        <div class="loadingShow td-3">
                            <span></span>
                        </div>
                        <div class="form-check form-switch loadingHide">
                            <input class="form-check-input status" type="checkbox" role="switch" id="SwitchCheck1" {{ $facility->status == 1 ? 'checked': ''}} data-value="{{ $facility }}">
                        </div>
                    </td>
                    <td>
                        <div class="loadingShow td-3">
                            <span></span>
                        </div>
                        <div class="loadingHide">
                            <a href="javascript:void(0);" class="link-success fs-17 pe-3 editFacility" data-bs-toggle="modal"
                                data-bs-target="#exampleModalgrid" data-value="{{ $facility }}"><i class="ri-edit-2-line"></i></a>
                            <a href="javascript:void(0);" class="link-danger fs-17 deleteFacility" data-value="{{$facility->id}}"><i class="ri-delete-bin-line"></i></a>
                        </div>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>

@if(count($facilities))
    <div class="table-footer align-items-center pt-2 justify-content-between d-flex">
        {{$facilities->withPath('/admin/facilities')->links('admin::layouts.pagination')}}
    </div>
@else
    {{-- FOR EMPTY TABLE --}}
    <div class="empty-table w-100 text-center py-5">
        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c" style="width:75px;height:75px">
        </lord-icon>
        <h4>No records has been added yet.</h4>
    </div>     
@endif


