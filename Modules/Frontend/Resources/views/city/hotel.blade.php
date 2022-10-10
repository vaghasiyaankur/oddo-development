<div class="tab-pane fade show p-a-tabcontent-inner tab-Hotel" id="Cities_data" role="tabpanel"
    aria-labelledby="pills-overview-tab">
    <div class="saved-hotels-details p-a-details pt-4 pb-5">
        <div class="hotel-wrapper mb-5 p-a-swpier">
            @foreach ($hotels as $hotel)
                <div class="hotel-box me-3">
                    <img src="{{ @$hotel->hotel->mainPhoto->first()->photos ? asset('storage/'.@$hotel->hotel->mainPhoto->first()->photos) : asset('assets/images/default.png') }}" class="img-fluid HotelImage" alt="" onerror="this.src='{{asset('assets/images/default.png')}}'">
                    <div class="content">
                        <h5 class="ms-2 mt-2">{{ @$hotel->hotel->property_name }}</h5>
                        <span class="d-l-Purple mb-3 ms-2"><img
                                src="{{ asset('assets/images/icons/search-h-loaction.png') }}" alt=""
                                class="mb-2 me-2 d-inline">
                            {{ $hotel->hotel->city->name }}, {{ @$hotel->hotel->country->country_name }}</span>
                        <p class="d-l-Purple mt-2 mb-1"><span class="purple-dark"><img
                            src="{{ asset('assets/images/icons/order-hotel-icon2.png') }}" class="d-inline"
                            alt=""> {{ @$hotel->hotel->room->guest_stay_room }} Adults</span> </p>
                        
                        <div class="text-with--btn d-flex justify-content-between">
                            <div class="">
                                <span><img src="{{ asset('assets/images/icons/order-hotel-icon3.png') }}"
                                        class="d-inline ms-1" alt="">{{ @$hotel->hotel->room->number_of_room }}
                                    Rooms</span>
                            </div>
                            {{-- <div class="icons_">
                                <a href="javacsript:;"><img
                                        src="{{ asset('assets/images/icons/pluse-big-blue.png') }}"
                                        class="me-1 d-inline" alt=""></a>
                                <a href="javacsript:;"><img
                                        src="{{ asset('assets/images/icons/remove-s.png') }}" class="d-inline"
                                        style="width:44px;" alt=""></a>
                            </div> --}}
                        </div>
                        <div class="text-with--btn d-flex justify-content-between">
                            <div class="">
                                <span><img src="{{ asset('assets/images/icons/order-hotel-icon3.png') }}"
                                        class="d-inline ms-1" alt="">{{ @$hotel->hotel->room->bed->bedType->bed_type }}
                                    </span>
                            </div>
                        </div>
                    </div>
                    <div class="search-result-price__tag b-1 p-a-details-btn position-relative">
                        <a href="{{Route('hotel.detail', ['slug' => @$hotel->hotel->slug])}}" class="price-btn" style="padding: 14px 40px;">Show me Hotel</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
