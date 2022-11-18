<table class="table align-middle table-nowrap mb-0 ">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">photo-Category</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody class="tbody table__body">
        @if(count($photoCategories))

            @foreach ($photoCategories as $key => $photoCategory)
            <tr class="tr_{{$photoCategory->id}}">
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
                    <div class="loadingHide">{{$photoCategory->name}}</div>
                </td>
                <td>
                    <div class="loadingShow td-3">
                        <span></span>
                    </div>
                    <div class="loadingHide">
                        <a href="javascript:void(0);" class="link-success fs-17 pe-3 edit-photoCategory"
                            data-value="{{$photoCategory}}"><i class="ri-edit-2-line"></i></a>
                        <a href="javascript:void(0);" class="link-danger fs-17 delete-photoCategory"
                            data-value="{{$photoCategory->id}}"><i class="ri-delete-bin-line"></i></a>
                    </div>
                </td>
            </tr>
            @endforeach
        @endif
    </tbody>
</table>

@if(count($photoCategories))
    <div class="table-footer align-items-center pt-2 justify-content-between d-flex">
        {{$photoCategories->withPath('/admin/photo-category')->links('admin::layouts.pagination')}}
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
