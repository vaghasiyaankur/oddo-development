<div class="tab-pane fade show p-a-tabcontent-inner tab-Hotel" id="Cities_data" role="tabpanel"
    aria-labelledby="pills-overview-tab">
    <div class="saved-hotels-details p-a-details pt-4 pb-5">
        <div class="row hotel-wrapper mb-5 p-a-swpier">
            @foreach ($hotels as $hotel)
            <div class="col-4 px-3">
                <div class="hotel-box">
                    <img src="{{ @$hotel->hotel->mainPhoto->first()->photos ? asset('storage/'.@$hotel->hotel->mainPhoto->first()->photos) : asset('assets/images/default.png') }}" class="img-fluid HotelImage" alt="" onerror="this.src='{{asset('assets/images/default.png')}}'">
                    <div class="content">
                        <h5 class="mb-3">{{ @$hotel->hotel->property_name }}</h5>
                        <div class="d-flex mb-3">
                            <span class="d-l-Purple">
                                <img
                                    src="{{ asset('assets/images/icons/search-h-loaction.png') }}" alt=""
                                    class="img-fluid">
                            </span>
                            <span>
                                 {{ $hotel->hotel->city->name }}, {{ @$hotel->hotel->country->country_name }}</span>
                        </div>
                        <div class="d-flex mb-3">
                            <span class="d-l-Purple">
                                <img
                                src="{{ asset('assets/images/icons/order-hotel-icon2.png') }}" class="img-fluid"
                                alt=""> 
                            </span>
                            <span class="purple-dark">
                                 {{ @$hotel->hotel->room->guest_stay_room }} Adults
                             </span> 
                        </div>
                        <div class="d-flex mb-3">
                            <span class="d-l-Purple">
                                <img src="{{ asset('assets/images/icons/order-hotel-icon3.png') }}"
                                        class="img-fluid" alt="">
                            </span>
                            <span class="purple-dark">
                                {{ @$hotel->hotel->room->number_of_room }}
                                Rooms
                             </span> 
                        </div>
                        <div class="d-flex mb-3">
                            <span class="d-l-Purple">
                                <img src="{{ asset('assets/images/icons/order-hotel-icon3.png') }}"
                                class="img-fluid" alt="">
                            </span>
                            <span class="purple-dark">
                                {{ @$hotel->hotel->room->bed->bedType->bed_type }}
                             </span> 
                        </div>
                        
                        
                    </div>
                    <div class="search-result-price__tag b-1 p-a-details-btn">
                        <a href="{{Route('hotel.detail', ['slug' => @$hotel->hotel->slug])}}" class="price-btn">Show me Hotel</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
