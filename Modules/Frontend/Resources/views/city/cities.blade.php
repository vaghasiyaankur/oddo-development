<div class="tab-pane fade show active p-a-tabcontent-inner pt-4" id="Cities" role="tabpanel"
  aria-labelledby="pills-overview-tab">
  <div class="p-a-tab-map">
      <div class="s-top-city-inner pb-5">
          <div class="s-top-city-main">
              <div class="row">
                  @foreach ($cities as $city)
                  {{-- @dd($city) --}}
                  <div class="col-lg-4 col-md-6 col-12 mb-3">
                      <div class="t-city-card position-relative">
                          <div class="t-city-card-img position-relative text-center">
                                <img src="{{$city->background_image ? asset('storage/'.$city->background_image) : asset('assets/images/defaultImage.png')}}"
                                   class="img-fluid" onerror="this.src='{{asset('assets/images/defaultImage.png')}}'">
                          </div>
                          <div class="t-city-card-content text-center">
                              <img src="{{asset('storage/'.@$city->icon)}}" class="img-fluid" onerror="this.src='{{asset('assets/images/default.png')}}', style='width:32px;height:23px;' " width='32'
                              height="23">
                          </div>
                          <h3 class="text-center mb-0">{{ @$city->name }}</h3>
                          <div class="t-city-card-button text-center mt-2">
                            {{-- <a href="{{ route('city.explore',['slug' => @$hotel->hotel->city->slug]) }}" class="btn bg-purple t-city-btn">Explore</a> --}}
                            <a href="javascript:;" class="btn bg-purple t-city-btn citySearchBtn" data-id="{{@$city->name}}">Explore</a>
                          </div>
                      </div>
                  </div>
                  @endforeach
              </div>
          </div>
      </div>
  </div>
</div>
