<table class="table align-middle mb-0 propertyList" id="propertyList">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">User Name</th>
            <th scope="col">Hotel Name</th>
            <th scope="col">Room Name</th>
            <th scope="col">Staff</th>
            <th scope="col">Cleaness</th>
            <th scope="col">Room</th>
            <th scope="col">Location</th>
            <th scope="col">Breakfast</th>
            <th scope="col">Service&Staff</th>
            <th scope="col">Property</th>
            <th scope="col">Price & Quantity</th>
            <th scope="col">Amenities</th>
            <th scope="col">Internet</th>
            <th scope="col">FeedBack</th>
        </tr>
    </thead>
    <tbody class="table__body">
        @foreach ($reviews as $key => $review)
            <tr>
                <th scope="row">
                    <div class="loadingShow td-2">
                        <span></span>
                    </div>
                    <div class="loadingHide">{{$reviews->firstItem()+$key}}</div>
                </th>
                <td>
                    <div class="loadingShow td-3">
                        <span></span>
                    </div>
                    <div class="loadingHide">{{ $review->user->name }}</div>
                </td>
                <td>
                    <div class="loadingShow td-3">
                        <span></span>
                    </div>
                    <div class="loadingHide">{{ $review->hotel->property_name }}</div>
                </td>
                {{-- @dd($review->room->roomlist->room_name) --}}
                <td>
                    <div class="loadingShow td-3">
                        <span></span>
                    </div>
                    <div class="loadingHide">{{ $review->roomData->roomlist->room_name }}</div>
                </td>
                <td>
                    <div class="loadingShow td-3">
                        <span></span>
                    </div>
                    <div class="loadingHide">{{ $review->staff }}</div>
                </td>
                <td>
                    <div class="loadingShow td-3">
                        <span></span>
                    </div>
                    <div class="loadingHide">{{ $review->cleaness }}</div>
                </td>
                <td>
                    <div class="loadingShow td-3">
                        <span></span>
                    </div>
                    <div class="loadingHide">{{ $review->rooms }}</div>
                </td>
                <td>
                    <div class="loadingShow td-3">
                        <span></span>
                    </div>
                    <div class="loadingHide">{{ $review->location }}</div>
                </td>
                <td>
                    <div class="loadingShow td-3">
                        <span></span>
                    </div>
                    <div class="loadingHide">{{ $review->breakfast }}</div>
                </td>
                <td>
                    <div class="loadingShow td-3">
                        <span></span>
                    </div>
                    <div class="loadingHide">{{ $review->service_staff }}</div>
                </td>
                <td>
                    <div class="loadingShow td-3">
                        <span></span>
                    </div>
                    <div class="loadingHide">{{ $review->property }}</div>
                </td>
                <td>
                    <div class="loadingShow td-3">
                        <span></span>
                    </div>
                    <div class="loadingHide">{{ $review->price_quality }}</div>
                </td>
                <td>
                    <div class="loadingShow td-3">
                        <span></span>
                    </div>
                    <div class="loadingHide">{{ $review->amenities }}</div>
                </td>
                <td>
                    <div class="loadingShow td-3">
                        <span></span>
                    </div>
                    <div class="loadingHide">{{ $review->internet }}</div>
                </td>
                <td>
                    <div class="loadingShow td-3">
                        <span></span>
                    </div>
                    <div class="loadingHide">{{ $review->feedback }}</div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


@if(count($reviews))
    <div class="table-footer align-items-center pt-2 justify-content-between d-flex">
        {{$reviews->withPath('/admin/review')->links('admin::layouts.pagination')}}
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



