@if($wishlists == null)
    <input type="hidden" class="hotelCount" value="0">
     {{-- No Data Found For wishlist --}}
     <div class="check-in-out py-2">
        <div class="check-in-out-inner">
            <div class="empty-table w-100 text-center py-4">
                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                  colors="primary:#405189,secondary:#0ab39c" style="width:72px;height:72px;">
                </lord-icon>
                <h4>No Wishlist has been added yet.</h4>
                <h6 class="mb-3">Add a Your Wishlist by simpley clicking on the button.</h6>
                <div class="check-in-out-btn text-center me-lg-3 mx-auto">
                    <a href="{{ Route('hotel.index') }}" class="btn search-btn purple">Add Your Wishlist</a>
                </div>
              </div>
        </div>
    </div>
    {{-- End No Data Found For wishlist --}}
@else
    @foreach ($wishlists as $items)
        @foreach ($items as $wishlistItems)
            <input type="hidden" class="hotelCount" value="{{$wishlistItems->count()}}">
            @foreach ($wishlistItems as $hotel)
                <div class="col-sm-6 col-lg-3 mt-4 mb-4 mb-lg-0">
                    <div class="hotel-box mx-auto mx-lg-0">
                        <img src="{{@$hotel->mainPhoto->first()->photos ? asset('storage/'.@$hotel->mainPhoto->first()->photos) : asset('assets/images/default.png') }}" class="w-100" 
                        onerror="this.src='{{asset('assets/images/default.png')}}'" alt="">
                        <div class="content">
                            <h5 class="ms-2">{{$hotel->property_name}}</h5>
                            <span class="d-l-Purple mb-3 ms-2"><img src="{{ asset('assets/images/icons/search-h-loaction.png') }}" alt=""
                                    class="mb-2 me-2">
                                    {{@$hotel->city->name }}{{@$hotel->country_id ? ',
                                    '.$hotel->country->country_name : ''}}</span>
                            {{-- <p class="d-l-Purple mt-2 mb-1 ms-1"><span class="purpel-text fw-bold">10/19/20 -
                                    10/22/20 </span> 3 nights</p> --}}
                                    <p class="d-l-Purple mt-2 mb-1 ms-1"><span class="purple-dark"><img src="{{asset('assets/images/icons/order-hotel-icon2.png')}}" alt=""> {{$hotel->room->guest_stay_room}} Person</span></p>
                            <div class="text-with--btn d-flex justify-content-between">
                                <div class="king_room">
                                    <span><img src="assets/images/icons/order-hotel-icon3.png" alt="">{{$hotel->room->count()}}
                                        Rooms</span>
                                    <p class="mb--0 ms-4 ps-2 purple-dark">1 King, 1 Queen</p>
                                </div>
                                <div class="icons_ d-flex align-items-center">
                                    {{-- <a href="javacsript:;"><img src="assets/images/icons/pluse-big-blue.png" class="me-1" alt=""></a> --}}
                                    <a href="javacsript:;" class="removeWishlist" data-id="{{$hotel->UUID}}"><img src="assets/images/icons/remove-b.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="search-result-price__tag b-1 position-relative">
                        <a href="{{ route('hotel.detail', @$hotel->slug) }}" class="price-btn ">Show me Hotels</a>
                    </div>
                </div>      
            @endforeach
        @endforeach
    @endforeach
@endif
