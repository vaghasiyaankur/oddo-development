<div class="tab-pane active" id="nav-light-home" data-target="all"  role="tabpanel">
    <div class="row">
        @foreach($bookings as $booking)
        <div class="col-lg-12 mb-4">
                <div class="booking--inner-box d-flex">
                    <div class="hotel_book_img">
                        <img src="{{ @$booking->hotel->mainPhoto->first()->photos ? asset('storage/' . @$booking->hotel->mainPhoto->first()->photos) : asset('assets/images/defaultImage.png') }}" style="height:150px;width:150px;" onerror="this.src='{{asset('assets/images/default.png')}}'">
                    </div>
                    <div class="inner-right-content">
                        <div
                            class="title--with-price d-flex justify-content-between akign-items-center mb-1">
                            <div class="title--badge">
                                <span class="badge"
                                    style="background-color: #eef1f7;color: #8195a8;font-size: 13px;">{{ $booking->hotel->propertytype->type }}</span>
                            </div>
                        </div>
                        {{-- @dd($booking); --}}
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="hotel--title">
                                <h6 class="fw-bold mb-0">{{ $booking->hotel->property_name }}</h6>
                            </div>
                            <div class="title-price--tage">
                                <span
                                    class="fs-5 fw-normal">${{ $booking->rent }}</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="h-date d-flex align-items-center"
                                style="margin-left: -8px;">
                                <img src="{{ asset('assets/images/icons/order-hotel-icon.png') }}"
                                    alt="">
                                <p class="m-0 pe-sm-2">{{ $booking->start_date }}</p>
                                <img src="{{ asset('assets/images/icons/order-h-eroow.png') }}"
                                    alt="">
                                <p class="m-0 ps-sm-2">{{ $booking->end_date }}</p>
                            </div>
                            <div class="hotel--title-rate">
                                <span class="fw-bold" style="color: #14d014;">Save
                                   {{ $booking->rent * $booking->room->discount /100 }}</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="h-pepl d-flex align-items-center"
                                style="margin-left: -8px;">
                                <img src="{{ asset('assets/images/icons/order-hotel-icon2.png') }}"
                                    alt="">
                                <p class="m-0 ">{{ $booking->room->guest_stay_room }} Guests</p>
                            </div>
                            <div class="d-flex align-items-center">
                                <p class="m-0 pe-2 h-amount">${{ ($booking->rent - ($booking->rent * $booking->room->discount /100)) * $booking->day_diff }}
                                </p><span class="h--totl text-muted">for {{ $booking->day_diff }} nights</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        <div class="row g-0 text-center text-sm-start align-items-center mb-4 px-3">
            @if(count($bookings))
                {{$bookings->withPath('/user/booking')->links('usersite::pagination.pagination')}}
            @else
                        {{-- FOR EMPTY TABLE --}}
            <div class="empty-table w-100 text-center py-5">
                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c" style="width:75px;height:75px">
                </lord-icon>
                <h4>No records has been added yet.</h4>
            </div>
            @endif
        </div>
    </div>
</div>
