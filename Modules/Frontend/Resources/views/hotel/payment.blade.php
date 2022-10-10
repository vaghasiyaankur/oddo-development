<div class="modal fade payment_details_popup" id="payment_details_popup"
    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-fullscreen modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body py-sm-5">
                <div class="payment-details-box">
                    <div class="payment_popup_title d-flex justify-content-between align-items-center">
                        <h4 style="color: #6a78d2;">Payment Details :</h4>
                        <button type="button" data-bs-dismiss="modal" class="modal-close"
                            aria-label="Close"><i class="fa-solid fa-xmark text-dark"></i></button>
                    </div>
                    <div class="payment_details_inner">
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="payment-user-name holiday-details">
                                    <h5 class="mb-3" style="color: #6a78d2;">User Details :</h5>
                                    <div class="paymentuser_name">
                                        <h5>Michel Jacson</h5>
                                        <h6>12, abc soc , nana varachha road surat.</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12  left-order-list">
                                <div class="payment--detail-box holiday-details mt-3 position-relative">
                                    <div class="hotel--img">
                                        <img src="{{ @$hotel->mainPhotoData->photos ? asset('storage/' . @$hotel->mainPhotoData->photos) : asset('assets/images/default.png') }}"
                                        onerror="this.src='{{asset('assets/images/default.png')}}'" alt="">
                                    </div>
                                    <h5 class="h--title ms-2">{{ $hotel->property_name }}</h5>
                                    <div class="h-date d-flex align-items-center">
                                        <img src="assets/images/icons/order-hotel-icon.png" alt="">
                                        <p class="m-0 pe-2">Mar 23, 2020</p>
                                        <img src="assets/images/icons/order-h-eroow.png" alt="">
                                        <p class="m-0 ps-2">Jun 12, 2020</p>
                                    </div>
                                    <div class="h-pepl d-flex align-items-center">
                                        <img src="assets/images/icons/order-hotel-icon2.png" alt="">
                                        <p class="m-0">2 Guests, 1 Infant</p>
                                    </div>
                                    <div class="h-room d-flex align-items-center">
                                        <img src="assets/images/icons/order-hotel-icon3.png" alt="">
                                        <p class="m-0">2 Rooms, 1 King, 2 Queen</p>
                                    </div>
                                    <div class="h-totl d-flex justify-content-between align-items-center">
                                        <div>
                                            <p class="m-0 h--totl ms-2 mt-2">Total</p>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <p class="m-0 pe-2 h-amount">$ {{$hotel_amount}}
                                            </p><span class="h--totl text-muted">for 1 nights</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="payment_select_type">
                            {{-- <input type="hidden" value="{{ @$hotel->room->price_room }}"
                                class="amount_data_{{ $hotel->UUID }}"> --}}
                            <input type="hidden" value="{{ @$hotel->id }}"
                                class="hotel_id_{{ $hotel->UUID }}">
                              {{-- @if(isset($hotel->room)) --}}
                              <input type="hidden" value="{{ @$hotel->room->id }}"
                                  class="room_id_{{ $hotel->UUID }}">
                              {{-- @endif --}}
                            <h5 class="payment__type_title">Select your payment type</h5>
                            <div class="row mt-3">
                                @foreach ($paymentGateways as $paymentGateway)
                                    @if ($paymentGateway->payment_type == 'Razorpay')
                                        @include('frontend::hotel.Razorpay')
                                    @elseif ($paymentGateway->payment_type == 'Stripe')
                                        @include('frontend::hotel.Stripe')
                                    @elseif ($paymentGateway->payment_type == 'Paypal')
                                        @include('frontend::hotel.Paypal')
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>