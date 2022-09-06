<div class="accordion" id="accordionExample">

    @forelse ($orderHistorys as $orderHistory)
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <div class="d-flex flex-wrap align-items-center p-3 justify-content-sm-evenly justify-content-start j_c_center"
                    href="#collapse_{{ $orderHistory->UUID }}" data-bs-toggle="collapse"
                    aria-expanded="false" aria-controls="collapseExample">
                    <a class="btn p-0 mb-2">
                        <img src="{{ asset('assets/images/icons/downarrow.png') }}">
                    </a>
                    <div class="col_id fs-6">Order Id: {{ $orderHistory->UUID }}</div>
                    <div class="col_totl fs-6 mt-1 mt-md-0">Total:$ {{ $orderHistory->rent }}</div>
                    <div
                        class="col_amt fs-6 d-flex flex-wrap align-items-center justify-content-sm-center mt-2 mt-md-0">
                        <img src="{{ asset('assets/images/icons/order-d_right-icon.png') }}" alt="">
                        <span class="ps-1">Purchesed on </span><span
                            class="ps-1 mt-1 mt-md-0">{!! date('d M y', strtotime($orderHistory->start_date)) !!}</span>
                    </div>
                </div>
            </h2>
            <div id="collapse_{{ $orderHistory->UUID }}" class="accordion-collapse collapse show"
                aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body p-0">
                    <div class="order-id d-flex flex-wrap align-items-center justify-content-evenly">
                        <p class="mb-0 or-id">Order Id: {{ $orderHistory->UUID }}</p>
                        <p class="mb-0 or-total">Total: ${{ $orderHistory->rent }}</p>
                        <div
                            class="purches-date d-flex flex-wrap align-items-center justify-content-center ms-sm-3">
                            <img src="{{ asset('assets/images/icons/order-right-icon.png') }}"
                                class="pe-1" alt="">
                            <span class="ps-1">Purchesed on </span><span
                                class="ps-1">{!! date('d M y', strtotime($orderHistory->start_date)) !!}</span>
                        </div>
                    </div>
                    <div class="order-id-inner">
                        <div class="row">
                            <div class="recipt_button text-end mt-3">
                                @php $review = $reviews->where('hotel_id', $orderHistory->hotel_id)->first() @endphp
                                @if ($review)
                                    <div class="recipt_button text-end mt-3">
                                        <a href="javascript:;" data-bs-toggle="modal" class="reviewPopUp"
                                            data-id="{{ $review->UUID }}">
                                            <span class="reviewBtn me-5 ">View Review</span>
                                        </a>
                                    </div>
                                @else
                                    <a href="javascript:;" data-id="{{ $orderHistory->UUID }}"
                                        data-bs-toggle="modal" data-bs-target="#review__popup"
                                        id="popUp">
                                        <span class="recipt-btn me-4">+ Add Review</span>
                                    </a>
                                @endif

                                <input type="hidden" id="hotel_id_{{ $orderHistory->UUID }}"
                                    value="{{ $orderHistory->hotel_id }}">
                                <input type="hidden" id="room_id_{{ $orderHistory->UUID }}"
                                    value="{{ $orderHistory->room_id }}">
                            </div>
                            <div class="col-12 col-lg-6 left-order-list">
                                <span class="h-btn">Hotels</span>
                                <div class="holiday-details">
                                    <h5 class="h--title ms-2">{{ $orderHistory->hotel->property_name }}
                                    </h5>
                                    <div class="h-date d-flex align-items-center">
                                        <img src="{{ asset('assets/images/icons/order-hotel-icon.png') }}"
                                            alt="">
                                        <p class="m-0 pe-2">{!! date('M d,Y', strtotime($orderHistory->start_date)) !!}</p>
                                        <img src="{{ asset('assets/images/icons/order-h-eroow.png') }}"
                                            alt="">
                                        <p class="m-0 ps-2">{!! date('M d,Y', strtotime($orderHistory->end_date)) !!}</p>
                                    </div>
                                    <div class="h-pepl d-flex align-items-center">
                                        <img src="{{ asset('assets/images/icons/order-hotel-icon2.png') }}"
                                            alt="">
                                        <p class="m-0">2 Guests, 1 Infant</p>
                                    </div>
                                    <div class="h-room d-flex align-items-center">
                                        <img src="{{ asset('assets/images/icons/order-hotel-icon3.png') }}"
                                            alt="">
                                        <p class="m-0">2 Rooms, 1 King, 2 Queen</p>
                                    </div>
                                    <div class="h-totl d-flex justify-content-between align-items-center">
                                        <div>
                                            <p class="m-0 h--totl ms-2 mt-2">Total</p>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <p class="m-0 pe-2 h-amount">$ {{ $orderHistory->rent }}</p>
                                            <span class="h--totl text-muted">for 8 nights</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 right-order-list">
                                <span class="h-btn">Transportation</span>
                                <div class="transpot-details p-3">
                                    <img src="{{ asset('assets/images/icons/order-transpot-icon.png') }}"
                                        alt="">
                                    <div class="h-totl d-flex justify-content-between align-items-center">
                                        <div>
                                            <p class="m-0 h--totl ms-2 mt-2">Total</p>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <p class="m-0 pe-2 h-amount">$1,245.00</p><span
                                                class="h--totl text-muted">for 10 rides</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty

    @endforelse
</div>