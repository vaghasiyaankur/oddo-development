{{-- {{app()}} --}}
<table class="table align-middle table-nowrap mb-0 ">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Amenity-Category</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody class="tbody table__body">
        @if(count($amenityCategories))

            @foreach ($amenityCategories as $key => $amenityCategory)
            <tr class="tr_{{$amenityCategory->id}}">
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
                    <div class="loadingHide">{{$amenityCategory->category}}</div>
                </td>
                <td>
                    <div class="loadingShow td-3">
                        <span></span>
                    </div>
                    <div class="form-check form-switch loadingHide">
                        <input class="form-check-input amenityCategoryStatus" data-value="{{$amenityCategory}}"
                            type="checkbox" role="switch" id="SwitchCheck1" {{ $amenityCategory->status == 1 ? 'checked':
                        ''}} >
                    </div>    
                </td>
                <td>
                    <div class="loadingShow td-3">
                        <span></span>
                    </div>
                    <div class="loadingHide">
                        <a href="javascript:void(0);" class="link-success fs-17 pe-3 edit-amenityCategory"
                            data-value="{{$amenityCategory}}"><i class="ri-edit-2-line"></i></a>
                        <a href="javascript:void(0);" class="link-danger fs-17 delete-amenityCategory"
                            data-value="{{$amenityCategory->id}}"><i class="ri-delete-bin-line"></i></a>
                    </div>
                </td>
            </tr>
            @endforeach
        @endif
    </tbody>
</table>

@if(count($amenityCategories))
    <div class="table-footer align-items-center pt-2 justify-content-between d-flex">
        {{$amenityCategories->withPath('/admin/amenity-category')->links('admin::layouts.pagination')}}
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
