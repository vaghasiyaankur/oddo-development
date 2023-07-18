<div class="tab-pane fade show p-a-tabcontent-inner tab-Hotel" id="Cities_data" role="tabpanel"
    aria-labelledby="pills-overview-tab">
    <div class="saved-hotels-details p-a-details pt-4 pb-5">
        <div class="row hotel-wrapper mb-5 p-a-swpier">
            @foreach ($hotels as $hotel)
            <div class="col-4 p-3">
                <div class="card hotel-box h-100">
                    <img src="{{ @$hotel->hotel->mainPhoto->first()->photos ? asset('storage/'.@$hotel->hotel->mainPhoto->first()->photos) : asset('assets/images/default.png') }}" class="img-fluid HotelImage" alt="" onerror="this.src='{{asset('assets/images/default.png')}}'">
                    <div class="content">
                        <div class="d-flex justify-content-between mb-4">
                            <h5 class="mb-0">{{ @$hotel->hotel->property_name }}</h5>
                            <div class="d-flex">
                                <span class="d-l-Purple">
                                    <img
                                        src="{{asset('assets/images/location-icon.png')}}" alt=""
                                        class="img-fluid">
                                </span>
                                <span class="px-2">
                                     {{ $hotel->hotel->city->name }}
                                      {{-- {{ @$hotel->hotel->country->country_name }} --}}
                                </span>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-between hotel-guests">
                            <div class="col-4 hotel-guests-inner d-flex mb-1 px-1">
                                <div class="d-flex align-items-center justify-content-center w-100">
                                    <span class="d-l-Purple">
                                        <img
                                        src="{{asset('assets/images/user-icon.png')}}" class="img-fluid"
                                        alt=""> 
                                    </span>
                                    <span class="purple-dark ps-2">
                                         {{ @$hotel->hotel->room->guest_stay_room }} Adults
                                     </span> 
                                </div>
                            </div>
                            <div class="col-4 hotel-guests-inner d-flex mb-1 px-1">
                                <div class="d-flex align-items-center justify-content-center w-100">
                                    <span class="d-l-Purple">
                                        <img src="{{asset('assets/images/bed-icon.png')}}"
                                        class="img-fluid" alt="">
                                    </span>
                                    <span class="purple-dark ps-2">
                                        {{ @$hotel->hotel->room->bed->bedType->bed_type }}
                                     </span> 
                                </div>
                            </div>
                            <div class="col-4 hotel-guests-inner d-flex mb-1 px-1">
                                <div class="d-flex align-items-center justify-content-center w-100">
                                    <span class="d-l-Purple">
                                        <img src="{{asset('storage/images/home-icon.png')}}"
                                                class="img-fluid" alt="">
                                    </span>
                                    <span class="purple-dark ps-2">
                                        {{ @$hotel->hotel->room->number_of_room }} Rooms
                                     </span> 
                                </div>
                            </div>
                          
                        </div>
                    </div>
                    <div class="search-result-price__tag b-1 p-a-details-btn">
                        <a href="{{Route('hotel.detail', ['slug' => @$hotel->hotel->slug])}}" class="price-btn d-flex justify-content-between w-100">
                           <span>Show me Hotel</span> 
                           <span><i class="fa-solid fa-arrow-right"></i></span>
                        </a>
                        
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
