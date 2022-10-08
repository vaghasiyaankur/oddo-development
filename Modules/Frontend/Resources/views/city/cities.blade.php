

<div class="tab-pane fade show active p-a-tabcontent-inner" id="Cities" role="tabpanel"
  aria-labelledby="pills-overview-tab">
  <div class="p-a-tab-map">
      <div class="s-top-city-inner pb-5">
          <div class="s-top-city-main">
              <div class="row">
                  @foreach ($cities as $city)
                  {{-- @dd($city) --}}
                  <div class="col-lg-4 col-sm-6 col-12  p-0 mb-3">
                      <div class="t-city-card position-relative ">
                          <div class="t-city-card-img position-relative text-center">
                              <img src="{{asset('storage/'.$city->background_image)}}"
                                  style="width: 327px; height: 401px;" class="img-fluid">
                          </div>
                          <div class="t-city-card-content text-center">
                              <h3>{{ @$city->name }}</h3>
                              <img src="{{asset('storage/'.@$city->icon)}}" class="img-fluid">
                                <div class="t-city-card-button">
                                  {{-- <a href="{{ route('city.explore',['slug' => @$hotel->hotel->city->slug]) }}" class="btn bg-purple t-city-btn">Explore</a> --}}
                                  <a href="javascript:;" class="btn bg-purple t-city-btn citySearchBtn" data-id="{{@$city->name}}">Explore</a>
                              
                                </div>
                          </div>
                      </div>
                  </div>
                  @endforeach
              </div>
          </div>
      </div>
  </div>
</div>
