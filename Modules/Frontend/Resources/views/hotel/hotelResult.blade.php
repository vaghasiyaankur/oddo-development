{{-- loader --}}
<div class="loading_spiner_ d-none">
  <div class="spinner mx-auto"></div>
</div>
@if (count($hotels))
  @foreach ($hotels as $key => $hotel)
      <main data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500" class="result-main-content mt-4">
          <div class="result-main-inner">
              <div class="row">
                  <div class="col-md-4">
                      <div class="result-main-img result-swpier-img overflow-hidden">
                          <div class="swiper-s-img position-relative">
                              @auth
                                  <a href="javascript:;"
                                      class="wishlist_icon_ {{ $hotel->wishlistData($hotel->id) ? 'removeWishlist active' : 'addWishlist' }} "
                                      data-id='{{ $hotel->UUID }}'><i class="fa-solid fa-heart"></i></a>
                              @endauth
                              
                               <a href="javascript:;" class="ImagepPopup" data-id="{{ $hotel->UUID }}">
                                   <img src="{{asset('storage/' . @$hotel->mainPhoto->first()->photos)}}"
                                       class="img-wrapper ImageLoad" onerror="this.src='{{asset('assets/images/default.png')}}'" alt="hotelImage">
                               </a>
                           </div>
                       </div>
                   </div>
                   <div class="col-md-4">
                       <div class="result-main-middle ps-md-0 ps-3 pe-md-0 pe-3">
                           <div class="result-main-middle-content">
                               <a href="{{ route('hotel.detail', @$hotel->slug) }}">
                                   <h2 class="middle-content-heading pt-4 mb-1">{{ $hotel->property_name }}</h2>
                                   @for ($i = 0; $i < 5; $i++)
                                      <span><img
                                           src="{{ @$hotel->star_rating > $i ? '' . asset('assets/images/icons/start.png') : '' }}" width="13" height="13"></span>
                                    @endfor
                                    <div class="middle-content-location">
                                        <p class="mb-1"><img src="{{asset('assets/images/icons/search-h-loaction.png')}}" width="10" height="12" alt="search-icon"><span
                                                class="loaction-text mt-2 mb-0">{{ @$hotel->city->name }}{{ @$hotel->country_id
                                                    ? ',' .$hotel->country->country_name: '' }}</span>
                                        </p>
                                        <p class="loaction-text mt-2 mb-0">{{ @$hotel->street_addess }},
                                            {{ @$hotel->pos_code }}</p>
                                    </div>

                              </a>
                              <div class="middle-content-review d-flex mt-2">
                                @if($hotel->listHotelRating($hotel->id) != null)
                                <div class="total-review mt-2 mb-3">
                                    @if($hotel->listHotelRating($hotel->id) != null)
                                    <span class="total-review-text">{{ is_float($hotel->listHotelRating($hotel->id)) ? $hotel->listHotelRating($hotel->id) : number_format($hotel->listHotelRating($hotel->id),1,'.',',') }}/5</span>
                                    @else
                                    <span class="total-review-text">0/5</span>
                                    @endif
                                </div>
                                <div class="rate-show mx-2">
                                  @if ($hotel->listHotelRating($hotel->id) >= 4.5)
                                    <span class="good-text">Excellent</span>
                                  @elseif ($hotel->listHotelRating($hotel->id) >= 4)
                                   <span class="good-text">Very Good</span>
                                  @elseif ($hotel->listHotelRating($hotel->id) >= 2.5)
                                    <span class="good-text">Good</span>
                                  @elseif ($hotel->listHotelRating($hotel->id) <= 1)
                                    <span class="good-text">Very Bad</span>
                                  @else
                                    <span class="good-text">Bad</span>
                                  @endif
                                  <p class="review-text" style="margin-top: -7px;"><a href="javascript:;" class="{{$hotel->reviewCount($hotel->id) != 0 ? 'reviewPopup' :  ''}}"
                                    {{$hotel->reviewCount($hotel->id) != 0 ? 'data-bs-toggle="modal"' :  ''}} style="font-size:15px;" data-id="{{$hotel->UUID}}">{{$hotel->reviewCount($hotel->id) != 0 ? $hotel->reviewCount($hotel->id) : 0 }}  review</a></p>
                                        
                                </div>
                                @endif
                              </div>
                              <div class="middle-content-box d-flex mb-3 mt-2">
                                  <div class="middle-content-box-inner me-2">
                                      <a href="javascript:;" data-toggle="tooltip" data-placement="top" title="Calender"><img src="{{ asset('assets/images/icons/search-r-time.png') }}" alt="search-time" width="15" height="16"></a>
                                  </div>
                                  <div class="middle-content-box-inner me-2">
                                      <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#view360" data-toggle="tooltip" data-placement="top" title="360° View"><img
                                              src="{{ asset('assets/images/icons/search-360.png') }}" width="18" height="14" alt="search"></a>
                                      <!-------- view360 popup start --------->
                                      <div class="modal fade" id="view360" data-bs-backdrop="static"
                                          data-bs-keyboard="false" tabindex="-1"
                                          aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                          <div class="modal-dialog modal-fullscreen modal-dialog-centered">
                                              <div class="modal-content">
                                                  <div class="modal-header justify-content-end">
                                                      <button type="button" data-bs-dismiss="modal"
                                                          class="modal-close" aria-label="Close"><i
                                                              class="fa-solid fa-xmark"></i></button>
                                                  </div>
                                                  <div class="modal-body py-sm-5 display-flex-items">
                                                      <div class="modal-body-img text-center">
                                                          <img src="{{ asset('assets/images/search-360.webp') }}" alt="search" width="18" height="14">
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <!-------- view360 popup end --------->
                                  </div>
                                  <div class="middle-content-box-inner me-2">
                                      <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                          data-toggle="tooltip" data-placement="top"
                                          title="Price Comparision"><img
                                              src="{{ asset('assets/images/icons/search-doller.png') }}" alt="doller" height="16" width="15"></a>
                                      <!-------- Price comparision popup start -------->
                                      <div class="modal fade price-comparision-main" id="staticBackdrop"
                                          data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                          aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                          <div class="modal-dialog modal-fullscreen modal-dialog-centered">
                                              <div class="modal-content">
                                                  <div class="modal-header justify-content-end">
                                                      <button type="button" data-bs-dismiss="modal"
                                                          class="modal-close" aria-label="Close"><i
                                                              class="fa-solid fa-xmark"></i></button>
                                                  </div>
                                                  <div class="modal-body py-sm-5">
                                                      <div class="price-comparison">
                                                          <div class="price-comparison-inner">
                                                              <div
                                                                  class="price-comparison-heading d-flex align-items-center justify-content-between">
                                                                  <div class="comparison-title">
                                                                      <h3>Price Comparison <span
                                                                              class="exclamation-icon"><img
                                                                                  src="{{ asset('assets/images/icons/price-c-ex.png') }}"></span>
                                                                      </h3>
                                                                  </div>
                                                                  <div class="comparison-text"><span>Price for
                                                                          03:50 min</span></div>
                                                              </div>
                                                              <div class="comparison-final-price">
                                                                  <p>Your final price:</p>
                                                              </div>
                                                              <div class="price-comparison-middle">
                                                                  <div class="price-comparison-wrapper">
                                                                      <div class="row">
                                                                          <div class="col-sm-8">
                                                                              <div
                                                                                  class="price-comparison-details">
                                                                                  <h5 class="purple">First Hotel
                                                                                  </h5>
                                                                                  <p>12 Nights, 2 Guests </p>
                                                                                  <p>
                                                                                      2 Rooms, 2 King beds, 2 Single
                                                                                      beds
                                                                                  </p>
                                                                                  <h6>odda</h6>
                                                                              </div>
                                                                          </div>
                                                                          <div class="col-sm-4 pt-4">
                                                                              <div class="price-comparison-info">
                                                                                  <p>Price Guaranteed</p>
                                                                                  <a href="javascript:;"
                                                                                      class="btn price-comparison-btn">$145</a>
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                                  <div class="price-add-btn text-center"><a
                                                                          href="javascript:;"
                                                                          class="btn price-add-button bg-purple">
                                                                          Add</a></div>
                                                              </div>
                                                              <div class="price-other-main">
                                                                  <h6 class="price-other-head">Others:</h6>
                                                                  <div class="price-other-inner">
                                                                      <div class="price-other-wrapper mb-2">
                                                                          <div
                                                                              class="row align-items-center justify-content-between">
                                                                              <div class="col-sm-4 text-center">
                                                                                  <div class="other-price-img">
                                                                                      <img src="{{ asset('assets/images/icons/booking-ar21 1.png') }}"
                                                                                          alt="">
                                                                                  </div>
                                                                              </div>
                                                                              <div class="col-4">
                                                                                  <div class="other-middle-text">
                                                                                      Booking</div>
                                                                              </div>
                                                                              <div class="col-4">
                                                                                  <div class="other-price-text">
                                                                                      $160</div>
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                      <div class="price-other-wrapper mb-2">
                                                                          <div
                                                                              class="row align-items-center justify-content-between">
                                                                              <div class="col-sm-4 text-center">
                                                                                  <div class="other-price-img">
                                                                                      <img src="{{ asset('assets/images/icons/Frame.png') }}"
                                                                                          alt="">
                                                                                  </div>
                                                                              </div>
                                                                              <div class="col-4">
                                                                                  <div class="other-middle-text">
                                                                                      Expedia</div>
                                                                              </div>
                                                                              <div class="col-4">
                                                                                  <div class="other-price-text">
                                                                                      $175</div>
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                      <div class="price-other-wrapper mb-2">
                                                                          <div
                                                                              class="row align-items-center justify-content-between">
                                                                              <div class="col-sm-4 text-center">
                                                                                  <div class="other-price-img">
                                                                                      <img src="{{ asset('assets/images/icons/praice-pop3.png') }}"
                                                                                          alt="">
                                                                                  </div>
                                                                              </div>
                                                                              <div class="col-4">
                                                                                  <div class="other-middle-text">
                                                                                      Travelocity</div>
                                                                              </div>
                                                                              <div class="col-4">
                                                                                  <div class="other-price-text">
                                                                                      $180</div>
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                      <div class="price-other-wrapper mb-2">
                                                                          <div
                                                                              class="row align-items-center justify-content-between">
                                                                              <div class="col-sm-4 text-center">
                                                                                  <div class="other-price-img">
                                                                                      <img src="{{ asset('assets/images/icons/price-pop4.png') }}"
                                                                                          alt="">
                                                                                  </div>
                                                                              </div>
                                                                              <div class="col-4">
                                                                                  <div class="other-middle-text">
                                                                                      Ctrip</div>
                                                                              </div>
                                                                              <div class="col-4">
                                                                                  <div class="other-price-text">
                                                                                      $190</div>
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <!-------- Price comparision popup end -------->
                                  </div>
                                  <a href="javascript:;" data-bs-toggle="modal"
                                      data-bs-target="#facilities_{{ $key }}" data-toggle="tooltip" data-placement="top" title="Location">
                                      <div class="middle-content-box-inner me-2">
                                          <img src="{{ asset('assets/images/icons/search-h-loaction.png') }}" alt="location" width="10" height="12">
                                      </div>
                                  </a>
                                  <!-------- Location popup start -------->
                                  <div class="modal fade location-popup-main" id="facilities_{{ $key }}"
                                      data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                      aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-fullscreen modal-dialog-centered">
                                          <div class="modal-content">
                                              <div class="modal-header justify-content-end">
                                                  <button type="button" data-bs-dismiss="modal"
                                                      class="modal-close" aria-label="Close"><i
                                                          class="fa-solid fa-xmark"></i></button>
                                              </div>
                                              <div class="modal-body py-sm-5">
                                                  <div class="location-popup overflow-hidden">
                                                      <div class="location-popup-inner">
                                                          <div class="location-popup-locat position-relative">
                                                              <div class="loaction-popup-gmap">
                                                                  <iframe
                                                                      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d788790.9018211137!2d-3.794533563867567!3d39.44188449494803!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xc42e3783261bc8b%3A0xa6ec2c940768a3ec!2sSpain!5e0!3m2!1sen!2sin!4v1651900367722!5m2!1sen!2sin"
                                                                      width="1030" height="381"
                                                                      style="border:0;" allowfullscreen=""
                                                                      loading="lazy"
                                                                      referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                              </div>
                                                              <div class="location-popup-hilton">
                                                                  <img src="{{ asset('assets/images/icons/location-popup-L.webp') }}"
                                                                      alt="">
                                                              </div>
                                                              <div class="loaction-dist-radius">
                                                                  <div class="dist-radius-innner">
                                                                      <div class="dist-radius-content">
                                                                          <h5 class="mt-4 text-center">Distance
                                                                              Radius</h5>
                                                                          <div class="dist-radius-total">
                                                                              <p class="m-0">1.5</p>
                                                                          </div>
                                                                          <div
                                                                              class="dist-radius-mile-text text-center">
                                                                              <p>Miles</p>
                                                                          </div>
                                                                          <div class="dist-radius-rang pe-3 ps-3">
                                                                              <input type="range"
                                                                                  class="form-range"
                                                                                  id="customRange1">
                                                                          </div>
                                                                          <div
                                                                              class="dist-radius-mile d-flex justify-content-between">
                                                                              <span>0.5mi</span><span>5mi</span>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          <div class="loaction-popup-content-box">
                                                              <div
                                                                  class="loaction-popup-box-main  position-relative">
                                                                  <div class="small-box-main d-flex">
                                                                      @foreach ($hotel->facilities() as $facilities)
                                                                          <div
                                                                              class="small-box-wrapper d-flex jstify-content-between align-items-center ms-3 me-2">
                                                                              <div class="small-box-single-img "
                                                                                  style="background-color: {{ @$facilities->color }} !important;">
                                                                                  <i id="img-icon"
                                                                                      class="{{ @$facilities->icon }}"></i>
                                                                              </div>
                                                                              <div
                                                                                  class="small-box-text ps-2 pe-3">
                                                                                  <span>{{ @$facilities->facilities_name }}</span>
                                                                              </div>
                                                                          </div>
                                                                      @endforeach
                                                                  </div>
                                                                  <div class="loaction-popup-card d-flex mb-4">
                                                                      @foreach ($hotel->facilities() as $facilities)
                                                                          <div
                                                                              class="location-popup-card-single ms-3 mt-4">
                                                                              <div class="card-single-head d-flex align-items-center bg-purple"
                                                                                  style="background-color: {{ @$facilities->color }} !important;color: white;">
                                                                                  <div class="card-head-img pe-3">
                                                                                      <i id="img-icon"
                                                                                          class="{{ @$facilities->icon }}"></i>
                                                                                  </div>
                                                                                  <div class="card-head-text">
                                                                                      {{ @$facilities->facilities_name }}
                                                                                  </div>
                                                                              </div>
                                                                              <div class="card-content"
                                                                                  style="max-height: 200px;max-width: 240px;">
                                                                                  <p class="mb-2">
                                                                                      {{ $facilities->description }}
                                                                                  </p>
                                                                              </div>
                                                                          </div>
                                                                      @endforeach
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <!-------- Location popup end -------->
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4 border-left">
                    <div class="result-right-content mt-3 ps-3 pe-3 ">
                      <div class="result-right-inner">
                        <div class="right-select">
                          <div class="dropdown">
                            <?php 
                              $facilities = $hotel->facilities();
                              $amenities = $hotel->amenityData();
                            ?>
                            <button class="btn w-100 dropdown-toggle text-start facilityAmenityData{{$hotel->id}}" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" data-bs-toggle="dropdown" data-bs-display="static" data-bs-target="#dropdownMenuButton1" aria-expanded="false">
                              @if ($facilities->count() > 0)
                                Facilities
                              @elseif ($amenities->count() > 0)
                                Amenities
                              @else
                                What’s nearby
                              @endif
                            </button>
                                <ul class="dropdown-menu w-100 p-0" aria-labelledby="dropdownMenuButton1">
                                    @if ($facilities->count() > 0)
                                      <li><a id="facilities_value" class="dropdown-item text-center facilityAmenity" data-value="Facilities" data-hotel_id="{{$hotel->id}}">Facilities</a></li>
                                    @endif
                                    
                                    @if ($amenities->count() > 0)
                                      <li><a id="amenities_value" class="dropdown-item text-center facilityAmenity" data-value="Amenities" data-hotel_id="{{$hotel->id}}">Amenities</a></li>
                                    @endif
                                </ul>
                                </div>
                                  <div class="dropdown-list">
                                    <ul class="list-options dataList nearByDataList{{$hotel->id}}" data-hotel_id="{{$hotel->id}}">
                                      @if ($facilities->count() > 0)
                                        @foreach ($facilities as $facilities)
                                          <li>{{$facilities->facilities_name}}</li>
                                        @endforeach
                                      @else
                                        @foreach ($amenities as $amenities)
                                        <li>{{$amenities->amenities}}</li>
                                        @endforeach
                                      @endif
                                    </ul>
                                    @if ($facilities->count() > 6 || $amenities->count() > 6)
                                      <a href="{{ route('hotel.detail', $hotel->slug) }}" class="see_all_btn d-none seeAllData{{$hotel->id}}">See All</a>
                                    @endif
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </main>
      <div data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-offset="0"
          class="search-result-price-tag position-relative ">
          @if (count($hotelAmounts))
            @foreach ($hotelAmounts as  $hotelAmount)
              @foreach ($hotelAmount as $key => $item)
                @if ($key == $hotel->id)
                  <button class="price-btn hotelPayment" data-id="{{@$hotel->UUID}}">{{currency()['sumbol'] }} {{ @$item }} {{currency()['currency'] }}</button>

                  <input type="hidden" value="{{ @$item }}" class="amount_data_{{ $hotel->UUID }}">
                @endif
              @endforeach
            @endforeach
          @else
          <button class="hotelPriceBtn price-btn">  {{currency()['sumbol'] }} {{number_format(exchange_rate(@$hotel->room->price_room))
          }}  {{currency()['currency'] }}</button>
          @endif
      </div>
      {{-- PAYMENT SUCCESS-POPOUP START --}}
      <div class="modal fade payment_details_popup" id="success_payment" data-bs-backdrop="static"
          data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-fullscreen modal-dialog-centered">
              <div class="modal-content">
                  <div class="modal-body py-sm-5 ">
                      <div class="payment-details-box" style="padding: 22px 25px;min-height: 402px;">
                        <div class="success_popup_inner position-relative">
                            <button type="button" data-bs-dismiss="modal" class="modal-close position-absolute top-0 end-0"
                                aria-label="Close"><i class="fa-solid fa-xmark text-dark"></i></button>
                              <div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;">
                                  <div class="swal2-success-circular-line-left"
                                      style="background-color: rgb(255, 255, 255);"></div>
                                  <span class="swal2-success-line-tip"></span> <span
                                      class="swal2-success-line-long"></span>
                                  <div class="swal2-success-ring"></div>
                                  <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);">
                                  </div>
                                  <div class="swal2-success-circular-line-right"
                                      style="background-color: rgb(255, 255, 255);"></div>
                              </div>
                              <div class="success_innerdetails mb-5">
                                  <h6 class="text-muted mb-3 text-uppercase bookingId">Booking Ref :
                                    @if(isset($booking))
                                      {{ $booking->UUID ? $booking->UUID : '' }}
                                    @endif</h6>

                                  <h4 class="text-bold mb-2">You successfully created your booking</h4>
                                  <h6 class="text-muted">To print your booking <span class="print--link"><a
                                              href="javascript:;">click here</a></span></h6>
                              </div>
                              <div class="back-tophome-btn">
                                  <a href="{{ route('home.index') }}" class="go-home-btn text-dark">Go Home</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      {{-- PAYMENT SUCCESS-POPOUP END --}}

      {{-- PAYMENT ERROR-POPOUP START --}}
      <div class="modal fade payment_details_popup" id="payment_error_" data-bs-backdrop="static"
          data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-fullscreen modal-dialog-centered">
              <div class="modal-content">
                  <div class="modal-body py-sm-5 ">
                      <div class="payment-details-box" style="padding: 22px 25px;min-height: 402px;">
                          <div class="success_popup_inner position-relative">
                            <button type="button" data-bs-dismiss="modal" class="modal-close position-absolute top-0 end-0"
                            aria-label="Close"><i class="fa-solid fa-xmark text-dark"></i></button>
                              <div class="swal2-icon swal2-error swal2-icon-show" style="display: flex;"><span
                                      class="swal2-x-mark">
                                      <span class="swal2-x-mark-line-left"></span>
                                      <span class="swal2-x-mark-line-right"></span>
                                  </span>
                              </div>
                              <div class="success_innerdetails mb-5">
                                  <h4 class="text-bold mb-3">Unfortunately we have an issue with your payment,try
                                      again later</h4>
                                  <h6 class="text-muted mb-3 text-uppercase">Booking Ref :
                                    @if(isset($booking))
                                    {{ $booking->UUID ? $booking->UUID : '' }}
                                    @endif
                                </h6>
                              </div>
                              <div class="back-tophome-btn">
                                  <a href="{{ route('home.index') }}" class="try-again-btn text-dark">Try Again</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      {{-- PAYMENT ERROR-POPOUP END --}}
  @endforeach
@endif

{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script>
      $(document).ready(function () {

        $('.facilityAmenity').on('click', function () {
            var btnText = 'See All';
            var selectedValue = $(this).data('value');
            var hotel_id = $(this).data('hotel_id');
            $('.facilityAmenityData' + hotel_id).text(selectedValue);
            $('.see_all_' + selectedValue + hotel_id).text(btnText);

            $.ajax({
                url: "{{ route('hotel.index') }}",
                method: 'GET',
                data: { hotel_id : hotel_id, selected_value: selectedValue },
                success: function (data) {
                
                  if (data.length > 6) 
                  {                    
                    $('.seeAllData' + hotel_id).removeClass('d-none');
                  }else {                    
                    $('.seeAllData' + hotel_id).addClass('d-none');
                  }

                  var optionsList = $('.nearByDataList' + hotel_id);
                  optionsList.empty();

                    // Append the retrieved values to the list
                    $.each(data, function (index, value) {
                        optionsList.append('<li class="list-item">' + value + '</li>');
                    });
                    displayData();
                },
                error: function (error) {
                    console.log('Error:', error);
                }
            });
          });
        displayData();
        
        function displayData() {
            $(".dataList").each(function() {
                var hotel_id = $(this).data("hotel_id");
                var dataCount = $(".nearByDataList" + hotel_id + " li").length;
                if (dataCount > 6) {
                    $('.seeAllData' + hotel_id).removeClass('d-none');
                }
                var itemsCount = $(this).children("li").length;
                if (itemsCount > 6) {
                    $(this).children("li").slice(6).hide();
                }
            });
        }
      });

</script>
