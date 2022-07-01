<table class="table align-middle table-nowrap mb-0 ">
    <thead>
        <tr>
            <th scope="col">Sl</th>
            <th scope="col">Amenity-Category</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody class="tbody">
        @foreach ($amenityCategories as $key => $amenityCategory)    
        <tr class="tr_{{$amenityCategory->id}}">
            <th scope="row"><a href="#" class="fw-medium">{{$key+1}}</a></th>
            <td>{{$amenityCategory->category}}</td>
            <td>
                <div class="form-check form-switch">
                    <input class="form-check-input amenityCategoryStatus" data-value="{{$amenityCategory}}" type="checkbox" role="switch"
                        id="SwitchCheck1" {{ $amenityCategory->status == 1 ? 'checked': ''}} >
                </div>
            </td>
            <td>
                <a href="javascript:void(0);" class="link-success fs-17 pe-3 edit-amenityCategory" data-value="{{$amenityCategory}}"><i class="ri-edit-2-line"></i></a>
                <a href="javascript:void(0);" class="link-danger fs-17 delete-amenityCategory" data-value="{{$amenityCategory->id}}"><i class="ri-delete-bin-line"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>