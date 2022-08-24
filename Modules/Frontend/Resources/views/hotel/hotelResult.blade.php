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

                                  <a href="#" data-bs-toggle="modal" data-bs-target="#image_{{ $hotel->UUID }} ">
                                      <img src="{{ asset('storage/' . @$hotel->mainPhoto->first()->photos) }}"
                                          class="img-wrapper">
                                  </a>
                              </div>
                              <!------- img slider popup start -------->
                              <div class="modal fade img-popup-slider" id="image_{{ $hotel->UUID }}" tabindex="-1"
                                  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-fullscreen modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header justify-content-end">
                                              <button type="button" data-bs-dismiss="modal" class="modal-close"
                                                  aria-label="Close">
                                                  <i class="fa-solid fa-xmark"></i>
                                              </button>
                                          </div>
                                          <div class="modal-body display-flex-items py-sm-5">
                                              <div class="img-swiper">
                                                  <div class="slider slider-single mb-5">
                                                      @foreach ($hotel->photos as $photo)
                                                          <div class="slider-single-img"><img
                                                                  src="{{ asset('storage/' . @$photo->photos) }}"
                                                                  alt="" style="width: 857px; height: 551px;">
                                                          </div>
                                                      @endforeach
                                                  </div>
                                                  <div class="slider slider-nav">
                                                      @foreach ($hotel->photos as $photo)
                                                          <div class="slder-nav-img"><img
                                                                  src="{{ asset('storage/' . @$photo->photos) }}"
                                                                  class="me-2" alt=""
                                                                  style="width: 72px; height: 72px;">
                                                          </div>
                                                      @endforeach
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!------- img slider popup end -------->
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="result-main-middle ps-md-0 ps-3 pe-md-0 pe-3">
                              <div class="result-main-middle-content">
                                  <a href="{{ route('hotel.detail', @$hotel->slug) }}">
                                      <h2 class="middle-content-heading pt-4 mb-1">{{ $hotel->property_name }}</h2>
                                  </a>
                                  <div class="middle-content-location">
                                      <p class="mb-1"><img src="assets/images/icons/search-h-loaction.png"><span
                                              class="loaction-text">{{ @$hotel->city->name }}{{ @$hotel->country_id
                                                  ? ',
                                                                                                                                                                                                                                                          ' .
                                                      $hotel->country->country_name
                                                  : '' }}</span>
                                      </p>
                                      <p class="loaction-text mb-3">{{ @$hotel->street_addess }},
                                          {{ @$hotel->pos_code }}</p>
                                  </div>
                                  <div class="middle-content-review">
                                      <p class="m-0 review-text text-decoration-underline"><a href="#"
                                              data-bs-toggle="modal" data-bs-target="#reviewspopup">1024 reviews</a></p>
                                      <!-------- Reviews Popup Start -------->
                                      <div class="modal fade reviews-popup-main" id="reviewspopup"
                                          data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                          aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                          <div
                                              class="modal-dialog modal-dialog-scrollable modal-fullscreen modal-dialog-centered">
                                              <div class="modal-content">
                                                  <div class="modal-header justify-content-end">
                                                      <button type="button" data-bs-dismiss="modal" class="modal-close"
                                                          aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                                  </div>
                                                  <div class="modal-body py-sm-5">
                                                      <div class="reviews-popup overflow-auto">
                                                          <div class="reviews-popup-inner">
                                                              <div
                                                                  class="reviews-popup-heading d-flex justify-content-between align-items-center flex-wrap">
                                                                  <div class="reviews-heading">
                                                                      <h4 class="m-0">First Hotel Reviews</h4>
                                                                      <p class="m-0">Madrid, Spain.</p>
                                                                      <div class="reviews-star">
                                                                          <span><img
                                                                                  src="assets/images/icons/start.png"></span>
                                                                          <span><img
                                                                                  src="assets/images/icons/start.png"></span>
                                                                          <span><img
                                                                                  src="assets/images/icons/start.png"></span>
                                                                          <span><img
                                                                                  src="assets/images/icons/start.png"></span>
                                                                          <span><img
                                                                                  src="assets/images/icons/start.png"></span>
                                                                      </div>
                                                                  </div>
                                                                  <div class="total-review mt-2 mb-3">
                                                                      <span class="good-text">Good</span>
                                                                      <span class="total-review-text ms-3">8/10</span>
                                                                  </div>
                                                              </div>
                                                              <div class="popup-content-main">
                                                                  <div class="popup-content-first">
                                                                      <div class="row">
                                                                          <div class="col-md-4">
                                                                              <div class="review-popup-img">
                                                                                  <img src="assets/images/reviews-popup-1.png"
                                                                                      class="img-fluid w-100">
                                                                              </div>
                                                                          </div>
                                                                          <div class="col-md-3 col-sm-5">
                                                                              <div class="review-section">
                                                                                  <div
                                                                                      class="review-section-total-review d-flex align-items-center justify-content-between mt-2">
                                                                                      <span
                                                                                          class=" para-fs-14">Staff</span>
                                                                                      <span
                                                                                          class="review-section-text bg-green">8/10</span>
                                                                                  </div>
                                                                                  <div
                                                                                      class="review-section-total-review d-flex align-items-center justify-content-between mt-2">
                                                                                      <span
                                                                                          class="para-fs-14">Amenities</span>
                                                                                      <span
                                                                                          class="review-section-text bg-red">2/10</span>
                                                                                  </div>
                                                                                  <div
                                                                                      class="review-section-total-review d-flex align-items-center justify-content-between mt-2">
                                                                                      <span
                                                                                          class="para-fs-14">Cleanless</span>
                                                                                      <span
                                                                                          class="review-section-text bg-orange">5/10</span>
                                                                                  </div>
                                                                                  <div
                                                                                      class="review-section-total-review d-flex align-items-center justify-content-between mt-2">
                                                                                      <span
                                                                                          class="para-fs-14">Room</span>
                                                                                      <span
                                                                                          class="review-section-text bg-green">8/10</span>
                                                                                  </div>
                                                                                  <div
                                                                                      class="review-section-total-review d-flex align-items-center justify-content-between mt-2">
                                                                                      <span
                                                                                          class="para-fs-14">Breakfast</span>
                                                                                      <span
                                                                                          class="review-section-text bg-red">3/10</span>
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                          <div
                                                                              class="col-md-3 col-sm-5 p-sm-0 offset-sm-1">
                                                                              <div class="review-section">
                                                                                  <div
                                                                                      class="review-section-total-review d-flex align-items-center justify-content-between mt-2">
                                                                                      <span
                                                                                          class="para-fs-14">Internet</span>
                                                                                      <span
                                                                                          class="review-section-text bg-orange">6/10</span>
                                                                                  </div>
                                                                                  <div
                                                                                      class="review-section-total-review d-flex align-items-center justify-content-between mt-2">
                                                                                      <span class="para-fs-14">Property
                                                                                          Condition</span>
                                                                                      <span
                                                                                          class="review-section-text bg-red">2/10</span>
                                                                                  </div>
                                                                                  <div
                                                                                      class="review-section-total-review d-flex align-items-center justify-content-between mt-2">
                                                                                      <span class="para-fs-14">Service
                                                                                          & Staff</span>
                                                                                      <span
                                                                                          class="review-section-text bg-green">10/10</span>
                                                                                  </div>
                                                                                  <div
                                                                                      class="review-section-total-review d-flex align-items-center justify-content-between mt-2">
                                                                                      <span class="para-fs-14">Price /
                                                                                          Quality</span>
                                                                                      <span
                                                                                          class="review-section-text bg-orange">5/10</span>
                                                                                  </div>
                                                                                  <div
                                                                                      class="review-section-total-review d-flex align-items-center justify-content-between mt-2">
                                                                                      <span
                                                                                          class="para-fs-14">Location</span>
                                                                                      <span
                                                                                          class="review-section-text bg-green">10/10</span>
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                                  <div class="popup-reviews-comment">
                                                                      <div class="popup-reviews-comment-inner">
                                                                          <div
                                                                              class="comment-reviews-heading d-flex justify-content-between align-items-center mt-4 flex-wrap">
                                                                              <div class="comment-reviews-text">
                                                                                  <h5>Reviews (1024)</h5>
                                                                              </div>
                                                                              <div class="comment-reviews-option">
                                                                                  <select
                                                                                      class="form-select form-select-lg ">
                                                                                      <option selected>Placeholder
                                                                                      </option>
                                                                                      <option value="1">One
                                                                                      </option>
                                                                                      <option value="2">Two
                                                                                      </option>
                                                                                      <option value="3">Three
                                                                                      </option>
                                                                                  </select>
                                                                              </div>
                                                                          </div>
                                                                          <div class="reviews-comment-text-main mt-4">
                                                                              <div class="row border-bottom mt-3">
                                                                                  <div
                                                                                      class="col-sm-1 col-2 text-center">
                                                                                      <img
                                                                                          src="assets/images/icons/review-popup-2.png">
                                                                                  </div>
                                                                                  <div class="col-sm-8 col-9 p-0 ">
                                                                                      <div
                                                                                          class="reviews-comment-content">
                                                                                          <div
                                                                                              class="review-section-total-review d-flex mb-2">
                                                                                              <span
                                                                                                  class="pe-3">Henrie
                                                                                                  N.</span>
                                                                                              <span
                                                                                                  class="review-section-text bg-green">8/10</span>
                                                                                          </div>
                                                                                          <p
                                                                                              class="comment-small-text para-fs-14">
                                                                                              Traveled in June 20 - 2019
                                                                                          </p>
                                                                                          <p
                                                                                              class="reviews-comment para-fs-14">
                                                                                              I can't say enough about
                                                                                              First
                                                                                              Hotel. First Hotel saved
                                                                                              my business. We have no
                                                                                              regrets!</p>
                                                                                      </div>
                                                                                  </div>
                                                                                  <div class="col-sm-3 col-12 p-0">
                                                                                      <div class="verified-text">
                                                                                          <p
                                                                                              class="reviews-verified-text">
                                                                                              Verified Traveller</p>
                                                                                      </div>
                                                                                  </div>
                                                                              </div>
                                                                              <div class="row border-bottom mt-3">
                                                                                  <div
                                                                                      class="col-sm-1 col-2 text-center">
                                                                                      <img
                                                                                          src="assets/images/icons/review-popup-3.png">
                                                                                  </div>
                                                                                  <div class="col-sm-8 col-9 p-0 ">
                                                                                      <div
                                                                                          class="reviews-comment-content">
                                                                                          <div
                                                                                              class="review-section-total-review d-flex mb-2">
                                                                                              <span
                                                                                                  class="pe-3">Henrie
                                                                                                  N.</span>
                                                                                              <span
                                                                                                  class="review-section-text bg-green">8/10</span>
                                                                                          </div>
                                                                                          <p
                                                                                              class="comment-small-text  para-fs-14">
                                                                                              Traveled in June 20 - 2019
                                                                                          </p>
                                                                                          <p
                                                                                              class="reviews-comment  para-fs-14">
                                                                                              I can't say enough about
                                                                                              First Hotel. First Hotel
                                                                                              saved my business. We have
                                                                                              no regrets!
                                                                                          </p>
                                                                                      </div>
                                                                                  </div>
                                                                                  <div class="col-sm-3 col-12 p-0">
                                                                                      <div class="verified-text">
                                                                                          <p
                                                                                              class="reviews-verified-text">
                                                                                              Verified Traveller</p>
                                                                                      </div>
                                                                                  </div>
                                                                              </div>
                                                                              <div class="row border-bottom mt-3">
                                                                                  <div
                                                                                      class="col-sm-1 col-2 text-center">
                                                                                      <img
                                                                                          src="assets/images/icons/review-popup-2.png">
                                                                                  </div>
                                                                                  <div class="col-sm-8 col-9 p-0 ">
                                                                                      <div
                                                                                          class="reviews-comment-content">
                                                                                          <div
                                                                                              class="review-section-total-review d-flex mb-2">
                                                                                              <span
                                                                                                  class="pe-3">Henrie
                                                                                                  N.</span>
                                                                                              <span
                                                                                                  class="review-section-text bg-green">8/10</span>
                                                                                          </div>
                                                                                          <p
                                                                                              class="comment-small-text  para-fs-14">
                                                                                              Traveled in June 20 - 2019
                                                                                          </p>
                                                                                          <p
                                                                                              class="reviews-comment  para-fs-14">
                                                                                              I can't say enough about
                                                                                              First Hotel. First Hotel
                                                                                              saved my business. We have
                                                                                              no regrets!
                                                                                          </p>
                                                                                      </div>
                                                                                  </div>
                                                                                  <div class="col-sm-3 col-12 p-0">
                                                                                      <div class="verified-text">
                                                                                          <p
                                                                                              class="reviews-verified-text">
                                                                                              Verified Traveller</p>
                                                                                      </div>
                                                                                  </div>
                                                                              </div>
                                                                              <div class="row border-bottom mt-3">
                                                                                  <div
                                                                                      class="col-sm-1 col-2 text-center">
                                                                                      <img
                                                                                          src="assets/images/icons/review-popup-2.png">
                                                                                  </div>
                                                                                  <div class="col-sm-8 col-9 p-0 ">
                                                                                      <div
                                                                                          class="reviews-comment-content">
                                                                                          <div
                                                                                              class="review-section-total-review d-flex mb-2">
                                                                                              <span
                                                                                                  class="pe-3">Henrie
                                                                                                  N.</span>
                                                                                              <span
                                                                                                  class="review-section-text bg-green">8/10</span>
                                                                                          </div>
                                                                                          <p
                                                                                              class="comment-small-text  para-fs-14">
                                                                                              Traveled in June 20 - 2019
                                                                                          </p>
                                                                                          <p
                                                                                              class="reviews-comment  para-fs-14">
                                                                                              I can't say enough about
                                                                                              First Hotel. First Hotel
                                                                                              saved my business. We have
                                                                                              no regrets!
                                                                                          </p>
                                                                                      </div>
                                                                                  </div>
                                                                                  <div class="col-sm-3 col-12 p-0">
                                                                                      <div class="verified-text">
                                                                                          <p
                                                                                              class="reviews-verified-text">
                                                                                              Verified Traveller</p>
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
                                          </div>
                                      </div>
                                      <!-------- Reviews Popup End -------->
                                      @for ($i = 0; $i < 5; $i++)
                                          <span><img
                                                  src="{{ @$hotel->star_rating > $i ? '' . asset('assets/images/icons/start.png') : '' }}"></span>
                                      @endfor
                                      {{-- <span><img src="assets/images/icons/start.png"></span>
                                          <span><img src="assets/images/icons/start.png"></span>
                                          <span><img src="assets/images/icons/start.png"></span>
                                          <span><img src="assets/images/icons/start.png"></span>
                                          <span><img src="assets/images/icons/start.png"></span> --}}
                                      <div class="total-review mt-2 mb-3">
                                          <span class="total-review-text">8/10</span>
                                      </div>
                                  </div>
                                  <div class="middle-content-box d-flex mb-3">
                                      <div class="middle-content-box-inner me-2">
                                          <a href="#"><img src="assets/images/icons/search-r-time.png"></a>
                                      </div>
                                      <div class="middle-content-box-inner me-2">
                                          <a href="#" data-bs-toggle="modal" data-bs-target="#view360"><img
                                                  src="assets/images/icons/search-360.png"></a>
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
                                                              <img src="assets/images/search-360.png" alt="">
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <!-------- view360 popup end --------->
                                      </div>
                                      <div class="middle-content-box-inner me-2">
                                          <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                              data-toggle="tooltip" data-placement="top"
                                              title="Price Comparision"><img
                                                  src="assets/images/icons/search-doller.png"></a>
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
                                                                                      src="assets/images/icons/price-c-ex.png"></span>
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
                                                                                      <p>12 Nights, 2 Guests <br>
                                                                                          2 Rooms, 2 King beds, 2 Single
                                                                                          beds
                                                                                      </p>
                                                                                      <h6>odda</h6>
                                                                                  </div>
                                                                              </div>
                                                                              <div class="col-sm-4 pt-4">
                                                                                  <div class="price-comparison-info">
                                                                                      <p>Price Guaranteed</p>
                                                                                      <a href="#"
                                                                                          class="btn price-comparison-btn">$145</a>
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                      <div class="price-add-btn text-center"><a
                                                                              href="#"
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
                                                                                          <img src="assets/images/icons/booking-ar21 1.png"
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
                                                                                          <img src="assets/images/icons/Frame.png"
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
                                                                                          <img src="assets/images/icons/praice-pop3.png"
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
                                                                                          <img src="assets/images/icons/price-pop4.png"
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
                                      <a href="#" data-bs-toggle="modal"
                                          data-bs-target="#facilities_{{ $key }}">
                                          <div class="middle-content-box-inner me-2">
                                              <img src="assets/images/icons/search-h-loaction.png">
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
                                                                      <img src="assets/images/icons/location-popup-L.png"
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
                                                                                      style="background-color: {{ @$facilities->color }} !important;
                                                          color: white;">
                                                                                      <div class="card-head-img pe-3">
                                                                                          <i id="img-icon"
                                                                                              class="{{ @$facilities->icon }}"></i>
                                                                                      </div>
                                                                                      <div class="card-head-text">
                                                                                          {{ @$facilities->facilities_name }}
                                                                                      </div>
                                                                                  </div>
                                                                                  <div class="card-content"
                                                                                      style="max-height: 200px;
                                                        max-width: 240px;">
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
                                  <div class="middle-content-bottom">
                                      <p class="m-0">12 Nights, {{ @$hotel->room->guest_stay_room }} Guests, 2
                                          Rooms, 3 Beds</p>
                                      <p class="bottom-text">Tax. Included</p>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-4 border-left">
                          <div class="result-right-content mt-3 ps-3 pe-3 overflow-auto">
                              <div class="result-right-inner">
                                  <div class="right-select">
                                      <select class="form-select form-select-lg mb-3 fs-6"
                                          aria-label=".form-select-lg example">
                                          <option selected>What’s nearby</option>
                                          <option value="1">One</option>
                                          <option value="2">Two</option>
                                          <option value="3">Three</option>
                                      </select>
                                  </div>
                                  <div class="right-menu-main mb-4">
                                      <div class="right-menu-inner">
                                          @foreach ($hotel->facilities() as $facilities)
                                              <div class="right-menu mb-2">
                                                  <div class="right-menu-icon d-flex pb-1">
                                                      <div class="right-menu-icon-inner">
                                                          <i class="{{ @$facilities->icon }}"></i>
                                                      </div>
                                                      <div class="right-menu-text"><a href="javascript:;"
                                                              class="para-d-l-p">{{ @$facilities->facilities_name }}</a>
                                                      </div>
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
          </main>
          <div data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-offset="0"
              class="search-result-price-tag position-relative ">
              <button class="price-btn" data-bs-toggle="modal"
                  data-bs-target="#payment_type_{{@$hotel->UUID}}">{{ @$hotel->room->price_room }} for 1 Nights</button>
          </div>
          {{-- PAYMENT POPOUP START --}}
          <div class="modal fade payment_details_popup" id="payment_type_{{@$hotel->UUID}}" data-bs-backdrop="static" data-bs-keyboard="false"
          tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-body py-sm-5 modal-dialog-centered">
                        <div class="payment-details-box">
                            <div class="payment_popup_title d-flex justify-content-between align-items-center">
                                <h4 style="color: #6a78d2;">Payment Details</h4>
                                <button type="button" data-bs-dismiss="modal" class="modal-close" aria-label="Close"><i
                                        class="fa-solid fa-xmark text-dark"></i></button>
                            </div>
                            <div class="payment_details_inner">
                                <div class="row mb-4">
                                    <div class="col-12  left-order-list">
                                        <div class="payment--detail-box holiday-details mt-3 position-relative">
                                            <div class="hotel--img">
                                                <img src="{{ asset('storage/' . @$hotel->mainPhoto->first()->photos) }}" alt="">
                                            </div>
                                            <h5 class="h--title ms-2">{{$hotel->property_name}}</h5>
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
                                                    <p class="m-0 pe-2 h-amount">${{ @$hotel->room->price_room }}</p><span
                                                        class="h--totl text-muted">for 1 nights</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="payment_select_type">
                                    <h5 class="payment__type_title">Select your payment type</h5>
                                    <div class="row mt-3">
                                      @foreach ($paymentGateways as $paymentGateway)
                                        <div class="col-lg-4">
                                            <a class="payment--select-box mb-3 mb-lg-0" href="javascript:;">
                                                <div class="payment-logo d-flex align-items-center ">
                                                    <img class="payment_logo_icon me-2"
                                                        src="{{ asset('storage/' . $paymentGateway['payment_icon']) }}"
                                                        alt="">
                                                    <h6 class="card-title mb-0 text-dark">{{$paymentGateway->payment_type}}</h6>
                                                </div>
                                            </a>
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
          {{-- PAYMENT POPOUP END --}}
      @endforeach
  @endif
  <!----- notify me ----->
  {{-- <div class="loading_spiner_">
    <div class="spinner mx-auto"></div>
  </div> --}}
  {{-- <main data-aos="fade-up" data-aos-easing="linear" data-aos-duration="1000"
    class="result-main-content border-semidark mt-4">
    <div class="result-main-inner">
      <div class="row">
        <div class="col-md-4">
          <div class="result-main-img result-swpier-img overflow-hidden position-relative">
            <div class="swiper-s-img">
              <a href="#" data-bs-toggle="modal" data-bs-target="#imgPopup"><img src="assets/images/search-r-3.png"
                  class="img-wrapper"></a>
              <div class="sold-out-logo position-absolute top-0">
                <img src="assets/images/icons/search-soldout.png">
              </div>
            </div>
            <!------- img slider popup start -------->
            <div class="modal fade img-popup-slider" id="imgPopup" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-fullscreen modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header justify-content-end">
                    <button type="button" data-bs-dismiss="modal" class="modal-close" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>
                  </div>
                  <div class="modal-body display-flex-items py-sm-5">
                    <div class="img-swiper">
                      <div class="slider slider-single mb-5">
                        <div class="slider-single-img"><img src="assets/images/img-popup-bg.png" alt=""></div>
                        <div class="slider-single-img"><img src="assets/images/img-popup-bg.png" alt=""></div>
                        <div class="slider-single-img"><img src="assets/images/img-popup-bg.png" alt=""></div>
                        <div class="slider-single-img"><img src="assets/images/img-popup-bg.png" alt=""></div>
                        <div class="slider-single-img"><img src="assets/images/img-popup-bg.png" alt=""></div>
                        <div class="slider-single-img"><img src="assets/images/img-popup-bg.png" alt=""></div>
                        <div class="slider-single-img"><img src="assets/images/img-popup-bg.png" alt=""></div>
                        <div class="slider-single-img"><img src="assets/images/img-popup-bg.png" alt=""></div>
                        <div class="slider-single-img"><img src="assets/images/img-popup-bg.png" alt=""></div>
                        <div class="slider-single-img"><img src="assets/images/img-popup-bg.png" alt=""></div>
                        <div class="slider-single-img"><img src="assets/images/img-popup-bg.png" alt=""></div>
                        <div class="slider-single-img"><img src="assets/images/img-popup-bg.png" alt=""></div>
                        <div class="slider-single-img"><img src="assets/images/img-popup-bg.png" alt=""></div>
                        <div class="slider-single-img"><img src="assets/images/img-popup-bg.png" alt=""></div>
                        <div class="slider-single-img"><img src="assets/images/img-popup-bg.png" alt=""></div>
                      </div>
                      <div class="slider slider-nav">
                        <div class="slider-nav-img"><img src="assets/images/nav-img1.png" class="me-2" alt="">
                        </div>
                        <div class="slider-nav-img"><img src="assets/images/nav-img2.png" class="me-2" alt="">
                        </div>
                        <div class="slider-nav-img"><img src="assets/images/nav-img3.png" class="me-2" alt="">
                        </div>
                        <div class="slider-nav-img"><img src="assets/images/nav-img4.png" class="me-2" alt="">
                        </div>
                        <div class="slider-nav-img"><img src="assets/images/nav-img5.png" class="me-2" alt="">
                        </div>
                        <div class="slider-nav-img"><img src="assets/images/nav-img6.png" class="me-2" alt="">
                        </div>
                        <div class="slider-nav-img"><img src="assets/images/nav-img7.png" class="me-2" alt="">
                        </div>
                        <div class="slider-nav-img"><img src="assets/images/nav-img8.png" class="me-2" alt="">
                        </div>
                        <div class="slider-nav-img"><img src="assets/images/nav-img9.png" class="me-2" alt="">
                        </div>
                        <div class="slider-nav-img"><img src="assets/images/nav-img10.png" class="me-2" alt="">
                        </div>
                        <div class="slider-nav-img"><img src="assets/images/nav-img11.png" class="me-2" alt="">
                        </div>
                        <div class="slider-nav-img"><img src="assets/images/nav-img12.png" class="me-2" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!------- img slider popup end -------->
          </div>
        </div>
        <div class="col-md-4">
          <div class="result-main-middle ps-md-0 ps-3 pe-md-0 pe-3">
            <div class="result-main-middle-content">
              <h2 class="middle-content-heading pt-4 mb-1">First Hotel</h2>
              <div class="middle-content-location">
                <p class="mb-1"><img src="assets/images/icons/search-h-loaction.png"><span class="loaction-text">Madrid,
                    Spain</span></p>
                <p class="loaction-text mb-3">Las Ramblas Neighborhood</p>
              </div>
              <div class="middle-content-review">
                <p class="m-0 review-text text-decoration-underline"><a href="#" data-bs-toggle="modal"
                    data-bs-target="#reviewspopup">1024 reviews</a></p>
                <!-------- Reviews Popup Start -------->
                <div class="modal fade reviews-popup-main" id="reviewspopup" data-bs-backdrop="static"
                  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-scrollable modal-fullscreen modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header justify-content-end">
                        <button type="button" data-bs-dismiss="modal" class="modal-close" aria-label="Close"><i
                            class="fa-solid fa-xmark"></i></button>
                      </div>
                      <div class="modal-body py-sm-5">
                        <div class="reviews-popup overflow-auto">
                          <div class="reviews-popup-inner">
                            <div
                              class="reviews-popup-heading d-flex justify-content-between align-items-center flex-wrap">
                              <div class="reviews-heading">
                                <h4 class="m-0">First Hotel Reviews</h4>
                                <p class="m-0">Madrid, Spain.</p>
                                <div class="reviews-star">
                                  <span><img src="assets/images/icons/start.png"></span>
                                  <span><img src="assets/images/icons/start.png"></span>
                                  <span><img src="assets/images/icons/start.png"></span>
                                  <span><img src="assets/images/icons/start.png"></span>
                                  <span><img src="assets/images/icons/start.png"></span>
                                </div>
                              </div>
                              <div class="total-review mt-2 mb-3">
                                <span class="good-text">Good</span>
                                <span class="total-review-text ms-3">8/10</span>
                              </div>
                            </div>
                            <div class="popup-content-main">
                              <div class="popup-content-first">
                                <div class="row">
                                  <div class="col-md-4">
                                    <div class="review-popup-img">
                                      <img src="assets/images/reviews-popup-1.png" class="img-fluid w-100">
                                    </div>
                                  </div>
                                  <div class="col-md-3 col-sm-5">
                                    <div class="review-section">
                                      <div
                                        class="review-section-total-review d-flex align-items-center justify-content-between mt-2">
                                        <span class=" para-fs-14">Staff</span>
                                        <span class="review-section-text bg-green">8/10</span>
                                      </div>
                                      <div
                                        class="review-section-total-review d-flex align-items-center justify-content-between mt-2">
                                        <span class="para-fs-14">Amenities</span>
                                        <span class="review-section-text bg-red">2/10</span>
                                      </div>
                                      <div
                                        class="review-section-total-review d-flex align-items-center justify-content-between mt-2">
                                        <span class="para-fs-14">Cleanless</span>
                                        <span class="review-section-text bg-orange">5/10</span>
                                      </div>
                                      <div
                                        class="review-section-total-review d-flex align-items-center justify-content-between mt-2">
                                        <span class="para-fs-14">Room</span>
                                        <span class="review-section-text bg-green">8/10</span>
                                      </div>
                                      <div
                                        class="review-section-total-review d-flex align-items-center justify-content-between mt-2">
                                        <span class="para-fs-14">Breakfast</span>
                                        <span class="review-section-text bg-red">3/10</span>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-3 col-sm-5 p-sm-0 offset-sm-1">
                                    <div class="review-section">
                                      <div
                                        class="review-section-total-review d-flex align-items-center justify-content-between mt-2">
                                        <span class="para-fs-14">Internet</span>
                                        <span class="review-section-text bg-orange">6/10</span>
                                      </div>
                                      <div
                                        class="review-section-total-review d-flex align-items-center justify-content-between mt-2">
                                        <span class="para-fs-14">Property Condition</span>
                                        <span class="review-section-text bg-red">2/10</span>
                                      </div>
                                      <div
                                        class="review-section-total-review d-flex align-items-center justify-content-between mt-2">
                                        <span class="para-fs-14">Service & Staff</span>
                                        <span class="review-section-text bg-green">10/10</span>
                                      </div>
                                      <div
                                        class="review-section-total-review d-flex align-items-center justify-content-between mt-2">
                                        <span class="para-fs-14">Price / Quality</span>
                                        <span class="review-section-text bg-orange">5/10</span>
                                      </div>
                                      <div
                                        class="review-section-total-review d-flex align-items-center justify-content-between mt-2">
                                        <span class="para-fs-14">Location</span>
                                        <span class="review-section-text bg-green">10/10</span>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="popup-reviews-comment">
                                <div class="popup-reviews-comment-inner">
                                  <div
                                    class="comment-reviews-heading d-flex justify-content-between align-items-center mt-4 flex-wrap">
                                    <div class="comment-reviews-text">
                                      <h5>Reviews (1024)</h5>
                                    </div>
                                    <div class="comment-reviews-option">
                                      <select class="form-select form-select-lg ">
                                        <option selected>Placeholder</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="reviews-comment-text-main mt-4">
                                    <div class="row border-bottom mt-3">
                                      <div class="col-sm-1 col-2 text-center">
                                        <img src="assets/images/icons/review-popup-2.png">
                                      </div>
                                      <div class="col-sm-8 col-9 p-0 ">
                                        <div class="reviews-comment-content">
                                          <div class="review-section-total-review d-flex mb-2">
                                            <span class="pe-3">Henrie N.</span>
                                            <span class="review-section-text bg-green">8/10</span>
                                          </div>
                                          <p class="comment-small-text para-fs-14">Traveled in June 20 - 2019
                                          </p>
                                          <p class="reviews-comment para-fs-14">I can't say enough about First
                                            Hotel. First Hotel saved my business. We have no regrets!</p>
                                        </div>
                                      </div>
                                      <div class="col-sm-3 col-12 p-0">
                                        <div class="verified-text">
                                          <p class="reviews-verified-text">Verified Traveller</p>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row border-bottom mt-3">
                                      <div class="col-sm-1 col-2 text-center">
                                        <img src="assets/images/icons/review-popup-3.png">
                                      </div>
                                      <div class="col-sm-8 col-9 p-0 ">
                                        <div class="reviews-comment-content">
                                          <div class="review-section-total-review d-flex mb-2">
                                            <span class="pe-3">Henrie N.</span>
                                            <span class="review-section-text bg-green">8/10</span>
                                          </div>
                                          <p class="comment-small-text  para-fs-14">Traveled in June 20 - 2019
                                          </p>
                                          <p class="reviews-comment  para-fs-14">I can't say enough about
                                            First Hotel. First Hotel saved my business. We have no regrets!
                                          </p>
                                        </div>
                                      </div>
                                      <div class="col-sm-3 col-12 p-0">
                                        <div class="verified-text">
                                          <p class="reviews-verified-text">Verified Traveller</p>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row border-bottom mt-3">
                                      <div class="col-sm-1 col-2 text-center">
                                        <img src="assets/images/icons/review-popup-2.png">
                                      </div>
                                      <div class="col-sm-8 col-9 p-0 ">
                                        <div class="reviews-comment-content">
                                          <div class="review-section-total-review d-flex mb-2">
                                            <span class="pe-3">Henrie N.</span>
                                            <span class="review-section-text bg-green">8/10</span>
                                          </div>
                                          <p class="comment-small-text  para-fs-14">Traveled in June 20 - 2019
                                          </p>
                                          <p class="reviews-comment  para-fs-14">I can't say enough about
                                            First Hotel. First Hotel saved my business. We have no regrets!
                                          </p>
                                        </div>
                                      </div>
                                      <div class="col-sm-3 col-12 p-0">
                                        <div class="verified-text">
                                          <p class="reviews-verified-text">Verified Traveller</p>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row border-bottom mt-3">
                                      <div class="col-sm-1 col-2 text-center">
                                        <img src="assets/images/icons/review-popup-2.png">
                                      </div>
                                      <div class="col-sm-8 col-9 p-0 ">
                                        <div class="reviews-comment-content">
                                          <div class="review-section-total-review d-flex mb-2">
                                            <span class="pe-3">Henrie N.</span>
                                            <span class="review-section-text bg-green">8/10</span>
                                          </div>
                                          <p class="comment-small-text  para-fs-14">Traveled in June 20 - 2019
                                          </p>
                                          <p class="reviews-comment  para-fs-14">I can't say enough about
                                            First Hotel. First Hotel saved my business. We have no regrets!
                                          </p>
                                        </div>
                                      </div>
                                      <div class="col-sm-3 col-12 p-0">
                                        <div class="verified-text">
                                          <p class="reviews-verified-text">Verified Traveller</p>
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
                  </div>
                </div>
                <!-------- Reviews Popup End -------->
                <span><img src="assets/images/icons/start.png"></span>
                <span><img src="assets/images/icons/start.png"></span>
                <span><img src="assets/images/icons/start.png"></span>
                <span><img src="assets/images/icons/start.png"></span>
                <span><img src="assets/images/icons/start.png"></span>
                <div class="total-review mt-2 mb-3">
                  <span class="total-review-text">8/10</span>
                </div>
              </div>
              <div class="middle-content-box d-flex mb-3">
                <div class="middle-content-box-inner me-2">
                  <a href="#"><img src="assets/images/icons/search-r-time.png"></a>
                </div>
                <div class="middle-content-box-inner me-2">
                  <a href="#" data-bs-toggle="modal" data-bs-target="#view360"><img
                      src="assets/images/icons/search-360.png"></a>
                  <!--------- view360 popup start --------->
                  <div class="modal fade" id="view360" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-fullscreen modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header justify-content-end">
                          <button type="button" data-bs-dismiss="modal" class="modal-close" aria-label="Close"><i
                              class="fa-solid fa-xmark"></i></button>
                        </div>
                        <div class="modal-body py-sm-5 display-flex-items">
                          <div class="modal-body-img text-center">
                            <img src="assets/images/search-360.png" class="img-fluid">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--------- view360 popup end --------->
                </div>
                <div class="middle-content-box-inner me-2">
                  <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><img
                      src="assets/images/icons/search-doller.png"></a>
                  <!------- price-comparision popup start -------->
                  <div class="modal fade price-comparision-main" id="staticBackdrop" data-bs-backdrop="static"
                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-fullscreen modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header justify-content-end">
                          <button type="button" data-bs-dismiss="modal" class="modal-close" aria-label="Close"><i
                              class="fa-solid fa-xmark"></i></button>
                        </div>
                        <div class="modal-body py-sm-5">
                          <div class="price-comparison">
                            <div class="price-comparison-inner">
                              <div class="price-comparison-heading d-flex align-items-center justify-content-between">
                                <div class="comparison-title">
                                  <h3>Price Comparison <span class="exclamation-icon"><img
                                        src="assets/images/icons/price-c-ex.png"></span></h3>
                                </div>
                                <div class="comparison-text"><span>Price for 03:50 min</span></div>
                              </div>
                              <div class="comparison-final-price">
                                <p>Your final price:</p>
                              </div>
                              <div class="price-comparison-middle">
                                <div class="price-comparison-wrapper">
                                  <div class="row">
                                    <div class="col-lg-8">
                                      <div class="price-comparison-details">
                                        <h5 class="purple">First Hotel</h5>
                                        <p>12 Nights, 2 Guests <br>
                                          2 Rooms, 2 King beds, 2 Single beds
                                        </p>
                                        <h6>odda</h6>
                                      </div>
                                    </div>
                                    <div class="col-lg-4 pt-4">
                                      <div class="price-comparison-info">
                                        <p>Price Guaranteed</p>
                                        <a href="#" class="btn price-comparison-btn">$145</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="price-add-btn text-center"><a href="#"
                                    class="btn price-add-button bg-purple"> Add</a></div>
                              </div>
                              <div class="price-other-main">
                                <h6 class="price-other-head">Others:</h6>
                                <div class="price-other-inner">
                                  <div class="price-other-wrapper mb-2">
                                    <div class="row align-items-center justify-content-between">
                                      <div class="col-sm-4 text-center">
                                        <div class="other-price-img">
                                          <img src="assets/images/icons/booking-ar21 1.png" alt="">
                                        </div>
                                      </div>
                                      <div class="col-4">
                                        <div class="other-middle-text">Booking</div>
                                      </div>
                                      <div class="col-4">
                                        <div class="other-price-text"> $160</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="price-other-wrapper mb-2">
                                    <div class="row align-items-center justify-content-between">
                                      <div class="col-sm-4 text-center">
                                        <div class="other-price-img">
                                          <img src="assets/images/icons/Frame.png" alt="">
                                        </div>
                                      </div>
                                      <div class="col-4">
                                        <div class="other-middle-text">Expedia</div>
                                      </div>
                                      <div class="col-4">
                                        <div class="other-price-text"> $175</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="price-other-wrapper mb-2">
                                    <div class="row align-items-center justify-content-between">
                                      <div class="col-sm-4">
                                        <div class="other-price-img">
                                          <img src="assets/images/icons/praice-pop3.png" alt="">
                                        </div>
                                      </div>
                                      <div class="col-4">
                                        <div class="other-middle-text">Travelocity</div>
                                      </div>
                                      <div class="col-4">
                                        <div class="other-price-text"> $180</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="price-other-wrapper mb-2">
                                    <div class="row align-items-center justify-content-between">
                                      <div class="col-sm-4">
                                        <div class="other-price-img">
                                          <img src="assets/images/icons/price-pop4.png" alt="">
                                        </div>
                                      </div>
                                      <div class="col-4">
                                        <div class="other-middle-text">Ctrip</div>
                                      </div>
                                      <div class="col-4">
                                        <div class="other-price-text"> $190</div>
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
                  <!------- price-comparision popup end -------->
                </div>
                <div class="middle-content-box-inner me-2">
                  <a href="#" data-bs-toggle="modal" data-bs-target="#locationPopup"><img
                      src="assets/images/icons/search-h-loaction.png"></a>
                  <!-------- Location popup start -------->
                  <div class="modal fade location-popup-main" id="locationPopup" data-bs-backdrop="static"
                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-fullscreen modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header justify-content-end">
                          <button type="button" data-bs-dismiss="modal" class="modal-close" aria-label="Close"><i
                              class="fa-solid fa-xmark"></i></button>
                        </div>
                        <div class="modal-body py-sm-5">
                          <div class="location-popup overflow-hidden">
                            <div class="location-popup-inner">
                              <div class="location-popup-locat position-relative">
                                <div class="loaction-popup-gmap">
                                  <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d788790.9018211137!2d-3.794533563867567!3d39.44188449494803!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xc42e3783261bc8b%3A0xa6ec2c940768a3ec!2sSpain!5e0!3m2!1sen!2sin!4v1651900367722!5m2!1sen!2sin"
                                    width="1030" height="381" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                                <div class="location-popup-hilton">
                                  <img src="assets/images/icons/location-popup-L.png" alt="">
                                </div>
                                <div class="loaction-dist-radius">
                                  <div class="dist-radius-innner">
                                    <div class="dist-radius-content">
                                      <h5 class="mt-4 text-center">Distance Radius</h5>
                                      <div class="dist-radius-total">
                                        <p class="m-0">1.5</p>
                                      </div>
                                      <div class="dist-radius-mile-text text-center">
                                        <p>Miles</p>
                                      </div>
                                      <div class="dist-radius-rang pe-3 ps-3">
                                        <input type="range" class="form-range" id="customRange1">
                                      </div>
                                      <div class="dist-radius-mile d-flex justify-content-between">
                                        <span>0.5mi</span><span>5mi</span>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="loaction-popup-content-box">
                                <div class="loaction-popup-box-main  position-relative">
                                  <div class="small-box-main d-flex">
                                    <div
                                      class="small-box-wrapper d-flex jstify-content-between align-items-center ms-3 me-2">
                                      <div class="small-box-single-img ">
                                        <img src="assets/images/icons/location-popup-1.png">
                                      </div>
                                      <div class="small-box-text ps-2 pe-3">
                                        <span>Museums</span>
                                      </div>
                                    </div>
                                    <div
                                      class="small-box-wrapper d-flex jstify-content-between align-items-center me-2">
                                      <div class="small-box-single-img">
                                        <img src="assets/images/icons/location-popup-2.png">
                                      </div>
                                      <div class="small-box-text ps-2 pe-3">
                                        <span>Plazas</span>
                                      </div>
                                    </div>
                                    <div
                                      class="small-box-wrapper d-flex jstify-content-between align-items-center me-2">
                                      <div class="small-box-single-img">
                                        <img src="assets/images/icons/location-popup-3.png">
                                      </div>
                                      <div class="small-box-text ps-2 pe-3">
                                        <span> Parks </span>
                                      </div>
                                    </div>
                                    <div
                                      class="small-box-wrapper d-flex jstify-content-between align-items-center me-2">
                                      <div class="small-box-single-img">
                                        <img src="assets/images/icons/location-popup-4.png">
                                      </div>
                                      <div class="small-box-text ps-2 pe-3">
                                        <span> Markets </span>
                                      </div>
                                    </div>
                                    <div
                                      class="small-box-wrapper d-flex jstify-content-between align-items-center me-2">
                                      <div class="small-box-single-img">
                                        <img src="assets/images/icons/locaion-5.png">
                                      </div>
                                      <div class="small-box-text ps-2 pe-3">
                                        <span> Cathedrals </span>
                                      </div>
                                    </div>
                                    <div
                                      class="small-box-wrapper d-flex jstify-content-between align-items-center me-2">
                                      <div class="small-box-single-img">
                                        <img src="assets/images/icons/location-popup-6.png">
                                      </div>
                                      <div class="small-box-text ps-2 pe-3">
                                        <span> Restaurants </span>
                                      </div>
                                    </div>
                                    <div
                                      class="small-box-wrapper d-flex jstify-content-between align-items-center me-2">
                                      <div class="small-box-single-img">
                                        <img src="assets/images/icons/location-popup-7.png">
                                      </div>
                                      <div class="small-box-text ps-2 pe-3">
                                        <span> Transportation </span>
                                      </div>
                                    </div>
                                    <div
                                      class="small-box-wrapper d-flex jstify-content-between align-items-center me-2">
                                      <div class="small-box-single-img">
                                        <img src="assets/images/icons/location-popup-7.png">
                                      </div>
                                      <div class="small-box-text ps-2 pe-3">
                                        <span> Transportation </span>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="loaction-popup-card d-flex mb-4">
                                    <div class="location-popup-card-single ms-3 mt-4">
                                      <div class="card-single-head d-flex align-items-center bg-purple">
                                        <div class="card-head-img pe-3"><img
                                            src="assets/images/icons/locationpopup-card1.png"></div>
                                        <div class="card-head-text">Museums</div>
                                      </div>
                                      <div class="card-content">
                                        <p class="mb-2">Museo del Prado </p>
                                        <p class="mb-2">Thyssen-Bornemisza Museum</p>
                                        <p class="mb-2">Museo Nacional Centro de Arte </p>
                                        <p class="mb-2">Atocha Headquarters (Sabatini and Nouvel buildings)
                                        </p>
                                        <p class="mb-2">Palacio de Velázquez (Retiro Park) </p>
                                        <p class="mb-2">Palacio de Cristal (Retiro Park) </p>
                                      </div>
                                    </div>
                                    <div class="location-popup-card-single mt-4">
                                      <div class="card-single-head d-flex align-items-center bg-green">
                                        <div class="card-head-img pe-3"><img
                                            src="assets/images/icons/locationpopup-card2.png"></div>
                                        <div class="card-head-text">Parks</div>
                                      </div>
                                      <div class="card-content">
                                        <p class="mb-2">Museum of Entomology (UCM) </p>
                                        <p class="mb-2">Hispanic Pharmacy Museum (UCM)</p>
                                        <p class="mb-2">Museum of Geology (UCM)</p>
                                        <p class="mb-2">Museum of Dentistry "Luis de Macorra" UCM</p>
                                      </div>
                                    </div>
                                    <div class="location-popup-card-single mt-4">
                                      <div class="card-single-head d-flex align-items-center bg-green-two">
                                        <div class="card-head-img pe-3"><img
                                            src="assets/images/icons/locationpopup-card3.png"></div>
                                        <div class="card-head-text">Markets</div>
                                      </div>
                                      <div class="card-content">
                                        <p class="mb-2">Museum of Entomology (UCM) </p>
                                        <p class="mb-2">Hispanic Pharmacy Museum (UCM)</p>
                                        <p class="mb-2">Museum of Geology (UCM)</p>
                                        <p class="mb-2">Museum of Dentistry "Luis de Macorra" UCM</p>
                                      </div>
                                    </div>
                                    <div class="location-popup-card-single mt-4">
                                      <div class="card-single-head d-flex align-items-center bg-purple-2">
                                        <div class="card-head-img pe-3"><img
                                            src="assets/images/icons/locationpopup-card4.png"></div>
                                        <div class="card-head-text">Beaches</div>
                                      </div>
                                      <div class="card-content">
                                        <p class="mb-2">Museum of Entomology (UCM) </p>
                                        <p class="mb-2">Hispanic Pharmacy Museum (UCM)</p>
                                        <p class="mb-2">Museum of Geology (UCM)</p>
                                        <p class="mb-2">Museum of Dentistry "Luis de Macorra" UCM</p>
                                      </div>
                                    </div>
                                    <div class="location-popup-card-single mt-4">
                                      <div class="card-single-head d-flex align-items-center bg-purple-2">
                                        <div class="card-head-img pe-3"><img
                                            src="assets/images/icons/locationpopup-card4.png"></div>
                                        <div class="card-head-text">Beaches</div>
                                      </div>
                                      <div class="card-content">
                                        <p class="mb-2">Museum of Entomology (UCM) </p>
                                        <p class="mb-2">Hispanic Pharmacy Museum (UCM)</p>
                                        <p class="mb-2">Museum of Geology (UCM)</p>
                                        <p class="mb-2">Museum of Dentistry "Luis de Macorra" UCM</p>
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
                  <!-------- Location popup end -------->
                </div>
              </div>
              <div class="middle-content-bottom">
                <p class="m-0">12 Nights, 2 Guests, 2 Rooms, 4 Beds</p>
                <p class="bottom-text">Tax. Included</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 border-left">
          <div class="result-right-content mt-3 ps-3 pe-3">
            <div class="result-right-inner">
              <div class="right-select">
                <select class="form-select form-select-lg mb-3 fs-6" aria-label=".form-select-lg example">
                  <option selected>What’s nearby</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
              <div class="right-menu-main">
                <div class="right-menu-inner">
                  <div class="right-menu mb-2">
                    <div class="right-menu-icon d-flex pb-1">
                      <div class="right-menu-icon-inner">
                        <img src="assets/images/icons/search-i-1.png">
                      </div>
                      <div class="right-menu-text"><a href="javascript:;" class="para-d-l-p">Fábula
                          Taberna</a></div>
                    </div>
                  </div>
                  <div class="right-menu mb-2">
                    <div class="right-menu-icon d-flex pb-1">
                      <div class="right-menu-icon-inner">
                        <img src="assets/images/icons/search-i-2.png">
                      </div>
                      <div class="right-menu-text"><a href="javascript:;" class="para-d-l-p">El Albero</a>
                      </div>
                    </div>
                  </div>
                  <div class="right-menu mb-2">
                    <div class="right-menu-icon d-flex pb-1">
                      <div class="right-menu-icon-inner">
                        <img src="assets/images/icons/search-i-3.png">
                      </div>
                      <div class="right-menu-text"><a href="javascript:;" class="para-d-l-p">LePaste</a></div>
                    </div>
                  </div>
                  <div class="right-menu mb-2">
                    <div class="right-menu-icon d-flex pb-1">
                      <div class="right-menu-icon-inner">
                        <img src="assets/images/icons/search-i-4.png">
                      </div>
                      <div class="right-menu-text"><a href="javascript:;" class="para-d-l-p"> Pf Changs</a>
                      </div>
                    </div>
                  </div>
                  <div class="right-menu mb-2">
                    <div class="right-menu-icon d-flex pb-1">
                      <div class="right-menu-icon-inner">
                        <img src="assets/images/icons/search-i-5.png">
                      </div>
                      <div class="right-menu-text"><a href="javascript:;" class="para-d-l-p"> ATM Gran Via</a>
                      </div>
                    </div>
                  </div>
                  <div class="right-menu mb-2">
                    <div class="right-menu-icon d-flex pb-1">
                      <div class="right-menu-icon-inner">
                        <img src="assets/images/icons/search-i-6.png">
                      </div>
                      <div class="right-menu-text"><a href="javascript:;" class="para-d-l-p"> Hotel V bar</a>
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
  </main>
  <div data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-offset="0"
    class="search-result-price-tag search-result-notify position-relative">
    <button class="price-btn notify-btn" data-bs-toggle="modal" data-bs-target="#notify-popup">Notify
      Me</button>
    <!-------- Notify popup sart -------->
    <div class="modal fade notify-popup-main" id="notify-popup" data-bs-backdrop="static" data-bs-keyboard="false"
      tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-fullscreen modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header justify-content-end">
            <button type="button" data-bs-dismiss="modal" class="modal-close" aria-label="Close"><i
                class="fa-solid fa-xmark"></i></button>
          </div>
          <div class="modal-body py-sm-5 display-grid-items">
            <div class="notify-popup-inner">
              <div class="notify-popup-img position-relative">
                <img src="assets/images/notify-pop.png" class="img-fluid">
                <div class="notify-popup-soldout">
                  <img src="assets/images/icons/search-soldout.png" class="img-fluid">
                </div>
              </div>
              <div class="notify-popup-content">
                <div class="notify-popup-alarm text-center mt-3 mb-3">
                  <img src="assets/images/icons/notify-alarm.png" class="img-fluid">
                </div>
                <div class="notify-popup-heading text-center">
                  <h5>Notify me if this hotel becomes available</h5>
                </div>
                <div class="notify-input-select">
                  <div class="padding-left">
                    <div class="form-check ">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label ps-2" for="flexCheckDefault">
                        Email
                      </label>
                    </div>
                    <div class="form-check  ">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                      <label class="form-check-label ps-2" for="flexCheckDefault">
                        Phone
                      </label>
                    </div>
                  </div>
                  <div class="form-check mt-3 p-0">
                    <input class="form-control form-custom-control" type="tel" placeholder="Enter your phone">
                  </div>
                </div>
                <div class="notify-popup-btn text-center pt-4 pb-4">
                  <button class="price-btn bg-purple" data-bs-toggle="modal" data-bs-target="#notify-popup">Notify
                    Me</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-------- Notify popup end -------->
  </div> --}}



