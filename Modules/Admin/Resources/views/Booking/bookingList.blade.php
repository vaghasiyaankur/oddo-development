<table class="table align-middle mb-0 propertyList" id="propertyList">
    <thead>
        <tr>
            <th scope="col">Booking No.</th>
            <th scope="col">User Name</th>
            <th scope="col">Hotel Name</th>
            <th scope="col">Room Name</th>
            <th scope="col">Amount</th>
            <th scope="col">Paid Via</th>
            <th scope="col">Payment Status </th>
            <th scope="col">Start Date </th>
            <th scope="col">End Date </th>
            <th scope="col">Attachment</th>
            <!-- <th scope="col">Actions</th> -->
        </tr>
    </thead>
    <tbody class="table__body">
        @foreach ($bookings as $key=>$booking)
        <tr>
            <th scope="row">
                <div class="loadingShow td-2">
                    <span></span>
                </div>
                <div class="loadingHide">1</div>
            </th>
            <td>
                <div class="loadingShow td-3">
                    <span></span>
                </div>
                <div class="loadingHide">{{ $booking->user->name }} {{ $booking->user->last_name }}</div>
            </td>
            <td>
                <div class="loadingShow td-3">
                    <span></span>
                </div>
                <div class="loadingHide">{{$booking->hotel->property_name}}</div>
            </td>
            <td>
                <div class="loadingShow td-3">
                    <span></span>
                </div>
                <div class="loadingHide">{{$booking->room->roomlist->room_name }}</div>
            </td>
            <td>
                <div class="loadingShow td-3">
                    <span></span>
                </div>
                <div class="loadingHide">{{ $booking->rent }}</div>
            </td>
            <td>
                <div class="loadingShow td-3">
                    <span></span>
                </div>
                <div class="loadingHide">{{ $booking->paymentGateway->payment_type }}</div>
            </td>
            <td>
                <div class="loadingShow td-3">
                    <span></span>
                </div>
                <div class="form-check form-switch loadingHide">
                @if($booking->status == 0)
                    <label class="btn btn-danger fs-12 px-2 py-1">Failed</label>
                @else
                    <label class="btn btn-success fs-12 px-2 py-1">Success</label>
                @endif
                </div>
            </td>
            <td>
                <div class="loadingShow td-3">
                    <span></span>
                </div>
                <div class="loadingHide">{{ $booking->hotel->check_in }}</div>
            </td>
            <td>
                <div class="loadingShow td-3">
                    <span></span>
                </div>
                <div class="loadingHide">{{ $booking->hotel->check_out }}</div>
            </td>
            <td>
                <div class="loadingShow td-3">
                    <span></span>
                </div>
                <div class="form-check loadingHide">-</div>
            </td>
            <td>
                <div class="loadingShow td-3">
                    <span></span>
                </div>
                <div class="loadingHide">
                    <!-- <a href="javascript:void(0);" class="link-success fs-17 pe-3 editFacility" data-bs-toggle="modal"
                        data-bs-target="#exampleModalgrid" data-value="{{ $booking }}"><i class="ri-edit-2-line"></i></a>
                    <a href="javascript:void(0);" class="link-danger fs-17 deleteFacility" data-value="{{$booking->id}}"><i class="ri-delete-bin-line"></i></a> -->
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@if(count($bookings))
<div class="table-footer align-items-center pt-2 justify-content-between d-flex">
    {{$bookings->withPath('/admin/booking')->links('admin::layouts.pagination')}}
</div>
@else
{{-- FOR EMPTY TABLE --}}
<div class="empty-table w-100 text-center py-5">
        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c" style="width:75px;height:75px">
        </lord-icon>
        <h4>No records has been added yet.</h4>
    </div>
@endif
